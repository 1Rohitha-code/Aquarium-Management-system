<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Fish_details;
use Illuminate\Http\Request;
use App\Models\Plant_details;
use App\Models\Fishfood_details;
use App\Models\Medicines_details;
use App\Models\Decoration_details;

class SearchProductController extends Controller
{
    public function search_product(Request $req){
        $validatedData = $req->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'qty'=>'required|numeric',
            'image'=>'required|image',


        ]); 


            $data = Product::
            where('product_name', 'like', '%'.$req->input('query').'%')
            ->get();

                return view('normal-user-pages.display items.search',['products'=>$data]);
         

    }


    public function more_details($id){

        $get_cat_id = Product::find($id)->category_id;

            if($get_cat_id){
                $get_cat_name = Category::find($get_cat_id )->category_name;
                // echo  "Category ID :".$get_cat_id ;
                // echo "<br>";
                // echo  "Category name :".$get_cat_name;
                
                //inside if starts
                if($get_cat_name == 'Ornamentalfish'){
                    
            $product_details = Product::find($id);
            $last_product_id = $product_details->id;
            $fish_details = Fish_details::all()->where('product_id', $last_product_id)->first();
             return view('normal-user-pages.display items.ornamental fish.see more',compact('product_details','fish_details'));
                
            }elseif ($get_cat_name=='Plants') {
                    //echo "This is Plant category";
                    $product_details = Product::find($id);
                    $last_product_id = $product_details->id;
                    $plant_details = Plant_details::all()->where('product_id', $last_product_id)->first();
                return view('normal-user-pages.display items.live_plants.see_more',compact('product_details','plant_details'));
                 
            }elseif($get_cat_name=='Decorations'){
                    //echo "This is Decoration category";
                    $product_details = Product::find($id);
                    $last_product_id = $product_details->id;
                    $decor_details = Decoration_details::all()->where('product_id', $last_product_id)->first();
                return view('normal-user-pages.display items.decorations.see_more',compact('product_details','decor_details'));

                  } elseif($get_cat_name=='Fishfood'){
                   // echo "This is Fishfood category";
                   $product_details = Product::find($id);
                   $last_product_id = $product_details->id;
                   $fishfood_details = Fishfood_details::all()->where('product_id', $last_product_id)->first();
               return view('normal-user-pages.display items.fish_food.see_more',compact('product_details','fishfood_details'));

                  }elseif($get_cat_name=='Medicines'){
                    //echo "This is Medicines category";
                    $product_details = Product::find($id);
        $last_product_id = $product_details->id;
        $medi_details = Medicines_details::all()->where('product_id', $last_product_id)->first();
    return view('normal-user-pages.display items.medicines.see_more',compact('product_details','medi_details'));

                  }else{
                   echo "another category";
                  }
                //inside if ends



            }//outer if ends
       
    }
}
