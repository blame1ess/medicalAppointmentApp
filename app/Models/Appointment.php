<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Doctors_data $doctor
 *
 */
class Appointment extends Model
{
    use HasFactory;


    protected $fillable = [
        'patient_id', 'doctor_id', 'service_id', 'time_date', 'status', 'created_at', 'updated_at'
    ];
//    public function user() {
//        return $this->hasOne(User::class, 'patient_id', 'id');
//    }

    public function doctor() {
        return $this->belongsTo(Doctors_data::class, 'doctor_id', 'id');
    }


}
