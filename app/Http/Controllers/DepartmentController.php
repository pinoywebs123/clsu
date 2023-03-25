<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    
    public function request()
    {
        return view('department.request');
    }

    public function history()
    {
        return view('department.history');
    }
}
