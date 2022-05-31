<?php

namespace App\Http\Controllers\Supplier;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class SupplierRegController extends Controller
{
 
   

   public function register_supplier(Request $request){
    //    return $request;

    $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'supplied_by' => ['required',
        'regex:/(^([a-zA-Z]+))/u'],
        'contact_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'address_line1' => ['required', 'string'],
        'address_line2' => ['required', 'string'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],


    ]);

    $reg_supplier = new User();
    $reg_supplier->supplied_by = $request->input('supplied_by');
    $reg_supplier->name = $request->input('name');
    $reg_supplier->email = $request->input('email');
    $reg_supplier->address_line1 = $request->input('address_line1');
    $reg_supplier->address_line2 = $request->input('address_line2');
    $reg_supplier->role_as = "supplier";
    $reg_supplier->contact_no= $request->input('contact_no');
    $reg_supplier->password = Hash::make($request['password']);

    //dd($reg_supplier);
    $reg_supplier->save();


    return redirect('/')->with('status','Thank you for registering.We are verifying your credentials.Pls wait.');

   }

   
    
}
