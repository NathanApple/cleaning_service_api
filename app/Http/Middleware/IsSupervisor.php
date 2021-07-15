<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsSupervisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if($guard != null)
        auth()->shouldUse($guard);
        // Pre-Middleware Action
        if( Auth::user()){
            if (Auth::user()->role == 'supervisor'){
                return $next($request);

            } else {
                return response()->json(['message'=>'User is not authorized'], 401);

            }
        } else {
            return response()->json(['message'=>'User is not logged in'], 401);

        }


    }
}
