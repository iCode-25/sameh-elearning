<?php

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\API\AboutusController;
use App\Http\Controllers\API\AnsweringQuestionsController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\BranchesController;
use App\Http\Controllers\API\ChallengesController;
use App\Http\Controllers\API\CityController as APICityController;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\ContentManagementController;
use App\Http\Controllers\API\CountryController;
use App\Http\Controllers\API\EventsManagementController;
use App\Http\Controllers\API\FavoritebranchesController;
use App\Http\Controllers\API\FavoriteoffersController;
use App\Http\Controllers\API\FavoriteproductsController;
use App\Http\Controllers\API\GroupController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\OfferController;
use App\Http\Controllers\API\PaintscategoryController;
use App\Http\Controllers\API\PointssettingController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\PrivacypolicyController;
use App\Http\Controllers\API\ProductcategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SearchbranchesController;
use App\Http\Controllers\API\SearchofferController;
use App\Http\Controllers\API\SearchproductsController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\StoryController;
use App\Http\Controllers\API\TermsandconditionController;
use App\Http\Controllers\API\TestController;
use App\Http\Controllers\API\VoucherspageController;
use App\Http\Controllers\API\WorkshopsController;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API 
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//TODO register  and login
Route::prefix('auth')->group(function () {
     Route::post('register', [ClientController::class, 'register']);
    //  Route::post('verify-otp', [ClientController::class, 'verifyOtp']);
    Route::post('login', [LoginController::class, 'login']);
    Route::post('log-out', [LoginController::class, 'LogOut']);
});
Route::middleware('CheckAuthApi' )->group(function() {
    Route::prefix('profile')->group(function () {
        Route::get('get-my-profile', [ClientController::class, 'getMyProfile']);
        Route::post('update-my-profile', [ClientController::class, 'updateMyProfile']);
        Route::post('updateImage', [ClientController::class, 'updateImage']);
        Route::post('update-fcm-token', [ClientController::class, 'updateFcmToken']);
        Route::post('change-password', [LoginController::class, 'ChangePassword']);
         Route::post('delete-account', [LoginController::class, 'DeleteAccount']);
    });
});
//TODO Route all
Route::post('/message', [MessageController::class, 'CreateMessage']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/privacypolicy', [PrivacypolicyController::class, 'index']);
Route::get('/termsandcondition', [TermsandconditionController::class, 'index']);
Route::get('/aboutus', [AboutusController::class, 'index']);
Route::get('/test', [TestController::class, 'index']);
Route::get('/setting', [SettingController::class, 'index']);




