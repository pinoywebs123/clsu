<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    
    public function home()
    {
        return view('admin.home');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users',compact('users'));
    }

    public function supplies()
    {
        return view('admin.supplies');
    }

    public function departments()
    {
        return view('admin.departments');
    }

    public function users_check(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|max:12|min:6',
            'repeat_password' => 'required|same:password',
        ]);

        $validated['status_id'] = 1;
        $validated['password'] = bcrypt($validated['password']);


        User::create($validated);

        return redirect()->back()->with('success','Registered Successfully!');
    }

    public function delete_user(Request $request)
    {
        $find = User::find($request->user_id);
        if($find)
        {
            $find->delete();
            return redirect()->back()->with('success','User Deleted Successfully!');
        }
    }

    public function find_user(Request $request)
    {
        $find = User::find($request->user_id);
        return response()->json($find);
    }

    public function update_user(Request $request)
    {
        $find = User::find($request->user_id);
        if($find)
        {
            $find->update([
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email
            ]);
            return redirect()->back()->with('success','User Updated Successfully!');
        }
    }
}
