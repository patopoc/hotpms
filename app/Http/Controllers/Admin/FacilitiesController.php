<?php

namespace Hotpms\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Hotpms\Http\Requests;
use Hotpms\Http\Controllers\Controller;
use Hotpms\Http\Requests\CreateFacilityRequest;
use Illuminate\Support\Facades\Session;
use Hotpms\Http\Requests\EditFacilityRequest;
use Hotpms\Facility;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities= Facility::all();
        return view('admin.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFacilityRequest $request)
    {    	
    	
        Facility::create($request->all());
        return \Redirect::route('admin.facilities.index');
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
        $facility= Facility::findOrFail($id);
        return view('admin.facilities.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFacilityRequest $request, $id)
    {
        $facility= Facility::findOrFail($id);
        $facility->fill($request->all());
        $facility->save();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $facility= Facility::findOrFail($id);
        $facility->delete();
        $message= "El Servicio ".$facility->name.' fue eliminado';
        if($request->ajax()){
        	return $message;
        }
        Session::flash('message',$message);
        return redirect()->route('admin.facilities.index');
    }
}
