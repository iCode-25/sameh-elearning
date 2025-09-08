<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_id',
        'student_id',
        'total_questions',
        'total_score',
        'student_score',
        'result_status',
    ];

}
