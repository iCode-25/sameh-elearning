<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use App\Models\Videos;

class VideosViewModel extends ViewModel
{
    public function __construct(public ?Videos $videos = null)
    {
        $this->videos = is_null($videos) ? new Videos(old()) : $videos;
    }

    public function action(): string
    {
        return is_null($this->videos->id)
            ? route('admin.videos.store')
            : route('admin.videos.update', ['videos' => $this->videos->id]);
    }

    public
        function method(
    ): string {
        return is_null($this->videos->id) ? 'POST' : 'PUT';
    }
}
