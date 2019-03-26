<?php

namespace App\Http\Controllers;

use App\Group;
use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $groups = Group::latest()->get();
        return view('groups.index',compact('groups'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles = Role::latest()->get();
        return view('groups.create',compact('roles'));
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
       // dd($request->all());
        $group = Group::create($request->all());
        // $group->roles()->sync($request->roles);
        session()->flash('success','Group Added Successfully');
        return redirect(route('resortGroup.index',$group->resort_id));
    }

    public function groupRoles($id){
      $group = Group::findOrFail($id);
      $roles = $group->roles;
      return view('groups.rolesIndex',compact('group','roles'));
    }

    public function groupCreateRoles($id){
      $group = Group::findOrFail($id);
      $permissions = permission::latest()->get();
      return view('roles.create',compact('id','permissions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
