<?php

namespace App\Http\Controllers;

use App\Models\Patient_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalDataController extends Controller
{
    public function personal_data(Request $request) {


        $patient_data = Patient_data::where('user_id', Auth::user()->id)->first();

        return view('personal_data', [
            'patient_data' => $patient_data,
        ]);
    }

    public function create(Request $request) {

        Patient_data::create([
            'user_id' => Auth::user()->getAuthIdentifier(),
            'name' => Auth::user()->name,
            'phone_number' => $request->phone_number,
            'email' => Auth::user()->email,
            'address' => $request->address,
            'blood_type' => $request->blood_type,
        ]);

        return redirect(route('personal_data'));

    }

    /*public function edit(Request $request, $id) {

    }

    public function update(Request $request) {

    }*/

    public function destroy($id) {

        Patient_data::where('user_id', $id)->delete();

        return redirect()->route('personal_data');

    }

}
