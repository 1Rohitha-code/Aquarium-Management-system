<?php

namespace App\Http\Controllers\Admin\Supplier_management;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function list_of_invoice(){
      

        $display_invoice_data = DB::table('invoice_details')
        ->join('users','invoice_details.sup_id','=','users.id')
        ->get();

        return view('admin.invoice.invoice_list',compact('display_invoice_data'));
    }
}
