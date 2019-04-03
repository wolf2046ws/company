<?php

namespace App\Http\Controllers;

use App\Group;
use App\Role;
use App\Permission;
use App\Resort;

use Illuminate\Http\Request;

class DropdownController extends Controller
{

    public function index()
    {
        $resorts = \DB::table("resorts")->pluck("name","id");
        return view('index',compact('resorts'));
    }

    public function getGroupList($id)
    {
        $resort = Resort::findOrFail($id);
        $groups = $resort->groups->pluck("name", "id");

        //$groups = \DB::table("groups")
        //->where("resort_id",$id)
        //->pluck("name","id");

        return response()->json($groups);
    }

    public function getRoleList($id)
    {
        $roles = \DB::table("roles")
        ->where("group_id",$id)
        ->pluck("name","id");
        return response()->json($roles);
    }

}
