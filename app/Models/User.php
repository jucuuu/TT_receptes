<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Recipe;
use App\Models\Comment;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar_url',
        'twitter_id',
        'twitter_token',
        'twitter_refresh_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'twitter_token',
        'twitter_refresh_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'twitter_token' => 'encrypted',
        'twitter_refresh_token' => 'encrypted',
    ];


     
    public function isTwitterUser(): bool {
        return $this->twitter_id !== null;
    }

    public function isOAuthUser(): bool {
        return ! $this->isTwitterUser();
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function recipes() {
        return $this->hasMany(Recipe::class);
    }
}
