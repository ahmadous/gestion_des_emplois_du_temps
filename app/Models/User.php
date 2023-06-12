<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

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
    ];

    /**
     * Get all of the emplois_du_temps for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emplois_du_temps(): HasMany
    {
        return $this->hasMany(emplois_du_temps::class);
    }

    /**
     * Get all of the notification for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notification(): HasMany
    {
        return $this->hasMany(notification::class);
    }

    /**
     * Get all of the creneau for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creneau(): HasMany
    {
        return $this->hasMany(creneau::class);
    }
}