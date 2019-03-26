<?php

namespace App\Http\Controllers;
use App\Resort;
use App\User;
use App\UserData;

use Illuminate\Http\Request;

class ResortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resorts = Resort::latest()->get();
        return view('resort.index', compact('resorts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('resort.create');

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
        Resort::create($request->all());
        session()->flash('success','Resort Added Successfully');
        return redirect(route('resort.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $users = UserData::latest()->where('resort_id',$id)->get();
        $resort = Resort::findOrFail($id);
        return view('resort.show',compact('users','resort'));

    }

      public function resortGroup($id){
        //dd($id);
        $resort = Resort::findOrFail($id);
        $groups = $resort->groups;
        return view('resort.groupsIndex',compact('groups','resort'));
      }


      public function resortCreateGroup($id){
        $resort = Resort::findOrFail($id);
        return view('groups.create',compact('id'));
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $resort = Resort::findOrFail($id);
        return view('resort.update', compact('resort'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $resort = Resort::findOrFail($id);
        $resort->update($request->all());
        session()->flash('success','Resort Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $resort = Resort::findOrFail($id);
        $resort->delete();

        session()->flash('success','Resort Deleted Successfully');
        return redirect()->back();
    }
}
