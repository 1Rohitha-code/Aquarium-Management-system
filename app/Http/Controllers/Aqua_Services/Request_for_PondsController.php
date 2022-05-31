<?php

namespace App\Http\Controllers\Aqua_Services;


use App\Ponds_operations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class Request_for_PondsController extends Controller
{
    public function display(){
        return view('normal-user-pages.request_for_pond.entry_page');
    }



    //this method is used to display predefined ponds gallary
    // public function  show($id){
    //     $data = DB::table('ponds')->where('id',$id)->first();
    //   return view('normal-user-pages.request_for_pond.predefined_pond_gallary',compact('data'));
    //     dd($data);
    // }


   



    public function show_predefined_gallary(Request $request){

        $ponds = Ponds_operations::all();
            
        return view('normal-user-pages.request_for_pond.predefined_pond_gallary')->with('predefined_pond_gallary',$ponds);
        //dd($ponds);
    }



}
