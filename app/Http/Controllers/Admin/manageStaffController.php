<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctors_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                    <h2 class="ml-5" style="font-size: 18px"><label class="text-blue-600 mt-1" style="font-size: 18px" >Work Address: </label>'. $doctor->experience .'</h2>
                    <h2 class="ml-5" style="font-size: 18px"><label class="text-blue-600 mt-1" style="font-size: 18px" >Experience: </label> '. $doctor->work_address .'</h2>
                </div>
            </div>
            '
            ;
        }

        return response($output);

    }
}
