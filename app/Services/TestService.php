<?php

namespace App\Services;

use App\Helpers\ReorderHelper;
use App\Models\Test;
use App\Models\Tag;

class  TestService
{

    // public function createTest($data)
    // {
    //     $test = Test::create([
    //         'name' => $data['name'],
    //         'description' => $data['description'],
    //     ]);
    //     $this->storeFiles($test, $data);
    //     $this->storePdf($test, $data); 
    // }




    // public function updateTest(Test $test, array $data)
    // {
    //     $test->update([
    //         'name' => $data['name'],
    //         'description' => $data['description'],
    //     ]);
    //     $this->storePdf(
    //         $test,
    //         $data
    //     );
    //     $this->updateFiles($test, $data);
    // }

    public function createTest($data)
    {
        $test = Test::create([
            'name' => $data['name'],
            'type' => $data['type'],
            
            'description' => $data['description'],
            'number_student_questions' => $data['number_student_questions'],
            'videos_id' => $data['videos_id'] ?? null,
            'packages_id' => $data['packages_id'] ?? null,
        ]);
        $this->storeFiles($test, $data);
        $this->storePdf($test, $data);
    }


    public function updateTest(Test $test, array $data)
    {
        $test->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'type' => $data['type'],

            
            'number_student_questions' => $data['number_student_questions'],
            'videos_id' => $data['videos_id'] ?? null,
            'packages_id' => $data['packages_id'] ?? null,
        ]);
        $this->storePdf($test, $data);
        $this->updateFiles($test, $data);
    }





    private function storePdf(Test $test, array $data)
    {
        if (isset($data['pdf']) && $data['pdf'] instanceof \Illuminate\Http\UploadedFile) {
            $test->clearMediaCollection('pdf');
            $test->addMedia($data['pdf'])->toMediaCollection('pdf');
        }
    }


    public function deleteTest(Test $test)
    {
        $test->delete();
    }


    private function storeFiles(Test $test, array $data)
    {
        if (isset($data['image'])) {
            $test->storeFile($data['image'], '_image');
        }

    }




    private function updateFiles(Test $test, array $data)
    {
        if (isset($data['image'])) {
            $test->updateFile($data['image'], '_image');
        }
    }


    public function reorder($test, $label, $path, $max_num)
    {
        return ReorderHelper::reorder($test, $label, $path, $max_num);
    }

    public function saveReorder($all_entries, $test)
    {
        return ReorderHelper::saveReorder($all_entries, $test);
    }

}
