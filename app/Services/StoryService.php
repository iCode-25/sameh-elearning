<?php

namespace App\Services;

use App\Helpers\ReorderHelper;
use App\Models\Story;
use App\Models\Tag;

class  StoryService
{

    public function createStory($data)
    {
        $story = Story::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        $this->storeFiles($story, $data);
        $this->storePdf($story, $data); 
     
    }


    private function storePdf(Story $story, array $data)
    {
        if (isset($data['pdf']) && $data['pdf'] instanceof \Illuminate\Http\UploadedFile) {
            // حذف PDF القديم
            $story->clearMediaCollection('pdf');
            // إضافة PDF الجديد
            $story->addMedia($data['pdf'])->toMediaCollection('pdf');
        }
    }


    public function updateStory(Story $story, array $data)
    {
//        dd($data['meta_tags']);

        $story->update([
            'name' => $data['name'],
            'description' => $data['description'],

        ]);
        $this->storePdf($story,
            $data
        );

       
        $this->updateFiles($story, $data);
    }

    public function deleteStory(Story $story)
    {
        $story->delete();
    }


    private function storeFiles(Story $story, array $data)
    {
        if (isset($data['image'])) {
            $story->storeFile($data['image'], '_image');
        }
    }


    private function updateFiles(Story $story, array $data)
    {
        if (isset($data['image'])) {
            $story->updateFile($data['image'], '_image');
        }
    }


    public function reorder($story, $label, $path, $max_num)
    {
        return ReorderHelper::reorder($story, $label, $path, $max_num);
    }

    public function saveReorder($all_entries, $story)
    {
        return ReorderHelper::saveReorder($all_entries, $story);
    }

}
