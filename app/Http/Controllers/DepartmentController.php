<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supply;
use App\Models\RequestSupply;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    
    public function request()
    {
        $requested_supplies = RequestSupply::where('status_id',0)->orWhere('status_id',1)->where('requester_id', Auth::id())->get();
        return view('department.request',compact('requested_supplies'));
    }

    public function request_check(Request $request)
    {
        $validated = $request->validate([
            'supply_id' => 'required|max:255',
            'quantity_order'    => 'required|max:255'
        ]);

        $find = Supply::where('id', $request->supply_id)->first();
        if($find)
        {
          
            $remain_quantity = intval($find->quantity) - intval($request->quantity_order);

            if( $remain_quantity < 0  )
            {
                return redirect()->back()->with('error','Not Enough Quantity Stock');
            }else 
            {
                $save = new RequestSupply;
                $save->supply_id        = $request->supply_id;
                $save->requester_id     = Auth::id();
                $save->quantity         = $request->quantity_order;
                $save->status_id        = 0;
                $save->save();
                return redirect()->back()->with('success','Requested Successfully!');
            }
        }
        return $request->all();
    }

    public function received_supply(Request $request)
    {
        $find = RequestSupply::where('id', $request->request_id)->first();
        if($find)
        {
            $find->update(['status_id'=> 2]);
            return redirect()->back()->with('success','Received Supply Successfully!');
        }
        
    }

    public function return_supply(Request $request)
    {
         $find = RequestSupply::where('id', $request->request_id)->first();
        if($find)
        {
            $find->update(['status_id'=> 3]);
            return redirect()->back()->with('success','Attempt to Return Supply Successfully!');
        }
    }

    public function history()
    {
        $requested_supplies = RequestSupply::where('status_id',2)->orWhere('status_id',3)->where('requester_id', Auth::id())->get();
        return view('department.history',compact('requested_supplies'));
    }
}
