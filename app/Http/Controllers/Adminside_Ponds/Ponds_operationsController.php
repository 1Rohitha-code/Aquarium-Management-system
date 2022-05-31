<?php

namespace App\Http\Controllers\Adminside_Ponds;

use App\Ponds_operations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class Ponds_operationsController extends Controller
{
    public function index(){
        return view('admin.ponds.ponds_adding_form');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'required_area' => 'required',
            'image' => 'required|image',
            'depth' => 'required',
            'total_cost' => 'required|numeric',
            'aqua_plants' => 'nullable|string',
            'fish_type' => 'nullable',
            'duration' => 'required|string',
            'dec_water_type'=>'nullable',
            'aqua_plants' => 'nullable',
            'filter_type'=>'nullable',
            'stones_gravel_type'=>'nullable'
            // 'qty'=>'required|numeric',
            // 'image'=>'required|image',

        ]);

        $ponds_info = new Ponds_operations();
       
        $ponds_info->required_area = $request->input('required_area');
        $ponds_info->depth = $request->input('depth');
        $ponds_info->duration = $request->input('duration');
        $ponds_info->total_cost = $request->input('total_cost');
        $ponds_info->image = $request->input('image');         
        $ponds_info->place = $request->input('place');
        $ponds_info->dec_water_type = $request->input('dec_water_type');
        $ponds_info->plmbing_type = $request->input('plmbing_type');
        $ponds_info->pond_pumps = $request->input('pond_pumps');
        $ponds_info->led_lightning = $request->input('led_lightning');
        $ponds_info->aqua_plants = $request->input('aqua_plants');
        $ponds_info->filter_type= $request->input('filter_type');
        $ponds_info->fish_types = $request->input('fish_types');
        $ponds_info->stones_gravel_type = $request->input('stones_gravel_type');


        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/ponds',$filename);
            $ponds_info->image = $filename;

        }else{
            return $request;
            $ponds_info->image = '';
        }

     
        $ponds_info->save();

        $request->session()->flash('statuscode', 'success');
        return redirect('/view_ponds_list')->with('status','New Item added successfully!');
        //dd($ponds_info);
        }

        public function show_ponds(){
            $ponds_info = Ponds_operations::all();
            return view('admin.ponds.display_ponds')->with('display_ponds',$ponds_info);
        }

        public function pond_edit($id)
        {
            $ponds_info = Ponds_operations::find($id);
             return view('admin.ponds.edit_pond_profile')->with('edit_pond_profile',$ponds_info);

        }

        public function pond_update(Request $request, $id)
        {
            $ponds_info = Ponds_operations::find($id);

            $ponds_info->required_area = $request->input('required_area');
            $ponds_info->depth = $request->input('depth');
            $ponds_info->duration = $request->input('duration');
            $ponds_info->total_cost = $request->input('total_cost');        
            $ponds_info->place = $request->input('place');
            $ponds_info->dec_water_type = $request->input('dec_water_type');
            $ponds_info->plmbing_type = $request->input('plmbing_type');
            $ponds_info->pond_pumps = $request->input('pond_pumps');
            $ponds_info->led_lightning = $request->input('led_lightning');
            $ponds_info->aqua_plants = $request->input('aqua_plants');
            $ponds_info->filter_type= $request->input('filter_type');
            $ponds_info->fish_types = $request->input('fish_types');
            $ponds_info->stones_gravel_type = $request->input('stones_gravel_type');
    
    
            if($request->hasfile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/ponds',$filename);
                $ponds_info->image = $filename;
           
            }

            $ponds_info->save();

            $request->session()->flash('statuscode', 'info');
            return redirect('/view_ponds_list')->with('status','The profile has been Updated successfully!');

        }

        public function pond_delete($id)
        {
            $ponds_info = Ponds_operations::find($id);
            $ponds_info->delete();

            //$request->session()->flash('statuscode', 'error');
            return redirect('/view_ponds_list')->with('status','The Item has been deleted successfully!');
        }
        
        public function pond_seemore($id){
            $data = DB::table('ponds')->where('id',$id)->first();
          return view('admin.ponds.see_more',compact('data'));
            //dd($data);
         }

         //see more about ponds
         public function seemore($id){
            $data = DB::table('ponds')->where('id',$id)->first();
          return view('admin.ponds.see_more',compact('data'));
            //dd($data);
         }





}
