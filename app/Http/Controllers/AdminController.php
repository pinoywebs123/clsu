<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Department;
use App\Models\Unit;
use App\Models\Supply;
use App\Models\RequestSupply;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function home()
    {
        return view('admin.home');
    }

    public function users()
    {
        $users = User::all();
        $departments = Department::all();
        return view('admin.users',compact('users','departments'));
    }

    public function request_supplies()
    {
        $requested_supplies = RequestSupply::orderBy('id','desc')->get();
        return view('admin.requester',compact('requested_supplies'));
    }

    public function supplies()
    {
        $categories = Category::all();
        $units = Unit::all();
        $departments = Department::all();
        if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('warehouse'))
        {
            $supplies = Supply::all();
        }elseif( Auth::user()->hasRole('department') )
        {
             $supplies = Supply::where('department_id',Auth::user()->department_id)->get();
        }
        
        return view('admin.supplies',compact('categories','supplies','departments','units'));
    }

    public function supplies_check(Request $request)
    {
        $validated = $request->validate([
            'department_id'     => 'required',
            'category_id'       => 'required',
            'sub_id'       => 'required',
            'unit_id'           => 'required',
            'description'       => 'required',
            'supply_code'       => 'required|unique:supplies',
            'price'             => 'required',
            'quantity'             => 'required',
        ]);

        $validated['status_id'] = 1;
        $validated['user_id']   = Auth::id();
        $validated['qr_code']   = rand(123456789,987654321);

        Supply::create($validated);
        return redirect()->back()->with('success','Supply Created Successfully!');
    }

    public function find_supplies(Request $request)
    {
        $find =  Supply::find($request->supply_id);
        return response()->json($find);
    }

    public function update_supplies(Request $request)
    {
         $validated = $request->validate([
            'department_id'     => 'required',
            'category_id'       => 'required',
            'unit_id'           => 'required',
            'description'       => 'required',
            'supply_code'       => 'required',
            'price'             => 'required',
            'supply_id'         => 'required'
        ]);

        $find =  Supply::find($request->supply_id);
        if($find)
        {
            unset($validated['supply_id']);
            $find->update($validated);
            return redirect()->back()->with('success','Supply Updated Successfully!');
        }

    }

    public function departments()
    {
        $departments = Department::all();
        return view('admin.departments',compact('departments'));
    }

    public function departments_check(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        $validated['status_id'] = 1;
        Department::create($validated);
        return redirect()->back()->with('success','Department Created Successfully!');
    }

    public function delete_department(Request $request)
    {
       $find = Department::find($request->department_id);
        if($find)
        {
            $find->delete();
            return redirect()->back()->with('success','Department Deleted Successfully!');
        }
    }

    public function find_department(Request $request)
    {
        $find = Department::find($request->department_id);
        return response()->json($find);
    }

    public function update_department(Request $request)
    {
        $find = Department::find($request->department_id);
        if($find)
        {
            $find->update([
                'name'    => $request->name,
                
            ]);
            return redirect()->back()->with('success','Department Updated Successfully!');
        }
    }

    public function users_check(Request $request)
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

    public function approve_supplies(Request $request)
    {

           
        $find = RequestSupply::where('id', $request->request_id)->first();
        if($find)
        {
            $find_supply = Supply::find($find->supply_id);

            if($find_supply->quantity < $find->quantity)
            {
               return redirect()->back()->with('success','Not Enough Supply');
            }
            $balance_stock = $find_supply->quantity - $find->quantity;
            $find->update(['status_id'=> 1]);
            $find_supply->update(['quantity'=> $balance_stock]);
            return redirect()->back()->with('success','Approved Supply Successfully!');
        }
    }

    public function cancel_supplies(Request $request)
    {
        $find = RequestSupply::where('id', $request->request_id)->first();
        if($find)
        {
            $find->delete();
            return redirect()->back()->with('success','Delete Supply Successfully!');
        }
    }

    public function scan_qr_code()
    {
        return view('admin.qr_code');
    }

    public function scan_qr_code_check(Request $request)
    {
        $find = Supply::where('qr_code', $request->qr_code)->first();
        return response()->json( $find );
    }
}
