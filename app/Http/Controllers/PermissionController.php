<?php

namespace App\Http\Controllers;

use App\Permission;
use App\UserData;
use App\User;
use App\RolePermissions;

use Illuminate\Http\Request;



class PermissionController extends Controller
{

    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('permissions.index',compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }


    public function store(Request $request)
    {
        Permission::create($request->all());
        session()->flash('success','Permission Added Successfully');
        return redirect(route('permission.index'));
    }

    /*
    public function show(permission $permission)
    {

    }*/


    public function edit($permission)
    {
        $permission = Permission::findOrFail($permission);
        return view('permissions.update',compact('permission'));
    }


    public function update(Request $request, $permission)
    {
        $permission = Permission::findOrFail($permission);
        $permission->update($request->all());
        session()->flash('success','permission Updated Successfully');
        return redirect()->back();
    }


    public function destroy($permission)
    {
        // $permission->id
        $permission = Permission::findOrFail($permission);

        $roles = RolePermissions::where('permission_id', $permission->id)->get();

        if (count($roles) > 0) {
            $user_has_permission = UserData::where('role_id',$roles[0]->role_id)
            ->get()
            ->count();
            session()->flash('warning','The Permission has user '. $permission->name . ' has user');
            return redirect()->back();
        }else{
            $permission->delete();
            session()->flash('success','Permission '. $permission->name .' Deleted Successfully');
            return redirect()->back();
        }

    }

}
