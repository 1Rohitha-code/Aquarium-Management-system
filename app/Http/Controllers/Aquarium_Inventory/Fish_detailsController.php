<?php

namespace App\Http\Controllers\Aquarium_Inventory;

use App\Http\Controllers\Controller;
use App\Models\Fish_details;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Fish_detailsController extends Controller
{
    //display insertion form
    public function index(){
        $category_type = Category::all();


        return view('admin.Inventory management.fish.data_insertion_form',compact('category_type'));
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

       $last_product_id = $product->id;

      $fish_details = new Fish_details();
      $fish_details->product_id = $last_product_id;
      $fish_details->care_level = $request->input('care_level');
      $fish_details->color_form = $request->input('color_form');
      $fish_details->temperament = $request->input('temperament');
      $fish_details->feeding = $request->input('feeding');
      $fish_details->water_condition = $request->input('water_condition');
      $fish_details->size = $request->input('size');
      $fish_details->behaviour = $request->input('behaviour');
      $fish_details->fish_type = $request->input('fish_type');
      $fish_details->breeding_time = $request->input('breeding_time');

      $fish_details->save();


     return redirect('/display_fish_data')->with('status','Profile Created successfully!');
    }

    //display data
    public function display_fish_data(){
        $fish_details = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('fish_details', 'products.id', '=', 'fish_details.product_id')
             ->select('products.*', 'categories.category_name','fish_details.color_form')
             ->get();
           

        return view('admin.Inventory management.fish.display_fish_data',compact('fish_details'));
    }

        //edit method
        public function edit_fish_data($id){

            $edit_product_data = Product::find($id);
            $product_id = $edit_product_data->id;

            $edit_fish_data= DB::table('fish_details')->where('product_id', $product_id)->first();

          return view('admin.Inventory management.fish.edit_fish_data',compact('edit_product_data','edit_fish_data') );
        }

        //Update method
        public function update_fish_data(Request $request,$id){

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
           // DB::table('fish_details')->where('product_id', $last_product_id)->first()
               $fish_details = Fish_details::all()->where('product_id', $last_product_id)->first();
               $fish_details->care_level = $request->input('care_level');
               $fish_details->color_form = $request->input('color_form');
               $fish_details->temperament = $request->input('temperament');
               $fish_details->feeding = $request->input('feeding');
               $fish_details->water_condition = $request->input('water_condition');
               $fish_details->size = $request->input('size');
               $fish_details->behaviour = $request->input('behaviour');
               $fish_details->fish_type = $request->input('fish_type');
               $fish_details->breeding_time = $request->input('breeding_time');
               $fish_details->save();


            return redirect('/display_fish_data')->with('status','Profile updated successfully!');
        }

             //delete method
    public function delete( $id)
    {
        $product_data = Product::find($id);
        $product_data->delete();
        return redirect('/display_fish_data')->with('status','The Item has been deleted successfully!');
    }

    //display all details
    public function see_more_fish($id){

        $product_details = Product::find($id);
        $last_product_id = $product_details->id;
        $fish_details = Fish_details::all()->where('product_id', $last_product_id)->first();

         return view('admin.Inventory management.fish.see_more',compact('product_details','fish_details'));
    }

}
