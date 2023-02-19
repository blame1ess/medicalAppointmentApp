<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminAppointmentsController extends Controller
{
    public function index() {
        return view('adminAppointments.index');
    }
}
