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

    protected $redirectTo = '/user/create';


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $user = Session::get('user');
        return $user == null ? view('auth.login') : \redirect('/user');
    }


    public function login(AuthRequest $request){

        $ldap = new ldapUsers();
        $ldapHelper = new ldapHelperMethods();

        $user = Session::get('user');

        if($user){
            return \redirect('/');
        }



        if($ldap->authenticate($request->email,$request->password) != true){
            return redirect()->back()->withInput($request->all())->withErrors(['password' => 'incorrect password']);
        }

        $user = $ldapHelper->get_user_data($ldap->user_info($request->email),$request->email);

        if ($user->is_admin == 1) {
            $ldapHelper->l_get_all_user();
            $ldapHelper->get_all_disabled_user();
            $ldapHelper->get_all_groups();
        }

	    Session::push('user',$user);

        $this->middleware('shared_variables');

        return redirect('/user/create');

    }

    public function logout(Request $request)
    {
        Session::pull('user');
        return redirect('/login');
    }


}
