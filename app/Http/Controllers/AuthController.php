<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Models\Department;

class AuthController extends Controller
{
    
    public function register()
    {
        $departments = Department::all();
         return view('auth.register',compact('departments'));
    }

    public function register_check(Request $request)
    {
        $validated = $request->validate([
            'email'             => 'required|unique:users|max:255',
            'first_name'        => 'required',
            'last_name'         => 'required',
            'password'          => 'required|max:12|min:6',
            'repeat_password'   => 'required|same:password',
            'department_id'     => 'required'
        ]);

        $validated['status_id'] = 1;
        $validated['password'] = bcrypt($validated['password']);


        User::create($validated);

        return redirect()->back()->with('success','Registered Successfully!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function login_check(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:30',
            'password' => 'required|max:12',
        ]);

        if(Auth::attempt($validated))
        {
            return redirect()->route('admin_home');
        }else 
        {
            return back()->with('error','Invalid Email/Password Combination');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
