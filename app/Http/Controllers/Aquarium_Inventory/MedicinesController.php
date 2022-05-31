<?php

namespace App\Http\Controllers\Aquarium_Inventory;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Medicines_details;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MedicinesController extends Controller
{
    //display insertion form
    public function index(){
        $category_type = Category::all();
        return view('admin.Inventory management.medicines.data_insertion_form',compact('category_type'));
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

      $medi_details = new Medicines_details();

      $medi_details->product_id = $get_product_id;

      $medi_details->characteristic_1 = $request->input('characteristic_1');
      $medi_details->characteristic_2 = $request->input('characteristic_2');
      $medi_details->characteristic_3 = $request->input('characteristic_3');
      $medi_details->characteristic_4 = $request->input('characteristic_4');
      $medi_details->treat_for = $request->input('treat_for');
      $medi_details->product_details = $request->input('product_details');
      $medi_details->instructions = $request->input('instructions');


      $medi_details->save();

    return redirect('/display_medicines_data')->with('status','Profile Created successfully!');
    }

        //display data
    public function display_medicines_data(){
        $medi_details = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('medicines_details', 'products.id', '=', 'medicines_details.product_id')
             ->select('products.*', 'categories.category_name','medicines_details.*')
             ->get();

        return view('admin.Inventory management.medicines.display_medicines_data',compact('medi_details'));
    }

    //edit method
    public function edit_medicines_data($id){

        $edit_product_data = Product::find($id);
        $product_id = $edit_product_data->id;

        $edit_medicine_profile = DB::table('medicines_details')->where('product_id', $product_id)->first();

      return view('admin.Inventory management.medicines.edit_medi_data',compact('edit_product_data','edit_medicine_profile') );
    }

     //Update method
     public function update_medicines_data(Request $request,$id){

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


           $update_medi_details = Medicines_details::all()->where('product_id', $last_product_id)->first();
           $update_medi_details->characteristic_1 = $request->input('characteristic_1');
           $update_medi_details->characteristic_2 = $request->input('characteristic_2');
           $update_medi_details->characteristic_3 = $request->input('characteristic_3');
           $update_medi_details->characteristic_4 = $request->input('characteristic_4');
           $update_medi_details->treat_for = $request->input('treat_for');
           $update_medi_details->product_details = $request->input('product_details');
           $update_medi_details->instructions = $request->input('instructions');


           $update_medi_details->save();


        return redirect('/display_medicines_data')->with('status','Profile updated successfully!');
    }

      //delete method
      public function delete( $id)
      {
          $product_data = Product::find($id);
          $product_data->delete();
          return redirect('/display_medicines_data')->with('status','The Item has been deleted successfully!');
      }

       //display all details
    public function see_more_medicine($id){

        $product_details = Product::find($id);
        $last_product_id = $product_details->id;
        $medi_details = Medicines_details::all()->where('product_id', $last_product_id)->first();

        //dd($product_details);
         return view('admin.Inventory management.medicines.see_more',compact('product_details','medi_details'));
    }



}
