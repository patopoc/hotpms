<?php

namespace Hotpms\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Hotpms\Http\Requests;
use Hotpms\Http\Controllers\Controller;
use Hotpms\Property;
use Hotpms\Http\Requests\CreatePropertyRequest;
use Illuminate\Support\Facades\Session;
use Hotpms\Http\Requests\EditPropertyRequest;

class PropertyController extends Controller
{
	public function __construct(){
	
		$this->middleware('access_control');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties= Property::all();
        return view('admin.property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePropertyRequest $request)
    {    	
        Property::create($request->all());
        return \Redirect::route('admin.property.index');
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
        $property= Property::findOrFail($id);
        return view('admin.property.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPropertyRequest $request, $id)
    {
        $property= Property::findOrFail($id);
        $property->fill($request->all());
        $property->save();
        
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
        $property= Property::findOrFail($id);
        $property->delete();
        $message= "La propiedad ".$property->name.' fue eliminada';
        if($request->ajax()){
        	return $message;
        }
        Session::flash('message',$message);
        return redirect()->route('admin.property.index');
    }
}
