<?php

namespace App\Http\Controllers;

use App\permission;
use Illuminate\Http\Request;



class PermissionController extends Controller
{

    public function index()
    {
        $permissions = permission::latest()->get();
        return view('permissions.index',compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }


    public function store(Request $request)
    {
        permission::create($request->all());
        session()->flash('success','Permission Added Successfully');
        return redirect(route('permission.index'));
    }

    /*
    public function show(permission $permission)
    {

    }*/

    /*
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
    }*/


    public function destroy($permission)
    {
        $permission = Permission::findOrFail($permission);
        $permission->delete();
        session()->flash('success','Permission Deleted Successfully');
        return redirect()->back();
    }

}
