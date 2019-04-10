<?php

namespace App\Http\Controllers;

use App\Role;
use App\Group;
use App\UserData;
use App\Permission;
use App\ldapUsers;
use App\ldapHelperMethods;
use App\GroupRoles;

use App\RolePermissions;
use Illuminate\Http\Request;
use App\Http\Requests\RoleValidation;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::latest()->get();
    	return view('roles.index', compact('roles'));
	}

    public function create()
    {
        $ldapHelper = new ldapHelperMethods();
        $ldapHelper->get_all_groups();
        $p_slug_web = Permission::latest()
        ->where('slug','Web')
        ->get();

        /*$ldap = new ldapUsers();

        foreach ($ldap->all_security_groups() as $key => $value) {
            dd($key , " " , $value);
        }*/


        $p_slug_ad = Permission::latest()
        ->where('slug','Active Directory Groups')
        ->get();

        $groups = Group::latest()->get();

        return view('roles.create',compact('permissions',
                                        'groups',
                                        'p_slug_web',
                                        'p_slug_ad'));
    }

    public function store(Request $request)
    {

    	$role = Role::where('group_id', $request->group_id)->where('name',$request->name)->first();
    	if($role){
    	    session()->flash('warning','This Role already in this group');
                return redirect()->back();
    	}
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        session()->flash('success','Role Added Successfully');
        return redirect(route('role.index'));
    }

    public function show($id)
    {
        /*$user = User::findOrFail($id);
        $user_data = UserData::where('user_id',$user->id)->get();*/
        $role = Role::findOrFail($id);

        $user_data = RolePermissions::where('role_id', $role->id)
        ->get();

        $permissions = array();
        for ($i=0; $i < count($user_data); $i++) {
            $permssion = Permission::where('id', $user_data[$i]->permission_id )->get();
            array_push($permissions, $permssion);
        }

        return view('roles.show', compact('role', 'permissions', 'group'));
    }

    /*
    public function edit($role)
    {
        $role = Role::findOrFail($role);
        $permissions = permission::latest()->get();
        return view('roles.update',compact('role','permissions'));
    }


    public function update(Request $request, $role)
    {
        $role = Role::findOrFail($role);
        $role->update($request->all());
        session()->flash('success','role Updated Successfully');
        return redirect()->back();
    }*/


    public function destroy(Role $role)
    {
        // $role->id $role->group_id   $role->resort_id

        $user_has_role = UserData::where('group_id',$role->group_id)
        ->where('resort_id',$role->resort_id)
        ->where('role_id',$role->id)
        ->get()
        ->count();

        if ($user_has_role > 0) {
            session()->flash('warning','The Role '. $role->name .' has user');
            return redirect()->back();
        }else {
            $role->delete();
            session()->flash('success', $role->name . ' Deleted Successfully');
        }
        return redirect()->back();
    }
}
