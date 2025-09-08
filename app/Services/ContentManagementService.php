<?php

namespace App\Services;

use App\Helpers\ReorderHelper;
use App\Models\ContentManagement;
use App\Models\Tag;

class  ContentManagementService
{

    public function createContentManagement($data)
    {
        $contentManagement = ContentManagement::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
        $this->storeFile($contentManagement, $data);
    }


    private function storeFile(ContentManagement $contentManagement, array $data)
    {
        if (isset($data['image'])) {
            $contentManagement->storeFile($data['image'], '_image');
        }

        if (isset($data['file']) && $data['file'] instanceof \Illuminate\Http\UploadedFile) {
            $extension = $data['file']->getClientOriginalExtension();

            if ($extension === 'pdf'
            ) {
                $contentManagement->clearMediaCollection('pdf');
                $contentManagement->addMedia($data['file'])->toMediaCollection('pdf');
            } else {
                $contentManagement->clearMediaCollection('content_managementvideo');
                $contentManagement->addMedia($data['file'])->toMediaCollection('content_managementvideo');
            }
        }
    }


    public function updateContentManagement(ContentManagement $contentManagement, array $data)
    {
        $contentManagement->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
        $this->updateFile($contentManagement, $data);
    }


    private function updateFile(ContentManagement $contentManagement, array $data)
{
    if (isset($data['image'])) {
        $contentManagement->updateFile($data['image'], '_image');
    }

    if (isset($data['file']) && $data['file'] instanceof \Illuminate\Http\UploadedFile) {
        $extension = $data['file']->getClientOriginalExtension();

        if ($extension === 'pdf') {
            $contentManagement->clearMediaCollection('pdf');
            $contentManagement->addMedia($data['file'])->toMediaCollection('pdf');
        } else {
            $contentManagement->clearMediaCollection('content_managementvideo');
            $contentManagement->addMedia($data['file'])->toMediaCollection('content_managementvideo');
        }
    }
}

    public function deleteContentManagement(ContentManagement $contentManagement)
    {
        $contentManagement->delete();
    }


    public function reorder($contentManagement, $label, $path, $max_num)
    {
        return ReorderHelper::reorder($contentManagement, $label, $path, $max_num);
    }

    public function saveReorder($all_entries, $contentManagement)
    {
        return ReorderHelper::saveReorder($all_entries, $contentManagement);
    }
}
