<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Field_request;
use App\Models\Message;
use Illuminate\Http\Request;

class ManageRequestsController extends Controller
{
    public function index() {
        return view('manage_requests.index');
    }

    public function create_field_request(Request $request) {

        $validation = $request->validate([
            'field' => 'string|required',
        ]);

        if($request->message) {
            $message = $request->message;
        } else {
            $message = 'empty';
        }

        Field_request::query()->create([
            'field' => $request->field,
            'requester_id' => auth()->user()->id,
            'message' => $message,
        ]);



        return back()->with('success', 'Field request has been created.');
    }

    public function create_custom_request(Request $request) {

        $validation = $request->validate([
            'request_content' => 'required|string'
        ]);

        Message::query()->create([
            'user_id' => auth()->user()->id,
            'content' => $request->request_content,
        ]);

        return back()->with('success', 'Your request has been created.');

    }


}
