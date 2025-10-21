<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    public function request()
    {
        return $this->belongsTo(OppasRequest::class, 'opas_request_id');
    }

    public function sitter()
    {
        return $this->belongsTo(Sitter::class, 'sitter_id');
    }
}
