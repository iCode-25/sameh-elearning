<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements HasMedia
{
    use HasRoles;
    use HasApiTokens, HasFactory, InteractsWithMedia, Notifiable;


    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'username',
        'l_name',
        'is_admin',
        'user_id',
        'level_id',
        'gender',
        'is_banned',
        'is_active',
        'type'
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeUsers($query)
    {
        return $query->where('is_admin', 1);
    }

    public function isAdmin()
    {
        return $this->is_admin == 1;
    }

    public function isUser()
    {
        return $this->is_admin == 0;
    }

    public function notifications()
    {
        return $this->belongsTo(Notification::class, 'user_id', 'id');
    }


    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function transfers()
    {
        return $this->hasMany(Transfer::class, 'user_id');
    }

    public function tests()
    {
        return $this->belongsToMany(Test::class, 'student_tests', 'student_id', 'test_id');
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Videos::class);
    }

    public function packages(): HasMany
    {
        return $this->hasMany(Packages::class);
    }

    public function voucherspages()
    {
        return $this->hasMany(Voucherspage::class, 'client_id', 'id');
    }
}
