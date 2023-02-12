<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_data extends Model
{
    use HasFactory;

    public $table = 'patients_data';

    protected $fillable = [
        'user_id', 'name', 'phone_number', 'email', 'address', 'blood_type'
    ];
}
