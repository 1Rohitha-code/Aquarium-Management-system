<?php

namespace App\Http\Controllers\Aquarium_Inventory;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Plant_details;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Plant_detailsController extends Controller
{
    //display insertion form
    public function index(){
        $category_type = Category::all();
        return view('admin.Inventory management.plant.data_insertion_form',compact('category_type'));
    }

     //save method
     public function save(Request $request){

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
        //price increasing adds from here
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

      $plant_details = new Plant_details();
      $plant_details->product_id = $get_product_id;
      $plant_details->growth_rate = $request->input('growth_rate');
      $plant_details->light_demand = $request->input('light_demand');
      $plant_details->available_as = $request->input('available_as');
      $plant_details->placement_in_tank = $request->input('placement_in_tank');
      $plant_details->pH = $request->input('pH');
      $plant_details->CO2 = $request->input('CO2');
      $plant_details->care_level = $request->input('care_level');
      $plant_details->leaves = $request->input('leaves');
      $plant_details->description = $request->input('description');

      $plant_details->save();

    return redirect('/display_plant_data')->with('status','Profile Created successfully!');
    }

        //display data
    public function display_plant_data(){
        $plant_details = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('plant_details', 'products.id', '=', 'plant_details.product_id')
             ->select('products.*', 'categories.category_name','plant_details.*')
             ->get();

        return view('admin.Inventory management.plant.display_plant_data',compact('plant_details'));
    }

    //edit method
    public function edit_plant_data($id){

        $edit_product_data = Product::find($id);
        $product_id = $edit_product_data->id;

        $plant_list = DB::table('plant_details')->where('product_id', $product_id)->first();

      return view('admin.Inventory management.plant.edit_plant_data',compact('edit_product_data','plant_list') );
    }

     //Update method
     public function update_plant_data(Request $request,$id){

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

           $update_plant_details = Plant_details::all()->where('product_id', $last_product_id)->first();
           $update_plant_details->growth_rate = $request->input('growth_rate');
           $update_plant_details->light_demand = $request->input('light_demand');
           $update_plant_details->available_as = $request->input('available_as');
           $update_plant_details->placement_in_tank = $request->input('placement_in_tank');
           $update_plant_details->pH = $request->input('pH');
           $update_plant_details->CO2 = $request->input('CO2');
           $update_plant_details->care_level = $request->input('care_level');
           $update_plant_details->leaves = $request->input('leaves');
           $update_plant_details->description = $request->input('description');

           $update_plant_details->save();


        return redirect('/display_plant_data')->with('status','Profile updated successfully!');
    }

      //delete method
      public function delete( $id)
      {
          $product_data = Product::find($id);
          $product_data->delete();
          return redirect('/display_plant_data')->with('status','The Item has been deleted successfully!');
      }

       //display all details
    public function see_more_plant($id){

        $product_details = Product::find($id);
        $last_product_id = $product_details->id;
        $plant_details = Plant_details::all()->where('product_id', $last_product_id)->first();
        
        return view('admin.Inventory management.plant.see_more',compact('product_details','plant_details'));
    }


}
