<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors_data extends Model
{
    use HasFactory;

    protected $table = 'doctors_data';

    protected $fillable = [
        'user_id', 'field_id', 'education', 'experience', 'work_address', 'created_at', 'updated_at'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
