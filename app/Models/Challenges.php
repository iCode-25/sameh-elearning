<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
class Challenges extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile , HasTranslations;

    protected $table = 'challenges'; 

    protected $fillable = ['name', 'description', 'is_active', 'date' , 'age'];

    public $translatable = ['name', 'description'];

    protected $guarded = ['id'];

    public function registrations()
    {
        return $this->hasMany(RegistrationChallenges::class, 'challenges_id');
    }

    public function scopeOrdered($q)
    {
        return $q->orderBy('id', 'asc');
    }
}
