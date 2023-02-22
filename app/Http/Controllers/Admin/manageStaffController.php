<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class manageStaffController extends Controller
{
    public function index() {
        return view('manageStaff.index');
    }
}
