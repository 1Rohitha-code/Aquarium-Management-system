<?php

namespace App\Http\Controllers\Aquarium_Inventory;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Fishfood_details;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FishfoodController extends Controller
{
    //display insertion form
    public function index(){
        $category_type = Category::all();
        return view('admin.Inventory management.fishfood.data_insertion_form',compact('category_type'));
    }

//save method
public function save_form(Request $request){

    $validatedData = $request->validate([
        'product_name' => 'required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
        'unit_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'quantity' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'supplied_by' => 'required',
        'price_increasing' => 'required|regex:/^\d+(\.\d{1,2})?$/',
       
    ]);

    $product = new Product();
    $product->product_name = $request->input('product_name');
    $product->image = $request->input('image');
    $product->price_increasing = $request->input('price_increasing');
    if($product->price_increasing == ""){$product->price_increasing = 0;};
    $product->unit_price = $request->input('unit_price')+($product->price_increasing);
    $product->category_id = $request->input('category_id');
    $product->quantity = $request->input('quantity');
    // $product->availability= $request->input('availability');
    $product->supplied_by = $request->input('supplied_by');

    if($request->hasfile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/product_imgs',$filename);
        $product->image = $filename;

    }else{
        return $request;
        $product->image = '';
    }

$product->save();


$get_product_id = $product->id;

  $fishfood_details = new Fishfood_details();
  $fishfood_details->product_id = $get_product_id;

  $fishfood_details->characteristic_1 = $request->input('characteristic_1');
  $fishfood_details->characteristic_2 = $request->input('characteristic_2');
  $fishfood_details->characteristic_3 = $request->input('characteristic_3');
  $fishfood_details->characteristic_4 = $request->input('characteristic_4');
  $fishfood_details->weight = $request->input('weight');
  $fishfood_details->available_as = $request->input('available_as');
  $fishfood_details->product_details = $request->input('product_details');
  $fishfood_details->ingredients = $request->input('ingredients');
  $fishfood_details->feeding_suggestions = $request->input('feeding_suggestions');


  $fishfood_details->save();

return redirect('/display_fishfood_data')->with('status','Profile Created successfully!');
}

     //display data
 public function display_fishfood_data(){
    $fishfood_list = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('fishfood_details', 'products.id', '=', 'fishfood_details.product_id')
         ->select('products.*', 'categories.category_name','fishfood_details.*')
         ->get();

    return view('admin.Inventory management.fishfood.display_fishfood_data',compact('fishfood_list'));
}

//edit method
public function edit_fishfood_data($id){

    $edit_product_data = Product::find($id);
    $product_id = $edit_product_data->id;

    $edit_fishfood_profile = DB::table('fishfood_details')->where('product_id', $product_id)->first();

  return view('admin.Inventory management.fishfood.edit_fishfood_data',compact('edit_product_data','edit_fishfood_profile') );
}


//Update method
public function update_fishfood_data(Request $request,$id){

    $update_product_details = Product::find($id);
    $update_product_details ->product_name = $request->input('product_name');
    $update_product_details ->unit_price = $request->input('unit_price');
    $update_product_details ->quantity = $request->input('quantity');
    $update_product_details ->supplied_by = $request->input('supplied_by');

    if($request->hasfile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/product_imgs',$filename);
        $update_product_details->image = $filename;
    }

    $update_product_details->save();

    $last_product_id = $update_product_details->id;

       $update_fishfood_details = Fishfood_details::all()->where('product_id', $last_product_id)->first();

    $update_fishfood_details->characteristic_1 = $request->input('characteristic_1');
    $update_fishfood_details->characteristic_2 = $request->input('characteristic_2');
    $update_fishfood_details->characteristic_3 = $request->input('characteristic_3');
    $update_fishfood_details->characteristic_4 = $request->input('characteristic_4');
    $update_fishfood_details->weight = $request->input('weight');
    $update_fishfood_details->available_as = $request->input('available_as');
    $update_fishfood_details->product_details = $request->input('product_details');
    $update_fishfood_details->ingredients = $request->input('ingredients');
    $update_fishfood_details->feeding_suggestions = $request->input('feeding_suggestions');

    $update_fishfood_details->save();


    return redirect('/display_fishfood_data')->with('status','Profile updated successfully!');
}


//delete method
public function delete( $id)
{
    $product_data = Product::find($id);
    $product_data->delete(); 
    return redirect('/display_fishfood_data')->with('status','The Item has been deleted successfully!');
}

//display all details
public function see_more_fishfood($id){

    $product_details = Product::find($id);
    $last_product_id = $product_details->id;
    $fishfood_details = Fishfood_details::all()->where('product_id', $last_product_id)->first();

    return view('admin.Inventory management.fishfood.see_more',compact('product_details','fishfood_details'));
}

}
