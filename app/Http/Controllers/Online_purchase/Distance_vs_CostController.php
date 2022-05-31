<?php

namespace App\Http\Controllers\Online_purchase;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Distance_vs_Cost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class Distance_vs_CostController extends Controller
{
    public function display_insertion_form(){
        return view('admin.online_purchase.insertion_form');
    }

    public function save_form(Request $request){
        $cities_and_cost = new Distance_vs_Cost();
        $cities_and_cost->city = $request->input('city');
        $cities_and_cost->cost = $request->input('cost');

        $cities_and_cost->save();

        $request->session()->flash('statuscode', 'success');
        return redirect('/city_vs_cost_form')->with('status','Data saved successfully!');

        
    }





}
