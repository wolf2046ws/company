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
        //$resort = Resort::findOrFail($id);
        /*$resort = UserData::select('resort_id','is_approved')
        ->where('user_id',$authUserID->id)
        ->where('is_approved', '=', '1')
        ->get();*/
        $resort = Resort::findOrFail($id);

        if ($authUserID->is_admin == 1) {

            $groups = $resort->groups->pluck("name", "id");
        }else{
            $groups_reosort = UserData::select('group_id')
                        ->where('resort_id',$resort->id)
                        ->where('user_id',$authUserID->id)
                        ->get();
                        
            $groups =  Group::where('id', $groups_reosort[0]->group_id)
                    ->pluck("name", "id");
        }
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
