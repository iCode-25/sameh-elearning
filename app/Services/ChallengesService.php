<?php

namespace App\Services;

use App\Helpers\ReorderHelper;
use App\Models\Challenges;
use App\Models\Tag;

class  ChallengesService
{

    public function createChallenges($data)
    {
        $challenges = Challenges::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'date' => $data['date'],

            
        ]);

        $this->storeFiles($challenges, $data);
        $this->storePdf($challenges, $data); 

    }


    private function storePdf(Challenges $challenges, array $data)
    {
        if (isset($data['pdf']) && $data['pdf'] instanceof \Illuminate\Http\UploadedFile) {
            // حذف PDF القديم
            $challenges->clearMediaCollection('pdf');
            // إضافة PDF الجديد
            $challenges->addMedia($data['pdf'])->toMediaCollection('pdf');
        }
    }


    public function updateChallenges(Challenges $challenges, array $data)
    {
//        dd($data['meta_tags']);

        $challenges->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'date' => $data['date'],

        ]);
        $this->storePdf($challenges,
            $data
        );



        $this->updateFiles($challenges, $data);
    }

    public function deleteChallenges(Challenges $challenges)
    {
        $challenges->delete();
    }


    private function storeFiles(Challenges $challenges, array $data)
    {
        if (isset($data['image'])) {
            $challenges->storeFile($data['image'], '_image');
        }

    }
    

    private function updateFiles(Challenges $challenges, array $data)
    {
        if (isset($data['image'])) {
            $challenges->updateFile($data['image'], '_image');
        }
   
    }


    public function reorder($challenges, $label, $path, $max_num)
    {
        return ReorderHelper::reorder($challenges, $label, $path, $max_num);
    }

    public function saveReorder($all_entries, $challenges)
    {
        return ReorderHelper::saveReorder($all_entries, $challenges);
    }

}
