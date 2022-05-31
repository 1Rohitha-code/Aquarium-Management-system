<?php

namespace App\Http\Controllers\Aquarium_Inventory;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Decoration_details;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DecorationController extends Controller
{
    //display insertion form
    public function index(){
        $category_type = Category::all();
        return view('admin.Inventory management.decorations.data_insertion_form',compact('category_type'));
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

    //  dd($product);

$product->save();


$get_product_id = $product->id;

  $decoration_details = new Decoration_details();
  $decoration_details->product_id = $get_product_id;

  $decoration_details->color = $request->input('color');
  $decoration_details->material = $request->input('material');
  $decoration_details->size = $request->input('size');
  $decoration_details->about_item = $request->input('about_item');

  $decoration_details->save();

return redirect('/display_decoration_data')->with('status','Profile Created successfully!');
}

 //display data
 public function display_decoration_data(){
    $decorations_list = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('decoration_details', 'products.id', '=', 'decoration_details.product_id')
         ->select('products.*', 'categories.category_name','decoration_details.*')
         ->get();

    return view('admin.Inventory management.decorations.display_decoration_data',compact('decorations_list'));
}


    //edit method
    public function edit_plant_data($id){

        $edit_product_data = Product::find($id);
        $product_id = $edit_product_data->id;

        $edit_decoration_profile = DB::table('decoration_details')->where('product_id', $product_id)->first();

      return view('admin.Inventory management.decorations.edit_decoration_data',compact('edit_product_data','edit_decoration_profile') );
    }

//Update method
public function update_decoration_data(Request $request,$id){

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

       $update_decoration_details = Decoration_details::all()->where('product_id', $last_product_id)->first();

       $update_decoration_details->color = $request->input('color');
       $update_decoration_details->material = $request->input('material');
       $update_decoration_details->size = $request->input('size');
       $update_decoration_details->about_item = $request->input('about_item');

       $update_decoration_details->save();


    return redirect('/display_decoration_data')->with('status','Profile updated successfully!');
}

 //delete method
 public function delete($id)
 {
     $product_data = Product::find($id);
     $product_data->delete(); 
     return redirect('/display_decoration_data')->with('status','The Item has been deleted successfully!');
 }

   //display all details
   public function see_more_decor($id){

    $product_details = Product::find($id);
    $last_product_id = $product_details->id;
    $decoration_details = Decoration_details::all()->where('product_id', $last_product_id)->first();

    //dd($product_details);
     return view('admin.Inventory management.decorations.see_more',compact('product_details','decoration_details'));
}

}
