<?php

namespace Hotpms\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Hotpms\Http\Requests;
use Hotpms\Http\Controllers\Controller;
use Hotpms\Person;
use Illuminate\Support\Facades\Session;
use Webpatser\Countries\Countries;


class PeopleController extends Controller
{
	
	public $countriesShortList;
	
	public function __construct(){
		
		$this->middleware('access_control');
		
		$this->countriesShortList= \DB::table('countries')->lists('name', 'country_code');
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$people= Person::all();
		
		return view('admin.people.index', compact('people'));		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    	   	
    	$countriesShortList= $this->countriesShortList;
    	return view('admin.people.create', compact('countriesShortList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Person::create($request->all());
        
        return \Redirect::route('admin.people.index');
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
        $data["person"]= Person::findOrFail($id);
        $data["countries"]= $this->countriesShortList;
        
        
        return view('admin.people.edit', compact('data'));
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
        $person= Person::findOrFail($id);
        $person->fill($request->all());
        $person->save();
        return redirect()->route('admin.people.index');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $person= Person::findOrFail($id);
        $person->delete();
        
        $message= $person->name. ' ha sido eliminado';
        
        if($request->ajax()){
        	return $message;
        }
        
        Session::flash('message', $message);        
        
        return redirect()->route('admin.people.index');
    }
}
