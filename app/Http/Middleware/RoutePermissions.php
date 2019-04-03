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
        //return $next($request);

        $user = User::where('user_id',Session::get('user')[0]->user_id)->first();

        if($user){

            $permissions = $user->permissions();

            foreach ($permissions as $permission) {

                if ($request->route()->getName() == $permission->url) {
                    return $next($request);
                } // end if

            } // end foreach
            if ($this->valid_routes($request)) {
                return $next($request);
            }
       }

        session()->flash('warning','Permission Denied');
        return redirect(route('master'));

    }// end handle


    public function valid_routes($request)
    {
        $valid_routes = [
            'get-resort-list.index',
            'get-group-list.index',
            'get-role-list.index',
            'user.index',
            'user.disabled',
            'user.changeStatus',
            'user.changeStatusApproved',
            'user.create',
            'user.edit',
            'userData.destroy',
            'resort.index',
            'group.index',
            'group.create',
            'group.destroy',
            'permission.index',
            'permission.create',
            'permission.destroy',
            'role.index',
            'role.create',
            'role.destroy',
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
