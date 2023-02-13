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

        // $appointments = Appointment::where('patient_id', Auth::user()->id)->get();

//        $appointments = DB::table('appointments')
//            ->select('*')
//            ->where('patient_id', Auth::user()->id)
//            ->get();
//
//        $doctor_ids_array = $appointments->pluck('doctor_id')->toArray();
//
//
//        $user_ids = DB::table('doctors_data')
//            ->select('user_id')
//            ->where('id', $doctor_ids_array)
//            ->get();
//
//        $user_ids_array = $user_ids->pluck('$user_ids')->toArray();
//
//        $doctors_names = DB::table('users')
//            ->select('name')
//            ->where('id', $user_ids_array)
//            ->get();
//
//        dd($user_ids);

//        $doctors_names = User::where('id', $doctors_ids)->first(['name']);
//        $services = Service::where('id', $appointments->service_id)->first(['service']);
//
//        $appointments_table = new \MultipleIterator();
//        $appointments_table -> attachIterator(new \ArrayIterator($appointments));
//        $appointments_table -> attachIterator(new \ArrayIterator($doctors_names));
//        $appointments_table -> attachIterator(new \ArrayIterator($services));

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

        // dd($services_doctors);

 /*       foreach ($services_doctors as $service_doctor) {
            dd($service_doctor->name);
        }*/

        /*$names = User::query()->where('name', 'like', '%' .$search_keyword. '%')
            ->where('user_type', 'doctor')
            ->orWhere()
            ->get();*/

        // $doctors_ids_arr = $names->pluck('id')->toArray();

        // $doctors_datas = Doctors_data::where('user_id', $doctors_ids_arr)->get();

        /*$doctors_names = $names->pluck('name')->toArray();
        $doctor_data_arr = [];
        $i = 0;
        foreach (array_combine($doctors_ids_arr, $doctors_names) as $one_doctor => $name) {
            $doc_data = Doctors_data::where('user_id', $one_doctor)->first();

            $doctor_data_arr[$i]['education'] = $doc_data->education;
            $doctor_data_arr[$i]['work_address'] = $doc_data->work_address;
            $doctor_data_arr[$i]['name'] = $name;
            $i++;
            // dd($doctor_data_arr);
            // array_push($doctor_data_arr, $name);
            //$doctors_datas[] = array_push($doctor_data_arr, $name);
        }*/

        return view('appointments.search', [
            'services_doctors' => $services_doctors,
        ]);


        // $doctor_names = [];
        /*foreach ($names as $name) {
            $doctor_names[] = $name->name;
            $doctor_data = Doctors_data::where('user_id', $name->id)->get();
            $field_id_arr = $doctor_data->pluck('field_id')->toArray();
            $field = Field::where('id', $field_id_arr)->get();
            $fields= $field->pluck('field_id')->toArray();
        }

        return view('appointments.search', [
            'doctor_names' => $doctor_names,
            'fields' => $fields,
        ]);*/
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
        $field = Field::query()->where('id', $doctor_data->field_id)->first();

        $service = Service::where('service', $request->service)->first();

        /*$validator = Validator::make($request->all(), [
            'doctor_name' => ['required', 'string', 'max:10',Rule::exists((new Doctors_data())->getTable(), 'name')]
        ]);*/

        /*if($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }*/

        Appointment::create([
            'patient_id' => Auth::user()->id,
            'doctor_id' => $doctor_data->id,
            'field_id' => $field->id,
            'service_id' => $service->id,
            'time_date' => $request->date .' '. $request->time,
            'status' => 'waiting',
        ]);

        return view('appointments.success');

    }
}
