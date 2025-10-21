<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OppasRequest extends Model
{
    use HasFactory;

    protected $table = 'oppas_requests';

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
