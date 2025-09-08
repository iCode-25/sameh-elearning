<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
// use Spatie\Translatable\HasTranslations;

class OrderCard extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile ;
    // HasTranslations
    protected $table = 'order_card';
    
    protected $fillable = ['first_name', 'last_name' , 'email' , 'phone' , 'number_card' , 'total_price' , 'card_id'];

    // public $translatable = ['name', 'message', 'email', 'phone' , 'city'];

    protected $guarded = ['id'];

    // public function scopeOrdered($q)
    // {
    //     return $q->orderBy('lft', 'asc');
    // }


    // public function cards()
    // {
    //     return $this->hasMany(Card::class, 'card_id', 'id');
    // }

    public function cards()
{
    return $this->belongsTo(Card::class, 'card_id', 'id');
}

}

