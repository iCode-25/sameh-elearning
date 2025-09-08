<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use App\Models\ContentManagement;
use App\Models\Level;

class ContentManagementViewModel extends ViewModel
{
    public function __construct(public ?ContentManagement $contentManagement = null)
    {
        $this->contentManagement = is_null($contentManagement) ? new ContentManagement(old()) : $contentManagement;
    }

    public function action(): string
    {
        return is_null($this->contentManagement->id)
            ? route('admin.contentManagement.store')
            : route('admin.contentManagement.update', ['contentManagement' => $this->contentManagement->id]);
    }

    public function method(): string
    {
        return is_null($this->contentManagement->id) ? 'POST' : 'PUT';
    }



    public function categories()
    {
        return Level::all();
    }
}
