<?php

namespace App\Http\Controllers\Tasks;

use App\User;
use Illuminate\Http\Request;
use App\Models\Delivery_Info;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Task_asigning;

class Order_taskController extends Controller
{
    public function show_task_asigning_form($id){ 

        $get_order_id = Delivery_Info::find($id);
        $get_user_data = User::all();

        // $get_user_types = DB::table('users')->select('role_as')->get();
        // $get_user_emails= DB::table('users')->select('email')->where('role_as','=','deliver')->get();
        return view('admin.admin_tasks.task_form',compact(['get_order_id','get_user_data']));
       // dd($get_user_types);
      
 
    } 

    public function store_task_data(Request $request){
        $task_data = new Task_asigning();
        $task_data->order_id = $request->input('order_id');
        $task_data->email = $request->input('email');
        $task_data->asign_for = $request->input('asign_for');
        $task_data->reason= $request->input('reason');
        $task_data->from = $request->input('from');
        $task_data->to = $request->input('to');
        $task_data->description = $request->input('description');
        $task_data->save();

        $get_order_id = $request->input('order_id');
        $update_order_status = Delivery_Info::find($get_order_id);
        $update_order_status->order_status = $request->input('order_status');
        $update_order_status->save();
       
        return redirect('/cus_orders_list')->with('status','Task Data recorded Successfully!');
    }

    



    
}
