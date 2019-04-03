<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Closure;

class checkAuth
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
        //return $next($request);
        $user = Session::get('user');
        if($user == null){
            return redirect(route('login'));
        }
       // dd($user);
        return $next($request);
    }
}
