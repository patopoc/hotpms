<?php

namespace Hotpms\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Hotpms\Http\Requests;
use Hotpms\Http\Controllers\Controller;
use Hotpms\Http\Requests\CreateFacilityPlanRequest;
use Illuminate\Support\Facades\Session;
use Hotpms\Http\Requests\EditServiceRequest;
use Hotpms\FacilityPlan;
use Illuminate\Database\Eloquent\Model;
use Hotpms\Http\Requests\EditFacilityPlanRequest;
use Hotpms\Facility;

class FacilityPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facility_plans= FacilityPlan::all();
        return view('admin.facility_plans.index', compact('facility_plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$facilities= \DB::table("facilities")->lists('name','id');
    	
    	//pack into $data because a script inside scripts.blade.php access everything through $data
 		$data["facilities"]= $facilities;
    	return view('admin.facility_plans.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFacilityPlanRequest $request)
    {       	
        $data= $request->all();
        $facilityKeys= array();
        
        foreach($request->all() as $key => $val){
        	if($key !== "_token" && $key !=="name")
        		$facilityKeys[]= $val;	
        }       
        
    	$facility_plan= FacilityPlan::create($request->all());
    	$facility_plan->facilities()->attach($facilityKeys);
        
        return \Redirect::route('admin.facility_plans.index');
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
    	$data= array();
        $facility_plan= FacilityPlan::findOrFail($id);
        $facilities= \DB::table("facilities")->lists('name','id');
        $data['facility_plan']= $facility_plan;
        $data['facilities']= $facilities;
        
        //dd($data['facility_plan']->facilities[1]->id);
        //dd($data['facilities']);
        return view('admin.facility_plans.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFacilityPlanRequest $request, $id)
    {
    	$facilityKeys= array();
    	
    	foreach($request->all() as $key => $val){
    		if($key !== "_token" && $key !=="name")
    			$facilityKeys[]= $val;
    	}
    	
    	
    	$facility_plan= FacilityPlan::find($id);
    	$facility_plan->fill($request->all());
    	$facility_plan->save();
    	 
    	$facility_plan->facilities()->sync($facilityKeys);
        
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
        $facility= FacilityPlan::findOrFail($id);
        $facility->delete();
        $message= "El Servicio ".$facility->name.' fue eliminado';
        if($request->ajax()){
        	return $message;
        }
        Session::flash('message',$message);
        return redirect()->route('admin.facility_plans.index');
    }
}