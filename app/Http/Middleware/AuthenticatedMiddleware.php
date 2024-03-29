<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use URL;
use Sentinel;

class AuthenticatedMiddleware
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
        if(Sentinel::check()){
            return $next($request);
        }else{
            return response()->view('login.login_01');
        }
    }
}
