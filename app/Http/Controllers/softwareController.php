<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Software;
use App\Http\Requests\softwareDataValidation;
use Illuminate\Support\Facades\Session;


class softwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $softwares = Software::latest()->get();
        return view('software.index', compact('softwares'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('software.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(softwareDataValidation $request)
    {
        //
        Software::create($request->all());
        session()->flash('success','Software Added Successfully');
        return redirect(route('software.index'));
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
        $software = Software::findOrFail($id);
        return view('software.update', compact('software'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(softwareDataValidation $request, $id)
    {
        //
        $software = Software::findOrFail($id);
        $software->update($request->all());

        session()->flash('success','Software Updated Successfully');

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
        $software = Software::findOrFail($id);
        $software->delete();

        session()->flash('success','Software Deleted Successfully');
        return redirect()->back();

    }
}
