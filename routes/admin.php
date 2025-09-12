<?php

use App\Models\User;
use App\Models\ProgrammeBooking;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\RateController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\Admin\BrancheController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PackagesController;
use App\Http\Controllers\Admin\TourTypeController;
use App\Http\Controllers\Admin\TransferController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ChallengesController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\NotificationController;

use App\Http\Controllers\Admin\VoucherspageController;
use App\Http\Controllers\Admin\CategorycolidController;
use App\Http\Controllers\Admin\PointssettingController;
use App\Http\Controllers\Admin\PrivacypolicyController;
use App\Http\Controllers\Admin\PackageLessonsController;
use App\Http\Controllers\Admin\PaintscategoryController;
use App\Http\Controllers\Admin\CategorygalleryController;
use App\Http\Controllers\Admin\ProductcategoryController;
use App\Http\Controllers\Admin\EventsManagementController;
use App\Http\Controllers\Admin\ContentManagementController;
use App\Http\Controllers\Admin\TermsandconditionController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
 use App\Http\Controllers\Admin\About_settingController as AdminAbout_settingController;
use App\Http\Controllers\Admin\ControlExpirationDurationController;
// use Google\Service\Storage;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::group([
            //    'prefix' => LaravelLocalization::setLocale().'/admin/',
            'middleware' => [
                'localeSessionRedirect',
                'localizationRedirect',
                'localeViewPath',
                'AdminCheck',
            ],
            'namespace' => 'Admin',
            'prefix' => 'admin'
        ], function () {

            //    /****************************** Assets **********************************/
//    Route::post('get-sub-categories-from-category', [CategoryController::class, 'getSubsFromMain'])->name('getSubCategoriesFromCategory');
//    Route::post('get-group-fields', [GroupController::class, 'getGroupFields'])->name('getGroupFields');

            /****************************** Dashboard **********************************/
            Route::get('/', [DashboardController::class, 'index'])->name('index');

            /************************************ Roles & Permissions ************************************************/
            //    permission:roles.permissions.control
            /****************************** Roles **********************************/
            Route::group(['prefix' => 'role'], function () {
                Route::get('/', [RoleController::class, 'index'])->name('role.index');
                Route::get('/create', [RoleController::class, 'create'])->name('role.create');
                Route::post('/', [RoleController::class, 'store'])->name('role.store');
                Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
                Route::put('/{role}', [RoleController::class, 'update'])->name('role.update');
                Route::delete('/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
                Route::get('/{role}', [RoleController::class, 'show'])->name('role.show');
                Route::get('/table/show', [RoleController::class, 'table'])->name('role.table');
            });

            Route::get('/addPermissionsToRole/{role}', [RoleController::class, 'assignPermissionsPage'])->name('role.addPermissionsToRole');
            Route::post('/role/{role}/permissions', [RoleController::class, 'givePermissions'])->name('role.permissions');

            /****************************** Admins **********************************/
            Route::group(['prefix' => 'admin'], function () {
                Route::get('/', [AdminController::class, 'index'])->name('admin.index');
                Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
                Route::post('/', [AdminController::class, 'store'])->name('admin.store');
                Route::get('/{admin}', [AdminController::class, 'show'])->name('admin.show');
                Route::get('/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');
                Route::put('/{admin}', [AdminController::class, 'update'])->name('admin.update');
                Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');
                Route::get('/table/show', [AdminController::class, 'table'])->name('admin.table');
            });

            /****************************** Users **********************************/
            Route::group(['prefix' => 'user'], function () {
                Route::get('/', 'UsersController@index')->name('site.home')->middleware('permission:Users List');
                Route::get('/create', 'UsersController@create')->name('user.create')->middleware('permission:Users Create');
                Route::post('/', 'UsersController@store')->name('user.store')->middleware('permission:Users Create');
                Route::get('/{user}', 'UsersController@show')->name('user.show')->middleware('permission:Users Show');
                Route::get('/{user}/edit', 'UsersController@edit')->name('user.edit')->middleware('permission:Users Edit');
                Route::put('/{user}', 'UsersController@update')->name('user.update')->middleware('permission:Users Edit');
                Route::delete('/{user}', 'UsersController@destroy')->name('user.destroy')->middleware('permission:Users Delete');
            });

            /****************************** Clients **********************************/
            Route::group(['prefix' => 'client'], function () {
                Route::get('/', [ClientController::class, 'index'])->name('client.index');
                Route::get('/create', [ClientController::class, 'create'])->name('client.create');
                Route::post('/', [ClientController::class, 'store'])->name('client.store');
                Route::post('/ban', [ClientController::class, 'ban'])->name('client.ban');
                Route::get('/{client}', [ClientController::class, 'show'])->name('client.show');
                Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('client.edit');
                Route::put('/{client}', [ClientController::class, 'update'])->name('client.update');
                // Route::delete('/{client}', [ClientController::class, 'destroy'])->name('client.destroy');
                Route::delete('/{user}', [ClientController::class, 'destroy'])->name('client.destroy');

                Route::get('/table/show', [ClientController::class, 'table'])->name('client.table');
                // Route::get('/{client}/create', [ClientController::class, 'createpoints'])->name('client.create.points');
                // Route::post('/{client}/store-points', [ClientController::class, 'storePoints'])->name('client.store.points');
                Route::post('/admin/client/toggle-active-status', [ClientController::class, 'toggleActiveStatus'])->name('client.toggleActiveStatus');
                // Route::post('/change-active/{client}', [ClientController::class, 'changeActive'])->name('client.changeActive');
                // Route::post('/change-verify/{client}', [ClientController::class, 'changeVerify'])->name('client.changeVerify');
                // Route::get('/get-regions/{city}', [ClientController::class, 'getRegions'])->name('get-regions');
            });

            /****************************** Group **********************************/
            Route::group(['prefix' => 'group'], function () {
                Route::get('/', [GroupController::class, 'index'])->name('group.index');
                Route::get('/create', [GroupController::class, 'create'])->name('group.create');
                Route::post('/', [GroupController::class, 'store'])->name('group.store');
                Route::get('/{group}', [GroupController::class, 'show'])->name('group.show');
                Route::get('/{group}/edit', [GroupController::class, 'edit'])->name('group.edit');
                Route::put('/{group}', [GroupController::class, 'update'])->name('group.update');
                Route::delete('/{group}', [GroupController::class, 'destroy'])->name('group.destroy');
                Route::get('/reorder/{group}/fields', [GroupController::class, 'reorderFields'])->name('group.reorder.fields');
                Route::post('/reorder/group/fields/save', [GroupController::class, 'saveReorderFields'])->name('group.reorder.fields.save');
                Route::get('/reorder/group', [GroupController::class, 'reorder'])->name('group.reorder');
                Route::post('/reorder/save', [GroupController::class, 'saveReorder'])->name('group.reorder.save');
                Route::get('/table/show', [GroupController::class, 'table'])->name('group.table');
            });
            /****************************** Atomic Level **********************************/
            Route::group(['prefix' => 'level'], function () {
                Route::get('/', [LevelController::class, 'index'])->name('level.index');
                Route::get('/create', [LevelController::class, 'create'])->name('level.create');
                Route::post('/', [LevelController::class, 'store'])->name('level.store');
                Route::get('/{level}', [LevelController::class, 'show'])->name('level.show');
                Route::get('/{level}/edit', [LevelController::class, 'edit'])->name('level.edit');
                Route::put('/{level}', [LevelController::class, 'update'])->name('level.update');
                Route::delete('/{level}', [LevelController::class, 'destroy'])->name('level.destroy');
                Route::get('/reorder/level', [LevelController::class, 'reorder'])->name('level.reorder');
                Route::post('/reorder/save', [LevelController::class, 'saveReorder'])->name('level.reorder.save');
                Route::get('/table/show', [LevelController::class, 'table'])->name('level.table');
            });

            /****************************** category colid **********************************/
            Route::group(['prefix' => 'categorycolid'], function () {
                Route::get('/', [CategorycolidController::class, 'index'])->name('categorycolid.index');
                Route::get('/create', [CategorycolidController::class, 'create'])->name('categorycolid.create');
                Route::post('/', [CategorycolidController::class, 'store'])->name('categorycolid.store');
                Route::get('/{categorycolid}', [CategorycolidController::class, 'show'])->name('categorycolid.show');
                Route::get('/{categorycolid}/edit', [CategorycolidController::class, 'edit'])->name('categorycolid.edit');
                Route::put('/{categorycolid}', [CategorycolidController::class, 'update'])->name('categorycolid.update');
                Route::delete('/{categorycolid}', [CategorycolidController::class, 'destroy'])->name('categorycolid.destroy');
                Route::get('/reorder/categorycolid', [CategorycolidController::class, 'reorder'])->name('categorycolid.reorder');
                Route::post('/reorder/save', [CategorycolidController::class, 'saveReorder'])->name('categorycolid.reorder.save');
                Route::get('/table/show', [CategorycolidController::class, 'table'])->name('categorycolid.table');
            });

            /****************************** blog **********************************/
            Route::group(['prefix' => 'blog'], function () {
                Route::get('/', [BlogController::class, 'index'])->name('blog.index');
                Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
                Route::post('/', [BlogController::class, 'store'])->name('blog.store');
                Route::get('/{blog}', [BlogController::class, 'show'])->name('blog.show');
                Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
                Route::put('/{blog}', [BlogController::class, 'update'])->name('blog.update');
                Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');
                Route::get('/reorder/blog', [BlogController::class, 'reorder'])->name('blog.reorder');
                Route::post('/reorder/save', [BlogController::class, 'saveReorder'])->name('blog.reorder.save');
                Route::get('/table/show', [BlogController::class, 'table'])->name('blog.table');
            });

            /****************************** test **********************************/
            Route::group(['prefix' => 'test'], function () {
                Route::get('/', [TestController::class, 'index'])->name('test.index');
                Route::get('/create', [TestController::class, 'create'])->name('test.create');
                Route::post('/', [TestController::class, 'store'])->name('test.store');
                Route::get('/{test}', [TestController::class, 'show'])->name('test.show');
                Route::get('/{test}/edit', [TestController::class, 'edit'])->name('test.edit');
                Route::put('/{test}', [TestController::class, 'update'])->name('test.update');
                Route::delete('/{test}', [TestController::class, 'destroy'])->name('test.destroy');
                Route::get('/reorder/test', [TestController::class, 'reorder'])->name('test.reorder');
                Route::post('/reorder/save', [TestController::class, 'saveReorder'])->name('test.reorder.save');
                Route::get('/table/show', [TestController::class, 'table'])->name('test.table');
                Route::get('/{test}/create', [TestController::class, 'createQuizzes'])->name('test.create.quizzes');
                Route::post('/{test}/store-quizzes', [TestController::class, 'storeQuizzes'])->name('test.store.quizzes');
                Route::get('/{test}/edit-quizzes', [TestController::class, 'editQuizzes'])->name('quizzes.edit');
                Route::put('/{quizze}/update-quizzes', [TestController::class, 'updateQuizzes'])->name('test.update.quizzes');
                Route::get('/{test}/test-answers', [TestController::class, 'showAnswers'])->name('test.answers');
                Route::delete('/{quizze}/quizzes-destroy', [TestController::class, 'destroyQuizzes'])->name('quizzes.destroy');
                Route::post('/admin/test/toggle-active-status', [TestController::class, 'toggleActiveStatus'])->name('test.toggleActiveStatus');

                // Route::post('/admin/client/toggle-active-status', [ClientController::class, 'toggleActiveStatus'])->name('client.toggleActiveStatus');
            });

            /****************************** story **********************************/
            Route::group(['prefix' => 'story'], function () {
                Route::get('/', [StoryController::class, 'index'])->name('story.index');
                Route::get('/create', [StoryController::class, 'create'])->name('story.create');
                Route::post('/', [StoryController::class, 'store'])->name('story.store');
                Route::get('/{story}', [StoryController::class, 'show'])->name('story.show');
                Route::get('/{story}/edit', [StoryController::class, 'edit'])->name('story.edit');
                Route::put('/{story}', [StoryController::class, 'update'])->name('story.update');
                Route::delete('/{story}', [StoryController::class, 'destroy'])->name('story.destroy');
                Route::get('/reorder/story', [StoryController::class, 'reorder'])->name('story.reorder');
                Route::post('/reorder/save', [StoryController::class, 'saveReorder'])->name('story.reorder.save');
                Route::get('/table/show', [StoryController::class, 'table'])->name('story.table');
            });

            /****************************** contentManagement  **********************************/
            Route::group(['prefix' => 'contentManagement'], function () {
                Route::get('/', [ContentManagementController::class, 'index'])->name('contentManagement.index');
                Route::get('/create', [ContentManagementController::class, 'create'])->name('contentManagement.create');
                Route::post('/', [ContentManagementController::class, 'store'])->name('contentManagement.store');
                Route::get('/{contentManagement}', [ContentManagementController::class, 'show'])->name('contentManagement.show');
                Route::get('/{contentManagement}/edit', [ContentManagementController::class, 'edit'])->name('contentManagement.edit');
                Route::put('/{contentManagement}', [ContentManagementController::class, 'update'])->name('contentManagement.update');
                Route::delete('/{contentManagement}', [ContentManagementController::class, 'destroy'])->name('contentManagement.destroy');
                Route::get('/reorder/contentManagement', [ContentManagementController::class, 'reorder'])->name('contentManagement.reorder');
                Route::post('/reorder/save', [ContentManagementController::class, 'saveReorder'])->name('contentManagement.reorder.save');
                Route::get('/table/show', [ContentManagementController::class, 'table'])->name('contentManagement.table');
            });
            /****************************** eventsManagement  **********************************/
            Route::group(['prefix' => 'eventsManagement'], function () {
                Route::get('/', [EventsManagementController::class, 'index'])->name('eventsManagement.index');
                Route::get('/create', [EventsManagementController::class, 'create'])->name('eventsManagement.create');
                Route::post('/', [EventsManagementController::class, 'store'])->name('eventsManagement.store');
                Route::get('/{eventsManagement}', [EventsManagementController::class, 'show'])->name('eventsManagement.show');
                Route::get('/{eventsManagement}/edit', [EventsManagementController::class, 'edit'])->name('eventsManagement.edit');
                Route::put('/{eventsManagement}', [EventsManagementController::class, 'update'])->name('eventsManagement.update');
                Route::delete('/{eventsManagement}', [EventsManagementController::class, 'destroy'])->name('eventsManagement.destroy');
                Route::get('/reorder/eventsManagement', [EventsManagementController::class, 'reorder'])->name('eventsManagement.reorder');
                Route::post('/reorder/save', [EventsManagementController::class, 'saveReorder'])->name('eventsManagement.reorder.save');
                Route::get('/table/show', [EventsManagementController::class, 'table'])->name('eventsManagement.table');
            });

            /****************************** package Lessons *****************************/
            Route::group(['prefix' => 'packages'], function () {
                Route::get('/{packages}/show_package_lessons', [PackageLessonsController::class, 'index'])->name('packages.show_package_lessons');
                Route::get('/{packages}/lessons/table', [PackageLessonsController::class, 'table'])->name('packages.show_package_lessons_table');
                Route::post('/{packages}/attachToPackage', [PackageLessonsController::class, 'attachToPackage'])->name('packages.attachToPackage');
                Route::post('/{packages}/{lesson}/removeLessonFromPackage', [PackageLessonsController::class, 'removeFromPackage'])->name('packages.removeLessonFromPackage');
            });

            /****************************** packages *****************************/
            Route::group(['prefix' => 'packages'], function () {
                Route::get('/', [PackagesController::class, 'index'])->name('packages.index');
                Route::get('/create', [PackagesController::class, 'create'])->name('packages.create');
                Route::post('/', [PackagesController::class, 'store'])->name('packages.store');
                Route::get('/{packages}', [PackagesController::class, 'show'])->name('packages.show');
                Route::get('/{packages}/edit', [PackagesController::class, 'edit'])->name('packages.edit');
                Route::put('/{packages}', [PackagesController::class, 'update'])->name('packages.update');
                Route::delete('/{packages}', [PackagesController::class, 'destroy'])->name('packages.destroy');
                Route::get('/reorder/packages', [PackagesController::class, 'reorder'])->name('packages.reorder');
                Route::post('/reorder/save', [PackagesController::class, 'saveReorder'])->name('packages.reorder.save');
                Route::get('/table/show', [PackagesController::class, 'table'])->name('packages.table');
                Route::post('/admin/packages/toggle-active-status', [PackagesController::class, 'toggleActiveStatus'])->name('packages.toggleActiveStatus');
                Route::get('/{packages}/create/viewRegistrationPackages', [PackagesController::class, 'viewRegistrationPackages'])->name('packages.create.viewRegistrationPackages');
            });

            /****************************** challenges إدارة المحتوى**********************************/
            Route::group(['prefix' => 'challenges'], function () {
                Route::get('/', [ChallengesController::class, 'index'])->name('challenges.index');
                Route::get('/create', [ChallengesController::class, 'create'])->name('challenges.create');
                Route::post('/', [ChallengesController::class, 'store'])->name('challenges.store');
                Route::get('/{challenges}', [ChallengesController::class, 'show'])->name('challenges.show');
                Route::get('/{challenges}/edit', [ChallengesController::class, 'edit'])->name('challenges.edit');
                Route::put('/{challenges}', [ChallengesController::class, 'update'])->name('challenges.update');
                Route::delete('/{challenges}', [ChallengesController::class, 'destroy'])->name('challenges.destroy');
                Route::get('/reorder/challenges', [ChallengesController::class, 'reorder'])->name('challenges.reorder');
                Route::post('/reorder/save', [ChallengesController::class, 'saveReorder'])->name('challenges.reorder.save');
                Route::get('/table/show', [ChallengesController::class, 'table'])->name('challenges.table');
                Route::post('/admin/challenges/toggle-active-status', [ChallengesController::class, 'toggleActiveStatus'])->name('challenges.toggleActiveStatus');
                Route::get('/{challenges}/create/viewRegistrationChallenges', [ChallengesController::class, 'viewRegistrationChallenges'])->name('challenges.create.viewRegistrationChallenges');
            });


            /****************************** branche   **********************************/
            Route::group(['prefix' => 'branche'], function () {
                Route::get('/', [BrancheController::class, 'index'])->name('branche.index');
                Route::get('/create', [BrancheController::class, 'create'])->name('branche.create');
                Route::post('/', [BrancheController::class, 'store'])->name('branche.store');
                Route::get('/{branche}', [BrancheController::class, 'show'])->name('branche.show');
                Route::get('/{branche}/edit', [BrancheController::class, 'edit'])->name('branche.edit');
                Route::put('/{branche}', [BrancheController::class, 'update'])->name('branche.update');
                Route::delete('/{branche}', [BrancheController::class, 'destroy'])->name('branche.destroy');
                Route::get('/reorder/branche', [BrancheController::class, 'reorder'])->name('branche.reorder');
                Route::post('/reorder/save', [BrancheController::class, 'saveReorder'])->name('branche.reorder.save');
                Route::get('/table/show', [BrancheController::class, 'table'])->name('branche.table');
            });

           
            Route::group(['prefix' => 'client'], function () {
                Route::get('/', [ClientController::class, 'index'])->name('client.index');
                Route::get('/create', [ClientController::class, 'create'])->name('client.create');
                Route::post('/', [ClientController::class, 'store'])->name('client.store');
                Route::get('/{client}', [ClientController::class, 'show'])->name('client.show');
                Route::get('/client/{client}/points', [ClientController::class, 'showPoints'])->name('client.showpoints');
                Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('client.edit');
                Route::put('/{client}', [ClientController::class, 'update'])->name('client.update');
                Route::delete('/{client}', [ClientController::class, 'destroy'])->name('client.destroy');
                Route::get('/reorder/client', [ClientController::class, 'reorder'])->name('client.reorder');
                Route::post('/reorder/save', [ClientController::class, 'saveReorder'])->name('client.reorder.save');
                Route::get('/table/show', [ClientController::class, 'table'])->name('client.table');
            });

            /****************************** product  **********************************/
            Route::group(['prefix' => 'product'], function () {
                Route::get('/', [ProductController::class, 'index'])->name('product.index');
                Route::get('/create', [ProductController::class, 'create'])->name('product.create');
                Route::post('/', [ProductController::class, 'store'])->name('product.store');
                Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');
                Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
                Route::put('/{product}', [ProductController::class, 'update'])->name('product.update');
                Route::delete('/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
                Route::get('/reorder/product', [ProductController::class, 'reorder'])->name('product.reorder');
                Route::post('/reorder/save', [ProductController::class, 'saveReorder'])->name('product.reorder.save');
                Route::get('/table/show', [ProductController::class, 'table'])->name('product.table');
                Route::delete('/product/media/{id}', [ProductController::class, 'deleteMedia'])->name('product.media.delete');
            });

            /****************************** product category  اقسام المنتجات **********************************/
            Route::group(['prefix' => 'productcategory'], function () {
                Route::get('/', [ProductcategoryController::class, 'index'])->name('productcategory.index');
                Route::get('/create', [ProductcategoryController::class, 'create'])->name('productcategory.create');
                Route::post('/', [ProductcategoryController::class, 'store'])->name('productcategory.store');
                Route::get('/{productcategory}', [ProductcategoryController::class, 'show'])->name('productcategory.show');
                Route::get('/{productcategory}/edit', [ProductcategoryController::class, 'edit'])->name('productcategory.edit');
                Route::put('/{productcategory}', [ProductcategoryController::class, 'update'])->name('productcategory.update');
                Route::delete('/{productcategory}', [ProductcategoryController::class, 'destroy'])->name('productcategory.destroy');
                Route::get('/reorder/productcategory', [ProductcategoryController::class, 'reorder'])->name('productcategory.reorder');
                Route::post('/reorder/save', [ProductcategoryController::class, 'saveReorder'])->name('productcategory.reorder.save');
                Route::get('/table/show', [ProductcategoryController::class, 'table'])->name('productcategory.table');
            });


            /****************************** notification  _الاشعارات **********************************/
            Route::group(['prefix' => 'notification'], function () {
                Route::get('/', [NotificationController::class, 'index'])->name('notification.index');
                Route::get('/create', [NotificationController::class, 'create'])->name('notification.create');
                Route::post('/', [NotificationController::class, 'store'])->name('notification.store');
                Route::get('/{notification}', [NotificationController::class, 'show'])->name('notification.show');
                Route::get('/{notification}/edit', [NotificationController::class, 'edit'])->name('notification.edit');
                Route::put('/{notification}', [NotificationController::class, 'update'])->name('notification.update');
                Route::delete('/{notification}', [NotificationController::class, 'destroy'])->name('notification.destroy');
                Route::get('/reorder/notification', [NotificationController::class, 'reorder'])->name('notification.reorder');
                Route::post('/reorder/save', [NotificationController::class, 'saveReorder'])->name('notification.reorder.save');
                Route::get('/table/show', [NotificationController::class, 'table'])->name('notification.table');
            });


            /****************************** group  جروب الاكواد  **********************************/
            Route::group(['prefix' => 'group'], function () {
                Route::get('/', [GroupController::class, 'index'])->name('group.index');
                Route::get('/create', [GroupController::class, 'create'])->name('group.create');
                Route::post('/', [GroupController::class, 'store'])->name('group.store');
                Route::get('/{group}', [GroupController::class, 'show'])->name('group.show');
                Route::get('/{group}/edit', [GroupController::class, 'edit'])->name('group.edit');
                Route::put('/{group}', [GroupController::class, 'update'])->name('group.update');
                Route::delete('/{group}', [GroupController::class, 'destroy'])->name('group.destroy');
                Route::get('/reorder/group', [GroupController::class, 'reorder'])->name('group.reorder');
                Route::post('/reorder/save', [GroupController::class, 'saveReorder'])->name('group.reorder.save');
                Route::get('/table/show', [GroupController::class, 'table'])->name('group.table');
                Route::post('/store-ajax', [GroupController::class, 'storeAjax'])->name('group.storeAjax');
            });

            /****************************** paintscategory   اقسام الدهانات  **********************************/
            Route::group(['prefix' => 'paintscategory'], function () {
                Route::get('/', [PaintscategoryController::class, 'index'])->name('paintscategory.index');
                Route::get('/create', [PaintscategoryController::class, 'create'])->name('paintscategory.create');
                Route::post('/', [PaintscategoryController::class, 'store'])->name('paintscategory.store');
                Route::get('/{paintscategory}', [PaintscategoryController::class, 'show'])->name('paintscategory.show');
                Route::get('/{paintscategory}/edit', [PaintscategoryController::class, 'edit'])->name('paintscategory.edit');
                Route::put('/{paintscategory}', [PaintscategoryController::class, 'update'])->name('paintscategory.update');
                Route::delete('/{paintscategory}', [PaintscategoryController::class, 'destroy'])->name('paintscategory.destroy');
                Route::get('/reorder/paintscategory', [PaintscategoryController::class, 'reorder'])->name('paintscategory.reorder');
                Route::post('/reorder/save', [PaintscategoryController::class, 'saveReorder'])->name('paintscategory.reorder.save');
                Route::get('/table/show', [PaintscategoryController::class, 'table'])->name('paintscategory.table');
            });

            /****************************** coupon **********************************/
            Route::group(['prefix' => 'coupon'], function () {
                Route::get('/', [CouponController::class, 'index'])->name('coupon.index');
                Route::get('/create', [CouponController::class, 'create'])->name('coupon.create');
                Route::post('/', [CouponController::class, 'store'])->name('coupon.store');
                Route::get('/{coupon}', [CouponController::class, 'show'])->name('coupon.show');
                Route::post('/{coupon}/toggle-status', [CouponController::class, 'toggleStatus'])->name('toggleStatus');
                Route::get('/{coupon}/edit', [CouponController::class, 'edit'])->name('coupon.edit');
                Route::put('/{coupon}', [CouponController::class, 'update'])->name('coupon.update');
                Route::delete('/{coupon}', [CouponController::class, 'destroy'])->name('coupon.destroy');
                Route::get('/reorder/coupon', [CouponController::class, 'reorder'])->name('coupon.reorder');
                Route::post('/reorder/save', [CouponController::class, 'saveReorder'])->name('coupon.reorder.save');
                Route::get('/table/show', [CouponController::class, 'table'])->name('coupon.table');
                Route::post('/change-active/{id}', [CouponController::class, 'changeStatus'])->name('coupon.changeStatus');
            });


            /****************************** Transfers **********************************/
            Route::group(['prefix' => 'transfer'], function () {
                Route::get('/', [TransferController::class, 'index'])->name('transfer.index');
                Route::get('/{transfer}', [TransferController::class, 'show'])->name('transfer.show');
                Route::delete('/{transfer}', [TransferController::class, 'destroy'])->name('transfer.destroy');
                Route::get('/table/show', [TransferController::class, 'table'])->name('transfer.table');
            });



               /****************************** couponPurchaseTransactions **********************************/
            // Route::group(['prefix' => 'couponPurchaseTransactions'], function () {
            //     Route::get('/', [CouponPurchaseTransactionsController::class, 'index'])->name('couponPurchaseTransactions.index');
            //     Route::get('/{couponPurchaseTransactions}', [CouponPurchaseTransactionsController::class, 'show'])->name('couponPurchaseTransactions.show');
            //     Route::delete('/{couponPurchaseTransactions}', [CouponPurchaseTransactionsController::class, 'destroy'])->name('couponPurchaseTransactions.destroy');
            //     Route::get('/table/show', [CouponPurchaseTransactionsController::class, 'table'])->name('couponPurchaseTransactions.table');
            // });


            /****************************** vouchers page *********************************/
            Route::group(['prefix' => 'voucherspage'], function () {
                Route::get('/', [VoucherspageController::class, 'index'])->name('voucherspage.index');
                Route::get('/create', [VoucherspageController::class, 'create'])->name('voucherspage.create');
                Route::post('/', [VoucherspageController::class, 'store'])->name('voucherspage.store');
                Route::get('/{voucherspage}', [VoucherspageController::class, 'show'])->name('voucherspage.show');
                Route::get('/{voucherspage}/edit', [VoucherspageController::class, 'edit'])->name('voucherspage.edit');
                Route::put('/{voucherspage}', [VoucherspageController::class, 'update'])->name('voucherspage.update');
                Route::delete('/{voucherspage}', [VoucherspageController::class, 'destroy'])->name('voucherspage.destroy');
                Route::get('/reorder/voucherspage', [VoucherspageController::class, 'reorder'])->name('voucherspage.reorder');
                Route::post('/reorder/save', [VoucherspageController::class, 'saveReorder'])->name('voucherspage.reorder.save');
                Route::get('/table/show', [VoucherspageController::class, 'table'])->name('voucherspage.table');
            });




            /****************************** offer **********************************/
            Route::group(['prefix' => 'offer'], function () {
                Route::get('/', [OfferController::class, 'index'])->name('offer.index');
                Route::get('/show-voucher-code-offer', [OfferController::class, 'ShowVoucherCodeOffer'])->name('offer.show-voucher-code-offer');
                Route::get('/create', [OfferController::class, 'create'])->name('offer.create');
                Route::post('/', [OfferController::class, 'store'])->name('offer.store');
                Route::get('/{offer}', [OfferController::class, 'show'])->name('offer.show');
                Route::get('/{offer}/edit', [OfferController::class, 'edit'])->name('offer.edit');
                Route::put('/{offer}', [OfferController::class, 'update'])->name('offer.update');
                Route::delete('/{offer}', [OfferController::class, 'destroy'])->name('offer.destroy');
                Route::get('/reorder/offer', [OfferController::class, 'reorder'])->name('offer.reorder');
                Route::post('/reorder/save', [OfferController::class, 'saveReorder'])->name('offer.reorder.save');
                Route::get('/table/show', [OfferController::class, 'table'])->name('offer.table');
                Route::put('/admin/offers/{id}/update-point', [OfferController::class, 'updatePoint'])->name('update-point');
            });

            /******************************   controlExpirationDuration**********************************/
            Route::group(['prefix' => 'controlExpirationDuration'], function () {
                Route::get('/', [ControlExpirationDurationController::class, 'index'])->name('controlExpirationDuration.index');
                Route::get('/create', [ControlExpirationDurationController::class, 'create'])->name('controlExpirationDuration.create');
                Route::post('/', [ControlExpirationDurationController::class, 'store'])->name('controlExpirationDuration.store');
                Route::get('/{controlExpirationDuration}', [ControlExpirationDurationController::class, 'show'])->name('controlExpirationDuration.show');
                Route::get('/{controlExpirationDuration}/edit', [ControlExpirationDurationController::class, 'edit'])->name('controlExpirationDuration.edit');
                Route::put('/{controlExpirationDuration}', [ControlExpirationDurationController::class, 'update'])->name('controlExpirationDuration.update');
                Route::delete('/{controlExpirationDuration}', [ControlExpirationDurationController::class, 'destroy'])->name('controlExpirationDuration.destroy');
                Route::get('/reorder/controlExpirationDuration', [ControlExpirationDurationController::class, 'reorder'])->name('controlExpirationDuration.reorder');
                Route::post('/reorder/save', [ControlExpirationDurationController::class, 'saveReorder'])->name('controlExpirationDuration.reorder.save');
                Route::get('/table/show', [ControlExpirationDurationController::class, 'table'])->name('controlExpirationDuration.table');
            });


            /****************************** shop  **********************************/
            Route::group(['prefix' => 'shop'], function () {
                Route::get('/', [BlogController::class, 'index'])->name('shop.index');
                Route::get('/create', [BlogController::class, 'create'])->name('shop.create');
                Route::post('/', [BlogController::class, 'store'])->name('shop.store');
                Route::get('/{shop}', [BlogController::class, 'show'])->name('shop.show');
                Route::get('/{shop}/edit', [BlogController::class, 'edit'])->name('shop.edit');
                Route::put('/{shop}', [BlogController::class, 'update'])->name('shop.update');
                Route::delete('/{shop}', [BlogController::class, 'destroy'])->name('shop.destroy');
                Route::get('/reorder/shop', [BlogController::class, 'reorder'])->name('shop.reorder');
                Route::post('/reorder/save', [BlogController::class, 'saveReorder'])->name('shop.reorder.save');
                Route::get('/table/show', [BlogController::class, 'table'])->name('shop.table');
            });


            /****************************** banner  **********************************/
            Route::group(['prefix' => 'banner'], function () {
                Route::get('/', [BlogController::class, 'index'])->name('banner.index');
                Route::get('/create', [BlogController::class, 'create'])->name('banner.create');
                Route::post('/', [BlogController::class, 'store'])->name('banner.store');
                Route::get('/{banner}', [BlogController::class, 'show'])->name('banner.show');
                Route::get('/{banner}/edit', [BlogController::class, 'edit'])->name('banner.edit');
                Route::put('/{banner}', [BlogController::class, 'update'])->name('banner.update');
                Route::delete('/{banner}', [BlogController::class, 'destroy'])->name('banner.destroy');
                Route::get('/reorder/banner', [BlogController::class, 'reorder'])->name('banner.reorder');
                Route::post('/reorder/save', [BlogController::class, 'saveReorder'])->name('banner.reorder.save');
                Route::get('/table/show', [BlogController::class, 'table'])->name('banner.table');
            });



            /****************************** testimonial **********************************/
            Route::group(['prefix' => 'testimonial'], function () {
                Route::get('/', [TestimonialController::class, 'index'])->name('testimonial.index');
                Route::get('/create', [TestimonialController::class, 'create'])->name('testimonial.create');
                Route::post('/', [TestimonialController::class, 'store'])->name('testimonial.store');
                Route::get('/{testimonial}', [TestimonialController::class, 'show'])->name('testimonial.show');
                Route::get('/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
                Route::put('/{testimonial}', [TestimonialController::class, 'update'])->name('testimonial.update');
                Route::delete('/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
                Route::get('/reorder/testimonial', [TestimonialController::class, 'reorder'])->name('testimonial.reorder');
                Route::post('/reorder/save', [TestimonialController::class, 'saveReorder'])->name('testimonial.reorder.save');
                Route::get('/table/show', [TestimonialController::class, 'table'])->name('testimonial.table');
            });


            /****************************** privacypolicy **********************************/
            Route::group(['prefix' => 'privacypolicy'], function () {
                Route::get('/', [PrivacypolicyController::class, 'index'])->name('privacypolicy.index');
                Route::get('/create', [PrivacypolicyController::class, 'create'])->name('privacypolicy.create');
                Route::post('/', [PrivacypolicyController::class, 'store'])->name('privacypolicy.store');
                Route::get('/{privacypolicy}', [PrivacypolicyController::class, 'show'])->name('privacypolicy.show');
                Route::get('/{privacypolicy}/edit', [PrivacypolicyController::class, 'edit'])->name('privacypolicy.edit');
                Route::put('/{privacypolicy}', [PrivacypolicyController::class, 'update'])->name('privacypolicy.update');
                Route::delete('/{privacypolicy}', [PrivacypolicyController::class, 'destroy'])->name('privacypolicy.destroy');
                Route::get('/reorder/privacypolicy', [PrivacypolicyController::class, 'reorder'])->name('privacypolicy.reorder');
                Route::post('/reorder/save', [PrivacypolicyController::class, 'saveReorder'])->name('privacypolicy.reorder.save');
                Route::get('/table/show', [PrivacypolicyController::class, 'table'])->name('privacypolicy.table');
            });

            /******************************termsandcondition **********************************/
            Route::group(['prefix' => 'termsandcondition'], function () {
                Route::get('/', [TermsandconditionController::class, 'index'])->name('termsandcondition.index');
                Route::get('/create', [TermsandconditionController::class, 'create'])->name('termsandcondition.create');
                Route::post('/', [TermsandconditionController::class, 'store'])->name('termsandcondition.store');
                Route::get('/{termsandcondition}', [TermsandconditionController::class, 'show'])->name('termsandcondition.show');
                Route::get('/{termsandcondition}/edit', [TermsandconditionController::class, 'edit'])->name('termsandcondition.edit');
                Route::put('/{termsandcondition}', [TermsandconditionController::class, 'update'])->name('termsandcondition.update');
                Route::delete('/{termsandcondition}', [TermsandconditionController::class, 'destroy'])->name('termsandcondition.destroy');
                Route::get('/reorder/termsandcondition', [TermsandconditionController::class, 'reorder'])->name('termsandcondition.reorder');
                Route::post('/reorder/save', [TermsandconditionController::class, 'saveReorder'])->name('termsandcondition.reorder.save');
                Route::get('/table/show', [TermsandconditionController::class, 'table'])->name('termsandcondition.table');
            });
            /****************************** card **********************************/
            Route::group(['prefix' => 'card'], function () {
                Route::get('/', [CardController::class, 'index'])->name('card.index');
                Route::get('/create', [CardController::class, 'create'])->name('card.create');
                Route::post('/', [CardController::class, 'store'])->name('card.store');
                Route::get('/{card}', [CardController::class, 'show'])->name('card.show');
                Route::get('/{card}/edit', [CardController::class, 'edit'])->name('card.edit');
                Route::put('/{card}', [CardController::class, 'update'])->name('card.update');
                Route::delete('/{card}', [CardController::class, 'destroy'])->name('card.destroy');
                Route::get('/reorder/card', [CardController::class, 'reorder'])->name('card.reorder');
                Route::post('/reorder/save', [CardController::class, 'saveReorder'])->name('card.reorder.save');
                Route::get('/table/show', [CardController::class, 'table'])->name('card.table');
                Route::get('/get-categorycolid/{categoryId}', [CardController::class, 'getCategoryColid'])->name('get.categorycolid');
            });

            /****************************** videos **********************************/
            Route::group(['prefix' => 'videos'], function () {
                Route::get('/', [VideosController::class, 'index'])->name('videos.index');
                Route::get('/create', [VideosController::class, 'create'])->name('videos.create');
                Route::post('/', [VideosController::class, 'store'])->name('videos.store');

                Route::post('/presign', function (\Illuminate\Http\Request $request) {
                    $fileName = time() . '-' . $request->file_name;
                    $zone = "abdhamed"; 
                    $accessKey = "1a227c9e-3a73-42b7-a90af11b6dfd-a4c7-48a2"; 
                    $url = "https://storage.bunnycdn.com/$zone/videos/$fileName";
                    return response()->json([
                        "uploadUrl" => $url,
                        "headers" => [
                            "AccessKey" => $accessKey,
                            "Content-Type" => $request->mime_type,
                        ],
                        "path" => "videos/$fileName"
                    ]);
                });

             
                Route::get('/{videos}', [VideosController::class, 'show'])->name('videos.show');
                Route::get('/{videos}/edit', [VideosController::class, 'edit'])->name('videos.edit');
                Route::put('/{videos}', [VideosController::class, 'update'])->name('videos.update');
                Route::delete('/{videos}', [VideosController::class, 'destroy'])->name('videos.destroy');
                Route::get('/reorder/videos', [VideosController::class, 'reorder'])->name('videos.reorder');
                Route::post('/reorder/save', [VideosController::class, 'saveReorder'])->name('videos.reorder.save');
                Route::get('/table/show', [VideosController::class, 'table'])->name('videos.table');
                Route::post('/admin/Videos/toggle-active-status', [VideosController::class, 'toggleActiveStatus'])->name('videos.toggleActiveStatus');
            });


            /****************************** about **********************************/
            Route::group(['prefix' => 'about'], function () {
                Route::get('/', [AboutController::class, 'index'])->name('about.index');
                Route::get('/create', [AboutController::class, 'create'])->name('about.create');
                Route::post('/', [AboutController::class, 'store'])->name('about.store');
                Route::get('/{about}', [AboutController::class, 'show'])->name('about.show');
                Route::get('/{about}/edit', [AboutController::class, 'edit'])->name('about.edit');
                Route::put('/{about}', [AboutController::class, 'update'])->name('about.update');
                Route::delete('/{about}', [AboutController::class, 'destroy'])->name('about.destroy');
                Route::get('/reorder/about', [AboutController::class, 'reorder'])->name('about.reorder');
                Route::post('/reorder/save', [AboutController::class, 'saveReorder'])->name('about.reorder.save');
                Route::get('/table/show', [AboutController::class, 'table'])->name('about.table');
            });

            /****************************** contact **********************************/
            Route::group(['prefix' => 'contact'], function () {
                Route::get('/', [ContactController::class, 'index'])->name('contact.index');
                Route::get('/create', [ContactController::class, 'create'])->name('contact.create');
                Route::post('/', [ContactController::class, 'store'])->name('contact.store');
                Route::get('/{contact}', [ContactController::class, 'show'])->name('contact.show');
                Route::get('/{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit');
                Route::put('/{contact}', [ContactController::class, 'update'])->name('contact.update');
                Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
                Route::get('/reorder/contact', [ContactController::class, 'reorder'])->name('contact.reorder');
                Route::post('/reorder/save', [ContactController::class, 'saveReorder'])->name('contact.reorder.save');
                Route::get('/table/show', [ContactController::class, 'table'])->name('contact.table');
            });

            /****************************** Message **********************************/
            Route::group(['prefix' => 'message'], function () {
                Route::get('/', [MessageController::class, 'index'])->name('message.index');
                Route::get('/{message}', [MessageController::class, 'show'])->name('message.show');
                Route::delete('/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
                Route::get('/table/show', [MessageController::class, 'table'])->name('message.table');
            });


            /****************************** Country **********************************/
            Route::group(['prefix' => 'country'], function () {
                Route::get('/', [CountryController::class, 'index'])->name('country.index');
                Route::get('/create', [CountryController::class, 'create'])->name('country.create');
                Route::post('/', [CountryController::class, 'store'])->name('country.store');
                Route::get('/{country}', [CountryController::class, 'show'])->name('country.show');
                Route::get('/{country}/edit', [CountryController::class, 'edit'])->name('country.edit');
                Route::put('/{country}', [CountryController::class, 'update'])->name('country.update');
                Route::delete('/{country}', [CountryController::class, 'destroy'])->name('country.destroy');
                Route::get('/reorder/country', [CountryController::class, 'reorder'])->name('country.reorder');
                Route::post('/reorder/save', [CountryController::class, 'saveReorder'])->name('country.reorder.save');
                Route::get('/table/show', [CountryController::class, 'table'])->name('country.table');
            });
            /****************************** City **********************************/
            Route::group(['prefix' => 'city'], function () {
                Route::get('/', [CityController::class, 'index'])->name('city.index');
                Route::get('/getCityByCountry/{country}', [CityController::class, 'getCityByCountry']);
                Route::get('/getRegionsByCity/{city}', [CityController::class, 'getRegionsByCity']);
                Route::get('/create', [CityController::class, 'create'])->name('city.create');
                Route::post('/', [CityController::class, 'store'])->name('city.store');
                Route::get('/{city}', [CityController::class, 'show'])->name('city.show');
                Route::get('/{city}/edit', [CityController::class, 'edit'])->name('city.edit');
                Route::put('/{city}', [CityController::class, 'update'])->name('city.update');
                Route::delete('/{city}', [CityController::class, 'destroy'])->name('city.destroy');
                Route::get('/reorder/city', [CityController::class, 'reorder'])->name('city.reorder');
                Route::post('/reorder/save', [CityController::class, 'saveReorder'])->name('city.reorder.save');
                Route::get('/table/show', [CityController::class, 'table'])->name('city.table');



            });

            /****************************** Region **********************************/
            Route::group(['prefix' => 'region'], function () {
                Route::get('/', [RegionController::class, 'index'])->name('region.index');
                Route::get('/create', [RegionController::class, 'create'])->name('region.create');
                Route::post('/', [RegionController::class, 'store'])->name('region.store');
                Route::get('/{region}', [RegionController::class, 'show'])->name('region.show');
                Route::get('/{region}/edit', [RegionController::class, 'edit'])->name('region.edit');
                Route::put('/{region}', [RegionController::class, 'update'])->name('region.update');
                Route::delete('/{region}', [RegionController::class, 'destroy'])->name('region.destroy');
                Route::get('/reorder/region', [RegionController::class, 'reorder'])->name('region.reorder');
                Route::post('/reorder/save', [RegionController::class, 'saveReorder'])->name('region.reorder.save');
                Route::get('/table/show', [RegionController::class, 'table'])->name('region.table');

            });





            /****************************** categorygallery **********************************/
            Route::group(['prefix' => 'categorygallery'], function () {
                Route::get('/', [categorygalleryController::class, 'index'])->name('categorygallery.index');
                Route::get('/create', [categorygalleryController::class, 'create'])->name('categorygallery.create');
                Route::post('/', [categorygalleryController::class, 'store'])->name('categorygallery.store');
                Route::get('/{categorygallery}', [categorygalleryController::class, 'show'])->name('categorygallery.show');
                Route::get('/{categorygallery}/edit', [categorygalleryController::class, 'edit'])->name('categorygallery.edit');
                Route::put('/{categorygallery}', [categorygalleryController::class, 'update'])->name('categorygallery.update');
                Route::delete('/{categorygallery}', [categorygalleryController::class, 'destroy'])->name('categorygallery.destroy');
                Route::get('/reorder/categorygallery', [categorygalleryController::class, 'reorder'])->name('categorygallery.reorder');
                Route::post('/reorder/save', [categorygalleryController::class, 'saveReorder'])->name('categorygallery.reorder.save');
                Route::get('/table/show', [CategorygalleryController::class, 'table'])->name('categorygallery.table');
            });

            /****************************** gallery **********************************/
            Route::group(['prefix' => 'gallery'], function () {
                Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
                Route::get('/create', [galleryController::class, 'create'])->name('gallery.create');
                Route::post('/', [galleryController::class, 'store'])->name('gallery.store');
                Route::get('/{gallery}', [galleryController::class, 'show'])->name('gallery.show');
                Route::get('/{gallery}/edit', [galleryController::class, 'edit'])->name('gallery.edit');
                Route::put('/{gallery}', [galleryController::class, 'update'])->name('gallery.update');
                Route::delete('/{gallery}', [galleryController::class, 'destroy'])->name('gallery.destroy');
                Route::get('/reorder/gallery', [galleryController::class, 'reorder'])->name('gallery.reorder');
                Route::post('/reorder/save', [galleryController::class, 'saveReorder'])->name('gallery.reorder.save');
                Route::get('/table/show', [galleryController::class, 'table'])->name('gallery.table');
            });






            Route::prefix('regions')->name('regions.')->group(function () {
                Route::get('/', [RegionController::class, 'index'])->name('index');
                Route::get('/create', [RegionController::class, 'create'])->name('create');
                Route::put('/update/{region}', [RegionController::class, 'update'])->name('update');
                Route::post('/store', [RegionController::class, 'store'])->name('store');
                Route::get('/delete/{region}', [RegionController::class, 'destroy'])->name('destroy');
                Route::get('/{region}/edit', [RegionController::class, 'edit'])->name('edit');
            });


            /****************************** Rate **********************************/
            Route::group(['prefix' => 'rate'], function () {
                Route::get('/', [RateController::class, 'index'])->name('rate.index');
                Route::get('/create', [RateController::class, 'create'])->name('rate.create');
                Route::post('/', [RateController::class, 'store'])->name('rate.store');
                Route::get('/{rate}', [RateController::class, 'show'])->name('rate.show');
                Route::get('/{rate}/edit', [RateController::class, 'edit'])->name('rate.edit');
                Route::put('/{rate}', [RateController::class, 'update'])->name('rate.update');
                Route::delete('/{rate}', [RateController::class, 'destroy'])->name('rate.destroy');
                Route::get('/table/show', [RateController::class, 'table'])->name('rate.table');
            });





            Route::group(['prefix' => 'banner'], function () {
                Route::get('/', [BannerController::class, 'index'])->name('banner.index');
                Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
                Route::post('/', [BannerController::class, 'store'])->name('banner.store');
                Route::get('/{banner}', [BannerController::class, 'show'])->name('banner.show');
                Route::get('/{banner}/edit', [BannerController::class, 'edit'])->name('banner.edit');
                Route::put('/{banner}', [BannerController::class, 'update'])->name('banner.update');
                Route::delete('/{banner}', [BannerController::class, 'destroy'])->name('banner.destroy');
                Route::get('/table/show', [BannerController::class, 'table'])->name('banner.table');
                Route::post('/image/{image}', [BannerController::class, 'deleteImage'])->name('banner.image.delete');
            });







            Route::resource('faqs', 'FaqController')->except('show');
            Route::get('faqs/show', 'FaqController@show')->name('faqs.show');

            Route::get('all-settings', [SettingController::class, 'all_settings'])->name('all_settings.index');

            /************************************ setting ************************************************/

            Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {

                Route::get('setting-about-us', [SettingController::class, 'AboutShowSetting'])->name('aboutUs.index');
                Route::get('setting-about-us/edit', [SettingController::class, 'aboutUsSettingEdit'])->name('aboutUs.edit');
                Route::put('setting-about-us/update', [SettingController::class, 'aboutUsSettingUpdate'])->name('aboutUs.update');

                Route::get('pageSettingsControls', [SettingController::class, 'pageSettingsControls'])->name('pageSettingsControls.index');
                Route::get('pageSettingsControls/edit', [SettingController::class, 'pageSettingsControlsEdit'])->name('pageSettingsControls.edit');
                Route::put('pageSettingsControls/update', [SettingController::class, 'pageSettingsControlsUpdate'])->name('pageSettingsControls.update');

                Route::get('setting-trip_title_ad_image_index', [SettingController::class, 'trip_title_ad_image_index'])->name('trip_title_ad_image.index');
                Route::get('setting-trip_title_ad_image/edit', [SettingController::class, 'trip_title_ad_image_getEdit'])->name('trip_title_ad_image.edit');
                Route::put('setting-trip_title_ad_image/update', [SettingController::class, 'trip_title_ad_image_getUpdate'])->name('trip_title_ad_image.update');

                // ..


                //             Route::get('setting-news', [SettingController::class, 'newsSetting'])->name('news.index');
                //     Route::get('setting-news/edit', [SettingController::class, 'newsSettingEdit'])->name('news.edit');
                //     Route::put('setting-news/update', [SettingController::class, 'newsSettingUpdate'])->name('news.update');


                //     Route::get('setting-home-couronne', [SettingController::class, 'homecouronneSetting'])->name('homecouronnesetting.index');
                //     Route::get('setting-home-couronne/edit', [SettingController::class, 'homecouronneSettingEdit'])->name('homecouronnesetting.edit');
                //     Route::put('setting-home-couronne/update', [SettingController::class, 'homecouronneSettingUpdate'])->name('homecouronnesetting.update');


                //  Route::get('setting-ourcardssetting', [SettingController::class, 'ourcardssetting'])->name('ourcardssetting.index');
                //     Route::get('setting-ourcardssetting/edit', [SettingController::class, 'ourcardssettingEdit'])->name('ourcardssetting.edit');
                //     Route::put('setting-ourcardssetting/update', [SettingController::class, 'ourcardssettingUpdate'])->name('ourcardssetting.update');


                //     Route::get('setting-bottom-banner', [SettingController::class, 'bottomBannerSetting'])->name('bottomBanner.index');
                //     Route::get('setting-bottom-banner/edit', [SettingController::class, 'bottomBannerSettingEdit'])->name('bottomBanner.edit');
                //     Route::put('setting-bottom-banner/update', [SettingController::class, 'bottomBannerSettingUpdate'])->name('bottomBanner.update');


                //     Route::get('setting-main-setting', [SettingController::class, 'mainSetting'])->name('main.index');
                //     Route::get('setting-main-setting/edit', [SettingController::class, 'mainSettingEdit'])->name('main.edit');
                //     Route::put('setting-main-setting/update', [SettingController::class, 'mainSettingUpdate'])->name('main.update');


                //     Route::get('setting-app-setting', [SettingController::class, 'appSetting'])->name('app.index');
                //     Route::get('setting-app-setting/edit', [SettingController::class, 'appSettingEdit'])->name('app.edit');
                //     Route::put('setting-app-setting/update', [SettingController::class, 'appSettingUpdate'])->name('app.update');
                //     Route::post('setting-app-setting/change-status', [SettingController::class, 'appSettingSplashChangeStatus'])->name('app.splashChangeStatus');


                //     Route::get('privacy-policy-setting', [SettingController::class, 'privacyPolicySetting'])->name('privacy_policy.index');
                //     Route::get('privacy-policy-setting/edit', [SettingController::class, 'privacyPolicyEdit'])->name('privacy_policy.edit');
                //     Route::put('privacy-policy-setting/update', [SettingController::class, 'privacyPolicyUpdate'])->name('privacy_policy.update');


                //     Route::get('use-terms-setting', [SettingController::class, 'useTermsSetting'])->name('use_terms.index');
                //     Route::get('use-terms-setting/edit', [SettingController::class, 'useTermsEdit'])->name('use_terms.edit');
                //     Route::put('use-terms-setting/update', [SettingController::class, 'useTermsUpdate'])->name('use_terms.update');



                //      Route::get('setting-aboutUs_ClientsSay', [SettingController::class, 'aboutUs_ClientsSayShowSetting'])->name('aboutUs_ClientsSay.index');
                //     Route::get('setting-aboutUs_ClientsSay/edit', [SettingController::class, 'aboutUs_ClientsSayEdit'])->name('aboutUs_ClientsSay.edit');
                //     Route::put('setting-aboutUs_ClientsSay/update', [SettingController::class, 'aboutUs_ClientsSayUpdate'])->name('aboutUs_ClientsSay.update');


                //     Route::get('setting-aboutUs_Popular_Destinations', [SettingController::class, 'aboutUs_Popular_DestinationsShowSetting'])->name('aboutUs_Popular_Destinations.index');
                //     Route::get('setting-aboutUs_Popular_Destinations/edit', [SettingController::class, 'aboutUs_Popular_DestinationsEdit'])->name('aboutUs_Popular_Destinations.edit');
                //     Route::put('setting-aboutUs_Popular_Destinations/update', [SettingController::class, 'aboutUs_Popular_DestinationsUpdate'])->name('aboutUs_Popular_Destinations.update');

                //     Route::get('setting-aboutUs_Subscribeto_get', [SettingController::class, 'aboutUs_Subscribeto_getShowSetting'])->name('aboutUs_Subscribeto_get.index');
                //     Route::get('setting-aboutUs_Subscribeto_get/edit', [SettingController::class, 'aboutUs_Subscribeto_getEdit'])->name('aboutUs_Subscribeto_get.edit');
                //     Route::put('setting-aboutUs_Subscribeto_get/update', [SettingController::class, 'aboutUs_Subscribeto_getUpdate'])->name('aboutUs_Subscribeto_get.update');

                //     Route::get('setting-aboutUs_information', [SettingController::class, 'aboutUs_information'])->name('aboutUs_information.index');
                //     Route::get('setting-aboutUs_information/edit', [SettingController::class, 'aboutUs_information_getEdit'])->name('aboutUs_information.edit');
                //     Route::put('setting-aboutUs_information/update', [SettingController::class, 'aboutUs_information_getUpdate'])->name('aboutUs_information.update');

                //     Route::get('setting-setting_blog_details', [SettingController::class, 'setting_blog_details'])->name('setting_blog_details.index');
                //     Route::get('setting-setting_blog_details/edit', [SettingController::class, 'setting_blog_details_getEdit'])->name('setting_blog_details.edit');
                //     Route::put('setting-setting_blog_details/update', [SettingController::class, 'setting_blog_details_getUpdate'])->name('setting_blog_details.update');


                //     Route::get('setting-setting_index', [SettingController::class, 'setting_index'])->name('setting_index.index');
                //     Route::get('setting-setting_index/edit', [SettingController::class, 'setting_index_getEdit'])->name('setting_index.edit');
                //     Route::put('setting-setting_index/update', [SettingController::class, 'setting_index_getUpdate'])->name('setting_index.update');

                //      Route::get('setting-Why_Choose_index', [SettingController::class, 'Why_Choose_index'])->name('Why_Choose_index.index');
                //     Route::get('setting-Why_Choose_index/edit', [SettingController::class, 'Why_Choose_index_getEdit'])->name('Why_Choose_index.edit');
                //     Route::put('setting-Why_Choose_index/update', [SettingController::class, 'Why_Choose_index_getUpdate'])->name('Why_Choose_index.update');


                //     Route::get('setting-Find_best_places_index', [SettingController::class, 'Find_best_places_index'])->name('Find_best_places_index.index');
                //     Route::get('setting-Find_best_places_index/edit', [SettingController::class, 'Find_best_places_index_getEdit'])->name('Find_best_places_index.edit');
                //     Route::put('setting-Find_best_places_index/update', [SettingController::class, 'Find_best_places_index_getUpdate'])->name('Find_best_places_index.update');

                //     Route::get('setting-Your_gateway_to_amazing_index', [SettingController::class, 'Your_gateway_to_amazing_index'])->name('Your_gateway_to_amazing_index.index');
                //     Route::get('setting-Your_gateway_to_amazing_index/edit', [SettingController::class, 'Your_gateway_to_amazing_index_getEdit'])->name('Your_gateway_to_amazing_index.edit');
                //     Route::put('setting-Your_gateway_to_amazing_index/update', [SettingController::class, 'Your_gateway_to_amazing_index_getUpdate'])->name('Your_gateway_to_amazing_index.update');


                //     Route::get('setting-trip_bestseller_index', [SettingController::class, 'trip_bestseller_index'])->name('trip_bestseller.index');
                //     Route::get('setting-trip_bestseller/edit', [SettingController::class, 'trip_bestseller_getEdit'])->name('trip_bestseller.edit');
                //     Route::put('setting-trip_bestseller/update', [SettingController::class, 'trip_bestseller_getUpdate'])->name('trip_bestseller.update');




                //     Route::get('setting-setting_infomation_index', [SettingController::class, 'setting_infomation_index'])->name('setting_infomation.index');
                //     Route::get('setting-setting_infomation/edit', [SettingController::class, 'setting_infomation_getEdit'])->name('setting_infomation.edit');
                //     Route::put('setting-setting_infomation/update', [SettingController::class, 'setting_infomation_getUpdate'])->name('setting_infomation.update');
            });


            Route::get('login-to-landing-dashboard', [DashboardController::class, 'landing_cms'])->name('loginToLandingDashboard');
        });
    }
);

// Route::get('test-ftp', function () {
//     $contents = 'Test upload to BunnyCDN';
//     FacadesStorage::disk('remote')->put('temp_videos/test.txt', $contents);
// });