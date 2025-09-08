<?php
namespace App\Services;

use App\Helpers\ReorderHelper;
use App\Models\Banner;

class  BannerService{


    // public function createBanner($data)
    // {
    //     // إنشاء الـ Banner باستخدام البيانات العامة
    //     $banner = Banner::create($data);

    //     // التحقق من وجود صور مرفوعة في البيانات
    //     if (isset($data['image']) && is_array($data['image'])) {
    //         foreach ($data['image'] as $image) {
    //             if ($image instanceof \Illuminate\Http\UploadedFile && $image->isValid()) {
    //                 // رفع كل صورة بشكل منفصل
    //                 $banner->addMedia($image)->toMediaCollection('banners');
    //             }
    //         }
    //     }

    //     return $banner;
    // }


    // public function createBanner($data)
    // {
    //     $banner = Banner::create($data);

    //     if (isset($data['image'])) {
    //         foreach ($data['image'] as $image) {
    //             $banner->addMedia($image)->toMediaCollection('banners');
    //         }
    //     }
    // }


    // public function updateBanner($banner, $data)
    // {
    //     // التحقق من وجود صور جديدة مرفوعة في البيانات
    //     if (isset($data['image']) && is_array($data['image'])) {
    //         // إذا كنت تريد حذف الصور القديمة، قم باستخدام السطر التالي
    //         $banner->clearMediaCollection('banners'); // هذا السطر اختياري لحذف الصور القديمة

    //         foreach ($data['image'] as $image) {
    //             if ($image instanceof \Illuminate\Http\UploadedFile && $image->isValid()) {
    //                 // رفع الصور الجديدة
    //                 $banner->addMedia($image)->toMediaCollection('banners');
    //             }
    //         }
    //     }

    //     // تحديث البيانات العامة
    //     $banner->update($data);

    //     return $banner;
    // }


    // public function updateBanner($banner, $data)
    // {
    //     if (isset($data['image'])) {
    //         foreach ($data['image'] as $image) {
    //             $banner->addMedia($image)->toMediaCollection('banners');
    //         }
    //     }

    //     $banner->update($data);
    // }



    // public function deleteBanner($banner)
    // {
    //     // حذف كل الوسائط المرتبطة بالـ Banner
    //     $banner->clearMediaCollection('banners');

    //     // حذف الـ Banner نفسه
    //     $banner->delete();
    // }


    public function createBanner($data)
    {
        $banner = Banner::create($data);
        if (isset($data['image'])) {
            $banner->storeFile($data['image']);
        }
    }



    public function updateBanner($banner , $data){
        if(isset($data['image'])){
            $banner->updateFile($data['image']);
        }
        $banner->update($data);
    }



    public function deleteBanner($banner){
        $banner->delete();
    }


   

    public function reorder($banner, $label , $path, $max_num)
    {
        return ReorderHelper::reorder($banner, $label , $path, $max_num);
    }

    public function saveReorder ($all_entries, $banner)
    {
        return ReorderHelper::saveReorder($all_entries, $banner);
    }



}
