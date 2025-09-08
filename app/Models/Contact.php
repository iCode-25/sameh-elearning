<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Contact extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile , HasTranslations;

    protected $fillable = ['title', 'description', 'address', 'facebook', 'whatsapp', 'iniesta' , 'tiktok' , 'x' , 'email' ,'phone' , 'youtube'];

    protected $guarded = ['id'];

    public $translatable = ['title', 'description', 'address'];

    public function scopeOrdered($q)
    {
        return $q->orderBy('id', 'asc');
    }
    
}
