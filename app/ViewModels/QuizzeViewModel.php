<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use App\Models\Quizze;
use App\Models\Level;
use App\Models\Test;

class QuizzeViewModel extends ViewModel
{
    public $test;
    public function __construct(Test $test, public ?Quizze $quizze = null)
    {
        $this->quizze = is_null($quizze) ? new Quizze(old()) : $quizze;
        $this->test = $test;
    }
    public function action(): string
    {
        return is_null($this->quizze->id)
            ? route('admin.test.store.quizzes', ['test' => $this->test->id])
            : route('admin.test.update.quizzes', ['test' => $this->quizze->test_id, 'quizze' => $this->quizze->id]);
    }

    public function method(): string
    {
        return is_null($this->quizze->id) ? 'POST' : 'PUT';
    }



    public function categories()
    {
        return Level::all();
    }
}
