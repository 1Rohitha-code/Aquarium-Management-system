<?php

namespace App\Http\Controllers\Deliver;

use Illuminate\Http\Request;
use App\Models\Delivery_Info;
use App\Models\Task_asigning;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;


class Deliver_personController extends Controller
{
    public function show_dashbaord(){
        $logged_in_user_mail= Auth::user()->email;

        $get_task_count = DB::table('task_asignings')->where('email','=',$logged_in_user_mail)->count();


        $delivered_order_count = DB::table('delivery__infos')
        ->join('task_asignings','delivery__infos.id','=','task_asignings.order_id')
        ->select('delivery__infos.order_status','task_asignings.email')
        ->where('task_asignings.deleted_at','!=',NULL) 
        ->where('task_asignings.email','=', $logged_in_user_mail)
        ->count();
         
     // dd($delivered_order_count);
      return view('deliver-person.dashboard',compact(['get_task_count','delivered_order_count']));
      
    }


    
    public function show_order_data(){
        $logged_in_user_mail= Auth::user()->email;
        $admin_task = DB::table('task_asignings')->where('email', '=', $logged_in_user_mail)->get();

        $task_data_with_delivery_info = DB::table('delivery__infos')
        ->join('task_asignings', 'delivery__infos.id', '=', 'task_asignings.order_id')
        ->where('task_asignings.email', '=', $logged_in_user_mail)
        ->select('delivery__infos.*', 'task_asignings.*')
        ->latest('task_asignings.created_at')
        ->get();
        
 return view('deliver-person.order_data', compact(['task_data_with_delivery_info','get_p_data']));
        
    }



    public function see_more_data($id){

      $cus_info = Delivery_Info::find($id);
    return view('deliver-person.delivery_details',compact('cus_info'));
    }
 
    public function update_delivery_status(Request $request,$id){
      $update_order_status = Delivery_Info::find($id);
      $update_order_status->order_status = $request->input('order_status');
      $update_order_status->save();

      //return path and the popup is depend on what deliver person selects
            if($update_order_status->order_status == "Handed over to the customer"){
                return redirect('/order_details')->with('status', 'Status Updated.Please Collect the payment');
            }else{
              return redirect('/order_details')->with('status', 'Status Updated.');
            }
     
    }

    public function soft_delete_task($id){ 
      $soft_delete_task = Task_asigning::find($id);
      $soft_delete_task->delete(); 
      
      if($soft_delete_task != NULL){
        $soft_delete_task->payment_status = "Done";
        $soft_delete_task->save();
      }
      
     return redirect('/order_details')->with('status', 'Payment Recorded. Thank you for your service!.');
    }
   
    public function show_my_history(){

      $logged_in_user_mail= Auth::user()->email;

      $completed_task_details = DB::table('delivery__infos')
      ->join('task_asignings','delivery__infos.id','=','task_asignings.order_id')
      ->select('delivery__infos.*','task_asignings.*')
      ->where('task_asignings.deleted_at','!=',NULL) 
      ->where('task_asignings.email','=', $logged_in_user_mail)
      ->get();


      return view('deliver-person.deliver_history.completed_tasks',compact('completed_task_details'));
    }

   


}
