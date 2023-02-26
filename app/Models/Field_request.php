<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field_request extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'field', 'requester_id', 'status', 'message', 'created_at', 'updated_at'
    ];
}
