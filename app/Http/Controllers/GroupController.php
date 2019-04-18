<?php

namespace App\Http\Controllers;

use App\UserData;
use App\User;
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
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $group = Group::where('resort_id',$request->resort_id)
            ->where('name',$request->name)
            ->first();
        //Verify if the Resort has already this Group
        if($group){
            session()->flash('warning','This Resort already has this group');
            return redirect()->back();
        }
        //Save Group in Database
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
        $permissions = Permission::latest()->get();
        return view('roles.create',compact('id','permissions'));
    }


    public function show($id)
    {
        /*$user = User::findOrFail($id);
        $user_data = UserData::where('user_id',$user->id)->get();*/
        $group = Group::findOrFail($id);

        $user_data = UserData::where('resort_id',$group->resort_id)
        ->where('group_id', '=', $group->id)
        ->groupBy('role_id')
        ->get();

        return view('groups.show', compact('group', 'user_data'));
    }


    public function edit(Group $group)
    {
        $group = Group::findOrFail($group->id);
        return view('groups.update', compact('group'));

    }


    public function update(Request $request, $group)
    {
        $group = Group::where('id', $group)->first();

        //Check the group name with the resort in Database
        $group_name = Group::where('resort_id', $request->resort_id)
            ->where('name', $request->name)
            ->first();
        if ($group_name) {
            session()->flash('warning','This Resort already has this group');
            return redirect()->back();
        }
        //Save Group in Database
        $group->update($request->all());
        session()->flash('success','Group Added Successfully');
        return redirect(route('group.index'));

    }


    public function destroy(Group $group)
    {
        //$group->id    $group->resort_id
        $user_has_group = UserData::where('resort_id',$group->resort_id)
        ->where('group_id',$group->id)
        ->get()
        ->count();

        if ($user_has_group > 0) {
            session()->flash('warning','The Group '. $group->name . ' has user');
            return redirect()->back();
        }else {
            $group->delete();
            session()->flash('success', $group->name . ' Deleted Successfully');
        }

        /*$users_group = UserData::where('user_id',)
        ->groupBy('group_id')->get();*/

        return redirect()->back();
    }
}
