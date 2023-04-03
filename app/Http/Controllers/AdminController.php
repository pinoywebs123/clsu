<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Sub;
use App\Models\Department;
use App\Models\Unit;
use App\Models\Supply;
use App\Models\RequestSupply;
use App\Models\NewStock;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use PDF;
use QrCode;
use App\Models\Log;
use DB;


class AdminController extends Controller
{

    public function home()
    {
        $pending_request = RequestSupply::where('status_id',0)->count();
        $approve_request = RequestSupply::where('status_id',1)->count();

        $monthly_income = RequestSupply::where('request_supplies.status_id',2)
                            ->join('supplies','request_supplies.supply_id','supplies.id')
                            ->select(DB::raw('sum(supplies.price * request_supplies.quantity) as per_sales'))
                           
                            ->get();
         $annual =  $monthly_income[0]->per_sales;
                            
        return view('admin.home',compact('pending_request','approve_request','annual'));
    }

    public function logs()
    {
        $logs = Log::all();
        return view('admin.logs',compact('logs'));
    }

    public function users()
    {
        $users = User::all();
        $departments = Department::all();
        $requested_supplies = RequestSupply::where('status_id', 0)->orderBy('id','desc')->get();
        return view('admin.users',compact('users','departments', 'requested_supplies'));
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
        $subs = Sub::all();
        $requested_supplies = RequestSupply::where('status_id', 0)->orderBy('id','desc')->get();

        if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('warehouse'))
        {
            $supplies = Supply::all();
        }elseif( Auth::user()->hasRole('department') )
        {
             $supplies = Supply::where('department_id',Auth::user()->department_id)->get();
        }

        return view('admin.supplies',compact('categories','supplies','departments','units','subs', 'requested_supplies'));
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
        Log::create(['user_id'=> Auth::id(),'activity'=> 'Supply with code '.$validated['supply_code'].' was Added Successfully']);
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
        $requested_supplies = RequestSupply::where('status_id', 0)->orderBy('id','desc')->get();
        return view('admin.departments',compact('departments', 'requested_supplies'));
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
        $qr_scans = Supply::where('supply_code', $request->qr_code)
                ->join('request_supplies', 'supplies.id', '=', 'request_supplies.supply_id')
                ->join('users','request_supplies.requester_id','users.id')
                ->join('departments','departments.id','supplies.department_id')
                ->select('supplies.supply_code', 'supplies.description', 'request_supplies.status_id', 'request_supplies.quantity', 'users.first_name', 'users.last_name', 'departments.name as dept_name')
                ->get();
        return response()->json( $qr_scans );
    }

    public function restock_supplies(Request $request)
    {
         $find = Supply::where('id', $request->supply_id)->first();
         if($find)
         {
            $find->update(['quantity'=> $find->quantity + $request->quantity_order]);
            $new_stock =  new NewStock;
            $new_stock->supply_id = $find->id;
            $new_stock->user_id = Auth::id();
            $new_stock->quantity = $request->quantity_order;
            $new_stock->save();
            return redirect()->back()->with('success','Supply Stock Updated Successfully!');

         }

    }

    public function find_category(Request $request)
    {
        $subs = Sub::where('category_id', $request->category_id)->get();
        return response()->json($subs);
    }

    public function print_supplies($id)
    {
        $find = Supply::find($id);

        return view('reports.qr_code',compact('find'));
    }

    public function forms()
    {
        $requested_supplies = RequestSupply::where('status_id', 0)->orderBy('id','desc')->get();
        return view('admin.forms', compact('requested_supplies'));
    }

    public function print_forms($form)
    {
        // $pdf = PDF::loadView('reports.iar');
        // return $pdf->stream('iar.pdf');

        return view('reports.'.$form);
    }
}
