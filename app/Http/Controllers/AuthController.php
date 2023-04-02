<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Log;

use Spatie\Permission\Models\Role;

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


        $user = User::create($validated);

        $user->assignRole('department');

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
            if( Auth::user()->hasRole('admin') )
            {
                Log::create(['user_id'=> Auth::id(),'activity'=> 'Login Successfully']);
                return redirect()->route('admin_home');  
            }else if( Auth::user()->hasRole('department') )
            {
                Log::create(['user_id'=> Auth::id(),'activity'=> 'Login Successfully']);
                return redirect()->route('admin_supplies');  
            }else if( Auth::user()->hasRole('warehouse') )
            {
                Log::create(['user_id'=> Auth::id(),'activity'=> 'Login Successfully']);
                return redirect()->route('admin_supplies'); 
            }

            
            
        }else 
        {
            return back()->with('error','Invalid Email/Password Combination');
        }
    }

    public function logout()
    {
        Log::create(['user_id'=> Auth::id(),'activity'=> 'Logout Successfully']);
        Auth::logout();
        
        return redirect('/login');
    }

}
