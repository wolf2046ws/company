<?php

namespace App\Http\Controllers;

use App\Group;
use App\Role;
use App\Permission;
use App\Resort;
use App\UserData;
use App\User;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DropdownController extends Controller
{

    /*public function index()
    {
        $resorts = \DB::table("resorts")->pluck("name","id");
        return view('index',compact('resorts'));
    }*/

    public function getGroupList($id)
    {
        $authUserID = User::where('id',Session::get('user')[0]->id)->first();

        $resort = Resort::findOrFail($id);

        // If user is admin , get all groups
        if ($authUserID->is_admin == 1) {

            $groups = $resort->groups->pluck("name", "id");

        }
        // Else is user bring all groups that the user is member of
        else{
                $groups = array();

                $groups_reosort = UserData::select('group_id')
                        ->where('resort_id',$resort->id)
                        ->where('user_id',$authUserID->id)
                        ->get();

                    for ($i=0; $i < count($groups_reosort); $i++) {
                        $groups_new =  Group::select('name', 'id')
                            ->where('id', $groups_reosort[$i]->group_id)
                            ->get();

                        for ($x=0; $x < count($groups_new); $x++) {
                            $id = $groups_new[$x]->id;
                            $name = $groups_new[$x]->name;
                            $groups[$id] = $name;
                        }
                    } // end for
        } // end else

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
