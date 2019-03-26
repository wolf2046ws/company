<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Session;

class RoutePermissions
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
        $user = User::where('user_id',Session::get('user')[0]->user_id)->first();
        if($user){
            $permissions = $user->permissions();
            foreach ($permissions as $permission) {
                if ($request->route()->getName() == $permission->url) {
                    return $next($request);
                }
            }
            if ($this->valid_routes($request)) {
                return $next($request);
            }
       }

        session()->flash('warning','Permission Denied');
        return redirect(route('master'));

    }




    public function valid_routes($request)
    {
        $valid_routes = [
            'user.store',
            'user.update',

            'group.store',
            'group.update',

            'department.store',
            'department.update',

            'resort.store',
            'resort.update',

            'role.store',
            'role.update',

            'permission.store',
            'permission.update',

            'resort-users.store',
            'resort-users.update',

            'department-users.store',
            'department-users.update'

        ];

        foreach ($valid_routes as $route) {
            if ($request->route()->getName() == $route) {
                return true;
            }
        }
        return false;
    }
}
