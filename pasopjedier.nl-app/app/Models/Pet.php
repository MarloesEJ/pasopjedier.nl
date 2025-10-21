<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $casts = ['needs' => 'array'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function requests()
    {
        return $this->hasMany(OppasRequest::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'model');
    }
}
