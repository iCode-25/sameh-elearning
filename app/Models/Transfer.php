<?php

namespace App\Models;

use App\Traits\HandleUploadFile;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use App\Models\ControlExpirationDuration;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Spatie\Translatable\HasTranslations;

class Transfer extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HandleUploadFile;
    // HasTranslations
    protected $table = 'payout_transfers';

    protected $fillable = [
        'client_id',
        'amount',
        'status',
        'response_data',
        'method',
        'transfer_type',
        'user_id',
        'videos_id',
        'packages_id',
        'client_title',
        'amount_title',
        'packages_title',
        'videos_title',
        'level_title'
    ];

    protected $guarded = ['id'];

    public function scopeOrdered($q)
    {
        return $q->orderBy('lft', 'asc');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function video()
    {
        return $this->belongsTo(Videos::class, 'videos_id');
    }

    public function package()
    {
        return $this->belongsTo(Packages::class, 'packages_id');
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





