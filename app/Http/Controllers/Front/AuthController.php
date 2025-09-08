<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Level;
use App\Models\Videos;
use App\Models\Packages;
use App\Models\Voucherspage;
use Illuminate\Http\Request;
use App\Helpers\TranslationHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ControlExpirationDuration;
use App\Http\Requests\Front\Auth\LoginSubmitRequest;
use App\Http\Requests\Front\Auth\RegisterSubmitRequest;

class AuthController extends Controller
{
    // ***********login***********
    public function login()
    {
        // return view('front.pages.user_dashboard.auth.login');

        if (Auth::guard('web')->check()) {
            if (Auth::guard('web')->user()->is_banned == 0) {
                return redirect()->route('site.home')->with(['success' => TranslationHelper::translate('You are already logged in')]);
            }
            Auth::guard('web')->logout();
            return redirect()->route('user.login.form')->with(['error' => TranslationHelper::translate('Access Denied')]);
        }

        $levels = Level::get();
        return view('auth.login', get_defined_vars());

    }

    public function loginSubmit(LoginSubmitRequest $request)
    {
        // dd($request->username, $request->password);
        $auth = Auth::guard('web')->attempt(['email' => $request->username, 'password' => $request->password, 'is_admin' => 0]);
        if ($auth) {
            if (auth('web')->user()->is_banned == 1) {
                return redirect()->route('user.login.form')->with(['error' => TranslationHelper::translate('Access Denied')]);
            }
            return redirect()->route('site.home')->with(['success' => TranslationHelper::translate('Successfully Logged in')]);
        } else {
            return redirect()->back()->with(['error' => TranslationHelper::translate('Username or Password is incorrect')]);
        }
    }



    // **************************register*****************************



    public function register()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('site.home')->with(['success' => TranslationHelper::translate('You are already logged in')]);
        }
        return view('auth.login');
    }

    // public function registerSubmit(RegisterSubmitRequest $request)
    // {
    //     DB::beginTransaction();
    //     $data = [
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'l_name' => $request->l_name,
    //         'phone' => $request->phone,
    //         'username' => $request->username,
    //     ];
    //     $user = User::create($data);
    //     DB::commit();
    //     Auth::guard('web')->login($user);
    //     return redirect()->route('site.home')->with(['success' => TranslationHelper::translate('Successfully Registered')]);
    // }

    public function registerSubmit(RegisterSubmitRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'l_name' => $request->l_name,
                'phone' => $request->phone,
                'level_id' => $request->level_id,
                'gender' => $request->gender,
                'type' => $request->type ?? 'general',
            ];
            $validated = $request->validated();
            $user = User::create($data);
            DB::commit();
            Auth::guard('web')->login($user);
            return redirect()->route('site.home')->with([
                'success' => TranslationHelper::translate('Successfully Registered'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['registerError' => 'An error occurred during registration. Please try again.']);
        }
    }



    // **************************logout************************
    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }
        //    dd('no');
        return redirect()->route('site.home');
    }

    public function profile()
    {

        $package_days = ControlExpirationDuration::first()->package_expiration_time ?? 0;
        $lesson_days = ControlExpirationDuration::first()->lesson_expiration_time ?? 0;

        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            $packages = Packages::active()->whereHas('vouchers', function ($q) {
                $q->where('client_id', auth('web')->id())
                    ->packageActive();
            })->orWhereHas('transfers', function($q) {
                $q->where('user_id', auth('web')->id())
                    ->packageActive();
            })->latest()->get();

            $lessons = Videos::active()->whereHas('vouchers', function ($q) {
                $q->where('client_id', auth('web')->id())
                    ->lessonActive();
            })->orWhereHas('transfers', function($q) {
                $q->where('user_id', auth('web')->id())
                    ->lessonActive();
            })->latest()->get();

            $levels = Level::get();
            return view('front.pages.user_dashboard.profile', get_defined_vars());
        }
        return redirect()->route('site.home')->with(['error' => TranslationHelper::translate('You need to login first')]);
    }

    public function update_profile(Request $request)
    {
        $user = Auth::guard('web')->user();
        $data = $request->except(['_token', '_method', 'user_avatar']);

        // Handle avatar upload if present
        if ($request->hasFile('user_avatar')) {
            $user->clearMediaCollection('users');
            $user->addMedia($request->file('user_avatar'))->toMediaCollection('users');
        }
        // لو المستخدم كتب باسورد، خليه يتحدث
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']); // متعدلش الباسورد لو فاضي
        }
        $user->update($data);

        return redirect()->back()->with([
            'success' => TranslationHelper::translate('Profile updated successfully')
        ]);
    }

}
