<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use App\Models\Test;
use App\Models\Level;

class TestViewModel extends ViewModel
{
    public function __construct(public ?Test $test = null)
    {
        $this->test = is_null($test) ? new Test(old()) : $test;
    }
    public function action(): string
    {
        return is_null($this->test->id)
            ? route('admin.test.store')
            : route('admin.test.update', ['test' => $this->test->id]);
    }

    public function method(): string
    {
        return is_null($this->test->id) ? 'POST' : 'PUT';
    }



    public function categories()
    {
        return Level::all();
    }
}
