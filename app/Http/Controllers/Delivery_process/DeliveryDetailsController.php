<?php

namespace App\Http\Controllers\Delivery_process;

use Carbon\Carbon;
use Dotenv\Result\Result;
use Illuminate\Http\Request;
use App\Models\Delivery_Info;
use App\Models\Task_asigning;
use App\Models\Completed_order;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class DeliveryDetailsController extends Controller
{
    public function show_delivery_details(){
        $no_of_asigned = DB::table('task_asignings')
        ->select('task_asignings.email',DB::raw('COUNT(email) as count'))
        ->groupBy('email') 
        ->orderBy('count')
        ->get();

        //displays the number of orders completed by deliver
        $no_of_cmpltd_by_deliver = DB::table('task_asignings') 
        ->select('task_asignings.email',DB::raw('COUNT(deleted_at) as count'))
        ->groupBy('email')
        ->orderBy('count')
        ->get();

        
        $cancelled_orders = DB::table('delivery__infos')
        ->join('task_asignings','delivery__infos.id','=','task_asignings.order_id')
        ->select('task_asignings.email',DB::raw('COUNT(order_status) as count'))
        ->where('order_status','=','Delivery process cancelled')
        ->groupBy('email','order_id')
        ->orderBy('count')
        ->get();

        $no_of_remainings = DB::table('task_asignings') 
        ->rightJoin('delivery__infos','task_asignings.order_id','=','delivery__infos.id')
        ->select('task_asignings.email',DB::raw('COUNT(order_id) as count'))
        ->where('task_asignings.deleted_at','=',NULL)
        ->where('delivery__infos.order_status','!=','Delivery process cancelled')
        ->groupBy('email')
        ->orderBy('count')
        ->get();

         //Admin clears order details with Deliver
         $no_of_cleared = DB::table("completed_orders")
         ->select('completed_orders.deliver_person',DB::raw('COUNT(order_completed_date) as count'))
         ->groupBy('deliver_person')
         ->orderBy('count')
         ->get();

      return view('admin.delivery_process.deliver_details_list',compact(['no_of_asigned','no_of_cmpltd_by_deliver','no_of_remainings','no_of_cleared','cancelled_orders']));
    }

    public function check_deliver_profile($email){

        $individual_order = DB::table('task_asignings')
        ->join('delivery__infos','task_asignings.order_id','=','delivery__infos.id')
        ->leftJoin('completed_orders','task_asignings.order_id','=','completed_orders.order_id')
        ->select('task_asignings.*','delivery__infos.*','delivery__infos.email','task_asignings.created_at','task_asignings.id')
        ->where('completed_orders.order_id','=',NULL)
        ->where('task_asignings.email','=',$email)
        ->latest('from','desc')
        ->get();

        $deliver_person_mail = $email;

        $get_deliver_name = DB::table('users')
        ->select('name')
        ->where('email','=',$deliver_person_mail)
        ->first();
  
        $order_cancelled_date = DB::table('task_asignings')
        ->join('delivery__infos','task_asignings.order_id','=','delivery__infos.id')
        ->select('task_asignings.order_id','delivery__infos.updated_at')
        ->where('order_status','=','Delivery process cancelled')
        ->where('task_asignings.email','=',$email)
        ->get();

      
      return view('admin.delivery_process.individual_profile',compact(['individual_order','deliver_person_mail','get_deliver_name','order_cancelled_date']));
    }




    public function edit_task_form($id){

        $edit_task_data = Task_asigning::find($id);
        $get_user_data = User::all();

        //dd( $edit_task_data);
        return view('admin.admin_tasks.edit_task_form',compact(['edit_task_data','get_user_data']));
    }

    public function update_task_data(Request $request,$id){

        //return $id;

            $update_task_data = Task_asigning::find($id);
            $update_task_data->order_id = $request->input('order_id');
            $update_task_data->email = $request->input('email');
            $update_task_data->asign_for = $request->input('asign_for');
            $update_task_data->reason= $request->input('reason');
            $update_task_data->from = $request->input('from');
            $update_task_data->to = $request->input('to');
            $update_task_data->description = $request->input('description');
           $update_task_data->save();

            $get_order_id = $request->input('order_id');
            $change_order_status = Delivery_Info::find($get_order_id);
            $change_order_status->order_status = $request->input('order_status');
          $change_order_status->save();

           return redirect('/delivery_details_list');
    }

    public function search_orders_by_date(Request $req,$email){
        $validatedData = $req->validate([
            'query'  => 'date_format:Y-m-d|',

        ]);
        

        $completed_order_data = Task_asigning::onlyTrashed()
        ->join('delivery__infos','delivery__infos.id','=','task_asignings.order_id')
        ->leftJoin('completed_orders','task_asignings.order_id','=','completed_orders.order_id')
        ->select('delivery__infos.*','task_asignings.*')
        ->where('completed_orders.order_id','=',NULL)
        ->where('task_asignings.email','=', $email)
        ->where('deleted_at', 'like', '%'.$req->input('query').'%')
        ->get();

        if($completed_order_data->isEmpty()){
            return redirect('individual_delivery_profile/'.$email)->with('status','Pls select an available Date.');
        }else{
            return view('admin.delivery_process.completed_orders_filtered_by_date',compact(['completed_order_data','email']));
        }

    

      
    }

}
