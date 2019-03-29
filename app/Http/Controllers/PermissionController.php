<?php

namespace App\Http\Controllers;

use App\permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = permission::latest()->get();
        return view('permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \IlluminFate\Http\Response
     */
    public function create()
    {
        //
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        permission::create($request->all());
        session()->flash('success','Permission Added Successfully');
        return redirect(route('permission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($permission)
    {
        //
        $permission = Permission::findOrFail($permission);
        return view('permissions.update',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $permission)
    {
        //
        $permission = Permission::findOrFail($permission);
        $permission->update($request->all());
        session()->flash('success','permission Updated Successfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($permission)
    {
        //
        $permission = Permission::findOrFail($permission);
        $permission->delete();

        session()->flash('success','Permission Deleted Successfully');
        return redirect()->back();
    }
}
