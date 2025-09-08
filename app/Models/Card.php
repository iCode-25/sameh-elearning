<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Card extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile , HasTranslations;


    protected $table = 'cards';

    protected $fillable = ['title', 'des' , 'category_id' , 'categorycolid_id' , 'category_card' , 'price'];

    protected $guarded = ['id'];

    public $translatable = ['title', 'des' ];

    public function scopeOrdered($q)
    {
        return $q->orderBy('id', 'asc');
    }

    public function categories()
    {
        return $this->belongsTo(Level::class, 'category_id');
    }

    public function categorycolid()
    {
        return $this->belongsTo(Categorycolid::class, 'categorycolid_id');
    }


    // public function orderCard()
    // {
    //     return $this->belongsTo(OrderCard::class, 'card_id', 'id');
    // }
    public function orderCard()
    {
        return $this->hasMany(OrderCard::class, 'card_id', 'id');
    }


}
