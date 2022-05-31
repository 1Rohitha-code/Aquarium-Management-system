<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\Delivery_Info;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckMyOrdersController extends Controller
{
    public function show_my_orders(){

         $logged_in_cus_mail = Auth::user()->email;

        $delivery_info =  DB::table('delivery__infos')
        ->leftJoin('task_asignings', 'delivery__infos.id', '=', 'task_asignings.order_id')
        ->select('delivery__infos.*','task_asignings.to','task_asignings.deleted_at','task_asignings.payment_status')
        ->where('delivery__infos.email',$logged_in_cus_mail)
        ->latest('created_at','desc')
        ->get();
        
   

    return view('normal-user-pages.check_my_orders.my_orders_list',compact('delivery_info'));
    }

    public function my_order_details($id){
        $cus_info = Delivery_Info::find($id);

        $order_data = DB::table('delivery__infos')
        ->join('order_items', 'delivery__infos.id', '=', 'order_items.order_id')
        ->select('order_items.*', 'delivery__infos.*')
        ->where('order_id','=',$id)
        ->get();

       return view('normal-user-pages.check_my_orders.my_order_details',compact(['cus_info','order_data']));
    }

    public function delete_my_order($id){
        $delete_my_order = Delivery_Info::find($id);
        $delete_my_order->delete(); 
        return redirect('/my_orders')->with('status','The Item has been deleted successfully!');
    }

    public function show_completed_orders(){
        $logged_in_cus_mail = Auth::user()->email;

        $order_history =  DB::table('delivery__infos')
        ->leftJoin('task_asignings', 'delivery__infos.id', '=', 'task_asignings.order_id')
        ->select('delivery__infos.*','task_asignings.to','task_asignings.deleted_at','task_asignings.payment_status')
        ->where('delivery__infos.email',$logged_in_cus_mail)
        ->where('deleted_at','!=',NULL)
        ->latest('created_at','desc')
        ->get();

       // dd($order_history);

        return view('normal-user-pages.check_my_orders.completed_orders',compact('order_history'));


    }
}
