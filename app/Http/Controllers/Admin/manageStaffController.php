<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctors_data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Table;

class manageStaffController extends Controller
{
    public function index(Request $request) {

        /*$doctors = DB::table('doctors_data')
            ->join('users', 'doctors_data.user_id', '=', 'users.id')
            ->join('fields', 'doctors_data.field_id', '=', 'fields.id')
            ->select('users.name', 'fields.field', 'doctors_data.education', 'doctors_data.experience', 'doctors_data.work_address')
            ->where('users.name', 'like', '%'. $request->search .'%')
            ->orWhere('fields.field', 'like', '%'. $request->search .'%')
            ->get();

        foreach ($doctors as $doctor) {
            dd($doctor);
        }*/

        return view('manageStaff.index');
    }

    public function search (Request $request) {

        $output = "";

        $validation = $request->validate([
            'search' => 'string|alpha:ascii|max:50'
        ]);

        $doctors = DB::table('doctors_data')
            ->join('users', 'doctors_data.user_id', '=', 'users.id')
            ->join('fields', 'doctors_data.field_id', '=', 'fields.id')
            ->select('users.name', 'fields.field', 'doctors_data.education', 'doctors_data.experience', 'doctors_data.work_address')
            ->where('users.name', 'like', '%'. $request->search .'%')
            ->orWhere('fields.field', 'like', '%'. $request->search .'%')
            ->get();

        foreach ($doctors as $doctor ) {
            $output.=

            '
            <div class="mb-5" style="display: flex">
                <div>
                    <img src="/images/default-profile.jpg" style="min-width: 150px; height: 150px">
                </div>
                <div style="display: block; min-width: 700px">
                    <h2 class="ml-5" style="font-size: 18px"><label class="text-blue-600 mt-1" style="font-size: 18px" >Name: </label>'. $doctor->name .'</h2>
                    <h2 class="ml-5" style="font-size: 18px"><label class="text-blue-600 mt-1" style="font-size: 18px" >Field: </label>'.  $doctor->field  .'</h2>
                    <h2 class="ml-5" style="font-size: 18px"><label class="text-blue-600 mt-1" style="font-size: 18px" >Education: </label>'. $doctor->education .'</h2>
                    <h2 class="ml-5" style="font-size: 18px"><label class="text-blue-600 mt-1" style="font-size: 18px" >Experience: </label>'. $doctor->experience .'</h2>
                    <h2 class="ml-5" style="font-size: 18px"><label class="text-blue-600 mt-1" style="font-size: 18px" >Work Address: </label> '. $doctor->work_address .'</h2>
                </div>
            </div>
            '
            ;
        }

        return response($output);

    }

    public function store(Request $request) {

        $result = "";

        /*$validation = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);*/

        User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'doctor'
        ]);

        $result .=

        '
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mt-5" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold text-md">Success!</p>
                    <p class="text-md">New doctor has been registered</p>
                </div>
            </div>
        </div>

        ';

        return response($result);
    }

}

/*regex:^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=.*[\W_]+))(?=\S*[\d])\S*$*/
