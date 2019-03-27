<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hardware;
use App\UserData;
use App\Http\Requests\hardwareDataValidation;


class hardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hardwares = Hardware::latest()->get();
        return view('hardware.index', compact('hardwares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hardware.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(hardwareDataValidation $request)
    {
        //
        Hardware::create($request->all());
        session()->flash('success','Hardware Added Successfully');
        return redirect(route('hardware.index'));
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
        $hardware = Hardware::findOrFail($id);
        return view('hardware.update', compact('hardware'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(hardwareDataValidation $request, $id)
    {
        //
        $hardware = Hardware::findOrFail($id);
        $hardware->update($request->all());
        session()->flash('success','Hardware Updated Successfully');
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

    
    }
}
