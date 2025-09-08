<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = User::where('is_admin', 1)->first();

        Permission::query()->delete();

        //=============================Super-admin===============================================
        $superAdmin = Role::firstOrCreate([
            'name' => 'Super admin',
        ]);
        //        dd($admin);

        $admin->assignRole($superAdmin);

        $permissions = [
            ['name' => 'roles.view_all'],
            ['name' => 'roles.create'],
            ['name' => 'roles.edit'],
            ['name' => 'roles.delete'],


            ['name' => 'admins.view_all'],
            ['name' => 'admins.view_details'],
            ['name' => 'admins.create'],
            ['name' => 'admins.edit'],
            ['name' => 'admins.delete'],

            // ['name' => 'blog_categories.view_all'],
            // ['name' => 'blog_categories.view_details'],
            // ['name' => 'blog_categories.create'],
            // ['name' => 'blog_categories.edit'],
            // ['name' => 'blog_categories.delete'],
            // ['name' => 'blog_categories.sort'],


            // ['name' => 'categories_workShop.view_all'],
            // ['name' => 'categories_workShop.view_details'],
            // ['name' => 'categories_workShop.create'],
            // ['name' => 'categories_workShop.edit'],
            // ['name' => 'categories_workShop.delete'],

            ['name' => 'level.view_all'],
            ['name' => 'level.view_details'],
            ['name' => 'level.create'],
            ['name' => 'level.edit'],
            ['name' => 'level.delete'],


            ['name' => 'blogs.view_all'],
            ['name' => 'blogs.view_details'],
            ['name' => 'blogs.create'],
            ['name' => 'blogs.edit'],
            ['name' => 'blogs.delete'],

            ['name' => 'test.view_all'],
            ['name' => 'test.view_details'],
            ['name' => 'test.create'],
            ['name' => 'test.edit'],
            ['name' => 'test.delete'],



            // ['name' => 'story.view_all'],
            // ['name' => 'story.view_details'],
            // ['name' => 'story.create'],
            // ['name' => 'story.edit'],
            // ['name' => 'story.delete'],

            // ['name' => 'contentManagement.view_all'],
            // ['name' => 'contentManagement.view_details'],
            // ['name' => 'contentManagement.create'],
            // ['name' => 'contentManagement.edit'],
            // ['name' => 'contentManagement.delete'],

            // ['name' => 'eventsManagement.view_all'],
            // ['name' => 'eventsManagement.view_details'],
            // ['name' => 'eventsManagement.create'],
            // ['name' => 'eventsManagement.edit'],
            // ['name' => 'eventsManagement.delete'],

            ['name' => 'packages.view_all'],
            ['name' => 'packages.view_details'],
            ['name' => 'packages.show_package_lessons'],
            ['name' => 'packages.create'],
            ['name' => 'packages.edit'],
            ['name' => 'packages.delete'],

            // ['name' => 'challenges.view_all'],
            // ['name' => 'challenges.view_details'],
            // ['name' => 'challenges.create'],
            // ['name' => 'challenges.edit'],
            // ['name' => 'challenges.delete'],

            // ['name' => 'userInformationRegister.view_all'],
            // ['name' => 'userInformationRegister.view_details'],
            // ['name' => 'userInformationRegister.delete'],
            // ['name' => 'userInformationRegister.create'],
            // ['name' => 'userInformationRegister.edit'],


            // ['name' => 'categorycolid.view_all'],
            // ['name' => 'categorycolid.view_details'],
            // ['name' => 'categorycolid.create'],
            // ['name' => 'categorycolid.edit'],
            // ['name' => 'categorycolid.delete'],


            // ['name' => 'blogs.sort'],
            // {{ \App\Helpers\TranslationHelper::translate('admins.view_all') }}
            // {{ \App\Helpers\TranslationHelper::translate('admins.view_details') }}
            // {{ \App\Helpers\TranslationHelper::translate('admins.create') }}
            // {{ \App\Helpers\TranslationHelper::translate('admins.edit') }}
            // {{ \App\Helpers\TranslationHelper::translate('admins.delete') }}

            // ['name' => 'branche.view_all'],
            // ['name' => 'branche.view_details'],
            // ['name' => 'branche.create'],
            // ['name' => 'branche.edit'],
            // ['name' => 'branche.delete'],

            // ['name' => 'branche.sort'],

            // ['name' => 'product.view_all'],
            // ['name' => 'product.view_details'],
            // ['name' => 'product.create'],
            // ['name' => 'product.edit'],
            // ['name' => 'product.delete'],
            // ['name' => 'product.sort'],

            // ['name' => 'productcategory.view_all'],
            // ['name' => 'productcategory.view_details'],
            // ['name' => 'productcategory.create'],
            // ['name' => 'productcategory.edit'],
            // ['name' => 'productcategory.delete'],


            //product_code كود المنتج
            // ['name' => 'productcode.view_all'],
            // ['name' => 'productcode.view_details'],
            // ['name' => 'productcode.create'],
            // ['name' => 'productcode.edit'],
            // ['name' => 'productcode.delete'],
            // ['name' => 'productcode.sort'],

            // offer العروض
            // ['name' => 'offer.view_all'],
            // ['name' => 'offer.view_details'],
            // ['name' => 'offer.create'],
            // ['name' => 'offer.edit'],
            // ['name' => 'offer.delete'],
            // ['name' => 'offer.sort'],

            // group  جروب الاكواد
            // ['name' => 'group.view_all'],
            // ['name' => 'group.view_details'],
            // ['name' => 'group.create'],
            // ['name' => 'group.edit'],
            // ['name' => 'group.delete'],
            // ['name' => 'group.sort'],


            // ['name' => 'notification.view_all'],
            // ['name' => 'notification.view_details'],
            // ['name' => 'notification.create'],
            // ['name' => 'notification.edit'],
            // ['name' => 'notification.delete'],
            // ['name' => 'notification.sort'],



            // ['name' => 'paintscategory.view_all'],
            // ['name' => 'paintscategory.view_details'],
            // ['name' => 'paintscategory.create'],
            // ['name' => 'paintscategory.edit'],
            // ['name' => 'paintscategory.delete'],
            // ['name' => 'paintscategory.sort'],


            // coupon  اكواد المنتجات
            ['name' => 'coupon.view_all'],
            ['name' => 'coupon.view_details'],
            ['name' => 'coupon.create'],
            ['name' => 'coupon.edit'],
            ['name' => 'coupon.delete'],
            // ['name' => 'coupon.sort'],


            // vouchers page  صفحة عرض بينات كود الخصم
            ['name' => 'voucherspage.view_all'],
            ['name' => 'voucherspage.view_details'],
            ['name' => 'voucherspage.create'],
            ['name' => 'voucherspage.edit'],
            ['name' => 'voucherspage.delete'],


            // points_setting اعداد النقاط
            // ['name' => 'pointssetting.view_all'],
            // ['name' => 'pointssetting.view_details'],
            // ['name' => 'pointssetting.create'],
            // ['name' => 'pointssetting.edit'],
            // ['name' => 'pointssetting.delete'],

            ['name' => 'controlExpirationDuration.view_all'],
            ['name' => 'controlExpirationDuration.view_details'],
            ['name' => 'controlExpirationDuration.create'],
            ['name' => 'controlExpirationDuration.edit'],

            

            ['name' => 'transfers.view_all'],
            ['name' => 'transfers.view_details'],
            ['name' => 'transfers.delete'],


            //  ['name' => 'couponPurchaseTransactions.view_all'],
            // ['name' => 'couponPurchaseTransactions.view_details'],
            // ['name' => 'couponPurchaseTransactions.delete'],


            // Notifications اشعارت
            // ['name' => 'notification.view_all'],
            // ['name' => 'notification.view_details'],
            // ['name' => 'notification.create'],
            // ['name' => 'notification.edit'],
            // ['name' => 'notification.delete'],
            // ['name' => 'notification.sort'],

            // store متجر
            // ['name' => 'shop.view_all'],
            // ['name' => 'shop.view_details'],
            // ['name' => 'shop.create'],
            // ['name' => 'shop.edit'],
            // ['name' => 'shop.delete'],
            // ['name' => 'shop.sort'],

            // banner
            // ['name' => 'banner.view_all'],
            // ['name' => 'banner.view_details'],
            // ['name' => 'banner.create'],
            //  ['name' => 'banner.edit'],
            // ['name' => 'banner.delete'],
            // ['name' => 'banner.sort'],

            // complaint
            // ['name' => 'complaint.view_all'],
            // ['name' => 'complaint.view_details'],
            // ['name' => 'complaint.create'],
            // ['name' => 'complaint.edit'],
            // ['name' => 'complaint.delete'],
            // ['name' => 'complaint.sort'],

            // client
            ['name' => 'client.view_all'],
            ['name' => 'client.view_details'],
            ['name' => 'client.create'],
            ['name' => 'client.edit'],
            ['name' => 'client.delete'],
            // ['name' => 'client.sort'],


            //information_tours
            // ['name' => 'information_tours.view_all'],
            // ['name' => 'information_tours.view_details'],
            // ['name' => 'information_tours.create'],
            // ['name' => 'information_tours.edit'],
            // ['name' => 'information_tours.delete'],
            // ['name' => 'information_tours.sort'],


            //category_gallery
            // ['name' => 'category_gallery.view_all'],
            // ['name' => 'category_gallery.view_details'],
            // ['name' => 'category_gallery.create'],
            // ['name' => 'category_gallery.edit'],
            // ['name' => 'category_gallery.delete'],
            // ['name' => 'category_gallery.sort'],


            // ['name' => 'gallery.view_all'],
            // ['name' => 'gallery.view_details'],
            // ['name' => 'gallery.create'],
            // ['name' => 'gallery.edit'],
            // ['name' => 'gallery.delete'],
            // ['name' => 'gallery.sort'],


            // messages
            ['name' => 'messages.view_all'],
            ['name' => 'messages.view_details'],
            ['name' => 'messages.delete'],



            // ['name' => 'countries.view_all'],
            // ['name' => 'countries.read'],
            // ['name' => 'countries.create'],
            // ['name' => 'countries.edit'],
            // ['name' => 'countries.delete'],
            // ['name' => 'countries.sort'],


            // ['name' => 'cities.view_all'],
            // ['name' => 'cities.read'],
            // ['name' => 'cities.create'],
            // ['name' => 'cities.edit'],
            // ['name' => 'cities.delete'],
            // ['name' => 'cities.sort'],


            //regions
            // ['name' => 'regions.read'],
            // ['name' => 'regions.create'],
            // ['name' => 'regions.edit'],
            // ['name' => 'regions.delete'],
            // ['name' => 'regions.sort'],

            // payment_picture
            // ['name' => 'payment_picture.view_all'],
            // ['name' => 'payment_picture.view_details'],
            // ['name' => 'payment_picture.create'],
            // ['name' => 'payment_picture.edit'],
            // ['name' => 'payment_picture.delete'],
            // ['name' => 'payment_picture.sort'],

            // news
            ['name' => 'videos.view_all'],
            ['name' => 'videos.view_details'],
            ['name' => 'videos.create'],
            ['name' => 'videos.edit'],
            ['name' => 'videos.delete'],

            // about_us
            ['name' => 'about_us.view_all'],
            ['name' => 'about_us.view_details'],
            ['name' => 'about_us.create'],
            ['name' => 'about_us.edit'],
            ['name' => 'about_us.delete'],
            // ['name' => 'about_us.sort'],


            //contact
            ['name' => 'contact.view_all'],
            ['name' => 'contact.view_details'],
            ['name' => 'contact.create'],
            ['name' => 'contact.edit'],
            ['name' => 'contact.delete'],

            // card
            // ['name' => 'card.view_all'],
            // ['name' => 'card.view_details'],
            // ['name' => 'card.create'],
            // ['name' => 'card.edit'],
            // ['name' => 'card.delete'],


            // testimonial
            // ['name' => 'testimonial.view_all'],
            // ['name' => 'testimonial.view_details'],
            // ['name' => 'testimonial.create'],
            // ['name' => 'testimonial.edit'],
            // ['name' => 'testimonial.delete'],
            // ['name' => 'testimonial.sort'],



            // privacypolicy
            ['name' => 'privacypolicy.view_all'],
            ['name' => 'privacypolicy.view_details'],
            ['name' => 'privacypolicy.create'],
            ['name' => 'privacypolicy.edit'],
            ['name' => 'privacypolicy.delete'],
            // ['name' => 'privacypolicy.sort'],




            // termsandCondition
            ['name' => 'termsandcondition.view_all'],
            ['name' => 'termsandcondition.view_details'],
            ['name' => 'termsandcondition.create'],
            ['name' => 'termsandcondition.edit'],
            ['name' => 'termsandcondition.delete'],
            // ['name' => 'termsandcondition.sort'],

            // all_settings
            ['name' => 'all_settings.view_all'],

            // ['name' => 'mainSetting.view_details'],
            // ['name' => 'mainSetting.edit'],


            // ['name' => 'aboutUsSetting.view_details'],
            // ['name' => 'aboutUsSetting.edit'],

            // ['name' => 'trip_title_ad_image_index.view_details'],
            // ['name' => 'trip_title_ad_image_index.edit'],


            // ['name' => 'home_couronne_setting.view_details'],
            // ['name' => 'home_couronne_setting.edit'],

            // ['name' => 'newsSetting.view_details'],
            // ['name' => 'newsSetting.edit'],


            // ['name' => 'ourcardssetting.view_details'],
            // ['name' => 'ourcardssetting.edit'],







            //             ['name' => 'package_requests.view_all'],
//             ['name' => 'package_requests.view_details'],
//             ['name' => 'package_requests.edit'],


            //             ['name' => 'user_packages.view_all'],


            //             ['name' => 'wallets.view_all'],


            //             ['name' => 'documents.view_all'],
//             ['name' => 'documents.view_details'],
//             ['name' => 'documents.create'],
//             ['name' => 'documents.edit'],
//             ['name' => 'documents.delete'],
//             ['name' => 'documents.sort'],


            //             ['name' => 'providers.view_all'],
//             ['name' => 'providers.view_details'],
// //            ['name' => 'providers.create'],
// //            ['name' => 'providers.edit'],
//             ['name' => 'providers.delete'],


            //             ['name' => 'providers_services.view_all'],
//             ['name' => 'providers_services.view_details'],
// //            ['name' => 'providers_services.create'],
// //            ['name' => 'providers_services.edit'],
//             ['name' => 'providers_services.delete'],


            //             ['name' => 'bookings.view_all'],
//             ['name' => 'bookings.view_details'],
// //            ['name' => 'bookings.create'],
// //            ['name' => 'bookings.edit'],
//             ['name' => 'bookings.delete'],


            //             ['name' => 'clients.view_all'],
//             ['name' => 'clients.view_details'],
// //            ['name' => 'clients.create'],
// //            ['name' => 'clients.edit'],
//             ['name' => 'clients.delete'],


            //             ['name' => 'service_categories.view_all'],
//             ['name' => 'service_categories.view_details'],
//             ['name' => 'service_categories.create'],
//             ['name' => 'service_categories.edit'],
//             ['name' => 'service_categories.delete'],
//             ['name' => 'service_categories.sort'],


            //             ['name' => 'service_subCategories.view_all'],
//             ['name' => 'service_subCategories.view_details'],
//             ['name' => 'service_subCategories.create'],
//             ['name' => 'service_subCategories.edit'],
//             ['name' => 'service_subCategories.delete'],
//             ['name' => 'service_subCategories.sort'],


            //             ['name' => 'groups.view_all'],
//             ['name' => 'groups.view_details'],
//             ['name' => 'groups.create'],
//             ['name' => 'groups.edit'],
//             ['name' => 'groups.delete'],
//             ['name' => 'groups.sort_fields'],


            //             ['name' => 'fields.view_all'],
//             ['name' => 'fields.view_details'],
//             ['name' => 'fields.create'],
//             ['name' => 'fields.edit'],
//             ['name' => 'fields.delete'],

            //             ['name' => 'services.view_all'],
//             ['name' => 'services.view_details'],
//             ['name' => 'services.create'],
//             ['name' => 'services.edit'],
//             ['name' => 'services.delete'],
//             ['name' => 'services.sort'],


            //             ['name' => 'countries.view_all'],
//             ['name' => 'countries.view_details'],
//             ['name' => 'countries.create'],
//             ['name' => 'countries.edit'],
//             ['name' => 'countries.delete'],
//             ['name' => 'countries.sort'],


            //             ['name' => 'cities.view_all'],
//             ['name' => 'cities.view_details'],
//             ['name' => 'cities.create'],
//             ['name' => 'cities.edit'],
//             ['name' => 'cities.delete'],
//             ['name' => 'cities.sort'],


            //             ['name' => 'regions.view_all'],
//             ['name' => 'regions.view_details'],
//             ['name' => 'regions.create'],
//             ['name' => 'regions.edit'],
//             ['name' => 'regions.delete'],
//             ['name' => 'regions.sort'],


            //             ['name' => 'banners.view_all'],
//             ['name' => 'banners.create'],
//             ['name' => 'banners.edit'],
//             ['name' => 'banners.delete'],



            //             ['name' => 'bottom_banners.view_all'],
//             ['name' => 'bottom_banners.create'],
//             ['name' => 'bottom_banners.edit'],
//             ['name' => 'bottom_banners.delete'],


            //             ['name' => 'bottom_banner.view_details'],
//             ['name' => 'bottom_banner.edit'],


            //             ['name' => 'messages.view_all'],
//             ['name' => 'messages.view_details'],
//             ['name' => 'messages.delete'],


            //             ['name' => 'about_us.view_details'],
//             ['name' => 'about_us.edit'],


            //             ['name' => 'terms.view_details'],
//             ['name' => 'terms.edit'],


            //             ['name' => 'privacy.view_details'],
//             ['name' => 'privacy.edit'],

            //             ['name' => 'settings.view_details'],
//             ['name' => 'settings.edit'],
        ];

        foreach ($permissions as $permission) {
            $name = isset($permission['name']) ? $permission['name'] : null;
            $createdPermission = Permission::firstOrCreate([
                'name' => $name,
                'guard_name' => 'admin'
            ]);
            $superAdmin->givePermissionTo($createdPermission);
        }
    }
}
