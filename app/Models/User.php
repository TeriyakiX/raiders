<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'external_id',
        'name',
        'role',
        'display_role',
        'clan',
        'avatar',
        'email',
        'verified',
        'agreement',
        'address',
        'league_id',
        'league_points',
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


    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'event_user')->withTimestamps();
    }

    public function cards()
    {
        return $this->hasMany(Card::class, 'owner', 'address');
    }

    public function squad()
    {
        return $this->hasMany(Squad::class, 'user_id');
    }

    public function league()
    {
        return $this->belongsTo(League::class, 'league_id');
    }



}
