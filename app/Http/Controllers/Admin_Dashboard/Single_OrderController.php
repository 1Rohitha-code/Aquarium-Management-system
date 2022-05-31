<?php

namespace App\Http\Controllers\Admin_Dashboard;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\Delivery_Info;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Single_OrderController extends Controller
{
    public function display_single_order($id){
        $delivery_info = Delivery_Info::find($id);
        
        $order_data = DB::table('delivery__infos')
            ->join('order_items', 'delivery__infos.id', '=', 'order_items.order_id')
            ->select('order_items.*', 'delivery__infos.*')
            ->where('order_id','=',$id)
            ->get();
            
           // dd($delivery_info);
       return view('admin.single_order.pdf',compact(['order_data','delivery_info']));
    }

    public function downloadPDF($id) {
        $delivery_info = Delivery_Info::find($id);

        $order_data = DB::table('delivery__infos')
        ->join('order_items', 'delivery__infos.id', '=', 'order_items.order_id')
        ->select('order_items.*', 'delivery__infos.*')
        ->where('order_id','=',$id)
        ->get();

       // dd($show);
        $pdf = PDF::loadView('admin.single_order.pdf', compact(['delivery_info','order_data']));
        
      return $pdf->download('admin.single_order.pdf');
        
    }
}
