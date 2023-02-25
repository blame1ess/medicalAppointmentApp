<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctors_data;
use App\Models\Field;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class doctorPersonalDataController extends Controller
{
    public function index() {

        $existence = Doctors_data::query()->where('user_id', auth()->user()->id)->first();

        $fields = Field::query()->get()->toArray();

        $doctor_data = DB::table('doctors_data')
            ->where('user_id', Auth::user()->id)
            ->join('fields', 'doctors_data.field_id', '=', 'fields.id')
            ->select('fields.field', 'doctors_data.education', 'doctors_data.experience', 'doctors_data.work_address')
            ->get()
            ->toArray();

        return view('doctorPersonalData.index', [
            'existence' => $existence,
            'fields' => $fields,
            'doctor_data' => $doctor_data[0],
        ]);
    }

    public function store(Request $request) {

        $validation = $request->validate([
            'education' => 'string|required',
            'experience' => 'required|string',
            'work_address' => 'required|string',
        ]);

        Doctors_data::query()->create([
            'user_id' => Auth::user()->id,
            'field_id' => Field::where('field', $request->field)->first('id')->id,
            'education' => $request->education,
            'experience' => $request->experience,
            'work_address'=> $request->work_address
        ]);

        return redirect(route('doctor.personal_data'));

    }

    public function update(Request $request) {

        $result = "";

        $validation = $request->validate([
            'education' => 'string|required',
            'experience' => 'required|string',
            'work_address' => 'required|string',
        ]);

        Doctors_data::query()->where('user_id', Auth::user()->id)->update([
            'education' => $request->education,
            'experience' => $request->experience,
            'work_address' => $request->work_address,
            'field_id' => Field::where('field', $request->field)->first('id')->id,
        ]);

        $result .=
            '
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mt-5" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold text-md">Success!</p>
                        <p class="text-md">Data has been updated. Do not forget to refresh page</p>
                    </div>
                </div>
            </div>
            ';

        return response($result);

    }


}
