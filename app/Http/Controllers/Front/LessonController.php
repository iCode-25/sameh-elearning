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
use App\Models\TourType;
use App\Models\Transfer;
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
use App\Http\Requests\Front\Auth\CouponLessonRequest;
use App\Http\Requests\Front\Booking\ApplyFormRequest;
use App\Http\Requests\Front\Auth\StudentAnswersRequest;
use App\Http\Requests\Front\Flight\FlightSearchRequest;
use App\Http\Requests\Front\Flight\FlightMultiSearchRequest;
use App\Http\Requests\Front\ProgrammeBooking\ProgrammeBookingCheckoutRequest;


class LessonController extends Controller
{

    public function index()
    {
        $levels = Level::get();
        $lessons = Videos::query()->active()
            ->where('price', '>', 0)
            ->when(request()->get('name'), function ($query) {
                $name = request()->get('name');
                $query->where(function ($q) use ($name) {
                    $q->where('name', 'like', '%' . $name . '%')
                        ->orWhere('des', 'like', '%' . $name . '%');
                });
            })
            ->when(request()->get('level_id'), function ($query) {
                $levelId = request()->get('level_id');
                $query->where('level_id', $levelId);
            })
            ->latest()->get();
        return view('front.pages.courses.index', get_defined_vars());
    }

    public function details($lesson)
    {
        // dd($lesson);
        $lesson = Videos::active()->find($lesson);
        if (!$lesson) {
            return abort(404, TranslationHelper::translate('Lesson not found'));
        }

        // Check if this lesson is me or not
        $myVoucher = null;
        if (auth('web')->check()) {
            $myVoucher = Videos::active()->whereHas('vouchers', function ($query) use ($lesson) {
                $query->lessonActive()->where('client_id', auth('web')->user()->id)
                    ->where('product_id', $lesson->id);
            })->orWhereHas('transfers', function ($query) use ($lesson) {
                $query->lessonActive()->where('user_id', auth('web')->user()->id)
                    ->where('videos_id', $lesson->id);
            })->first();
        }

        return view('front.pages.courses.details', get_defined_vars());
    }

    public function show_lesson(Videos $lesson)
    {
        if (auth('web')->check()) {

            if ($lesson->price == 0) {
                $lesson = Videos::active()->find($lesson->id);
            } else {
                $voucher = Videos::active()->whereHas('vouchers', function ($query) use ($lesson) {
                    $query->lessonActive()->where('client_id', auth('web')->user()->id)
                        ->where('product_id', $lesson->id);
                })->orWhereHas('transfers', function ($query) use ($lesson) {
                    $query->lessonActive()->where('user_id', auth('web')->user()->id)
                        ->where('videos_id', $lesson->id);
                })->first();
            }

            if (!$lesson || (!$voucher && $lesson->price > 0)) {
                return abort(403, TranslationHelper::translate('You do not have access to this lesson'));
            }

            $nextLessons = Videos::active()->where('id', '!=', $lesson->id)
                ->where(function ($query) {
                    $query->whereHas('vouchers', function ($q) {
                        $q->lessonActive()->where('client_id', auth('web')->user()->id);
                    })->orWhereHas('transfers', function ($q) {
                        $q->lessonActive()->where('user_id', auth('web')->user()->id);
                    });
                })
                ->latest()->get();

            return view('front.pages.courses.show_lesson', get_defined_vars());
        }
    }

    public function coupon_apply(CouponLessonRequest $request, Videos $lesson)
    {
        try {
            $coupon = Coupon::where('code', $request->coupon_code)->first();

            if (!$coupon || $coupon->group->type_group != 'lessons') {
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

            if ($coupon->group && ($coupon->group->is_banned || ($coupon->group->validate_to && Carbon::now()->gt(Carbon::parse($coupon->group->validate_to))))) {
                return response()->json([
                    'message' => \App\Helpers\TranslationHelper::translate('The coupon group is either banned or expired.'),
                    'errors' => ['group_id' => [\App\Helpers\TranslationHelper::translate('Invalid group for this coupon.')]],
                ], 422);
            }
            $user = User::find(auth('web')->user()->id);
            $voucherspage = Voucherspage::create([
                'client_id' => auth('web')->user()->id,
                'coupon_id' => $coupon->id,
                'product_id' => $lesson->id,

                'client_title' => auth('web')->user()->name,
                'coupon_title' => $coupon->code,
                'lesson_title' => $lesson->name,
                'level_title' => $lesson->level->name,
            ]);

            return response()->json([
                'message' => \App\Helpers\TranslationHelper::translate('This lesson is yours now.')
            ]);
        } catch (Exception $e) {
            return response()->json(['error', TranslationHelper::translate($e->getMessage())], 422);
        }
    }

    public function enroll($lesson)
    {
        try {
            $lesson = Videos::active()->find($lesson);
            if (!$lesson) {
                return response()->json([
                    'status' => false,
                    'message' => TranslationHelper::translate('Lesson not found')
                ], 404);
            }
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('FAWATERK_API_KEY'),
            ])->post('https://app.fawaterk.com/api/v2/createInvoiceLink', [
                        'cartTotal' => $lesson->price,
                        'currency' => 'EGP',
                        'customer' => [
                            'first_name' => auth('web')->user()->name,
                            'email' => auth(guard: 'web')->user()->email,
                            'phone' => auth('web')->user()->phone ?? '0000000000',
                            'address' => 'Online Platform'
                        ],
                        'redirectionUrls' => [
                            'successUrl' => route('user.lesson.payment.success', ['lesson' => $lesson->id]),
                            'failUrl' => route('site.lesson_details', $lesson->id),
                            'pendingUrl' => route('site.lesson_details', $lesson->id)
                        ],
                        'cartItems' => [
                            [
                                'name' => $lesson->name,
                                'price' => $lesson->price,
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

    public function payment_success($lessonId, Request $request)
    {
        try {
            if (!auth('web')->check()) {
                return redirect()->route('user.login.form')->with('error', 'Unauthorized');
            }
            $lesson = Videos::active()->find($lessonId);
            if (!$lesson) {
                return abort(404, TranslationHelper::translate('Lesson not found'));
            }
            // استخراج invoiceId من الـ query string
            $invoiceId = $request->query('invoice_id');
            if (!$invoiceId) {
                return abort(404, TranslationHelper::translate('Missing invoice ID'));
            }
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('FAWATERK_API_KEY'),
            ])->post("https://app.fawaterk.com/api/v2/getInvoiceData/$invoiceId");
            $json = $response->json();
            if (!isset($json['data']) || !isset($json['data']['paid']) || $json['data']['paid'] !== 1) {
                return abort(403, TranslationHelper::translate('Payment not completed yet'));
            }
            Transfer::create([
                'amount' => $lesson->price,
                'status' => 'success',
                'response_data' => json_encode($json['data']),
                'user_id' => auth('web')->id(),
                'videos_id' => $lesson->id,
                'transfer_type' => 'lesson',

                'client_title' => auth('web')->user()->name,
                'amount_title' => $lesson->price,
                'videos_title' => $lesson->name,
                'level_title' => $lesson->level->name,
            ]);
            return redirect()->route('user.show_lesson', ['lesson' => $lesson->id])->with('success', TranslationHelper::translate('Payment completed successfully, you now have access to this lesson'));
        } catch (Exception $e) {
            dd($e->getMessage());
            return abort(500, TranslationHelper::translate('An error occurred while processing the payment: ' . $e->getMessage()));
        }
    }




    public function show_test(Videos $lesson, Test $test)
    {
        if ($lesson->price == 0) {
            $lesson = Videos::active()->find($lesson->id);
        } else {
            $lesson = Videos::active()->whereHas('vouchers', function ($query) use ($lesson) {
                $query->lessonActive()->where('client_id', auth('web')->id())
                    ->where('product_id', $lesson->id)
                    ->where('type', 'lesson');
            })->orWhereHas('transfers', function ($query) use ($lesson) {
                $query->lessonActive()->where('user_id', auth('web')->id())
                    ->where('videos_id', $lesson->id)
                    ->where('transfer_type', 'lesson');
            })->first();
        }

        if (!$lesson) {
            return abort(403, TranslationHelper::translate('Lesson not found'));
        }

        if (!$test) {
            return redirect()->route('site.lesson_details', ['lesson', $lesson->id])->with('error', TranslationHelper::translate('Quiz not found'));
        }

        if (
            auth('web')->user()->tests()->desactive()->where('test_id', $test->id)->where('result_status', 0)->count() >= 3 ||
            auth('web')->user()->tests()->desactive()->where('test_id', $test->id)->count() > 0
        ) {
            return abort(403, TranslationHelper::translate('You have exceeded the maximum number of attempts for this quiz.'));
        }

        return view('front.pages.courses.show_quiz', get_defined_vars());
    }

    public function submit_test(StudentAnswersRequest $request, Videos $lesson, Test $test)
    {
        try {
            if (!$lesson) {
                return redirect()->route('site.lessons')->with('error', TranslationHelper::translate('Lesson not found'));
            }

            if (!$test) {
                return redirect()->route('user.show_lesson', ['lesson' => $lesson->id])->with('error', TranslationHelper::translate('Quiz not found'));
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
                    'lesson_id' => $lesson->id,
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
