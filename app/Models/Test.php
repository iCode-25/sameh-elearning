<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Test extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile , HasTranslations;


    protected $table = 'tests';
    protected $fillable = ['name', 'description', 'user_id', 'videos_id', 'packages_id' , 'number_student_questions', 'question_score' , 'type' , 'is_active'];

    public $translatable = ['name', 'description','title', 'answer_1', 'answer_2', 'answer_3', 'answer_4'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function video()
    {
        return $this->belongsTo(Videos::class, 'videos_id');
    }

    public function package()
    {
        return $this->belongsTo(Packages::class, 'packages_id');
    }

    public function quizzes()
    {
        return $this->hasMany(Quizze::class, 'test_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeDesactive($query)
    {
        return $query->where('is_active', 0);
    }

    protected $guarded = ['id'];

    public function scopeOrdered($q)
    {
        return $q->orderBy('id', 'asc');
    }
}
