<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors_data extends Model
{
    use HasFactory;
    protected $table = 'doctors_data';

    public function user(){
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
