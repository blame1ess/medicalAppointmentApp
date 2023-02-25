<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageRequestsController extends Controller
{
    public function index() {
        return view('manage_requests.index');
    }
}
