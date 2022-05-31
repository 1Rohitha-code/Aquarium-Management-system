<?php

namespace App\Http\Controllers\Activities;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class UsermangementController extends Controller
{
    public function show_users(){

        $users = User::all();
       //dd($users);
       return view('admin.user_mngmnt.user_roles')->with('user_roles',$users);
    }
  
    public function edit($id)
        {
            $users = User::find($id);
             return view('admin.user_mngmnt.user_roles')->with('user_roles',$users);

        }

        public function update(Request $request, $id)
        {
            $users = User::find($id);

            $users->role_as = $request->input('role_as');

            $users->save();

          $request->session()->flash('statuscode', 'info');
         return redirect('/user_privileges')->with('status','User Type has been Updated successfully!');

        }


        public function delete($id)
        {
            $users = User::find($id);
            $users->delete();

            //$request->session()->flash('statuscode', 'error');
            if($users->role_as == "supplier"){
                return redirect('/supplier_list')->with('status','The user profile has been deleted successfully!');  
            }else{
                return redirect('/user_privileges')->with('status','The user profile has been deleted successfully!');
            }
           
        }

        public function display_supplier_list(){
            $users = User::all();
            return view('admin.user_mngmnt.supplier_list',compact('users'));
        }

        public function view_supplier_details($id){
            return User::find($id);
        }

        public function update_supplier_status(Request $request, $id)
        {
            $users = User::find($id);

            $users->supplier_accessibility = $request->input('supplier_accessibility');
           $users->save();
         
            //send mail code

                if($users->	supplier_accessibility == "activated"){
                    $data = array(
                        'supplied_by'=>  $users->supplied_by,
                        'supplier_accessibility' => $request->input('supplier_accessibility'),
                        'name'   =>   $users->name,
                        'email'     =>  $users->email,
                    );
        
                
        
                    Mail::to($users->email)->send(new SendMail($data));
                $request->session()->flash('statuscode', 'success');
                return redirect('/supplier_list')->with('status','Accessibility status updated successfully!');
                }else{

                    $data = array(
                        'supplied_by'=>  $users->supplied_by,
                        'supplier_accessibility' => $request->input('supplier_accessibility'),
                        'email'     =>  $users->email,
                    );
        
                   // dd($data);
        
                    Mail::to($users->email)->send(new SendMail($data));
                    $request->session()->flash('statuscode', 'success');
                    return redirect('/supplier_list')->with('status','Accessibility status updated successfully!');
                }
           

        }
}
