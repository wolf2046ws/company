<?php

namespace App\Http\Middleware;

use Closure;
use App\Resort;
use App\User;
use App\UserData;

use Session;

class sharedVariables
{
/*
    $authUserID = User::where('user_id',Session::get('user')[0]->user_id)->first();
    $userData = UserData::select('resort_id')->where('user_id',$authUserID->id)->get();
    if($userData){
        $resorts = Resort::whereIn("id",$userData)->get();
    }
    else{
        $resorts = Resort::where('id','=','0')->get();
    }
*/

    public function handle($request, Closure $next)
    {
        //view()->share('resorts',Resort::all());

        $AuthUser = User::where('user_id',Session::get('user')[0]->user_id)->first();
        $userData = UserData::select('resort_id')->where('user_id',$AuthUser->id)->get();
        if($userData){
            $resorts = Resort::whereIn("id",$userData)->get();
        }
        else{
            $resorts = Resort::where('id','=','0')->get();
        }

        view()->share('resorts',$resorts);
        view()->share('AuthUser',$AuthUser);
        return $next($request);
    }

}
