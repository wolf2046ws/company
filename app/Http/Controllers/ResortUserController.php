<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\UserData;

use App\Resort;
use App\Group;
use App\ldapUsers;
use App\ldapHelperMethods;

class ResortUserController extends Controller
{

    public function index()
    {

        $authUserID = User::where('user_id',Session::get('user')[0]->user_id)->first();
        //dd($authUserID);

        /*$users = \DB::table('users_data')
        ->where('user_id',$authUserID[0]->id)
        ->get();*/

        $users_resort = UserData::where('user_id',$authUserID->id)
        ->groupBy('resort_id')->get();


        $users_group = UserData::where('user_id',$authUserID->id)
        ->groupBy('group_id')->get();


        $userData = User::where('resort_id', $authUserID->resort_id)
        ->where('user_name','!=','0')
        ->get();

        /*$users = User::where('resort_id', $authUserID[0]->resort_id)
        ->where('user_name','!=','0')
        ->get();*/

        return view('resortUser.index',compact('users_resort', 'userData', 'users_group'));
    }


    public function create()
    {
        $groups = Group::all();
        return view('resortUser.create', compact(
             'groups'
            ));
    }

    public function store(Request $request)
    {
        $request['user_id'] = Str::random(6);
        $request['resort_id'] = User::where('user_id',Session::get('user')[0]->user_id)->first()->resort_id;
        $user = User::create($request->all());
        session()->flash('success','User Added Successfully');
        return redirect(route('resort-users.index'));
    }


    public function show($id)
    {
        $user = User::where('user_id',$id)->first();
        if($user == null){
            session()->flash('warning','User Not Found');
            return redirect(route('user.index'));
        }
        return view('users.show',compact('user'));
    }


    public function edit($id)
    {
        $groups = Group::all();
        $user = User::where('user_id', $id)->first();
        return view('resortUser.edit', compact(
                'groups',
                'user'
        ));
    }


    public function update(Request $request, $id)
    {
        $request['resort_id'] = User::where('user_id',Session::get('user')[0]->user_id)->first()->resort_id;
        $user = User::where('user_id',$id)->first();
        $user->update($request->all());
        session()->flash('success','User Updated Successfully');
        return redirect(route('resort-users.index'));
    }

    public function destroy($id)
    {
        $ldap = new ldapUsers();
        $ldap->user_delete($id);
         $user = User::where('user_name',$id)->first();
         $user->delete();
         session()->flash('success','User Deleted Successfully');
         return redirect()->back();
    }
    
}
