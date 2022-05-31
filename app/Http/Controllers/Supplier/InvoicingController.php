<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Invoice_detail;
use App\Models\QuotationHandling_info;
use Illuminate\Support\Facades\Auth;

class InvoicingController extends Controller
{
    public function display_invoice_page($quot_id){

        $get_admin_details = DB::table('users')
        ->where('role_as','=','admin')
        ->select('name','contact_no','address_line1','address_line2','id')
        ->get();

        $user_id = Auth::user()->id;

        $quot_status = DB::table('quotation_handling_infos')
        ->select('*')
        // ->where('quotation_status','=','Quotation accepted')
        ->where('id','=',$quot_id)
        ->get();

        $get_quot_items_details = DB::table('quotation_items_perm_tbls')
        ->join('quotation_perm_requested_qty_tbles','quotation_items_perm_tbls.id','=','quotation_perm_requested_qty_tbles.id')
        ->where('quotation_items_perm_tbls.quotation_id','=',$quot_id)
        ->where('quotation_items_perm_tbls.supplier_user_id','=',$user_id)
        ->get();

       // dd( $get_admin_details);
        
        return view('supplier.invoicing.invoice_page',
    compact(['quot_id','get_admin_details','get_quot_items_details']));
    }

    public function save_invoice_details(Request $request){
            $store_invoice_details = new Invoice_detail();
            $store_invoice_details->quot_id = $request->input('quot_id');
            $store_invoice_details->user_id = $request->input('user_id');
            $store_invoice_details->invoice_payment_status = $request->input('invoice_payment_status');
            $store_invoice_details->to_be_paid_before = $request->input('to_be_paid_before');
            $store_invoice_details->payment = $request->input('payment');
            $store_invoice_details->save();

            $last_inserted_id = $store_invoice_details->id;

            $get_product_name = $request->product_name;
            $get_unit_price = $request->unit_price;
            $get_requested_qty =$request->requested_qty;
            
       
           
           for ($i=0; $i < count($get_product_name); $i++) {     
            

                $datasave = [
                    'invoice_id' => $itemdata['invoice_id']=  $last_inserted_id,
                    'product_name' => $itemdata['product_name'] =$get_product_name[$i],
                     'unit_price' =>$itemdata['unit_price'] = $get_unit_price[$i],
                    'requested_qty' => $itemdata['unit_price'] =$get_requested_qty[$i],
                        ];
                        DB::table('invoice_items')->insert($datasave);
            
              }
            
             // return redirect('/display_invoice_list');

    }

    public function list_of_invoice(){
        $sup_id = Auth::user()->id;

        $display_invoice_data = DB::table('invoice_details')
        ->where('sup_id','=',$sup_id)
        ->get();

         return view('supplier.invoicing.invoice_list',compact('display_invoice_data'));
    }


    public function update_payment_status(Request $request,$sup_id,$quot_id){

        $payment_status = $request->input('invoice_payment_status');

        $admin_id = DB::table('invoice_details')
        ->where('sup_id','=',$sup_id)
        ->where('quot_id','=',$quot_id)
        ->value('user_id');

        $update_payment_status = DB::table('invoice_details')
        ->where('user_id', $admin_id)
        ->where('quot_id','=',$quot_id)
        ->where('sup_id','=',$sup_id)
        ->update(['invoice_payment_status' => $payment_status]);

        return redirect('/display_invoice_list')->with('status','Status updated successfully!');
    }
}
