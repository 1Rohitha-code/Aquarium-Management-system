<?php

namespace App\Http\Controllers\Customer;

use App\Models\Product;
use App\Models\Fish_details;
use Illuminate\Http\Request;
use App\Models\Plant_details;
use App\Models\Fishfood_details;
use App\Models\Medicines_details;
use App\Models\Decoration_details;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GallaryController extends Controller
{

    public function display(Request $request)
    {
        $list_of_fish = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('fish_details', 'products.id', '=', 'fish_details.product_id')
         ->select('products.*', 'categories.category_name','fish_details.color_form','products.quantity')
         ->get();
         //dd($list_of_fish);

         $logged_in_cus_mail= Auth::user()->email;
         $get_order_count = DB::table('delivery__infos')->where('email','=',$logged_in_cus_mail)
         ->orderBy('created_at', 'desc')
         ->count();
         //dd($get_order_count);

        return view('normal-user-pages.display items.ornamental fish.img_gallary',compact(['list_of_fish','get_order_count']));
    }

    public function seemore($id){

        $product_details = Product::find($id);
        $last_product_id = $product_details->id;
        $fish_details = Fish_details::all()->where('product_id', $last_product_id)->first();
   
       // $get_product_availability = Product::find($id);
      
       return view('normal-user-pages.display items.ornamental fish.see more',compact(['product_details','fish_details']));
        
    }


    //----------------------------------------------------------------
    public function display_plants(Request $request)
    {
        $list_of_plant = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('plant_details', 'products.id', '=', 'plant_details.product_id')
         ->select('products.*', 'categories.category_name','plant_details.*')
         ->get();
        // dd($list_of_fish);

        return view('normal-user-pages.display items.live_plants.img_gallary',compact('list_of_plant'));
    }

    public function seemore_plants($id){

        $product_details = Product::find($id);
        $last_product_id = $product_details->id;
        $plant_details = Plant_details::all()->where('product_id', $last_product_id)->first();
    return view('normal-user-pages.display items.live_plants.see_more',compact('product_details','plant_details'));
        //dd($plant_details);
    }
     //----------------------------------------------------------------

      //-----------------decorations-----------------------------------------------
    public function display_decor(Request $request)
    {
        $decorations = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('decoration_details', 'products.id', '=', 'decoration_details.product_id')
         ->select('products.*', 'categories.category_name','decoration_details.*')
         ->get();
        // dd($list_of_fish);

        return view('normal-user-pages.display items.decorations.img_gallary',compact('decorations'));
    }

    public function seemore_decor($id){

        $product_details = Product::find($id);
        $last_product_id = $product_details->id;
        $decor_details = Decoration_details::all()->where('product_id', $last_product_id)->first();
    return view('normal-user-pages.display items.decorations.see_more',compact('product_details','decor_details'));
        //dd($plant_details);
    }
     //----------------------------------------------------------------


       //-----------------fishfood-----------------------------------------------
    public function display_fishfood(Request $request)
    {
        $fishfood = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('fishfood_details', 'products.id', '=', 'fishfood_details.product_id')
         ->select('products.*', 'categories.category_name','fishfood_details.*')
         ->get();
        // dd($list_of_fish);

        return view('normal-user-pages.display items.fish_food.fish_food_gallary',compact('fishfood'));
    }

    public function seemore_fishfood($id){

        $product_details = Product::find($id);
        $last_product_id = $product_details->id;
        $fishfood_details = Fishfood_details::all()->where('product_id', $last_product_id)->first();
    return view('normal-user-pages.display items.fish_food.see_more',compact('product_details','fishfood_details'));
        //dd($product_details);
    }
     //----------------------------------------------------------------


     //-----------------medicines gallary-----------------------------------------------
    public function display_medi(Request $request)
    {
        $medicines = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('medicines_details', 'products.id', '=', 'medicines_details.product_id')
         ->select('products.*', 'categories.category_name','medicines_details.*')
         ->get();
        // dd($list_of_fish);

        return view('normal-user-pages.display items.medicines.medi_gallary',compact('medicines'));
    }

    public function seemore_medi($id){

        $product_details = Product::find($id);
        $last_product_id = $product_details->id;
        $medi_details = Medicines_details::all()->where('product_id', $last_product_id)->first();
    return view('normal-user-pages.display items.medicines.see_more',compact('product_details','medi_details'));
        //dd($product_details);
    }
     //----------------------------------------------------------------




}
