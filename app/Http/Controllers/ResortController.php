<?php

namespace App\Http\Controllers;
use App\Resort;
use App\User;
use App\UserData;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Group;




class ResortController extends Controller
{

    /*public function index()
    {

        $authUserID = User::where('user_id',Session::get('user')[0]->user_id)->first();
        $userData = UserData::select('resort_id')->where('user_id',$authUserID->id)->get();
        if($userData){
            $resorts = Resort::whereIn("id",$userData)->get();
        }
        else{
            $resorts = Resort::where('id','=','0')->get();
        }
        $resorts = "dsfffs";
        return view('resort.index', compact('resorts'));

    }*/

    /*
    public function create()
    {
        return view('resort.create');
    }

    public function store(Request $request)
    {
        if(Resort::where('name',$request->name)->first() == null){
            Resort::create($request->all());
            session()->flash('success','Resort Added Successfully');
            return redirect(route('resort.index'));
        }
        session()->flash('warning','Resort Exists');
        return redirect()->back();
    }*/


    public function deleteUser($id){
        $userData = UserData::findOrFail($id);
        $userData->delete();
        session()->flash('success','User Deleted Successfully');
        return redirect()->back();
    }


    public function show($id)
    {
        $resort = Resort::findOrFail($id);

        $authUserID = User::where('id',Session::get('user')[0]->id)->first();
        if ($authUserID->is_admin == 1) {
            $users = UserData::latest()
                ->where('resort_id',$resort->id)
                ->groupBy('user_id')
                ->get();

        }else{
            $users = UserData::latest()
                ->where('resort_id',$id)
                ->whereIn('group_id', (UserData::select('group_id')
                    ->where('user_id', $authUserID->id)
                    ->where('resort_id',$id)
                    ->get()))
                ->groupBy('user_id')
                ->get();

        }


        //$id = substr(url()->current(), strrpos(url()->current(), '/') + 1);
        //echo $id;
        //$url = url()->previous();
        return view('resort.show',compact('users','resort'));

    }

      public function resortGroup($id){
        $resort = Resort::findOrFail($id);
        $groups = $resort->groups;
        return view('resort.groupsIndex',compact('groups','resort'));
      }

      /*
      public function resortCreateGroup($id){
        $resort = Resort::findOrFail($id);
        return view('groups.create',compact('id'));
    }*/
    /*
    public function edit($id)
    {
        $resort = Resort::findOrFail($id);
        return view('resort.update', compact('resort'));
    }*/

    /*
    public function update(Request $request, $id)
    {
        $resort = Resort::findOrFail($id);
        $resort->update($request->all());
        session()->flash('success','Resort Updated Successfully');
        return redirect()->back();
    }*/

    /*
    public function destroy($id)
    {
        $resort = Resort::findOrFail($id);
        $resort->delete();
        session()->flash('success','Resort Deleted Successfully');
        return redirect()->back();
    }*/
}
