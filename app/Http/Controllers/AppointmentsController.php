<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctors_data;
use App\Models\Field;
use App\Models\Patient_data;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Guid\Fields;

class AppointmentsController extends Controller
{

    public function index() {


        //$appointments = Appointment::all();

        /*foreach ($appointments as $appointment) {
            $user_id = $appointment->doctor->user_id;
            $doctors = Doctors_data::all();
            foreach ($doctors as $doctor) {
                $doctor_id = $doctor->user->name;
                dd($doctor_id);
            }
        }*/

        $appointments = Appointment::query()
            ->where('patient_id', Auth::user()->id)
            ->get()
            ->toArray();

        $i = 0;
        $table_datas = [];


        foreach ($appointments as $appointment) {
            $table_datas[$i][] = $appointment['id'];

            $doctor_id = Doctors_data::where('id', $appointment['doctor_id'])->first();
            $doctor_name = User::where('id', $doctor_id->user_id)->first();
            $table_datas[$i][] = $doctor_name->name;

            $service_name = Service::where('id', $appointment['service_id'])->first();
            $table_datas[$i][] = $service_name->service;

            $table_datas[$i][] = $appointment['time_date'];
            $table_datas[$i][] = $appointment['status'];

            $i++;
        }

        return view('appointments.index', [
            'fields' => Field::get(),
            'table_datas' => $table_datas,
           // 'doctors_names' => $doctors_names,
           // 'services' => $services
        ]);
    }

    public function search(Request $request) {

        // for search
        $search_keyword = $request->search_name;

        $services_doctors = DB::table('users')
            ->join('doctors_data', 'users.id', '=', 'doctors_data.user_id')
            ->join('fields', 'fields.id', '=', 'doctors_data.id')
            ->join('services', 'doctors_data.id', '=', 'services.field_id')
            ->select('users.name', 'fields.field', 'doctors_data.education', 'doctors_data.work_address')
            ->where('name', 'like', '%' .$search_keyword. '%')
            ->orWhere('service', 'like', '%' .$search_keyword. '%')
            ->distinct('name')
            ->get()
            ->toArray();

        // filled personal data check:

        $id_exist = Patient_data::query()->where('user_id', Auth::user()->id)->first();


        if($id_exist) {
            $data_checker = true;
        } else {
            $data_checker = false;
        }

        return view('appointments.search', [
            'services_doctors' => $services_doctors,
            'data_checker' => $data_checker,
        ]);

    }

    public function create($name) {

        $doctor = User::where('name', $name)->first();

        $field = Doctors_data::where('user_id', $doctor->id)->first();

        // $field_name = Fields::where('id', $field_id)->get('field');

        $services = Service::where('field_id', $field->id)->get();

        $user_id = Auth::user()->id;
        $patient_data = Patient_data::where('user_id', $user_id)->first();

        return view('appointments.create', [
            'name' => $name,
            'services' => $services,
            'patient_data' => $patient_data,
        ]);
    }

    public function store(Request $request) {

        $doctor = User::where('name', $request->doctor_name)->first();
        $doctor_data = Doctors_data::where('user_id', $doctor->id)->first();
        $service = Service::where('service', $request->service)->first();
        $patient_id = Patient_data::query()->where('user_id', Auth::user()->id)->first();

        /*$validator = Validator::make($request->all(), [
            'doctor_name' => ['required', 'string', 'max:10',Rule::exists((new Doctors_data())->getTable(), 'name')]
        ]);*/

        /*if($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }*/

        Appointment::create([
            'patient_id' => $patient_id->id,
            'doctor_id' => $doctor_data->id,
            'service_id' => $service->id,
            'time_date' => $request->date .' '. $request->time,
            'status' => 'waiting',
        ]);

        return view('appointments.success');

    }

    public function edit($id) {
        return view('appointments.edit');
    }

    public function destroy($id) {

    }

}
