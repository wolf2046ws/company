<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\ldapUsers;
use App\ldapHelperMethods;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;
use App\UserData;
use App\Resort;

class LoginController extends Controller
{

    //protected $redirectTo = '/user';


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //$this->middleware('shared_variables');
    }

    public function redirectTo(){

        $allowed_url = array();

        $AuthUser = User::where('user_id',Session::get('user')[0]->user_id)->first();
        $userData = UserData::select('resort_id')->where('user_id',$AuthUser->id)->get();
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

        switch ($allowed_url) {
            case in_array('user.index', $allowed_url):
                    return redirect('/user');
                break;

            case in_array('user.create', $allowed_url):
                    return redirect('/user/create');
                break;

            case in_array('resort.show', $allowed_url):
                return redirect('/resort/1');
                break;

            default:
                Session::pull('user');
                return redirect('/login');
                break;
        }
    }


    public function showLoginForm()
    {

        $user = Session::get('user');
        return $user == null ? view('auth.login') : \redirect('/user');

    }


    public function login(AuthRequest $request){

        $user = Session::get('user');

        if($user){
            return \redirect('/');
        }

        $ldap = new ldapUsers();
        $ldapHelper = new ldapHelperMethods();

        if($ldap->authenticate($request->email,$request->password) != true){
            return redirect()->back()->withInput($request->all())->withErrors(['password' => 'incorrect password']);
        }
        $ldapHelper->l_get_all_user();
        $ldapHelper->get_all_disabled_user();
        $user = $ldapHelper->get_user_data($ldap->user_info($request->email),$request->email);

	    Session::push('user',$user);

        $this->middleware('shared_variables');
        //dd("After Middleware in LoginController");
        return $this->redirectTo();

    }

    public function logout(Request $request)
    {
        Session::pull('user');
        return redirect('/login');
    }


}
