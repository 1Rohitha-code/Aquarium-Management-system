<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class NormaluserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      
        if(Auth::user()->role_as == NULL)
        {
            return $next($request);
        }

        if(Auth::user()->role_as == 'admin')
        {
            return redirect('/warning')->with('status','You are not allowed to access the User Dashboard.!');
        }
        if (Auth::user()->role_as == 'supplier') 
        {
           
           return redirect('/warning')->with('status','You are not allowed to access this page!');
              
              
        }
        if(Auth::user()->role_as == 'deliver')
        {
            return redirect('/warning')->with('status','You are not allowed to access this page!');
        }
        if(Auth::user()->role_as == 'construct-member')
        {
            return redirect('/warning')->with('status','You are not allowed to access this page!');
        }
        if(Auth::user()->role_as == 'staff')
        {
            return redirect('/warning')->with('status','You are not allowed to access this page!');
        }
     


    }
}
