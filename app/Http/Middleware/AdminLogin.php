<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
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

        // dd('ss');

        if(session('adminUser.aname'))
        {   
             return $next($request);
             // dd('111');
            
        }else{
             return redirect('admin/login');
        }


    }
}

