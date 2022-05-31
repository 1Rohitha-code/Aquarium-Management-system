<?php

namespace App\Http\Controllers\Admin\Reports;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Delivery_Info;


class OnlinePurchaseMngmntController extends Controller
{
    public function show_filtered_result(Request $req){
        $from = $req->input('from');
            $to = $req->input('to');
        if($req->input('online-cat')==1){

            //-----------------------------------------------------------
            //date validation setting up
            //maximum date value
            $max_date_val = DB::table('completed_orders')->max('order_completed_date');
            //minimum date value
            $min_date_val = DB::table('completed_orders')->min('order_completed_date');

            $del_compl_data = DB::table('completed_orders')
            ->join('delivery__infos','completed_orders.order_id','=','delivery__infos.id')
            ->join('users','completed_orders.deliver_person','=','users.email')
            ->whereBetween('order_completed_date', [$from, $to])
            ->orderBy('deliver_person','asc')
            ->get();   

            $payment_calculated_without_profit = DB::table('order_items')
            ->join('completed_orders','order_items.order_id','=','completed_orders.order_id')
            ->join('products','order_items.product_id','=','products.id')
            ->select('order_items.order_id',DB::raw('SUM((order_items.unit_price -products.price_increasing)*order_items.num_of_items) as tp_without_profit'))
            ->groupBy('order_id')
            ->get();
            
         //  dd($del_compl_data);
         return view('admin.reports.online_purchase.delivery_completion_report',compact(['del_compl_data','payment_calculated_without_profit']));

        }else if($req->input('online-cat')==2){
           //--------------------------------
           $get_deliverer = DB::table('completed_orders')
           ->join('users','completed_orders.deliver_person','=','users.email')
           ->whereBetween('order_completed_date', [$from, $to])
           ->select('users.id','users.name','users.email')
           ->groupBy('deliver_person')
           ->orderBy('order_completed_date','desc')
           ->get();  

           $no_of_orders_completed =  DB::table('completed_orders')
           ->join('users','completed_orders.deliver_person','=','users.email')
           ->whereBetween('order_completed_date', [$from, $to])
           ->select('completed_orders.deliver_person',DB::raw('COUNT(deliver_person) as count'),'users.id')
           ->groupBy('deliver_person')
           ->orderBy('order_completed_date','desc')
           ->orderBy('count')
           ->get();

           $total_collected_payment =  DB::table('completed_orders')
           ->join('users','completed_orders.deliver_person','=','users.email')
           ->select('completed_orders.deliver_person',DB::raw('SUM(completed_orders.order_total) as ttl_collected'),'users.id')
           ->whereBetween('order_completed_date', [$from, $to])
           ->groupBy('deliver_person')
           ->orderBy('order_completed_date','desc')
           ->get();

           //this query has distinct word and it uses to eliminate duplicate records.it helps to get the row count
           $no_of_cities_visited =DB::table('completed_orders')
           ->join('delivery__infos','completed_orders.order_id','=','delivery__infos.id')
           ->join('users','completed_orders.deliver_person','=','users.email')
           ->select('completed_orders.deliver_person',DB::raw('COUNT(distinct(city)) as count'),'users.id')
           ->whereBetween('order_completed_date', [$from, $to])
           ->groupBy('deliver_person') 
           ->orderBy('order_completed_date','desc')
           ->get();
        
           return view('admin.reports.online_purchase.individual_deliver_tasks_summary',compact(['get_deliverer','no_of_orders_completed','total_collected_payment','no_of_cities_visited']));
           //--------------------------------
        }else if($req->input('online-cat')==3){
        //----------------------------------
            $cus_order_details = DB::table('completed_orders')
            ->join('delivery__infos','completed_orders.order_id','=','delivery__infos.id')
            ->join('users','delivery__infos.user_id','=','users.id')
            ->join('task_asignings','completed_orders.order_id','=','task_asignings.order_id')
            ->select('completed_orders.order_id','users.email','completed_orders.order_total','delivery__infos.city','task_asignings.deleted_at')
            ->whereBetween('order_completed_date', [$from, $to])
            ->orderBy('deleted_at','asc')
            ->get();

            $payment_calculated_without_profit = DB::table('order_items')
            ->join('completed_orders','order_items.order_id','=','completed_orders.order_id')
            ->join('products','order_items.product_id','=','products.id')
            ->select('order_items.order_id',DB::raw('SUM((order_items.unit_price -products.price_increasing)*order_items.num_of_items) as tp_without_profit'))
            ->whereBetween('order_completed_date', [$from, $to])
            ->groupBy('order_id')
            ->get();


            $no_of_items_per_order = DB::table('order_items')
            ->join('completed_orders','order_items.order_id','=','completed_orders.order_id')
            ->join('products','order_items.product_id','=','products.id')
            ->select('order_items.order_id',DB::raw('SUM(order_items.num_of_items) as items_per_order'))
            ->whereBetween('order_completed_date', [$from, $to])
            ->groupBy('order_items.order_id')
            ->orderBy('order_items.order_id','asc')
            ->get();

            $no_of_cat_involved = DB::table('order_items')
            ->join('completed_orders','order_items.order_id','=','completed_orders.order_id')
            ->join('products','order_items.product_id','=','products.id')
            ->select('order_items.order_id',DB::raw('COUNT(distinct(category_id)) as no_of_cat_involved'))
            ->whereBetween('order_completed_date', [$from, $to])
            ->groupBy('order_items.order_id')
            ->orderBy('order_items.order_id','asc')
            ->get();

           // dd($no_of_cat_involved);
           return view('admin.reports.online_purchase.dtail_cus_order_report',compact(['cus_order_details','payment_calculated_without_profit','no_of_items_per_order','no_of_cat_involved']));
        //----------------------------------
        }else if($req->input('online-cat')==4){
            //---------------------------------

            $no_of_individual_purchases = DB::table('completed_orders')
            ->join('delivery__infos','completed_orders.order_id','=','delivery__infos.id')
            ->join('users','completed_orders.deliver_person','=','users.email')
            ->select('delivery__infos.user_id',DB::raw('COUNT(user_id) as count'),'delivery__infos.first_name','completed_orders.order_id','delivery__infos.email','delivery__infos.id')
            ->whereBetween('order_completed_date', [$from, $to])
            ->groupBy('user_id')
            ->get();

            $fish_cat_purchased_count =  DB::table('completed_orders')
            ->join('delivery__infos','completed_orders.order_id','=','delivery__infos.id')
            ->join('order_items','delivery__infos.id','=','order_items.order_id')
            ->join('products','order_items.product_id','=','products.id')
            ->join('categories','products.category_id','=','categories.id')
            ->select('completed_orders.order_id',DB::raw('COUNT(distinct(order_items.order_id)) as count'),'delivery__infos.user_id')
            ->where('categories.category_name','=','Ornamentalfish')
            ->whereBetween('order_completed_date', [$from, $to])
            ->groupBy('user_id')
            ->orderBy('user_id','asc')
            ->get();

            $plant_cat_purchased_count =  DB::table('completed_orders')
            ->join('delivery__infos','completed_orders.order_id','=','delivery__infos.id')
            ->join('order_items','delivery__infos.id','=','order_items.order_id')
            ->join('products','order_items.product_id','=','products.id')
            ->join('categories','products.category_id','=','categories.id')
            ->select('completed_orders.order_id',DB::raw('COUNT(distinct(order_items.order_id)) as count'),'delivery__infos.user_id')
            ->where('categories.category_name','=','Plants')
            ->whereBetween('order_completed_date', [$from, $to])
            ->groupBy('user_id')
            ->orderBy('user_id','asc')
            ->get();

            $fishfood_cat_purchased_count =  DB::table('completed_orders')
            ->join('delivery__infos','completed_orders.order_id','=','delivery__infos.id')
            ->join('order_items','delivery__infos.id','=','order_items.order_id')
            ->join('products','order_items.product_id','=','products.id')
            ->join('categories','products.category_id','=','categories.id')
            ->select('completed_orders.order_id',DB::raw('COUNT(distinct(order_items.order_id)) as count'),'delivery__infos.user_id')
            ->where('categories.category_name','=','Fishfood')
            ->whereBetween('order_completed_date', [$from, $to])
            ->groupBy('user_id')
            ->orderBy('user_id','asc')
            ->get();

            $decor_cat_purchased_count =  DB::table('completed_orders')
            ->join('delivery__infos','completed_orders.order_id','=','delivery__infos.id')
            ->join('order_items','delivery__infos.id','=','order_items.order_id')
            ->join('products','order_items.product_id','=','products.id')
            ->join('categories','products.category_id','=','categories.id')
            ->select('completed_orders.order_id',DB::raw('COUNT(distinct(order_items.order_id)) as count'),'delivery__infos.user_id')
            ->where('categories.category_name','=','Decorations')
            ->whereBetween('order_completed_date', [$from, $to])
            ->groupBy('user_id')
            ->orderBy('user_id','asc')
            ->get();

            $medi_cat_purchased_count =  DB::table('completed_orders')
            ->join('delivery__infos','completed_orders.order_id','=','delivery__infos.id')
            ->join('order_items','delivery__infos.id','=','order_items.order_id')
            ->join('products','order_items.product_id','=','products.id')
            ->join('categories','products.category_id','=','categories.id')
            ->select('completed_orders.order_id',DB::raw('COUNT(distinct(order_items.order_id)) as count'),'delivery__infos.user_id')
            ->where('categories.category_name','=','Medicines')
            ->whereBetween('order_completed_date', [$from, $to])
            ->groupBy('user_id')
            ->orderBy('user_id','asc')
            ->get();

            
            //dd($fish_cat_purchased_count);
            return view('admin.reports.online_purchase.cus_purchasing_anlyse_report',compact(['no_of_individual_purchases','fish_cat_purchased_count',
            'plant_cat_purchased_count','fishfood_cat_purchased_count','decor_cat_purchased_count','medi_cat_purchased_count']));
           

           //dd($decor_cat_purchased_count);
            //----------------------------------
        }
        //-----------sales inspection--------------
        else if($req->input('online-cat')==5){
            
           $take_product_supplier = $req->input('supplier'); 

        //before code modification
        // $products_sales = DB::table('completed_orders')
        // ->join('order_items','completed_orders.order_id','=','order_items.order_id')
        //  ->join('products','order_items.product_id','=','products.id')
        // ->whereBetween('order_completed_date', [$from, $to])
        // ->groupBy('order_items.product_id')
        // ->orderBy('order_items.order_id')
        // ->get();


        //after code modification
        $products_sales = DB::table('completed_orders')
        ->join('order_items','completed_orders.order_id','=','order_items.order_id')
         ->join('products','order_items.product_id','=','products.id')
        ->whereBetween('order_completed_date', [$from, $to])
        ->where('products.supplied_by','=',$take_product_supplier )
        ->groupBy('order_items.product_id')
        ->orderBy('order_items.order_id')
        ->get();

      //  dd($products_sales);

        $no_of_purchases = DB::table('completed_orders')
        ->join('order_items','completed_orders.order_id','=','order_items.order_id')
        ->join('products','order_items.product_id','=','products.id')
        ->select('order_items.product_id',DB::raw('COUNT(product_id) as id_count'))
        ->whereBetween('order_completed_date', [$from, $to])
        ->groupBy('order_items.product_id')
        ->orderBy('order_items.product_id')
        ->get();

        // dd($no_of_purchases);

        $average_of_qty = DB::table('completed_orders')
        ->join('order_items','completed_orders.order_id','=','order_items.order_id')
        ->join('products','order_items.product_id','=','products.id')
        ->select('order_items.product_id',DB::raw('avg(num_of_items) as average'))
        ->whereBetween('order_completed_date', [$from, $to])
        ->groupBy('order_items.product_id')
        ->orderBy('order_items.product_id')
        ->get(); 

          

        //dd($no_of_purchases);
         return view('admin.reports.online_purchase.sales_inspection_report_of_products',compact(['products_sales','no_of_purchases','average_of_qty']));
        //-----------------------------------
        }
        else if($req->input('online-cat')==6){
            echo "5";
        }
        

    }



}
