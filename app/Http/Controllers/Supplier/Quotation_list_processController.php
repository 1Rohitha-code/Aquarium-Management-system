<?php

namespace App\Http\Controllers\Supplier;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\QuotationHandling_info;
use App\Http\Controllers\Supplier\Quotation_processController;
use App\Models\Quotation_items_perm_tbl;

class Quotation_list_processController extends Controller
{
    public function display_quotation_list(){

        $logged_in_user_id = Auth::id();

        $quotation_handling_information = DB::table('r_f_q__handling_infos')
        ->join('r_f_q__individual_supplier_activities','r_f_q__handling_infos.id','r_f_q__individual_supplier_activities.rfq_no')
        ->join('quotation_handling_infos','r_f_q__handling_infos.id','=','quotation_handling_infos.rfq_ref_id')
        ->where('r_f_q__individual_supplier_activities.user_id','=',$logged_in_user_id)
        ->where('quotation_handling_infos.supplier_user_id','=',$logged_in_user_id)
        ->groupBy('r_f_q__individual_supplier_activities.rfq_no')
        ->get();

        $display_invoice_status = DB::table('invoice_details')
        ->get();

        //dd($display_invoice_status);

        //dd($quotation_handling_information);
        
     return view('supplier.quotation.quotation_list',compact(['quotation_handling_information','display_invoice_status']));
    }


    public function display_rfq_details($rfq_ref_id,$supplier_user_id){

        $rfq_handling_info = DB::table('r_f_q__handling_infos')
        ->select('id','date_of_delivered','response_expected_date')
        ->where('id','=',$rfq_ref_id)
        ->get();

       // dd($rfq_handling_info);

        $get_admin_details = DB::table('users')
        ->select('users.*')
        ->where('role_as','=','admin')
        ->get();

        $supplier_data = DB::table('users')
        ->where('id','=',$supplier_user_id)
        ->get();

        $get_rfq_items = DB::table('r_f_q__content_infos')
        ->join('products','r_f_q__content_infos.product_ids','=','products.id')
        ->where('rfq_ref_id','=',$rfq_ref_id)
        ->get();

        
        return view('supplier.quotation.rfq_data',compact(['rfq_handling_info','get_admin_details','supplier_data','get_rfq_items']));

    }



    public function download_quotation_PDF($rfq_ref_id,$quotation_id){
    
        $user_id =Auth::id();
      
    $get_quotation_item_details = DB::table('quotation_items_perm_tbls')
    ->join('quotation_perm_requested_qty_tbles','quotation_items_perm_tbls.id','=','quotation_perm_requested_qty_tbles.id')
    ->where('quotation_items_perm_tbls.supplier_user_id','=',$user_id)
    ->where('quotation_items_perm_tbls.rfq_ref_id','=',$rfq_ref_id)
    ->where('quotation_items_perm_tbls.quotation_id','=',$quotation_id)
    ->get();

      $quotation_delivery_details =  DB::table('quotation_handling_infos')
      ->select('quotation_delivered_date','quotation_valid_until')
      ->where('id',$quotation_id)
      ->get();


          //get supplier address
         $supplier_data = DB::table('users')
         ->where('id','=',$user_id)
         ->get();

          //below code is used because only one admin is there
         $get_admin_details = DB::table('users')
        ->select('users.*')
        ->where('role_as','=','admin')
        ->get();

       
       $pdf = PDF::loadView('supplier.quotation.quotation_pdf', compact(['quotation_id','rfq_ref_id','user_id','get_quotation_item_details','get_admin_details','supplier_data','quotation_delivery_details']));
      return $pdf->download('quotation_pdf.pdf');
    }


}

