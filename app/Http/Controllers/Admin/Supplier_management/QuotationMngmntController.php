<?php

namespace App\Http\Controllers\Admin\Supplier_management;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PO_items_temp_place;

class QuotationMngmntController extends Controller
{
    public function display_quotation_by_user_id($user_id,$rfq_id){

        $get_quotation_id = DB::table('quotation_items_perm_tbls')
        ->select('quotation_id')
        ->where('rfq_ref_id','=',$rfq_id)
        ->where('supplier_user_id','=',$user_id)
        ->first();

        $get_rfq_data = DB::table('r_f_q__content_infos')
        ->join('r_f_q__individual_supplier_activities','r_f_q__content_infos.rfq_ref_id','=','r_f_q__individual_supplier_activities.rfq_no')
        ->join('products','r_f_q__content_infos.product_ids','=','products.id')
        ->where('r_f_q__individual_supplier_activities.user_id','=',$user_id)
        ->where('r_f_q__content_infos.rfq_ref_id','=',$rfq_id)
        ->get();

        $get_quot_id_as_var = $get_quotation_id->quotation_id;

        $get_quotation_data = DB::table('quotation_items_perm_tbls')
        ->join('quotation_perm_requested_qty_tbles','quotation_items_perm_tbls.id','=','quotation_perm_requested_qty_tbles.id')
        ->where([
            ['quotation_items_perm_tbls.quotation_id', '=',$get_quot_id_as_var],
            ['quotation_items_perm_tbls.rfq_ref_id','=',$rfq_id],
            ['quotation_items_perm_tbls.supplier_user_id','=',$user_id],
            ]) 
        ->get();

       // dd($user_id);

        return view('admin.sup_mngmnt.new_suppliers.quotations.quotation_by_id',compact(['user_id','rfq_id','get_quotation_id','get_rfq_data',
    'get_quotation_data','get_quot_id_as_var']));
    }


    public function display_quotation_list(){

        $quotation_handling_info = DB::table('users')
        ->join('quotation_handling_infos','users.id','=','quotation_handling_infos.supplier_user_id')
        ->orderBy('quotation_handling_infos.rfq_ref_id','desc')
        ->get();

       // dd($quotation_handling_info);
        // $get_rfq_item_count = DB::table('r_f_q__content_infos')
        // ->select('rfq_ref_id',DB::raw('COUNT(rfq_ref_id) as rfq_count'))
        // ->where()

        $get_rfq_count = DB::table('r_f_q__handling_infos')
        ->rightJoin('r_f_q__individual_supplier_activities','r_f_q__handling_infos.id','=','r_f_q__individual_supplier_activities.rfq_no')
        ->join('r_f_q__content_infos','r_f_q__individual_supplier_activities.rfq_no','=','r_f_q__content_infos.rfq_ref_id')
        ->select('r_f_q__handling_infos.id','r_f_q__individual_supplier_activities.user_id',DB::raw('COUNT(r_f_q__individual_supplier_activities.rfq_no) as rfq_count'))
        ->where('r_f_q__individual_supplier_activities.rfq_status','=','quotation sent from supplier')
        ->groupBy('r_f_q__content_infos.rfq_ref_id')
        ->groupBy('r_f_q__individual_supplier_activities.user_id')
        ->get(); 

        $get_quot_item_count = DB::table('quotation_handling_infos')
        ->rightJoin('quotation_items_perm_tbls','quotation_handling_infos.id','=','quotation_items_perm_tbls.quotation_id')
        ->select('quotation_items_perm_tbls.quotation_id','quotation_items_perm_tbls.supplier_user_id','quotation_items_perm_tbls.rfq_ref_id',DB::raw('COUNT(quotation_items_perm_tbls.quotation_id) as quotation_item_count'))
        ->groupBy('quotation_handling_infos.id')
        ->get();

        $get_rfq_total = DB::table('r_f_q__individual_supplier_activities')
        ->join('r_f_q__content_infos','r_f_q__individual_supplier_activities.rfq_no','=','r_f_q__content_infos.rfq_ref_id')
        ->join('products','r_f_q__content_infos.product_ids','=','products.id')
        ->select('r_f_q__individual_supplier_activities.rfq_no','r_f_q__individual_supplier_activities.user_id',DB::raw('SUM(products.unit_price * required_qty) as rfq_total'))
        ->where('rfq_status','=','quotation sent from supplier')
        ->groupBy('r_f_q__individual_supplier_activities.user_id','r_f_q__individual_supplier_activities.rfq_no')
        ->get();

       // dd($quotation_handling_info);

        return view('admin.sup_mngmnt.new_suppliers.quotations.list_of_quotations',compact(['quotation_handling_info','get_rfq_count','get_quot_item_count','get_rfq_total']));
    }

    public function update_quotation_status(Request $request,$quot_id,$user_id,$rfq_id){
        
        $quotation_status = $request->input('quotation_status');
        $mytime = Carbon::now();
        $quot_status_updated_date = date('Y-m-d', time());

        $update_quotation_status = DB::table('quotation_handling_infos')
        ->where('id',$quot_id)
        ->where('rfq_ref_id',$rfq_id)
        ->where('supplier_user_id',$user_id)
        ->update(['quotation_status' => $quotation_status,
        'quot_status_updated_date' => $quot_status_updated_date]);

        return redirect('/list_of_quotations')->with('status','Quotation status updated!');
    }

    public function back_to_previous_page(){
        $po_table_rec_existance = PO_items_temp_place::all();
          if ($po_table_rec_existance === null) {
            // echo "Table empty";
          }else{
            //when user go back to previous page, the temp table records are deleted.
            PO_items_temp_place::truncate();
            
    
          }
          return redirect('/items_to_be_ordered');
    }
}
