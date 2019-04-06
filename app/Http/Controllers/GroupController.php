<?php

namespace App\Http\Controllers;

use App\UserData;
use App\Group;
use App\Role;
use App\Permission;
use App\Resort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class GroupController extends Controller
{

    public function index()
    {
        $groups = Group::latest()->get();
        return view('groups.index',compact('groups'));
    }


    public function create()
    {
        $roles = Role::latest()->get();
        return view('groups.create',compact('roles'));
    }


    public function store(Request $request)
    {
        $group = Group::where('resort_id',$request->resort_id)->where('name',$request->name)->first();
        if($group){
            session()->flash('warning','This Resort already has this group');
            return redirect()->back();
        }
        $group = Group::create($request->all());
        session()->flash('success','Group Added Successfully');
        return redirect(route('group.index'));
    }


    public function groupRoles($id){
        $group = Group::findOrFail($id);
        $resort = Resort::where('id',$group->resort_id)->first();
        $roles = $group->roles;
        return view('groups.rolesIndex',compact('group','roles','resort'));
    }


    public function groupCreateRoles($id){
        $group = Group::findOrFail($id);
        $permissions = permission::latest()->get();
        return view('roles.create',compact('id','permissions'));
    }

/*
    public function show(Group $group)
    {

    }

    public function edit(Group $group)
    {

    }


    public function update(Request $request, Group $group)
    {

    }*/


    public function destroy(Group $group)
    {
        /*$users_group = UserData::where('user_id',)
        ->groupBy('group_id')->get();*/
        $group->delete();
        session()->flash('success','Group Deleted Successfully');
        return redirect()->back();
    }
}
