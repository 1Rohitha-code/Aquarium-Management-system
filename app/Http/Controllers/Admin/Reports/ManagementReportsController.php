<?php

namespace App\Http\Controllers\Admin\Reports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ManagementReportsController extends Controller
{
    public function display_all_report_modules(){
        //maximum date value
        $max_date_val = DB::table('completed_orders')->max('order_completed_date');
        //minimum date value
         $min_date_val = DB::table('completed_orders')->min('order_completed_date');


         //-------------code modification---------------------------------
         $products_sales_suppliers = DB::table('completed_orders')
        ->join('order_items','completed_orders.order_id','=','order_items.order_id')
         ->join('products','order_items.product_id','=','products.id')
        ->groupBy('products.supplied_by')
        ->orderBy('order_items.order_id')
        ->get();
         //-------------code modification---------------------------------
        

        return view('admin.reports.display_reports_page',compact(['max_date_val','min_date_val','products_sales_suppliers']));
    }
}
