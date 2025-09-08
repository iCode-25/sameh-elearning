<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class PostLike extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile;


    protected $table = 'post_likes';

    protected $fillable = ['client_id', 'post_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    protected $guarded = ['id'];

    public function scopeOrdered($q)
    {
        return $q->orderBy('id', 'asc');
    }
}
