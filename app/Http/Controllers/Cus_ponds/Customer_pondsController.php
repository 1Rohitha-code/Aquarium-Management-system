<?php

namespace App\Http\Controllers\Cus_ponds;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Customer_pondsController extends Controller
{
    public function seemore($id){
        $data = DB::table('ponds')->where('id',$id)->first();
      return view('normal-user-pages.request_for_pond.see_more',compact('data'));
        //dd($data);
     }
}
