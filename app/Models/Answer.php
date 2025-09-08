<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
// use Spatie\Translatable\HasTranslations;

class Answer extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile ;

    protected $table = 'answers'; 

    protected $fillable = ['client_id', 'quiz_id', 'user_answer', 'is_correct'];

    // public $translatable = ['title', 'answer_1', 'answer_2', 'answer_3', 'answer_4'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }


    public function quiz()
    {
        return $this->belongsTo(Quizze::class, 'quiz_id');
    }

    protected $guarded = ['id'];

    public function scopeOrdered($q)
    {
        return $q->orderBy('id', 'asc');
    }
}
