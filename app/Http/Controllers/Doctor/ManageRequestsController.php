<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Field_request;
use Illuminate\Http\Request;

class ManageRequestsController extends Controller
{
    public function index() {
        return view('manage_requests.index');
    }

    public function create_field_request(Request $request) {

        $validation = $request->validate([
            'field' => 'string|required',
            'message' => 'string'
        ]);

        Field_request::query()->create([
            'field' => $request->field,
            'requester_id' => auth()->user()->id,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Request created successfully!');
    }
}
