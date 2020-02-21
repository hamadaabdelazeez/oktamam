<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
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

        if (Auth::check()) 
        {
            
           if (Auth::User()->permission == 'administrator') 
           {
                return $next($request);
           }
           else{
            auth()->logout();
            return redirect()->route('login')->with('error',"you don't have permission to access this area");
           
           }
        }
        return redirect()->route('login');
        
    }
}
