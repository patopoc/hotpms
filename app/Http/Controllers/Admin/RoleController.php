<?php

namespace Hotpms\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Hotpms\Http\Requests;
use Hotpms\Http\Controllers\Controller;
use Hotpms\Http\Requests\CreateRateRequest;
use Illuminate\Support\Facades\Session;
use Hotpms\Http\Requests\EditRateRequest;
use Hotpms\Rate;
use Illuminate\Support\Facades\Route;
use Hotpms\Module;
use Hotpms\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	
    	//install modules by loading controllers into modules table
    	$controllersDirContent= new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator('../app/Http/Controllers'), \RecursiveIteratorIterator::SELF_FIRST);
    	
    	foreach ($controllersDirContent as $key => $val){
    		if(!preg_match('#\\\.{0,2}$#', $key) && preg_match('#\.php$#', $key)){
    			$name= explode('Controllers\\', $key)[1];
    			if(Module::where('name',$name)->first() === null)
    				Module::create(["name" => $name]);
    		}    			
    	}    	

    	$roles= Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRateRequest $request)
    {    	
    	
        Rate::create($request->all());
        return \Redirect::route('admin.rate.index');
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
        $rate= Rate::findOrFail($id);
        return view('admin.rate.edit', compact('rate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRateRequest $request, $id)
    {
        $rate= Rate::findOrFail($id);
        $rate->fill($request->all());
        $rate->save();
        
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
        $rate= Rate::findOrFail($id);
        $rate->delete();
        $message= "La propiedad ".$rate->name.' fue eliminada';
        if($request->ajax()){
        	return $message;
        }
        Session::flash('message',$message);
        return redirect()->route('admin.rate.index');
    }
}
