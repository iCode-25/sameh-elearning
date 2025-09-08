<?php

namespace App\Services;

use App\Helpers\ReorderHelper;
use App\Models\Videos;
use Illuminate\Support\Facades\Storage;

class  VideosService
{

    public function createVideos($data)
    {
        $news = Videos::create($data);
        if (isset($data['image'])) {
            $news->storeFile($data['image']);
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
            $news->storeFile($data['news_pdf'], 'news_pdf');
        }
    }




    // public function createVideos($data)
    // {
    //     $news = Videos::create($data);
    //     if (isset($data['image'])) {
    //         $news->storeFile($data['image']);
    //     }

    //     // if (isset($data['news_video'])) {
    //     //     $uploadedFile = $data['news_video'];
    //     //     $localPath = $uploadedFile->store('temp_videos', 'local');
    //     //     $ftpPath = 'videos/' . basename($localPath);
    //     //     Storage::disk('remote')->put($ftpPath, file_get_contents(storage_path('app/' . $localPath)));
    //     //     $news->video_url = $ftpPath;
    //     //     $news->save();
    //     //     Storage::disk('local')->delete($localPath);
    //     // }

    //     if (!empty($data['video_url'])) {
    //         $news->video_url = $data['video_url'];
    //         $news->save();
    //     }


    //     // if (isset($data['azhar_video'])) {
    //     //     $uploadedFile = $data['azhar_video'];
    //     //     $localPath = $uploadedFile->store('temp_videos', 'local');
    //     //     $ftpPath = 'videos/' . basename($localPath);
    //     //     Storage::disk('remote')->put($ftpPath, file_get_contents(storage_path('app/' . $localPath)));
    //     //     $news->azhar_video_url = $ftpPath;
    //     //     $news->save();
    //     //     Storage::disk('local')->delete($localPath);
    //     // }

    //     if (!empty($data['azhar_video_url'])) {
    //         $news->azhar_video_url = $data['azhar_video_url'];
    //         $news->save();
    //     }
    //     // if (isset($data['school_video'])) {
    //     //     $uploadedFile = $data['school_video'];
    //     //     $localPath = $uploadedFile->store('temp_videos', 'local');
    //     //     $ftpPath = 'videos/' . basename($localPath);
    //     //     Storage::disk('remote')->put($ftpPath, file_get_contents(storage_path('app/' . $localPath)));
    //     //     $news->school_video_url = $ftpPath;
    //     //     $news->save();
    //     //     Storage::disk('local')->delete($localPath);
    //     // }

    //     if (!empty($data['school_video_url'])) {
    //         $news->school_video_url = $data['school_video_url'];
    //         $news->save();
    //     }

    //     if (isset($data['news_pdf'])) {
    //         $news->storeFile($data['news_pdf'], 'news_pdf');
    //     }
    // }



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



    // public function updateVideos($news, $data)
    // {
    //     if (isset($data['image'])) {
    //         $news->updateFile($data['image']);
    //     }

    //     if (isset($data['news_video'])) {
    //         $uploadedFile = $data['news_video'];
    //         $localPath = $uploadedFile->store('temp_videos', 'local');
    //         $ftpPath = 'videos/' . basename($localPath);
    //         Storage::disk('remote')->put($ftpPath, file_get_contents(storage_path('app/' . $localPath)));
    //         $news->video_url = $ftpPath;
    //         $news->save();
    //         Storage::disk('local')->delete($localPath);
    //     }
     
    //     if (isset($data['azhar_video'])) {
    //         $uploadedFile = $data['azhar_video'];
    //         $localPath = $uploadedFile->store('temp_videos', 'local');
    //         $ftpPath = 'videos/' . basename($localPath);
    //         Storage::disk('remote')->put($ftpPath, file_get_contents(storage_path('app/' . $localPath)));
    //         $news->azhar_video_url = $ftpPath;
    //         $news->save();
    //         Storage::disk('local')->delete($localPath);
    //     }
     
    //     if (isset($data['school_video'])) {
    //         $uploadedFile = $data['school_video'];
    //         $localPath = $uploadedFile->store('temp_videos', 'local');
    //         $ftpPath = 'videos/' . basename($localPath);
    //         Storage::disk('remote')->put($ftpPath, file_get_contents(storage_path('app/' . $localPath)));
    //         $news->school_video_url = $ftpPath;
    //         $news->save();
    //         Storage::disk('local')->delete($localPath);
    //     }
    
    //     if (isset($data['news_pdf'])) {
    //         $news->updateFile($data['news_pdf'], 'news_pdf');
    //     }

    //     $news->update($data);
    // }

    //     public function updateVideos($news, $data)
    // {
    //     if (isset($data['image'])) {
    //         $news->updateFile($data['image']);
    //     }
    //     if (isset($data['news_video'])) {
    //         $uploadedFile = $data['news_video'];
    //         $localPath = $uploadedFile->store('temp_videos', 'local');
    //         $ftpPath = 'videos/' . basename($localPath);
    //         Storage::disk('remote')->put($ftpPath, file_get_contents(storage_path('app/' . $localPath)));
    //         $news->video_url = $ftpPath;
    //         $news->save();
    //         Storage::disk('local')->delete($localPath);
    //     }
    //     if (isset($data['news_pdf'])) {
    //         $news->updateFile($data['news_pdf'], 'news_pdf');
    //     }
    //     $news->update($data);
    // }






    // public function updateVideos($news, $data)
    // {
    //     // dd($data);
    //     if (isset($data['image'])) {
    //         $news->updateFile($data['image']);
    //     }
    //     if (isset($data['news_video'])) {
    //         $news->updateFile($data['news_video'], 'news_video');
    //     }
    //     if (isset($data['news_pdf'])) {
    //         $news->updateFile($data['news_pdf'], 'news_pdf');
    //     }
    //     $news->update($data);
    // }




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
