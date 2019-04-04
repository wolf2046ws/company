<?php

namespace App\Http\Middleware;

use Closure;
use App\Resort;
use App\User;
use App\UserData;
//use App\Http\Middleware\RoutePermissions;

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
        $allowed_url = array();

        $AuthUser = User::where('user_id',Session::get('user')[0]->user_id)->first();
        $userData = UserData::select('resort_id')->where('user_id',$AuthUser->id)->get();
        if($userData){
            $resorts = Resort::whereIn("id",$userData)->get();
        }
        else{
            $resorts = Resort::where('id','=','0')->get();
        }

        if($AuthUser->is_admin == 0){
            $permissions = $AuthUser->permissions();
            foreach ($permissions as $permission) {
                array_push($allowed_url, $permission->url);
            }
        }

        //$per = new RoutePermissions();
        //dd(var_dump($per));
        view()->share('allowed_url',$allowed_url);
        view()->share('resorts',$resorts);
        view()->share('AuthUser',$AuthUser);

        return $next($request);
    }

}
