<?php

namespace App\Http\Controllers\Admin_Dashboard;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;

class DashboardController extends Controller
{
  public function show_control_panel(){  

  
      $get_no_of_users = DB::table('users')->count();
      $get_no_of_orders = DB::table('delivery__infos')
      ->where('delivery__infos.id','>','0')
      ->where('order_status','<>','Handed over to the customer')
      ->count();
   


    $get_product_data =  DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.category_name')
            ->where('products.quantity', '<=','255')
            ->orderBy('products.updated_at','asc')
            ->limit(10)
            ->get();

          //  dd($get_product_data);
    
    $no_of_cancelled = DB::table('delivery__infos')
    ->where('order_status','=','Delivery process cancelled')
    ->count();

    $no_of_tasks_to_be_asigned = DB::table('delivery__infos')
    ->where('order_status','=','pending')
    ->count(); 

    $no_of_sup_requests = DB::table('users')
    ->where('role_as','=','supplier')
    ->where('supplier_accessibility','=','disabled')
    ->count();

    $no_of_active_sup = DB::table('users')
    ->where('role_as','=','supplier')
    ->where('supplier_accessibility','=','activated')
    ->count();

    $items_to_be_ordered =  DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->select('products.*', 'categories.category_name')
        ->where('products.quantity', '<=','255')
        ->orderBy('products.updated_at','asc')
        ->count();

   // dd($items_to_be_ordered);
   return view('admin.dashboard',compact(['get_no_of_users','get_no_of_orders','no_of_cancelled','no_of_tasks_to_be_asigned','no_of_sup_requests','no_of_active_sup','items_to_be_ordered']));



  }

    

}
