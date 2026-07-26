<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function followings()
    {
        return $this->belongsToMany(
            User::class,
            'user_follow',
            'user_id',
            'follow_id'
        )->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'user_follow',
            'follow_id',
            'user_id'
        )->withTimestamps();
    }

    public function follow(int $userId)
    {
        if ($this->id === $userId) {
            return false;
        }

        return $this->followings()->syncWithoutDetaching([$userId]);
    }

    public function unfollow(int $userId)
    {
        if ($this->id === $userId) {
            return false;
        }

        return $this->followings()->detach($userId);
    }

    public function isFollowing(int $userId)
    {
        return $this->followings()
            ->where('follow_id', $userId)
            ->exists();
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}