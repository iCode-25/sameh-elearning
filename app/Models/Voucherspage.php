<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
// use Spatie\Translatable\HasTranslations;
// use Spatie\Translatable\HasTranslations;

class Voucherspage extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile;

    protected $table = 'voucherspage';

    protected $fillable = ['client_id', 'offer_id', 'product_id', 'package_id', 'type', 'coupon_id', 'points', 'status',
        'client_title',
        'coupon_title',
        'package_title',
        'lesson_title',
        'level_title'
];

    protected $guarded = ['id'];

    public function scopeOrdered($q)
    {
        return $q->orderBy('id', 'asc');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function lessons()
    {
        return $this->belongsTo(Videos::class, 'product_id', 'id');
    }

    public function packages()
    {
        return $this->belongsTo(Packages::class, 'package_id', 'id');
    }

    public function scopePackageActive($query)
    {
        $package_days = ControlExpirationDuration::first()->package_expiration_time ?? 0;
        return $query->where('created_at', '>=', now()->subDays($package_days));
    }

    public function scopeLessonActive($query)
    {
        $lesson_days = ControlExpirationDuration::first()->lesson_expiration_time ?? 0;
        return $query->where('created_at', '>=', now()->subDays($lesson_days));
    }
}
