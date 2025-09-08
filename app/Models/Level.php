<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
class Level extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile, HasTranslations;

    protected $fillable = ['name', 'parent_id', 'lft', 'rgt', 'depth', 'description', 'color'];

    public $translatable = ['name', 'description'];

    public function video()
    {
        return $this->hasMany(Videos::class, 'level_id');
    }


    public function packages()
    {
        return $this->hasMany(Packages::class, 'level_id');
    }


    public function users()
    {
        return $this->hasMany(User::class, 'level_id');
    }



    protected $guarded = ['id'];
    protected $table = 'categories';

    public function scopeOrdered($q)
    {
        return $q->orderBy('lft', 'asc');
    }

}
