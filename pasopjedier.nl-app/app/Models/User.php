<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }

    public function sitterProfile()
    {
        return $this->hasOne(SitterProfile::class);
    }

    public function ownedRequests()
    {
        return $this->hasMany(OppasRequest::class, 'owner_id');
    }

    public function responses()
    {
        return $this->hasMany(OppasResponse::class, 'sitter_id');
    }

    public function blocksMade()
    {
        return $this->hasMany(Block::class, 'blocker_id');
    }

    public function blocksReceived()
    {
        return $this->hasMany(Block::class, 'blocked_id');
    }
}

