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

                    }else{
                        Session::pull('user');
                        return redirect('/login')->withErrors(['warning' => 'You dont have permission to access this Page']);
                    }
            }// end request->route()->getName()

            if ($request->route()->getName() == 'user.show') {
                $id = substr(url()->current(), strrpos(url()->current(), '/') + 1);
                    if (in_array($id, $users_id)) {

                    }else{
                        dd("NOt founded");
                        Session::pull('user');
                        return redirect('/login')->withErrors(['warning' => 'You dont have permission to access this Page']);
                    }
            }// end request->route()->getName()
        } // end $AuthUser->is_admin == 0



        view()->share('allowed_url',$allowed_url);
        view()->share('resorts',$resorts);
        view()->share('AuthUser',$AuthUser);

        return $next($request);
    }

}
