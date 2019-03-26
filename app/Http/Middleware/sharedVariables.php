<?php

namespace App\Http\Middleware;

use Closure;
use App\Resort;
class sharedVariables
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
        view()->share('resorts',Resort::all());
        return $next($request);
    }
}
