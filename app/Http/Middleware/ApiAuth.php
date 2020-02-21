<?php

namespace App\Http\Middleware;
use App\User;

use Closure;

class ApiAuth
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
        if (!empty($request->header('jwt'))) {
            $get = User::where('jwt',$request->header('jwt'))->count();
            if ($get == 1) {
                return $next($request);
            }
            else{
                return ApiResponse(404,['jwt' => 'is invalid'],[]);
            }
        }
        
    }
}
