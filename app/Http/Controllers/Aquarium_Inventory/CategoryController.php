<?php

namespace App\Http\Controllers\Aquarium_Inventory;

use App\Models\Fish_details;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function display_form(){
        return view('admin.Inventory management.category.insertion_form');
    }

    public function save(Request $request){

        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->save();

      return redirect('/cat_form')->with('status','New Category Created successfully!');
    }

    // public function fetch_data_into_fish_form(){
    //     $category_type = Category::all();

    //    return view('admin.Inventory management.fish.data_insertion_form',compact('category_type'));


    // }
}
