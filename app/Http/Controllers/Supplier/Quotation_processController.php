<?php

namespace App\Http\Controllers\Supplier;

use mysqli;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Scalar\String_;
use App\Http\Controllers\Controller;
use App\Models\Quotation_items_info;
use Illuminate\Support\Facades\Auth;
use App\Quotation_items_temp_storage;
use App\Models\QuotationHandling_info;
use App\Models\Quotation_items_perm_tbl;
use Symfony\Component\Console\Input\Input;
use App\Models\Quotation_perm_requested_qty_tble;
use SebastianBergmann\CodeCoverage\TestFixture\C;
use App\Models\RFQ_Individual_supplier_activities;
use App\Http\Controllers\Supplier\ItemstoreController;

class Quotation_processController extends Controller
{
    public function show_quotation_form($rfq_no){

        $user_id = Auth::id();
        $rfq_data = DB::table('r_f_q__handling_infos')
       ->where('r_f_q__handling_infos.id','=',$rfq_no)
       ->get();
        
        $rfq_content_info =  DB::table('r_f_q__handling_infos')
       ->join('r_f_q__content_infos','r_f_q__handling_infos.id','=','r_f_q__content_infos.rfq_ref_id')
       ->join('products','r_f_q__content_infos.product_ids','=','products.id')
       ->where('r_f_q__handling_infos.id','=',$rfq_no)
       ->get();
        

     $rfq_status = DB::table('r_f_q__individual_supplier_activities')
     ->select('r_f_q__individual_supplier_activities.rfq_status','r_f_q__individual_supplier_activities.rfq_no')
     ->where('r_f_q__individual_supplier_activities.user_id','=',$user_id)
     ->where('r_f_q__individual_supplier_activities.rfq_no','=',$rfq_no)
     ->groupBy('rfq_no')
     ->get();





     //below code is used to import table name variable into this controller from another controller
     $obj = new ItemstoreController();

    $get_table_name = $obj->product_list()->supplier_table_name;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project_copy"; 
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  // sql to delete a record
  $sql = "SELECT * FROM $get_table_name ";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

  
    return view('supplier.quotation.preparation_form',compact(['rfq_data','rfq_content_info','rfq_status','result']));

  }
} else {
  echo "0 results";
}
  $conn->close();


  
    }

    public function store_rfq_status(Request $request,$rfq_no,$user_id){
           
      $rfq_status = $request->input('rfq_status');
      $mydate = Carbon::now();
     $rfq_status_updated_at = $mydate->toDateString();


    $store_rfq_status = DB::table('r_f_q__individual_supplier_activities')
    ->where('rfq_no','=',$rfq_no)
    ->where('user_id','=',$user_id)
    ->update( [ 'rfq_status' => $rfq_status]);

    $store_accepted_date = DB::table('r_f_q__individual_supplier_activities')
    ->where('rfq_no','=',$rfq_no)
    ->where('user_id','=',$user_id)
    ->update( [ 'rfq_status_updated_at' =>   $rfq_status_updated_at]);

    return redirect('/prepare_quotation/'.$rfq_no)->with('status','RFQ Status updated successfully!');
 

    }

    

    public function store_quotation_details(Request $request){
      $obj = new ItemstoreController();
        $get_table_name = $obj->product_list()->supplier_table_name;


        $quotation_details = new QuotationHandling_info();
        $quotation_details->rfq_ref_id = $request->input('rfq_ref_id');
        $quotation_details->rfq_response_expected_date = $request->input('rfq_response_expected_date');
        $quotation_details->rfq_date_of_delivered = $request->input('rfq_date_of_delivered');
        $quotation_details->supplier_user_id = Auth::id();
        $quotation_details->save();

        $get_rfq_ref_id = $quotation_details->rfq_ref_id;
//---------------------------------------
    $last_inserted_id =$quotation_details->id;
        $supplier_stock_item_ids = $request->supplier_stock_item_ids;


      foreach ($supplier_stock_item_ids as $id) {
           
        //-------------------------------------------------
             $servername = "localhost";
             $username = "root";
             $password = "";
             $dbname = "project_copy";
             $conn = new mysqli($servername, $username, $password, $dbname);
             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             }
         
             $sql = "SELECT product_name,id,quantity,unit_price from $get_table_name WHERE id=$id";
             $result = $conn->query($sql);
             if ($result->num_rows > 0) {
                 while ($row = $result->fetch_assoc()) {
                        //supplier stock qty
                        $prod_id = $row["id"];
                        $prod_name = $row["product_name"];
                        $prod_quantity = $row["quantity"];
                        $unit_price = $row["unit_price"];

                
                                 }//end of while loop
      
                          } else {
                              echo "0 results";
                          }
                          $conn->close();
                       
                    
                       for ($i=0; $i < count($supplier_stock_item_ids); $i++) {     
                          $datasave = [
                            'quotation_id' => $itemdata['quotation_id']=  $last_inserted_id,
                            'rfq_ref_id' =>$itemdata['rfq_ref_id']=   $get_rfq_ref_id,
                            'supplier_stock_prod_id' => $itemdata['supplier_stock_prod_id']=  $prod_id,
                           'supplier_stock_prod_name' =>$itemdata['supplier_stock_prod_name'] = $prod_name,
                           'supplier_stock_prod_qty' =>$itemdata['supplier_stock_prod_qty'] = $prod_quantity,
                           'unit_price' =>$itemdata['unit_price'] = $unit_price,
                                  ];
                        }
                        DB::table('quotation_items_temp_storages')->insert($datasave);
      
                        
                   }//foreach end

                   return redirect('/display_taken_items/'.$get_rfq_ref_id);
    }

public function display_taken_items_to_quote($get_rfq_ref_id){
    $user_id = Auth::id();
    $rfq_data = DB::table('r_f_q__handling_infos')
 ->where('r_f_q__handling_infos.id', '=', $get_rfq_ref_id)
 ->get();
  
    $rfq_content_info =  DB::table('r_f_q__handling_infos')
 ->join('r_f_q__content_infos', 'r_f_q__handling_infos.id', '=', 'r_f_q__content_infos.rfq_ref_id')
 ->join('products', 'r_f_q__content_infos.product_ids', '=', 'products.id')
 ->where('r_f_q__handling_infos.id', '=', $get_rfq_ref_id)
 ->get();
    //  dd($rfq_data);

    $rfq_status = DB::table('r_f_q__individual_supplier_activities')
->select('r_f_q__individual_supplier_activities.rfq_status', 'r_f_q__individual_supplier_activities.rfq_no')
->where('r_f_q__individual_supplier_activities.user_id', '=', $user_id)
->where('r_f_q__individual_supplier_activities.rfq_no', '=', $get_rfq_ref_id)
->groupBy('rfq_no')
->get();

    //below code is used to import table name variable into this controller from another controller
    $obj = new ItemstoreController();

    $get_table_name = $obj->product_list()->supplier_table_name;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project_copy";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // sql to delete a record
    $sql = "SELECT * FROM $get_table_name";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
    } else {
        echo "0 results";
    }
    $conn->close();

    $get_quotation_id = DB::table('quotation_handling_infos')
 ->select('id')
 ->where('rfq_ref_id', '=', $get_rfq_ref_id)
 ->latest()
 ->first();



    foreach ($get_quotation_id as $quotation_id) {
        $quotation_id;
        
    }

 
    $retrieve_stored_items = DB::table('quotation_items_temp_storages')
    ->leftJoin('r_f_q__content_infos', 'quotation_items_temp_storages.supplier_stock_prod_name', '=', 'r_f_q__content_infos.product_name')
   ->select('r_f_q__content_infos.product_name','r_f_q__content_infos.required_qty','quotation_items_temp_storages.supplier_stock_prod_name','quotation_items_temp_storages.supplier_stock_prod_qty','quotation_items_temp_storages.quotation_id','quotation_items_temp_storages.rfq_ref_id','quotation_items_temp_storages.unit_price','quotation_items_temp_storages.supplier_stock_prod_id')
    ->where('quotation_items_temp_storages.quotation_id', '=', $quotation_id)
    ->where('quotation_items_temp_storages.rfq_ref_id', '=', $get_rfq_ref_id)
    ->get();

     // dd( $retrieve_stored_items );

    $get_quotation_id = DB::table('quotation_handling_infos')
    ->select('id','rfq_ref_id')
    ->where('rfq_ref_id','=',$get_rfq_ref_id)
    ->latest()
    ->first();
   
   // dd($retrieve_stored_items);
 
    return view('supplier.quotation.rfq_qty_insertion_form',
    compact(['rfq_data','rfq_content_info','rfq_status',
    'result','retrieve_stored_items','get_quotation_id',
  'get_rfq_ref_id'])); 
}

  public function back_to_select_items_page($rfq_id){
    $user_id = Auth::user()->id;
    $quotation_id = DB::table('quotation_handling_infos')
    ->select('id')
    ->where('rfq_ref_id','=',$rfq_id)
    ->where('supplier_user_id','=',$user_id)
    ->value('id');

    $temp_table_rec_existance = Quotation_items_temp_storage::where('quotation_id', '=',$quotation_id)->first();
      if ($temp_table_rec_existance === null) {
        // echo "Table empty";
      }else{
        //when user go back to previous page, the temp table records are deleted.
        Quotation_items_temp_storage::truncate();
            if (QuotationHandling_info::where('id', '=',$quotation_id)->exists()) {
                QuotationHandling_info::truncate();
            }else{
              // echo "user not found";
            }

      }
      return redirect('/prepare_quotation/'.$rfq_id);
    //Quotation_items_temp_storage::truncate();

   // dd($x);
  }


  public function edit_quotation_item_data($get_rfq_ref_id,$quotation_id){

    $user_id = Auth::id();
    $rfq_data = DB::table('r_f_q__handling_infos')
 ->where('r_f_q__handling_infos.id', '=', $get_rfq_ref_id)
 ->get();
  
    $rfq_content_info =  DB::table('r_f_q__handling_infos')
 ->join('r_f_q__content_infos', 'r_f_q__handling_infos.id', '=', 'r_f_q__content_infos.rfq_ref_id')
 ->join('products', 'r_f_q__content_infos.product_ids', '=', 'products.id')
 ->where('r_f_q__handling_infos.id', '=', $get_rfq_ref_id)
 ->get();
    //  dd($rfq_data);

    $rfq_status = DB::table('r_f_q__individual_supplier_activities')
->select('r_f_q__individual_supplier_activities.rfq_status', 'r_f_q__individual_supplier_activities.rfq_no')
->where('r_f_q__individual_supplier_activities.user_id', '=', $user_id)
->where('r_f_q__individual_supplier_activities.rfq_no', '=', $get_rfq_ref_id)
->groupBy('rfq_no')
->get();

    //below code is used to import table name variable into this controller from another controller
    $obj = new ItemstoreController();

    $get_table_name = $obj->product_list()->supplier_table_name;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project_copy";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // sql to delete a record
    $sql = "SELECT * FROM $get_table_name";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
    } else {
        echo "0 results";
    }
    $conn->close();


    //when editing data, it is easy to update records from quotation_perm_requested_qty_tble 
    $retrieve_stored_items = DB::table('quotation_items_perm_tbls')
    ->leftJoin('r_f_q__content_infos', 'quotation_items_perm_tbls.supplier_stock_prod_name', '=', 'r_f_q__content_infos.product_name')
   ->select('r_f_q__content_infos.product_name',
   'r_f_q__content_infos.required_qty',
   'quotation_items_perm_tbls.supplier_stock_prod_name',
   'quotation_items_perm_tbls.supplier_stock_prod_qty',
   'quotation_items_perm_tbls.quotation_id',
   'quotation_items_perm_tbls.rfq_ref_id',
   'quotation_items_perm_tbls.unit_price',
   'quotation_items_perm_tbls.id')
    ->where('quotation_items_perm_tbls.quotation_id', '=', $quotation_id)
    ->where('quotation_items_perm_tbls.rfq_ref_id', '=', $get_rfq_ref_id)
    ->where('quotation_items_perm_tbls.supplier_user_id', '=', $user_id)
    ->get();
   

      // dd($retrieve_stored_items);
      return view('supplier.quotation.edit_preperation_form',
      compact(['rfq_data','rfq_content_info','rfq_status',
      'result','retrieve_stored_items','quotation_id','get_rfq_ref_id']));
  }

  public function update_quotation_item_data(Request $request,$quotation_id,$rfq_ref_id){
    $sup_user_id = Auth::user()->id;
    $get_requested_qty_tble_id = $request->input('tbl_id');
    $requested_qty = $request->input('requested_qty');
   

    $update =Quotation_perm_requested_qty_tble::find($get_requested_qty_tble_id )
    ->update(['requested_qty'=>$requested_qty]);

    return redirect('/edit_quotation_item_data/'.$rfq_ref_id.'/'.$quotation_id);
  

  }





public function store_quotation_item_data(Request $request,$quotation_id,$rfq_ref_id){
    $get_product_id = $request->supplier_stock_prod_id;
    $get_prod_name = $request->supplier_stock_prod_name;
    $get_prod_qty = $request->supplier_stock_prod_qty;
    $get_rfq_requested_qty = $request->requested_qty;
    $get_price = $request->unit_price;

    $obj = new ItemstoreController();
    $get_table_name = $obj->product_list()->supplier_table_name;

    foreach ($get_prod_name as $supplier_stock_prod_name) {
        $supplier_stock_prod_name;
    }

   foreach ($get_product_id as $stock_id) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project_copy";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
   $sql = "SELECT product_name,id,quantity,unit_price from $get_table_name WHERE id=$stock_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //supplier stock qty
            $prod_id = $row["id"];
            $prod_name = $row["product_name"];
            $prod_quantity = $row["quantity"];
            $unit_price = $row["unit_price"];
        }//end of while loop
    } else {
        echo "0 results";
    }
    $conn->close();
//----------------------------------------------------------- 
        for ($i=0; $i < count($get_prod_name); $i++) {
          
            $datasave = [
            'quotation_id' => $itemdata['quotation_id']=  $quotation_id,
            'rfq_ref_id' =>$itemdata['rfq_ref_id']=   $rfq_ref_id,
            'supplier_user_id' =>$itemdata['supplier_user_id']=  Auth::id(),
             'supplier_stock_prod_name' =>$itemdata['supplier_stock_prod_name'] =   $prod_name,
           'supplier_stock_prod_qty' =>$itemdata['supplier_stock_prod_qty'] = $prod_quantity,
            'unit_price' =>$itemdata['unit_price'] = $unit_price,
            
                  ];

        }//end of for loop
       
     DB::table('quotation_items_perm_tbls')->insert($datasave);

        }//end of product_id foreach
//------------------------------------------------------------------------------


    foreach ($get_rfq_requested_qty as $requested_qty) {
     //2nd forloop start-----------------------------
        for ($x=0; $x < count($get_prod_name); $x++) {
            $store_requested_quantities = [
        'quotation_id' => $data['quotation_id']=  $quotation_id,
        'rfq_ref_id' =>$data['rfq_ref_id']=   $rfq_ref_id,
        'supplier_user_id' =>$itemdata['supplier_user_id']=  Auth::id(),
        'requested_qty' =>$data['requested_qty'] = $requested_qty,
              ];
        }//end of for loop
        DB::table('quotation_perm_requested_qty_tbles')->insert($store_requested_quantities);
      Quotation_items_temp_storage::truncate();
        //2nd forloop end-----------------------------------
    }
      $user_id = Auth::id();
//------------------------------------------------------------------------------
      return redirect('/quotation/'.$quotation_id.'/'.$rfq_ref_id.'/'.$user_id );            
      }//method end


         public function display_quotation($quotation_id,$get_rfq_ref_id,$user_id ){

          //get current date
         $mytime = Carbon::now();
         $current_date = $mytime->toDateString();

          //get supplier address
         $supplier_data = DB::table('users')
         ->where('id','=',$user_id)
         ->get();

          //below code is used because only one admin is there
         $get_admin_details = DB::table('users')
        ->select('users.*')
        ->where('role_as','=','admin')
        ->get();
      
        $get_product_details = DB::table('quotation_items_perm_tbls')
       ->join('quotation_perm_requested_qty_tbles','quotation_items_perm_tbls.id','=','quotation_perm_requested_qty_tbles.id')
      ->where('quotation_items_perm_tbls.quotation_id','=',$quotation_id)
      ->where('quotation_items_perm_tbls.rfq_ref_id','=',$get_rfq_ref_id)
      ->where('quotation_items_perm_tbls.supplier_user_id','=',$user_id)
       ->get();

      // dd($get_product_details);

        return view('supplier.quotation.quotation_details',compact(['current_date','supplier_data','get_admin_details',
        'quotation_id','get_rfq_ref_id','user_id','get_product_details']));
        }

        public function store_quotation_delivery_details(Request $request,$quotation_id,$get_rfq_ref_id,$user_id){

    
         $store_quotation_delivery_details = QuotationHandling_info::find($quotation_id)
         ->where('rfq_ref_id','=',$get_rfq_ref_id)
         ->where('supplier_user_id','=',$user_id)
         ->first();

         $mytime = Carbon::now();
         $quot_status_updated_date = date('Y-m-d', time());

         $store_quotation_delivery_details->quotation_status = "pending";
         $store_quotation_delivery_details->quot_status_updated_date = $quot_status_updated_date;
         $store_quotation_delivery_details->quotation_delivered_date = $request->input('quotation_delivered_date');
         $store_quotation_delivery_details->quotation_valid_until = $request->input('quotation_valid_until');
         $store_quotation_delivery_details->total_price = $request->input('total_price');
         $store_quotation_delivery_details->save();

         $updating_rfq_status = "quotation sent from supplier";

         $mydate = Carbon::now();
         $rfq_status_updated_at = $mydate->toDateString();
    

         $update_rfq_status = DB::table('r_f_q__individual_supplier_activities')
         ->where('rfq_no','=',$get_rfq_ref_id)
         ->where('user_id','=',$user_id)
         ->update(array('rfq_status' => $updating_rfq_status,'rfq_status_updated_at' =>$rfq_status_updated_at)); 
        
         return redirect('/quotations_list_page')->with('status','Quotation has been sent successfully!');
       
         
        }


}
