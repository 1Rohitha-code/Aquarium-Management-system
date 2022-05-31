<?php

namespace App\Http\Controllers\Admin\Supplier_management;

use App\User;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\RFQ_Info;
use Illuminate\Http\Request;
use App\Models\RFQ_Handling_info;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Models\PO_items_temp_place;
use App\Http\Controllers\Controller;
use App\Models\RFQ_Content_info;
use Symfony\Component\Console\Input\Input;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\RFQ_Individual_supplier_activities;
use Egulias\EmailValidator\Validation\Error\RFCWarnings;

class Supplier_mngmntController extends Controller
{
    public function items_to_be_ordered()
    {

        //this code is used because I wanted to hide records which are already taken for RFQ
        $get_product_data = DB::table('products')
        ->whereNotExists(function ($query) {
            $query->select(DB::raw(1)) 
                  ->from('r_f_q__content_infos')
                  ->whereRaw('products.id = r_f_q__content_infos.product_ids');        
        })
        ->where('products.quantity', '<=', '260')
        ->get();

    return view('admin.sup_mngmnt.item_list_to_be_ordered_from_suppliers', compact(['get_product_data']));
    }


    public function store_selected_value(Request $request)
    {
       
    //----------This code is to store product ids----------------------------------------
        foreach ($request->input("product_ids") as $value) {
            $store_data = new PO_items_temp_place();
            $store_data->product_ids= $value;
           $store_data->save();
        }
        //--------------------------------------------------
                    //supplier category 1 represents new suppliers
                if ($request->input('sup_category') == 1) {
                    $new_sup_count = DB::table('users')
                ->leftJoin('products', 'products.supplied_by', '=', 'users.supplied_by')
                ->select('users.supplied_by')
                ->where('products.supplied_by', '=', null)
                ->where('users.supplied_by', '!=', null)
                ->where('users.role_as','<>','admin')
                ->groupBy('users.supplied_by')
                ->get();

                    $get_required_p_o_info =  DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('p_o_items_temp_places', 'products.id', '=', 'p_o_items_temp_places.product_ids')
                ->select('products.*', 'categories.category_name', 'p_o_items_temp_places.product_ids')
                ->get();

                $get_current_date = Carbon::now();

                    return view('admin.sup_mngmnt.new_suppliers.required_things_for_RFQ', compact(['get_required_p_o_info','new_sup_count','get_current_date']));
                } else {
                    //supplier category 2 represents already purchased suppliers
                    // echo "already purchased suppliers";
                    $already_purchased_sup = DB::table('users')
                ->leftJoin('products', 'products.supplied_by', '=', 'users.supplied_by')
                ->select('users.supplied_by')
                ->where('products.supplied_by', '!=', null)
                ->where('users.role_as','=','supplier')
                ->groupBy('users.supplied_by')
                ->get();
                

                $get_required_p_o_info =  DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('p_o_items_temp_places', 'products.id', '=', 'p_o_items_temp_places.product_ids')
                ->select('products.*', 'categories.category_name', 'p_o_items_temp_places.product_ids')
                ->get();

                $get_current_date = Carbon::now();

                $already_purchased_sup_count = DB::table('users')
                ->join('products', 'products.supplied_by', '=', 'users.supplied_by')
                ->select('users.supplied_by')
                ->where('products.supplied_by', '!=', null)
                ->where('users.role_as','=','supplier')
                ->groupBy('users.supplied_by')
                ->get();

                $already_purchased_sup_names = DB::table('users')
                ->leftJoin('products', 'products.supplied_by', '=', 'users.supplied_by')
                ->select('users.supplied_by')
                ->where('products.supplied_by', '!=', null)
                ->where('users.role_as','=','supplier')
                ->groupBy('users.supplied_by')
                ->get();

               // dd($already_purchased_sup_names);

                return view('admin.sup_mngmnt.already_purchased.required_things_for_PO',
                 compact(['get_required_p_o_info','already_purchased_sup ',
                 'get_current_date','already_purchased_sup_count',
                 'already_purchased_sup_names']));
                }
    }


    public function store_required_info(Request $request)
    {

        //input field values are asigned to below variables
        $product_ids = $request->product_ids;
        $product_name = $request->product_name;
        $required_price = $request->required_price;
        $required_qty = $request->required_qty;

        $get_date = Carbon::now();
        $date = date('Y-m-d', time());

        //create a new row in RFQ handling info table and insert data
        $tble = new RFQ_Handling_info();
        $tble->response_expected_date = $request->input('response_expected_date');
        $tble->date_of_delivered = $date;
        $tble->save();
        //taken last id
        $last_inserted_id =$tble->id;
        $parent_table_id = $tble->id;
        //inserting data into RFQ information into RFQ info table
        for ($i=0; $i < count($product_ids); $i++) {
            $datasave = [
               'product_ids' => $product_ids[$i],
               'product_name' => $product_name[$i],
               'required_qty'  => $required_qty[$i],
               'rfq_ref_id' =>  $itemdata['rfq_ref_id'] =  $parent_table_id ,
           ];
            DB::table('r_f_q__content_infos')->insert($datasave);
            // below code is used to delete all rows from p_o_items_temp_places table
            PO_items_temp_place::truncate();
           
        }
         return redirect('/preview_of_rfq_info/'.$last_inserted_id);


     
        }


    public function rfq_info_preview($id){
        $get_supplier_ids = DB::table('users')
        ->leftJoin('products', 'products.supplied_by', '=', 'users.supplied_by')
        ->select('users.*')
        ->where('products.supplied_by', '=', null)
        ->where('users.supplied_by', '!=', null)
        ->where('users.role_as','<>','admin')
        ->groupBy('users.supplied_by')
        ->get();


        $get_admin_details = DB::table('users')
        ->select('users.*')
        ->where('role_as','=','admin')
        ->get();

        $mytime = Carbon::now(); 

        $get_rfq_data = DB::table('r_f_q__handling_infos')
        ->join('r_f_q__content_infos','r_f_q__handling_infos.id','=','r_f_q__content_infos.rfq_ref_id')
        ->join('products','r_f_q__content_infos.product_ids','=','products.id')
        ->where('r_f_q__content_infos.rfq_ref_id','=',$id)
        ->get();
        
        $get_rfq_no = DB::table('r_f_q__handling_infos')
        ->select('r_f_q__handling_infos.id')
        ->get();

        $response_expected_date = DB::table('r_f_q__handling_infos')
        ->select('response_expected_date')
        ->where('r_f_q__handling_infos.id','=',$id)
        ->get();
   
       return view('admin.sup_mngmnt.new_suppliers.rfq_letter',compact(['get_supplier_ids','get_admin_details','mytime','get_rfq_data','get_rfq_no','response_expected_date','id']));
    }


    public function display_edit_page_of_rfq_info($rfq_id){
        
        $edit_response_expected_date = DB::table('r_f_q__handling_infos')
        ->select('response_expected_date')
        ->where('id','=',$rfq_id)
        ->get();


        $edit_rfq_item_data = DB::table('r_f_q__content_infos')
        ->join('products','r_f_q__content_infos.product_ids','=','products.id')
        ->join('categories','products.category_id','=','categories.id')
        ->select('r_f_q__content_infos.product_ids','products.product_name','categories.category_name','r_f_q__content_infos.required_qty','r_f_q__content_infos.id')
        ->where('rfq_ref_id','=',$rfq_id)
        ->get();

        $get_rfq_items_tble_ids = DB::table('r_f_q__content_infos')
        ->where('rfq_ref_id','=',$rfq_id)
        ->select('id')
        ->get();

        foreach($get_rfq_items_tble_ids as $get_table_id){
            $rfq_item_table_id = $get_table_id->id;
        }
        
       // dd($edit_rfq_item_data);

       // dd($edit_rfq_item_data);
        return view('admin.sup_mngmnt.new_suppliers.edit_rfq',compact(['edit_rfq_item_data','edit_response_expected_date','rfq_id','rfq_item_table_id']));
     
    }

    public function update_rfq_info($rfq_id,Request $request){
            
        $product_ids = $request->product_ids;
        $required_qty = $request->required_qty;

        $tble =  RFQ_Handling_info::find($rfq_id);
        $tble->response_expected_date = $request->input('response_expected_date');
        $tble->save();

        return redirect('/edit_view_of_rfq_info/'.$rfq_id);

    }

    public function update_rfq_item_qty(Request $request,$table_id,$rfq_id){
       
        $update_rfq_item_qty = RFQ_Content_info::find($table_id);
        $update_rfq_item_qty->required_qty = $request->input("required_qty"); 
        $update_rfq_item_qty->save();


        return redirect('/edit_view_of_rfq_info/'.$rfq_id);
    }

    public function submit_rfq_for_new_suppliers(Request $request){


        //this query is used to get new supplier count
        $get_new_suppliers = DB::table('users')
        ->leftJoin('products', 'products.supplied_by', '=', 'users.supplied_by')
        ->select('users.*')
        ->where('products.supplied_by', '=', null)
        ->where('users.supplied_by', '!=', null)
        ->where('users.role_as','<>','admin')
        ->groupBy('users.supplied_by')
        ->get();


        $rfq_no = $request->rfq_ref_id; 
        $user_id = $request->user_id;
       // $date_of_delivered = $request->date_of_delivered;
        $rfq_status = $request->input('rfq_status');
        $rfq_status_updated_at = $request->input('rfq_status_updated_at');

        $store_delivered_date_into_rfq_handling_tbl = RFQ_Handling_info::find($rfq_no);
        $store_delivered_date_into_rfq_handling_tbl->date_of_delivered = $request->date_of_delivered;
        $store_delivered_date_into_rfq_handling_tbl->save();

        for ($x=0; $x < count($get_new_suppliers); $x++) {
            $save_data = [
                'rfq_no' => $rfq_no,
                'user_id' =>  $user_id[$x],
                 'rfq_status' => $rfq_status,
                 'rfq_status_updated_at' => $rfq_status_updated_at,
                //  'date_of_delivered' => $date_of_delivered,
            ];
            DB::table('r_f_q__individual_supplier_activities')->insert($save_data);
        }

        return redirect('/list_of_suppliers_with_rfq/'.$rfq_no)->with('status','RFQ has been sent for all new suppliers');
    }

    public function display_rfq_sent_supp($rfq_no){

        $supplier_data = DB::table('r_f_q__individual_supplier_activities')
       ->join('r_f_q__handling_infos','r_f_q__individual_supplier_activities.rfq_no','=','r_f_q__handling_infos.id')
       ->join('users','r_f_q__individual_supplier_activities.user_id','=','users.id')
       ->select('r_f_q__individual_supplier_activities.*','users.*','r_f_q__handling_infos.date_of_delivered')
       ->where('r_f_q__individual_supplier_activities.rfq_no','=',$rfq_no)
       ->get();

        return view('admin\sup_mngmnt\new_suppliers\list_of_rfqs',compact(['supplier_data','rfq_no']));

        
    }

    public function view_supplier_details($id){

       return User::find($id);
    }


    public function download_rfq_PDF($id,$rfq_no){
          
       $supplier_data = DB::table('r_f_q__individual_supplier_activities')
        ->join('users','r_f_q__individual_supplier_activities.user_id','=','users.id')
        ->join('r_f_q__handling_infos','r_f_q__individual_supplier_activities.rfq_no','=','r_f_q__handling_infos.id')
        ->where('r_f_q__individual_supplier_activities.user_id','=',$id)
        ->where('r_f_q__individual_supplier_activities.rfq_no','=',$rfq_no)
        ->get();

        $get_admin_details = DB::table('users')
        ->select('users.*')
        ->where('role_as','=','admin')
        ->get();

        $get_rfq_data = DB::table('r_f_q__handling_infos')
        ->join('r_f_q__content_infos','r_f_q__handling_infos.id','=','r_f_q__content_infos.rfq_ref_id')
        ->join('products','r_f_q__content_infos.product_ids','=','products.id')
        ->where('r_f_q__content_infos.rfq_ref_id','=',$rfq_no)
        ->get();
       
        $response_expected_date = DB::table('r_f_q__handling_infos')
        ->select('response_expected_date')
        ->where('r_f_q__handling_infos.id','=',$rfq_no)
        ->get();

         $mytime = Carbon::now();
         
 
         $pdf = PDF::loadView('admin.sup_mngmnt.new_suppliers.individual_rfq_pdf', compact(['supplier_data','get_admin_details','get_rfq_data','response_expected_date']));
        
       return $pdf->download('admin.sup_mngmnt.new_suppliers.individual_rfq_pdf');

    }

    public function show_rfq_list(){

        $list_of_rfq_details = DB::table('r_f_q__handling_infos')
        ->get();

        // dd( $list_of_rfq_details);
         

        return view('admin.sup_mngmnt.new_suppliers.all_rfq_information',compact('list_of_rfq_details'));
    }


}

