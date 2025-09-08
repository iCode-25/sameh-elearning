<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'correct_answer',
        'student_answer',
        'lesson_id',
        'test_id',
        'student_id',
        'is_correct',
    ];

    protected $table = 'student_answers';
}
