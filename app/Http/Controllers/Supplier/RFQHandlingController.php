<?php

namespace App\Http\Controllers\Supplier;

use mysqli;
use App\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\RFQ_Content_info;
use App\Models\RFQ_Handling_info;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Input\Input;



class RFQHandlingController extends Controller
{
    public function show_rfq_list(){

        $get_user_id  = auth()->user()->id;
 
        $get_recieved_rfq = DB::table('r_f_q__individual_supplier_activities')
        ->join('r_f_q__handling_infos','r_f_q__individual_supplier_activities.rfq_no','=','r_f_q__handling_infos.id')
        ->where('user_id','=',$get_user_id)
       ->orderBy('r_f_q__handling_infos.created_at','desc')
        ->get();

       // dd($get_recieved_rfq);
       

  return view('supplier.rfq.list',compact(['get_recieved_rfq']));
    }

    public function rfq_content_info($id){

        return RFQ_Content_info::find($id);
        
    }

    public function download_supp_rfq($user_id,$id){

        $rfq_handling_info = DB::table('r_f_q__handling_infos')
        ->select('id','date_of_delivered','response_expected_date')
        ->where('id','=',$id)
        ->get();

        $get_admin_details = DB::table('users')
        ->select('users.*')
        ->where('role_as','=','admin')
        ->get();

        $supplier_data = DB::table('users')
        ->where('id','=',$user_id)
        ->get();

        $get_rfq_items = DB::table('r_f_q__content_infos')
        ->join('products','r_f_q__content_infos.product_ids','=','products.id')
        ->where('rfq_ref_id','=',$id)
        ->get();



        $pdf = PDF::loadView('supplier.rfq.pdf', compact(['rfq_handling_info','get_admin_details','supplier_data','get_rfq_items']));
        
        return $pdf->download('supplier_rfq.pdf');
    }

    
    
    



}
