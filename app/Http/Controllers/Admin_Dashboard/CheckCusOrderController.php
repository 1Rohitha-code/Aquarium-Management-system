<?php

namespace App\Http\Controllers\Admin_Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Delivery_Info;
use App\Models\Order_item;
use App\Models\Order_state;
use Psy\Util\Json;

class CheckCusOrderController extends Controller
{
    public function check_cus_orders(){
    
     
    
    //   $delivery_info = DB::table('delivery__infos')->get();
       $delivery_info = DB::table('delivery__infos')
       ->orderBy('created_at', 'desc')
       ->get();
     // dd($delivery_info);
      return view('admin.cus_orders.cus_order_list',compact('delivery_info'));

  
    }

 
    //fetch data using popup modal
    public function view_order_details($id){
      
       return Delivery_Info::find($id);
     
    }

    public function update_order_state(Request $request, $id){
        $update_status = Delivery_Info::find($id);

        $update_status->order_status = $request->input('order_status');

        $update_status->save();

     $request->session()->flash('statuscode', 'info');
     return redirect('/cus_orders_list')->with('status','status updated successfully!');
    }
    
   
   

}

