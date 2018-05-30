<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Login
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
        // dd('sss');
        $url = $_SERVER['REQUEST_URI'];
        session::put('backurl',$url);
        // dd($url);
         
        $user = session('homeUser.uid');

        if($user){
            return $next($request);
        }else{
            return redirect('/home/login'); 
        }
        
    }
}
