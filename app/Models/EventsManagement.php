<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class EventsManagement extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile , HasTranslations;


    protected $fillable = ['name', 'meta_title', 'meta_description', 'meta_tags', 'alt_text', 'description', 'slug', 'category_id'];

    public $translatable = ['name', 'description'];

    protected $table = 'events_management';


    public function categories()
    {
        return $this->belongsTo(Level::class, 'category_id');
    }


    public function tags() {
        return $this->belongsToMany(Tag::class, 'tag_EventsManagements');
    }

    protected $guarded = ['id'];

    public function scopeOrdered($q)
    {
        return $q->orderBy('id', 'asc');
    }
}
