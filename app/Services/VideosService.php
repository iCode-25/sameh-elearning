<?php

namespace App\Services;

use App\Helpers\ReorderHelper;
use App\Models\Videos;
use Illuminate\Support\Facades\Storage;

class  VideosService
{



    // public function createVideos($data)
    // {
    //     $news = Videos::create($data);

    //     if (!empty($data['video_url'])) {
    //         $news->video_url = $data['video_url'];
    //     }

    //     if (!empty($data['azhar_video_url'])) {
    //         $news->azhar_video_url = $data['azhar_video_url'];
    //     }

    //     if (!empty($data['school_video_url'])) {
    //         $news->school_video_url = $data['school_video_url'];
    //     }

    //     if (isset($data['image'])) {
    //         $news->storeFile($data['image']);
    //     }

    //     if (isset($data['news_pdf'])) {
    //         $news->storeFile($data['news_pdf'], 'news_pdf');
    //     }

    //     $news->save();
    // }
    public function createVideos($data)
    {
        $news = Videos::create($data);

        if (!empty($data['video_url'])) {
            $news->video_url = $data['video_url'];
        }

        if (!empty($data['azhar_video_url'])) {
            $news->azhar_video_url = $data['azhar_video_url'];
        }

        if (!empty($data['school_video_url'])) {
            $news->school_video_url = $data['school_video_url'];
        }

        $news->save();

        // if (isset($data['image'])) {
        //     $news->storeFile($data['image'], 'news');
        // }
            if (isset($data['image'])) {
                $news->storeFile($data['image']);
            }


        if (isset($data['news_pdf'])) {
            $news->storeFile($data['news_pdf'], 'news_pdf');
        }
    }




    public function updateVideos($news, $data)
    {
        if (isset($data['image'])) {
            $news->updateFile($data['image']);
        }

        if (!empty($data['video_url'])) {
            $news->video_url = $data['video_url'];
            $news->save();
        }

        if (!empty($data['azhar_video_url'])) {
            $news->azhar_video_url = $data['azhar_video_url'];
            $news->save();
        }

        if (!empty($data['school_video_url'])) {
            $news->school_video_url = $data['school_video_url'];
            $news->save();
        }

        if (isset($data['news_pdf'])) {
            $news->updateFile($data['news_pdf'], 'news_pdf');
        }

        $news->update($data);
    }





    public function deleteVideos($news)
    {
        $news->delete();
    }




    public function reorder($news, $label, $path, $max_num)
    {
        return ReorderHelper::reorder($news, $label, $path, $max_num);
    }




    public function saveReorder($all_entries, $news)
    {
        return ReorderHelper::saveReorder($all_entries, $news);
    }
}
