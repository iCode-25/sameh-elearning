<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Videos extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia, HandleUploadFile, HasTranslations;

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->extractVideoFrameAtSecond(1)
            ->performOnCollections('news_video');
    }

    protected $table = 'news';

    // protected $fillable = ['name', 'des', 'is_active', 'price', 'level_id' , 'video_url'];
    protected $fillable = [
        'name',
        'des',
        'is_active',
        'price',
        'level_id',
        'video_url',
        'azhar_video_url',
        'school_video_url'
    ];


    protected $guarded = ['id'];

    public $translatable = ['name', 'des'];

    public function scopeOrdered($q)
    {
        return $q->orderBy('id', 'asc');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function packages()
    {
        return $this->belongsToMany(Videos::class, 'package_lessons', 'lesson_id', 'package_id');
    }

    public function transfers()
    {
        return $this->hasMany(Transfer::class, 'videos_id');
    }

    public function tests()
    {
        return $this->hasMany(Test::class, 'videos_id');
    }

    public function vouchers()
    {
        return $this->hasMany(Voucherspage::class, 'product_id', 'id');
    }
}
