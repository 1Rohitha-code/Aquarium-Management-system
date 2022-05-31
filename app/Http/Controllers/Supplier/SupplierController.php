<?php

namespace App\Http\Controllers\Supplier;

use mysqli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Supplier\ItemstoreController;



class SupplierController extends Controller
{
  
    public function show_dashbaord(){
   
       // get logged in user id
        $get_user_id  = auth()->user()->id;
 
        $get_rfq_count = DB::table('r_f_q__individual_supplier_activities')
        ->select('user_id')
        ->where('user_id','=',$get_user_id)
        ->count();

        return view('supplier.dashboard',compact(['get_rfq_count']));

        
      


    }
}
