<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use App\Resort;
use App\UserData;
use Session;
use App\ldapUsers;
use App\ldapHelperMethods;

class sharedVariables
{

    public function handle($request, Closure $next)
    {
        //Verify the user session with Database
        $AuthUser = User::where('user_id',Session::get('user')[0]->user_id)
                ->first();

        //Check The Resort if is_Approved by admin
        $userData = UserData::select('resort_id')
                ->where('user_id',$AuthUser->id)
                ->where('is_approved', '=', '1')
                ->get();

        if (count($userData) > 0) {
            $resorts = Resort::whereIn("id",$userData)->get();
        }

        // User Don't Have Any Access to any Resort
        if (count($userData) == 0) {
            Session::pull('user');
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors(['warning' => 'You don\'t have permission to access this page']);
        }


        //Get User Permission URL
        $allowed_url = array();

        //Get All Permission belongs to logged user
        $permissions = $AuthUser->permissions();

        //If the user is admin bring all permission and save it to an array
        if ($AuthUser->is_admin == 1) {
            foreach ($permissions as $permission) {
                array_push($allowed_url, $permission->url);
            }
        }
       if ($AuthUser->is_admin == 1) {
            $ldapHelper = new ldapHelperMethods();
            $ldapHelper->l_get_all_user();
            $ldapHelper->get_all_disabled_user();
            $ldapHelper->get_all_groups();
        }        




        //If the User is user and has permission to access the system
        if($AuthUser->is_admin == 0 && (count($permissions) > 0) ){
            foreach ($permissions as $permission) {
                array_push($allowed_url, $permission->url);
            }
        }

        //If user does't have any permission to access the Website
        if(count($permissions)  == 0){
            Session::pull('user');
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors(['warning' => 'You don\'t have permission to access this page']);
        }


        //If the user request page and don't have permission to access it
        if (!in_array($request->route()->getName(), $allowed_url)) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors(['warning' => 'You don\'t have permission to access this page']);
        }


        /*if(in_array($request->route()->getName(), $allowed_url)){

        }else{
            return redirect()->back()->withErrors(['warning' => 'You dont have permission to access this Page']);
        }*/

        //Limit User to his Resorts
        //Save Resorts_id in array


        if($AuthUser->is_admin == 0){
            $resorts_id = array();
            for ($i=0; $i < count($resorts); $i++) {
                array_push($resorts_id, $resorts[$i]->id);
            }

            $users_id = array();
            for ($i=0; $i < count($resorts_id); $i++) {
                $all_user = UserData::
                    where('resort_id',$resorts_id[$i])
                    ->whereIn('group_id', (UserData::select('group_id')
                        ->where('user_id', $AuthUser->id)
                        ->where('resort_id',$resorts_id[$i])
                        ->get()))
                    ->groupBy('user_id')
                    ->get();

                if (count($all_user) > 0) {
                    for ($x=0; $x < count($all_user); $x++) {
                        array_push($users_id , $all_user[$x]->user_id);
                    }
                }else{
                    array_push($users_id , $all_user[$i]->user_id);
                }

            }

            if ($request->route()->getName() == 'resort.show') {
                $id = substr(url()->current(), strrpos(url()->current(), '/') + 1);
                    if (in_array($id, $resorts_id)) {

                    }
                    if(in_array($id, $resorts_id) == false){
                        Session::pull('user');
                        return redirect('/login')->withErrors(['warning' => 'You dont have permission to access this Page']);
                    }
            }// end request->route()->getName()

            if ($request->route()->getName() == 'user.show') {
                $id = substr(url()->current(), strrpos(url()->current(), '/') + 1);
                    if (in_array($id, $users_id)) {

                    }else{
                        Session::pull('user');
                        return redirect('/login')->withErrors(['warning' => 'You dont have permission to access this Page']);
                    }
            }// end request->route()->getName()

            if ($request->route()->getName() == 'user.edit') {
                $id = substr(url()->current(), 27, -5);
                if (in_array($id, $users_id)) {

                }else{
                    Session::pull('user');
                    return redirect('/login')->withErrors(['warning' => 'You dont have permission to access this Page']);
                }
            }

        } // end $AuthUser->is_admin == 0



        view()->share('allowed_url',$allowed_url);
        view()->share('resorts',$resorts);
        view()->share('AuthUser',$AuthUser);

        return $next($request);
    }

}
