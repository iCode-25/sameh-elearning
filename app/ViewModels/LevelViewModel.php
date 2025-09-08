<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use App\Models\Level;

class LevelViewModel extends ViewModel
{
    public function __construct(public ?Level $level = null)
    {
        $this->level = is_null($level) ? new Level(old()) : $level;
    }

    public function action(): string
    {
        return is_null($this->level->id)
            ? route('admin.level.store')
            : route('admin.level.update', ['level' => $this->level->id]);
    }

    public function method(): string
    {
        return is_null($this->level->id) ? 'POST' : 'PUT';
    }
}
