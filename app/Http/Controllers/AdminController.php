<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function home()
    {
        return view('admin.home');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function supplies()
    {
        return view('admin.supplies');
    }

    public function departments()
    {
        return view('admin.departments');
    }
}
