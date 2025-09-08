<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Packages extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile, HasTranslations;

    protected $table = 'workshops';

    protected $fillable = ['name', 'description', 'is_active', 'date', 'price', 'discount', 'level_id' , 'video_url'];

    public $translatable = ['name', 'description'];

    public function registrations()
    {
        return $this->hasMany(RegistrationWorkshops::class, 'workshops_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Videos::class, 'package_lessons', 'package_id', 'lesson_id');
    }

    public function packages()
    {
        return $this->belongsToMany(Packages::class, 'package_lessons', 'package_id', 'lesson_id');
    }

    public function tests()
    {
        return $this->hasMany(Test::class, 'packages_id');
    }


    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function transfers()
    {
        return $this->hasMany(Transfer::class, 'packages_id');
    }

    public function vouchers()
    {
        return $this->hasMany(Voucherspage::class, 'package_id');
    }

    protected $guarded = ['id'];

    public function scopeOrdered($q)
    {
        return $q->orderBy('id', 'asc');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
