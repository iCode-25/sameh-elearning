<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile ;


    protected $table = 'posts';

    protected $fillable = ['client_id', 'content' , 'likes_count' , 'comments_count' ];


    public function registerMediaCollections(): void
{
    $this->addMediaCollection('post_images')->useDisk('public'); 
}


    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }


    protected $guarded = ['id'];

    public function scopeOrdered($q)
    {
        return $q->orderBy('id', 'asc');
    }
}
