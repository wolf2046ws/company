<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\ldapUsers;
use App\ldapHelperMethods;
use Illuminate\Support\Facades\Session;


use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        // dd($request->all());
        $user = Session::get('user');

        if($user){
            return \redirect('/user');
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

        return \redirect('/user');
    }

    public function logout(Request $request)
    {
        Session::pull('user');

        return redirect('/login');
    }

}
