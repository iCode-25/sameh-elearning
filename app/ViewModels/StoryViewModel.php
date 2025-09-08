<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use App\Models\Story;
use App\Models\Level;

class StoryViewModel extends ViewModel
{
    public function __construct(public ?Story $story = null)
    {
        $this->story = is_null($story) ? new Story(old()) : $story;
    }

    public function action(): string
    {
        return is_null($this->story->id)
            ? route('admin.story.store')
            : route('admin.story.update', ['story' => $this->story->id]);
    }

    public function method(): string
    {
        return is_null($this->story->id) ? 'POST' : 'PUT';
    }



    public function categories()
    {
        return Level::all();
    }
}
