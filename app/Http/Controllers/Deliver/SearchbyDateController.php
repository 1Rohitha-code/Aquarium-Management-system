<?php

namespace App\Http\Controllers\Deliver;

use Illuminate\Http\Request;
use App\Models\Task_asigning;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SearchbyDateController extends Controller
{
    public function search_task_by_date(Request $req){ 

      $validatedData = $req->validate([
        'query'  => 'date_format:Y-m-d|',

    ]);

        $logged_in_user_mail= Auth::user()->email;

        $data = Task_asigning::onlyTrashed()
        ->join('delivery__infos','delivery__infos.id','=','task_asignings.order_id')
      ->select('delivery__infos.*','task_asignings.*')
        ->where('task_asignings.email','=', $logged_in_user_mail)
        ->where('deleted_at', 'like', '%'.$req->input('query').'%')
        ->get();

        

        //  dd($data);

         return view('deliver-person.deliver_history.filtered_results',compact('data'));
     

}
}
