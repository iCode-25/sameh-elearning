<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use App\Models\EventsManagement;
use App\Models\Level;

class EventsManagementViewModel extends ViewModel
{
    public function __construct(public ?EventsManagement $eventsManagement = null)
    {
        $this->eventsManagement = is_null($eventsManagement) ? new EventsManagement(old()) : $eventsManagement;
    }

    public function action(): string
    {
        return is_null($this->eventsManagement->id)
            ? route('admin.eventsManagement.store')
            : route('admin.eventsManagement.update', ['eventsManagement' => $this->eventsManagement->id]);
    }

    public function method(): string
    {
        return is_null($this->eventsManagement->id) ? 'POST' : 'PUT';
    }



    public function categories()
    {
        return Level::all();
    }
}
