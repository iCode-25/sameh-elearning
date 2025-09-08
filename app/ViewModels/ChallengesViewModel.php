<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use App\Models\Challenges;
use App\Models\Level;

class ChallengesViewModel extends ViewModel
{
    public function __construct(public ?Challenges $challenges = null)
    {
        $this->challenges = is_null($challenges) ? new Challenges(old()) : $challenges;
    }

    public function action(): string
    {
        return is_null($this->challenges->id)
            ? route('admin.challenges.store')
            : route('admin.challenges.update', ['challenges' => $this->challenges->id]);
    }

    public function method(): string
    {
        return is_null($this->challenges->id) ? 'POST' : 'PUT';
    }



    public function categories()
    {
        return Level::all();
    }
}
