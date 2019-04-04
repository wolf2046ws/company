<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Session;

class RoutePermissions
{

    public function handle($request, Closure $next)
    {
        //return $next($request);

        $user = User::where('user_id',Session::get('user')[0]->user_id)->first();

        $allowed_url = array();

        if ($user->is_admin == 1) {
            return $next($request);
        }
        elseif($user->is_admin == 0){
            $permissions = $user->permissions();
            foreach ($permissions as $permission) {
                array_push($allowed_url, $permission->url);
            }

            if (in_array($request->route()->getName(), $allowed_url)) {
                return $next($request);
            }else{
                dump('Permission Denied');
                dd("Denied");
            }

        }

        //$request->merge(compact('allowed_url'));
        
        //return $next($request);
    }// end handle


    public function valid_routes($request)
    {
        $valid_routes = [
            'user.store',
            'user.update',
            'resort.show',
            'group.store',
            'role.store',
            'permission.store',
            'resort-users.store',
            'resort-users.update'
        ];


        foreach ($valid_routes as $route) {
            if ($request->route()->getName() == $route) {
                return true;
            }
        }
        return false;
    } // end valid_routes

}
