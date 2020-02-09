<?php

namespace App\Http\Middleware;

use Closure;
use use Illuminate\Support\Facades\Auth;

class Check
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
    
        return $next($request);
    }
}
