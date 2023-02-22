<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Message;
use App\Models\Patient_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminAppointmentsController extends Controller
{
    public function index() {

        $table = DB::table('appointments')
            ->join('patients_data', 'appointments.patient_id', '=', 'patients_data.id')
            ->join('doctors_data', 'appointments.doctor_id', '=', 'doctors_data.id')
            ->join('users as patients', 'patients_data.user_id', '=', 'patients.id')
            ->join('users as doctors', 'doctors_data.user_id', '=', 'doctors.id')
            ->join('services', 'appointments.service_id', '=', 'services.id')
            ->select('appointments.id', 'doctors.name as doctor_name', 'patients.name as patient_name', 'services.service', 'appointments.time_date', 'appointments.status')
            ->orderByDesc('id')
            ->get();

        return view('adminAppointments.index', [
            'table' => $table,
        ]);
    }

    public function accept($id) {

        $appointment = Appointment::query()->findOrFail($id);
        $appointment->status = 'approved';
        $appointment->save();

        $user = Appointment::query()->findOrFail($id);
        $user_id = Patient_data::query()->where('id', $user->patient_id)->first('user_id');

        Message::query()->create([
            'user_id' => $user_id->user_id,
            'content' => 'The status of your appointment number #'. $id . ' has been changed to approved',
        ]);

        /*Message::query()->create([
            'user_id' => $id
        ]);*/
        return redirect(route('admin.appointments'));

    }

    public function decline($id) {
        $appointment = Appointment::query()->findOrFail($id);
        $appointment->status = 'declined';
        $appointment->save();

        $user = Appointment::query()->findOrFail($id);
        $user_id = Patient_data::query()->where('id', $user->patient_id)->first('user_id');

        Message::query()->create([
            'user_id' => $user_id->user_id,
            'content' => 'The status of your appointment number #'. $id . ' has been changed to declined',
        ]);

        return redirect(route('admin.appointments'));
    }
}
