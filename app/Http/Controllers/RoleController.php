<?php

namespace App\Http\Controllers;

use App\Role;
use App\Group;
use App\permission;
use Illuminate\Http\Request;
use App\Http\Requests\RoleValidation;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::latest()->get();
    	return view('roles.index', compact('roles'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = permission::latest()->get();
        $groups = Group::latest()->get();
        return view('roles.create',compact('permissions','groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($role)
    {

        $role = Role::findOrFail($role);
        $permissions = permission::latest()->get();

        return view('roles.update',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role)
    {
        //
        $role = Role::findOrFail($role);
        $role->update($request->all());
        session()->flash('success','role Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        session()->flash('success','role Deleted Successfully');
        return redirect()->back();
    }
}
