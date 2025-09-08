<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Quizze extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile , HasTranslations;

    protected $table = 'quizzes'; 

    protected $fillable = ['title', 'answer_1' , 'answer_2' , 'answer_3' , 'answer_4' , 'c_answer' , 'test_id', 'question_score'];

    public $translatable = ['title', 'answer_1', 'answer_2', 'answer_3' , 'answer_4'];

    public function tests()
    {
        return $this->belongsTo(Test::class, 'test_id', 'id');
    }

    protected $guarded = ['id'];

    public function scopeOrdered($q)
    {
        return $q->orderBy('id', 'asc');
    }

    // public function storeFile($file, $collection = '_image')
    // {
    //     $this->addMedia($file)->toMediaCollection($collection);
    // }

    public function storeFile($file, $collection)
    {
        return $this->addMedia($file)->toMediaCollection($collection);
    }

}
