<?php

namespace App\Http\Controllers\Admin\Supplier_management;

use App\Models\PO_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PO_items_temp_place;
use App\Http\Controllers\Controller;

class POController extends Controller
{
    public function store_po_info(Request $request){
        $get_product_ids = $request->product_ids;
        $get_product_name = $request->product_name;
        $get_required_qty = $request->required_qty;



        $store_po_data = new PO_Detail();
        $store_po_data->supplier_comp_name  = $request->input('supplier_comp_name');
        $store_po_data->response_expected_date = $request->input('response_expected_date');
        $store_po_data->po_status = "pending";
        $store_po_data->save();

        $product_name = $request->product_name;
        $last_inserted_id = $store_po_data->id;
     
        //inserting data into RFQ information into RFQ info table
        for ($i=0; $i < count($get_product_ids); $i++) {
            $datasave = [
                'po_id' => $itemdata['po_id']=  $last_inserted_id,
                'product_name' => $itemdata['product_name'] =$get_product_name[$i],
                'product_ids' => $itemdata['product_ids'] =$get_product_ids[$i],
                'required_qty' => $itemdata['required_qty'] =$get_required_qty[$i],
                    ];
                    DB::table('p_o__item__details')->insert($datasave);
           
            // below code is used to delete all rows from p_o_items_temp_places table
            PO_items_temp_place::truncate();
        }

        $po_id = $last_inserted_id;

        return redirect('/display_po_preview/'.$po_id);
    }

    public function display_po_preview($po_id){
        
        $display_po_details =DB::table('p_o__details')
        ->where('id','=',$po_id)
        ->get(); 
 
        $display_po_items = DB::table('p_o__item__details')
        ->where('po_id','=',$po_id)
        ->get();

        $sup_address = DB::table('users')
        ->join('p_o__details','users.supplied_by','=','p_o__details.supplier_comp_name')
        ->where('p_o__details.id','=',$po_id)
        ->select('users.*')
        ->get();



     // dd($sup_address);

     return view('admin.sup_mngmnt.already_purchased.po_preview',
     compact('display_po_details','display_po_items','sup_address'));
    }

    public function update_po_status(Request $request,$comp_name,$po_id){
        $status = $request->input('po_status');
            $update_status = DB::table('p_o__details')
            ->select('po_status')
            ->where('supplier_comp_name','=',$comp_name)
            ->where('id','=',$po_id)
            ->update(['po_status' => $status]);

            return redirect('/po_list');
            
    }

    public function get_po_list(){
            $po_details = DB::table('p_o__details')
            ->get();
            return view('admin.sup_mngmnt.already_purchased.po_list',compact('po_details'));

    }
}
