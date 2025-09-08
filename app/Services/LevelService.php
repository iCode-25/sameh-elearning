<?php
namespace App\Services;

use App\Helpers\ReorderHelper;
use App\Models\Level;

class  LevelService {

    public function createLevel($data)
    {
        // $data['slug'] = $this->createUniqueSlug($data['name'], Level::class);

        $level = Level::create($data);

        if (isset($data['image'])) {
            $level->storeFile($data['image']);
        }

        if (isset($data['background'])) {
            $level->storeFile($data['background'], 'background');
        }

        if (isset($data['meta_image'])) {
            $level->storeFile($data['meta_image'], '_meta_image');
        }
    }

//     public function createUniqueSlug($name, $model , $id = null) {
//         $slug = $this->generateArabicSlug($name);

//         $originalSlug = $slug;

//         // Keep modifying the slug by appending a number until it's unique
//         if ($id != null) {
//             $count = $model::where('slug', $slug)->where('id', '!=', $id)->count();
//         } else {
//             $count = $model::where('slug', $slug)->count();

//         }
//         if ($count > 0) {
//             $slug = $originalSlug . '-' . $count;
//         } else {
//             $slug = $originalSlug;
//         }
// //        dd($slug);
//         return $slug;


//     }
//     public function generateArabicSlug($string, $separator = '-')
//     {
//         if (is_null($string)) {
//             return "";
//         }

//         $string = trim($string);

//         $string = mb_strtolower($string, "UTF-8");;

//         $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

//         $string = preg_replace("/[\s-]+/", " ", $string);

//         $string = preg_replace("/[\s_]/", $separator, $string);

//         return $string;
//     }

    public function updateLevel($level , $data)
    {

        // $data['slug'] = $this->createUniqueSlug($data['name'], Level::class, $level->id);

        if(isset($data['image'])){
            $level->updateFile($data['image']);
        }
        // if (isset($data['background'])) {
        //     $level->updateFile($data['background']);
        // }

        if (isset($data['background'])) {
            $level->updateFile($data['background'], 'background');
        }
        if (isset($data['meta_image'])) {
            $level->updateFile($data['meta_image'], '_meta_image');
        }
        $level->update($data);
    }

    public function deleteLevel($level){
        $level->delete();
    }

    public function reorder($level, $label , $path, $max_num)
    {
        return ReorderHelper::reorder($level, $label , $path, $max_num);
    }

    public function saveReorder ($all_entries, $level)
    {
        return ReorderHelper::saveReorder($all_entries, $level);
    }

}
