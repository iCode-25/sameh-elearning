<?php

namespace App\Http\Controllers\Front;

use Exception;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\Card;
use App\Models\City;
use App\Models\News;
use App\Models\Test;
use App\Models\User;
use App\Models\About;
use App\Models\Level;
use App\Models\Story;
use App\Models\Coupon;
use App\Models\Videos;
use GuzzleHttp\Client;
use App\Models\Airport;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Setting;
use App\Models\Packages;
use App\Models\TourType;
use App\Models\AirMaster;
use App\Models\HotelCity;
use App\Models\Programme;
use App\Models\Workshops;
use App\Models\StudentTest;
use App\Models\Testimonial;
use App\Models\Voucherspage;
use Illuminate\Http\Request;
use App\Models\Privacypolicy;
use App\Models\StudentAnswer;
use App\Models\Categorygallery;
use App\Models\Informationtour;
use App\Models\EventsManagement;
use App\Models\Informationhotel;
use App\Models\ProgrammeBooking;
use App\Models\ContentManagement;
use App\Models\Informationflight;
use App\Models\Termsandcondition;
use App\Helpers\TranslationHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\RegistrationWorkshops;
use Illuminate\Support\Facades\Cache;
use App\Models\ControlExpirationDuration;
use App\Http\Requests\Front\Auth\CouponLessonRequest;
use App\Http\Requests\Front\Booking\ApplyFormRequest;
use App\Http\Requests\Front\Auth\StudentAnswersRequest;
use App\Http\Requests\Front\Flight\FlightSearchRequest;
use App\Http\Requests\Front\Flight\FlightMultiSearchRequest;
use App\Http\Requests\Front\ProgrammeBooking\ProgrammeBookingCheckoutRequest;
use App\Models\Transfer;

class PackageController extends Controller
{

    public function index(Request $request)
    {
        $levels = Level::get();
        $packages = Packages::active()->when($request->input('name'), function ($query) use ($request) {
            return $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
        })->when($request->input('level_id'), function ($query) use ($request) {
            return $query->where('level_id', $request->input('level_id'));
        })->whereHas('lessons')->latest()->get();
        return view('front.pages.packages', get_defined_vars());
    }

    public function details($id)
    {

        $package = Packages::active()->find($id);
        if (!$package) {
            return abort(404, TranslationHelper::translate('Package not found'));
        }

        if (auth('web')->check()) {
            $voucher = Voucherspage::packageActive()
                ->where('package_id', $id)
                ->where('client_id', auth('web')->id())
                ->first();

            $transfer = Transfer::packageActive()
                ->where('packages_id', $id)
                ->where('user_id', auth('web')->id())
                ->first();

            $myVoucher = false;
            if ($voucher || $transfer) {
                $myVoucher = true;
            }
        }
        return view('front.pages.Packages.details', get_defined_vars());
    }

    public function show_package(Packages $package, Videos $lesson)
    {
        if (auth('web')->check()) {
            $voucher = Voucherspage::packageActive()
                ->where('package_id', $package->id)
                ->where('client_id', auth('web')->id())
                ->first();

            $transfer = Transfer::packageActive()
                ->where('packages_id', $package->id)
                ->where('user_id', auth('web')->id())
                ->first();

            if ($voucher || $transfer) {
                $package = Packages::active()->find($package->id);
                if (!$package) {
                    return abort(404, TranslationHelper::translate('Package not found'));
                }

                if (!$lesson->id) {
                    $lesson = $package->lessons()->active()->firstOrFail();
                }
                return view('front.pages.Packages.show_package', get_defined_vars());
            }

            return abort(403, TranslationHelper::translate('You do not have access to this Package'));
        }
        return redirect()->route('user.login.form')->with('error', TranslationHelper::translate('You do not have access to this Package'));
    }

    public function coupon_apply(CouponLessonRequest $request, Packages $package)
    {

        try {
            $coupon = Coupon::where('code', $request->coupon_code)->first();
            // dd($coupon->group->type_group);
            if (!$coupon || $coupon->group->type_group != 'package') {
                return response()->json([
                    'message' => \App\Helpers\TranslationHelper::translate('Invalid coupon code.'),
                    'errors' => ['coupon_code' => ['The provided coupon code does not exist.']],
                ], 422);
            }

            $used = Voucherspage::where('coupon_id', $coupon->id)->exists();

            if ($used) {
                return response()->json([
                    'message' => \App\Helpers\TranslationHelper::translate('Coupon already used.'),
                    'errors' => ['coupon_code' => ['The coupon has already been used.']],
                ], 422);
            }

            if (!$coupon->is_valid) {
                return response()->json([
                    'message' => \App\Helpers\TranslationHelper::translate('The coupon is invalid.'),
                    'errors' => ['coupon_code' => ['This coupon is marked as invalid.']],
                ], 422);
            }

            if ($coupon->group && ($coupon->group->is_banned == 1 && $coupon->group->validate_to && (Carbon::now()->gt(Carbon::parse($coupon->group->validate_to))))) {
                return response()->json([
                    'message' => \App\Helpers\TranslationHelper::translate('The coupon group is either banned or expired.'),
                    'errors' => ['group_id' => [\App\Helpers\TranslationHelper::translate('Invalid group for this coupon.')]],
                ], 422);
            }

            // إضافة النقاط إلى العميل
            $user = User::find(auth('web')->user()->id);

            $voucherspage = Voucherspage::create([
                'client_id' => auth('web')->user()->id,
                'coupon_id' => $coupon->id,
                'package_id' => $package->id,
                'type' => 'package',

                'client_title' => auth('web')->user()->name,
                'coupon_title' => $coupon->code,
                'package_title' => $package->name,
                'level_title' => $package->level->name,
            ]);

            return response()->json([
                'message' => \App\Helpers\TranslationHelper::translate('This package is yours now.')
            ]);
        } catch (Exception $e) {
            return response()->json(['message' => TranslationHelper::translate('try again later'), 'error' => $e->getMessage()], 422);
            // return response()->json(['message' => $e->getMessage(),'error', TranslationHelper::translate('try again later')], 422);
        }
    }

    public function enroll(Packages $package)
    {
        try {
            // تحقق من تسجيل الدخول
            if (!auth('web')->check()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Unauthorized'
                ], 401);
            }

            // جلب الباقة
            if (!$package) {
                return response()->json([
                    'status' => false,
                    'message' => TranslationHelper::translate('package not found')
                ], 404);
            }

            // حساب السعر بعد الخصم
            $finalPrice = $package->price - ($package->price * $package->discount / 100);

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('FAWATERK_API_KEY'),
            ])->post('https://app.fawaterk.com/api/v2/createInvoiceLink', [
                        'cartTotal' => $finalPrice,
                        'currency' => 'EGP',
                        'customer' => [
                            'first_name' => auth('web')->user()->name,
                            'email' => auth('web')->user()->email,
                            'phone' => auth('web')->user()->phone ?? '0000000000',
                            'address' => 'Online Platform'
                        ],
                        'redirectionUrls' => [
                            'successUrl' => route('user.package.payment.success', ['package' => $package->id]),
                            'failUrl' => route('user.site.package.details', $package->id),
                            'pendingUrl' => route('user.site.package.details', $package->id)
                        ],
                        'cartItems' => [
                            [
                                'name' => $package->name,
                                'price' => $finalPrice,
                                'quantity' => 1
                            ]
                        ]
                    ]);

            $json = $response->json();
            if (!isset($json['data']['invoiceId'])) {
                return response()->json([
                    'status' => false,
                    'message' => TranslationHelper::translate('failed to create invoice'),
                    'error' => $json
                ], 500);
            }

            return response()->json([
                'status' => true,
                'message' => TranslationHelper::translate('payment link created successfully'),
                'redirect_url' => $json['data']['url'],
                'invoice_id' => $json['data']['invoiceId']
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => TranslationHelper::translate('try again later'),
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function payment_success($packageId, Request $request)
    {
        try {
            if (!auth('web')->check()) {
                return redirect()->route('user.login.form')->with('error', 'Unauthorized');
            }

            $package = Packages::active()->find($packageId);
            if (!$package) {
                return abort(404, TranslationHelper::translate('Package not found'));
            }

            // استخراج invoiceId من الـ query string
            $invoiceId = $request->query('invoice_id');

            if (!$invoiceId) {
                return abort(404, TranslationHelper::translate('Missing invoice ID'));
            }

            // طلب بيانات الفاتورة من فواتيرك
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('FAWATERK_API_KEY'),
            ])->post("https://app.fawaterk.com/api/v2/getInvoiceData/$invoiceId");

            $json = $response->json();

            // تحقق من صحة الاستجابة قبل استخدام البيانات
            if (
                !isset($json['data']) ||
                !isset($json['data']['paid']) ||
                $json['data']['paid'] !== 1
            ) {
                return abort(403, TranslationHelper::translate('Payment not completed yet'));
            }

            // تسجيل العملية
            $finalPrice = $package->price - ($package->price * $package->discount / 100);

            Transfer::create([
                'amount' => $finalPrice,
                'status' => 'success',
                'response_data' => json_encode($json['data']),
                'user_id' => auth('web')->id(),
                'packages_id' => $package->id,
                'transfer_type' => 'package',

                'client_title' => auth('web')->user()->name,
                'amount_title' => $finalPrice,
                'packages_title' => $package->name,
                'level_title' => $package->level->name,
            ]);

            // رجعه على صفحة الباقة أو أي مكان تاني
            return redirect()->route('user.show_package', $package->id)->with('success', TranslationHelper::translate('payment completed successfully'));

        } catch (Exception $e) {
            // dd($e->getMessage());
            return abort(500, TranslationHelper::translate('An error occurred while processing the payment: ' . $e->getMessage()));
        }
    }

    public function show_test(Packages $package, Test $test)
    {

        if (!auth('web')->check()) {
            return redirect()->route('user.login.form')->with('error', TranslationHelper::translate('You must be logged in to access this quiz'));
        }

        $package = Packages::active()->whereHas('vouchers', function ($query) use ($package) {
            $query->packageActive()->where('client_id', auth('web')->id())
                ->where('package_id', $package->id)
                ->where('type', 'package');
        })->orWhereHas('transfers', function ($query) use ($package) {
            $query->packageActive()->where('user_id', auth('web')->id())
                ->where('packages_id', $package->id)
                ->where('transfer_type', 'package');
        })->first();

        if (!$package) {
            return abort(404, TranslationHelper::translate('Package not found'));
        }

        if (!$test || $test->quizzes->count() == 0) {
            return redirect()->route('user.site.package.details', ['package', $package->id])->with('error', TranslationHelper::translate('Quiz not found'));
        }

        if (
            auth('web')->user()->tests()->desactive()->where('test_id', $test->id)->where('result_status', 0)->count() >= 3 ||
            auth('web')->user()->tests()->desactive()->where('test_id', $test->id)->count() > 0
        ) {
            return abort(403, TranslationHelper::translate('You have exceeded the maximum number of attempts for this quiz.'));
        }

        return view('front.pages.Packages.show_quiz', get_defined_vars());
    }

    public function submit_test(StudentAnswersRequest $request, Packages $package, Test $test)
    {
        try {
            if (!$package) {
                return redirect()->route('site.packages')->with('error', TranslationHelper::translate('Lesson not found'));
            }

            if (!$test) {
                return redirect()->route('user.show_package', ['package' => $package->id])->with('error', TranslationHelper::translate('Quiz not found'));
            }

            // Check if the user is authenticated
            if (!auth('web')->check()) {
                return redirect()->route('user.login.form')->with('error', TranslationHelper::translate('You must be logged in to submit answers'));
            }

            foreach ($request->answers as $answer) {
                StudentAnswer::create([
                    'question_id' => $answer['question_id'],
                    'correct_answer' => $answer['correct_answer'],
                    'student_answer' => $answer['student_answer'],
                    'test_id' => $test->id,
                    'student_id' => auth('web')->user()->id ?? null,
                    'is_correct' => $answer['correct_answer'] === $answer['student_answer'],
                ]);
            }

            StudentTest::create([
                'test_id' => $test->id,
                'student_id' => auth('web')->id(),
                'total_questions' => count($request->answers),
                'total_score' => $request->total_score,
                'student_score' => $request->student_score,
                'result_status' => $request->result_status
            ]);

            return response()->json(['message' => 'تم الحفظ']);
        } catch (Exception $e) {
            return response()->json(['error' => TranslationHelper::translate($e->getMessage())], 422);
        }
    }


}
