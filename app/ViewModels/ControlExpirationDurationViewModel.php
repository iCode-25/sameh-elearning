<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use App\Models\ControlExpirationDuration;

class ControlExpirationDurationViewModel extends ViewModel
{
    public function __construct(public ?ControlExpirationDuration $controlExpirationDuration = null)
    {
        $this->controlExpirationDuration = is_null($controlExpirationDuration) ? new ControlExpirationDuration(old()) : $controlExpirationDuration;
    }

    public function action(): string
    {
        return is_null($this->controlExpirationDuration->id)
            ? route('admin.controlExpirationDuration.store')
            : route('admin.controlExpirationDuration.update', ['controlExpirationDuration' => $this->controlExpirationDuration->id]);
    }

    public function method(): string
    {
        return is_null($this->controlExpirationDuration->id) ? 'POST' : 'PUT';
    }
}
