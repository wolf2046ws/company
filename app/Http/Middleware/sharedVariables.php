<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use App\Resort;
use App\UserData;
use Session;

class sharedVariables
{

    public function handle($request, Closure $next)
    {
        $allowed_url = array();

        $AuthUser = User::where('user_id',Session::get('user')[0]->user_id)->first();
        $userData = UserData::select('resort_id')
                ->where('user_id',$AuthUser->id)
                ->where('is_approved', '=', '1')
                ->get();

        //dd(Resort::whereIn("id",$userData)->get());
        if($userData){
            $resorts = Resort::whereIn("id",$userData)->get();
        }
        else{
            $resorts = Resort::where('id','=','0')->get();
        }

        if ($AuthUser->is_admin == 1) {
            $permissions = $AuthUser->permissions();
            foreach ($permissions as $permission) {
                array_push($allowed_url, $permission->url);
            }
        }

        if($AuthUser->is_admin == 0){
            $permissions = $AuthUser->permissions();
            foreach ($permissions as $permission) {
                array_push($allowed_url, $permission->url);
            }
        }
        
        if(in_array($request->route()->getName(), $allowed_url)){

        }else{
            Session::pull('user');
            return redirect('/login')->withErrors(['warning' => 'You dont have permission to access this Page']);
        }

        // $userData = all resort id that user have access to it
            // /resort/$userData
        //$userDatadd($userData->resort_id);



        view()->share('allowed_url',$allowed_url);
        view()->share('resorts',$resorts);
        view()->share('AuthUser',$AuthUser);

        return $next($request);
    }

}
