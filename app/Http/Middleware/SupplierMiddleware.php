<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SupplierMiddleware
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





        if(Auth::user()->role_as == 'supplier' && (Auth::user()->supplier_accessibility == 'activated'))
        {
            return $next($request);
        }else{
            return redirect('/supplier_warning')->with('status','You are not allowed to access this page until Administrator granted permission!');
        }

        if(Auth::user()->role_as == 'admin')
        {
            return redirect('/warning')->with('status','You are not allowed to access the Supplier Dashboard.!');
        }

        if(Auth::user()->role_as == 'deliver')
        {
            return redirect('/warning')->with('status','You are not allowed to access the Supplier Dashboard.!');
        }
        if(Auth::user()->role_as == 'construct-member')
        {
            return redirect('/warning')->with('status','You are not allowed to access the Supplier Dashboard.!');
        }
        if(Auth::user()->role_as == NULL)
        {
            return redirect('/warning')->with('status','You are not allowed to access the Supplier Dashboard.!');
        }
        if(Auth::user()->role_as == 'staff')
        {
            return redirect('/warning')->with('status','You are not allowed to access the Supplier Dashboard.!');
        }

    }

   
}
