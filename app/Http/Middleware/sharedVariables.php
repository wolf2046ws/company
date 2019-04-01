<?php

namespace App\Http\Middleware;

use Closure;
use App\Resort;
use App\User;
use Session;

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
        $AuthUser = User::where('user_id',Session::get('user')[0]->user_id)->first();
        view()->share('AuthUser',$AuthUser);
        return $next($request);
    }
}
