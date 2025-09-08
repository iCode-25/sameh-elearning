<?php

namespace App\Http\Controllers\Front;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Dashboard\ChangePasswordRequest;
use App\Http\Requests\Front\Dashboard\UpdateProfileRequest;
use App\Models\Booking;
use App\Models\ProgrammeBooking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class DashboardController extends Controller
{

    public function index() {
        $total_programmes_bookings = ProgrammeBooking::where('user_id', auth('web')->user()->id)->count();
        $paid_programmes_bookings = ProgrammeBooking::where('user_id', auth('web')->user()->id)->where('payment_status', 'paid')->count();
        $unpaid_programmes_bookings = ProgrammeBooking::where('user_id', auth('web')->user()->id)->where('payment_status', 'unpaid')->count();
        return view('front.pages.user_dashboard.index', get_defined_vars());
    }




    public function profile()
    {
        return view('front.pages.user_dashboard.profile');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        if ($request->has('email') && $request->email != null && $request->email != auth('web')->user()->email) {
            $validate = $request->validate([
                'email' => 'email|unique:users,email'
            ], [
                'email.email' => TranslationHelper::translate('Invalid Email Address'),
                'email.unique' => TranslationHelper::translate('This Email Has Already Been Taken'),
            ]);
        }
        if ($request->has('phone') && $request->phone != null && $request->phone != auth('web')->user()->phone) {
            $validate = $request->validate([
                'phone' => 'unique:users,phone'
            ], [
                'phone.unique' => TranslationHelper::translate('This Phone is Already in Use'),
            ]);
        }
        if ($request->has('username') && $request->username != null && $request->username != auth('web')->user()->username) {
            $validate = $request->validate([
                'username' => 'unique:users,username'
            ], [
                'username.unique' => TranslationHelper::translate('This Username is Already Been Taken'),
            ]);
        }

        $user = auth('web')->user();
        $data = [
            'name' => $request->name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
        ];
        $user->update($data);

        return redirect()->route('user.profile')->with(['success' => TranslationHelper::translate('Profile Updated Successfully')]);

    }


    public function myProgrammeBookings()
    {
        $programme_bookings = ProgrammeBooking::where('user_id', auth('web')->user()->id)->get();
        return view('front.pages.user_dashboard.programme_booking_history', get_defined_vars());
    }



    public function changePassword(ChangePasswordRequest $request)
    {
//        return $request;
        $old_password = Auth::user()->password;
        $request_old_password = $request->old_password;
        $new_password = $request->new_password;

        if (Hash::check($request_old_password, $old_password)) {
            auth('web')->user()->update(['password' => Hash::make($new_password)]);
            return redirect()->route('user.profile')->with(['success' => TranslationHelper::translate('Password Changed Successfully')]);

        } else {
            return redirect()->route('user.profile')->with(['error' => TranslationHelper::translate('Old Password is Incorrect')]);
        }
    }





}
