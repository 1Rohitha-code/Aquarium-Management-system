<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   
    


    public function authenticated() 
    {
        //admin login
        if(Auth::user()->role_as == 'admin')
        {
            return redirect('admin_dashboard')->with('status','Welcome to Dashboard');
        }
        //normal user login
        if(Auth::user()->role_as == NULL)
        {
            return redirect('/normal_user')->with('status','You are logged in successfully!');
        }
        //supplier login
        if(Auth::user()->role_as == 'supplier') 
        {
            if(Auth::user()->supplier_accessibility == 'disabled'){
                return redirect('/supplier_warning')->with('status','We are verifying your credentials. Please wait until we inform.');
               //-----------------------------------------------------
               if (isset($_COOKIE['laravel_session'])) {
                unset($_COOKIE['laravel_session']);
                setcookie('laravel_session', '', time() - 3600, '/'); // empty value and old timestamp
                }
               //-----------------------------------------------------

            }else{
                return redirect('/supplier_dashboard')->with('status','Welcome to Dashboard');
            }

      
            
        }
         //deliver boy login
         if(Auth::user()->role_as == 'deliver')
         {
             return redirect('/deliverer-dashboard')->with('status','Welcome to Dashboard');
         }
         //constructor's login
         if(Auth::user()->role_as == 'construct-member')
         {
             return redirect('/constructor-dashboard')->with('status','Welcome to Dashboard');
         }
         //staff login
         if(Auth::user()->role_as == 'staff')
         {
             return redirect('/staff-dashboard')->with('status','Welcome to Dashboard');
         }


    } 





    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
