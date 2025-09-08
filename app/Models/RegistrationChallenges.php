<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
// use Spatie\Translatable\HasTranslations;

class RegistrationChallenges extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile ;

    protected $table = 'registration_challenges'; 

    protected $fillable = ['name', 'phone', 'email' , 'challenges_id' ,'age'];

    public function challenges()
    {
        return $this->belongsTo(Challenges::class, 'challenges_id');
    }

    protected $guarded = ['id'];

    public function scopeOrdered($q)
    {
        return $q->orderBy('id', 'asc');
    }
}
