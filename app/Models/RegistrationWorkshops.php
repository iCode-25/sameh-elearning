<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
// use Spatie\Translatable\HasTranslations;

class RegistrationWorkshops extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile ;

    protected $table = 'registration_workshops'; 

    protected $fillable = ['name', 'phone', 'email' , 'workshops_id', 'age'];

    public function workshop()
    {
        return $this->belongsTo(Workshops::class, 'workshops_id');
    }

 

    protected $guarded = ['id'];

    public function scopeOrdered($q)
    {
        return $q->orderBy('id', 'asc');
    }
}
