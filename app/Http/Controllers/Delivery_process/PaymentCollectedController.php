<?php

namespace App\Http\Controllers\Delivery_process;



use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Task_asigning;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Completed_order;
use Symfony\Component\Console\Input\Input;



class PaymentCollectedController extends Controller
{

 
    public function store_completed_orders(Request $request){

        $order_id =  $request->input('order_id', []);
        $order_completed_date =  $request->input('order_completed_date', []);
        $order_total =  $request->input('order_total', []);
        $deliver_person =  $request->input('deliver_person', []);
        
        $createArray = array(                    
            "order_id"=>$order_id,
            "order_completed_date"=>$order_completed_date,
            "order_total"=>$order_total,
            "deliver_person"=>$deliver_person,
        ); 

        for($x = 0; $x<sizeof($order_id); $x++){
            $store_completed_records = new Completed_order();
            $store_completed_records->order_id =  $createArray['order_id'][$x];
            $store_completed_records->order_completed_date =  $createArray['order_completed_date'][$x];
            $store_completed_records->order_total =  $createArray['order_total'][$x];
            $store_completed_records->deliver_person =  $createArray['deliver_person'][$x];
            $store_completed_records->save();
        }
      
        return redirect('/delivery_details_list')->with('status','Data Saved successfully!');
    } 
}
