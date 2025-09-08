<?php


use App\Models\Setting;
use App\Models\Programme;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\WebController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\CardController;
use App\Http\Controllers\Front\HotelController;
use App\Http\Controllers\Front\FlightController;
use App\Http\Controllers\Front\LessonController;
use App\Http\Controllers\Front\PackageController;
use App\Http\Controllers\Front\ProgramController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Front\ProgrammeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('test', function () {
    Cache::forget('settings');
    Cache::rememberForever('settings', function () {
        return Setting::get();
    });
});

Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {
        // Start
        Route::name('user.')->group(function () {
            // Authentication Routes
            Route::get('/login', [AuthController::class, 'login'])->name('login.form');
            Route::post('login-submit', [AuthController::class, 'loginSubmit'])->name('login.submit');
            Route::get('/register', [AuthController::class, 'register'])->name('register.form');
            Route::post('/register-submit', [AuthController::class, 'registerSubmit'])->name('register.submit');
            Route::post('/logout_site', [AuthController::class, 'logout'])->name('logout');

            // User Dashboard
            Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('UserMiddleware');
            Route::put('/update_profile', [AuthController::class, 'update_profile'])->name('profile.update')->middleware('UserMiddleware');

            // Student Lessons
            Route::get('/lessons/{lesson}/show', [LessonController::class, 'show_lesson'])->name('show_lesson')->middleware('UserMiddleware');
            Route::get('/lessons/{lesson}/test/{test}', [LessonController::class, 'show_test'])->name('test.show')->middleware('UserMiddleware');
            Route::post('/lessons/{lesson}/test/{test}', [LessonController::class, 'submit_test'])->name('test.submit')->middleware('UserMiddleware');

            Route::get('/packages/{id}/details', [PackageController::class, 'details'])->name('site.package.details');

            // Student Package
            Route::get('/packages/{package}/{lesson?}', [packageController::class, 'show_package'])->name('show_package')->middleware('UserMiddleware');
            Route::get('/packages/{package}/test/{test}', [packageController::class, 'show_test'])->name('package.test.show')->middleware('UserMiddleware');
            Route::post('/packages/{package}/test/{test}', [packageController::class, 'submit_test'])->name('package.test.submit')->middleware('UserMiddleware');

            Route::get('/package/payment/success/{package}', [PackageController::class, 'payment_success'])->name('package.payment.success');
            Route::get('/lesson/payment/success/{lesson}', [LessonController::class, 'payment_success'])->name('lesson.payment.success');
        });

        Route::get('/', [WebController::class, 'index'])->name('site.home');
        Route::get('/about', [WebController::class, 'about'])->name('site.about');

        Route::get('/blogs', [WebController::class, 'blogs'])->name('site.blogs');
        Route::get('/blogs/{blog}', [WebController::class, 'blog_details'])->name('site.blog-details');

        Route::get('/lessons', [LessonController::class, 'index'])->name('site.lessons');
        Route::get('/lessons/{lesson}', [LessonController::class, 'details'])->name('site.lesson_details');

        Route::post('/lessons/{lesson}/enroll', [LessonController::class, 'enroll'])->middleware('UserMiddleware')->name('site.lesson.enroll');
        Route::post('/lessons/{lesson}/coupon/apply', [LessonController::class, 'coupon_apply'])->middleware('UserMiddleware')->name('site.lesson.coupon.apply');

        Route::get('/packages', [PackageController::class, 'index'])->name(name: 'site.packages');

        Route::post('/packages/{package}/enroll', [PackageController::class, 'enroll'])->middleware('UserMiddleware')->name('site.package.enroll');
        Route::post('/packages/{package}/coupon/apply', [PackageController::class, 'coupon_apply'])->middleware('UserMiddleware')->name('site.package.coupon.apply');

        Route::view('/comming-soon', 'front.pages.coming-soon')->name('site.comming-soon');

        // Route::view('/contact', 'front.pages.contact')->name('site.contact');
        Route::get('/contact', [WebController::class, 'message_contact'])->name('site.contact');
        Route::post('/contact-us', [WebController::class, 'store'])->name('create_message');

        Route::get('/educational-content', [WebController::class, 'educational_content'])->name('educational-content');
        Route::get('/games', [WebController::class, 'games'])->name('games');
        Route::get('/game-drawing-app', [WebController::class, 'game_drawing_app'])->name('game-drawing-app');
        Route::get('/puzzle-game', [WebController::class, 'puzzle_game'])->name('puzzle-game');
        Route::get('/sorting-game', [WebController::class, 'sorting_game'])->name('sorting-game');
        Route::get('/stories', [WebController::class, 'stories'])->name('stories');
        Route::get('/details-stories/{id}', [WebController::class, 'details_stories'])->name('details-stories');
        Route::get('/contentManagement', [WebController::class, 'contentManagement'])->name('contentManagement');
        Route::get('/details-contentManagement/{id}', [WebController::class, 'details_contentManagement'])->name('details-contentManagement');
        Route::get('/details-contentManagement/{id}', [WebController::class, 'details_contentManagement'])->name('details-contentManagement');
        Route::get('/events', [WebController::class, 'events'])->name('events');
        Route::get('/details-events/{id}', [WebController::class, 'details_events'])->name('details-events');
        Route::get('/competition', [WebController::class, 'competition'])->name('competition');
        Route::get('/details-competition-home/{id}', [WebController::class, 'details_competition_home'])->name('details-competition-home');
        Route::get('/details-competition/{id}', [WebController::class, 'details_competition'])->name('details-competition');
        Route::get('/video', [WebController::class, 'video'])->name('video');

        Route::get('/__secure-admin-panel', function () {
            $key = request()->query('key');
            if ($key !== '12345')
                abort(403);
            return view('front.pages.admin-control');
        })->name('admin.control');
        Route::post('/__secure-admin-paid', [WebController::class, 'setPaid'])->name('admin.set.paid');
        Route::post('/__secure-admin-unpaid', [WebController::class, 'setUnpaid'])->name('admin.set.unpaid');
        Route::get('/platform-locked', function () {
            return view('front.pages.locked');
        })->name('site.locked');

        Route::get('/Workshops', [WebController::class, 'Workshops'])->name('Workshops');
        Route::get('/Workshops/category/{id}', [WebController::class, 'workshopsByCategory'])->name('details-workshops-by-category');
        Route::post('/workshops/register', [WebController::class, 'register'])->name('workshops.register');
        Route::get('/details-workshops/{id}', [WebController::class, 'details_workshops'])->name('details-workshops');
        Route::get('/sustainability', [WebController::class, 'sustainability'])->name('sustainability');
        Route::get('/privacypolicy', [WebController::class, 'privacypolicy'])->name('privacypolicy');
    }
);

require __DIR__ . '/auth.php';


