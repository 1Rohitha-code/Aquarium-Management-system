<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class POController extends Controller
{
    public function list_of_po(){

        $get_user_id = Auth::user()->id;
        $get_user_comp = DB::table('users')
        ->select('supplied_by')
        ->where('id','=',$get_user_id)
        ->value('supplied_by');

       // dd($get_user_details); 

        $po_details = DB::table('p_o__details')
        ->where('supplier_comp_name','=',$get_user_comp)
        ->get();
       // dd($po_details);
        return view('supplier.po.list_of_po',compact('po_details'));
    }
}
