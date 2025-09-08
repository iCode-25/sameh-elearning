<?php

namespace App\Services;

use App\Helpers\ReorderHelper;
use App\Models\EventsManagement;
use App\Models\Tag;
class  EventsManagementService
{

    
    public function createEventsManagement($data)
    {
        $eventsManagement = EventsManagement::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
        $this->storeFiles($eventsManagement, $data);
        $this->storePdf($eventsManagement, $data);
    }

    private function storePdf(EventsManagement $eventsManagement, array $data)
    {
        if (isset($data['pdf']) && $data['pdf'] instanceof \Illuminate\Http\UploadedFile) {
            $eventsManagement->clearMediaCollection('pdf');
            $eventsManagement->addMedia($data['pdf'])->toMediaCollection('pdf');
        }
    }


    // public function updateEventsManagement(EventsManagement $eventsManagement, array $data)
    // {

    //     $eventsManagement->update([
    //         'name' => $data['name'],
    //         'description' => $data['description'],
    //     ]);

    //     $this->storeFiles($eventsManagement, $data);
    //     $this->storePdf($eventsManagement, $data);

    // }

    public function updateEventsManagement(EventsManagement $eventsManagement, array $data)
    {
        $eventsManagement->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        $this->updateFiles($eventsManagement, $data);
        $this->storePdf($eventsManagement, $data);
    }



    public function deleteEventsManagement(EventsManagement $eventsManagement)
    {
        $eventsManagement->delete();
    }


    // private function storeFiles(EventsManagement $eventsManagement, array $data)
    // {
    //     if (isset($data['image'])) {
    //         $eventsManagement->storeFile($data['image'], '_image');
    //     }

    //      if (isset($data['video'])) {
    //         $eventsManagement->storeFile($data['video'], 'video');
    //     }
    // }
    private function storeFiles(EventsManagement $eventsManagement, array $data)
    {
        if (isset($data['media'])) {
            $file = $data['media'];

            if ($file->getMimeType() && str_starts_with($file->getMimeType(), 'image/')) {
                $eventsManagement->storeFile($file, '_image');
            } elseif ($file->getMimeType() && str_starts_with($file->getMimeType(), 'video/')) {
                $eventsManagement->storeFile($file, 'video');
            }
        }
    }
    

    private function updateFiles(EventsManagement $eventsManagement, array $data)
    {
        if (isset($data['media'])) {
            $file = $data['media'];

            // التحقق من نوع الملف (صورة أو فيديو)
            if ($file->getMimeType() && str_starts_with($file->getMimeType(), 'image/')) {
                // حذف الصورة القديمة
                $eventsManagement->clearMediaCollection('events_management_image');
                // إضافة الصورة الجديدة
                $eventsManagement->storeFile($file, '_image');
            } elseif ($file->getMimeType() && str_starts_with($file->getMimeType(), 'video/')) {
                // حذف الفيديو القديم
                $eventsManagement->clearMediaCollection('events_managementvideo');
                // إضافة الفيديو الجديد
                $eventsManagement->storeFile($file, 'video');
            }
        }
    }



    public function reorder($eventsManagement, $label, $path, $max_num)
    {
        return ReorderHelper::reorder($eventsManagement, $label, $path, $max_num);
    }

    public function saveReorder($all_entries, $eventsManagement)
    {
        return ReorderHelper::saveReorder($all_entries, $eventsManagement);
    }

}
