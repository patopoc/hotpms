<?php

namespace Hotpms\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Hotpms\Http\Requests;
use Hotpms\Http\Controllers\Controller;
use Hotpms\Booking;

class AvailabilityController extends Controller
{
	public function __construct(){
	
		$this->middleware('access_control');		
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$fromDate= date("Y-m-d");
    	$toDate= date('Y-m-d', strtotime('+1 month'));
    	 
    	if($request->has("from_date") && $request->get("from_date") != "")
    		$fromDate= $request->get("from_date");
    	 
    	if($request->has("to_date") && $request->get("to_date") != "")
    		$toDate= $request->get("to_date");
    	else{
    		$toDateSeconds= strtotime($fromDate) + 2592000;		 // one month timestamp
    		$toDate= date("Y-m-d", $toDateSeconds);
    	}
    		
    	$data['fromDate']= $fromDate;
    	$data['toDate']= $toDate;
    	
        return view('admin.availability.index', compact('data'));
    }

    public function listAll($fromDate, $toDate){
    	
    	$bookingList= array();
    	$bookings= Booking::where('check_in', ">=", $fromDate)
    						->where('check_out', "<=", $toDate)
    						->get();
    	if($bookings !== null){
    		foreach ($bookings as $booking){
    			$roomName= $booking->roomType->name;
    			$checkIn= $booking->check_in;
    			$checkOut= $booking->check_out;
    			$person= $booking->personData->full_name;
    			
    			$bookingList[]= [
    					"name" => $roomName,
    					"values" =>[[
    							"from" => $checkIn,
    							"to" => $checkOut,
    							"label" => $person,
    							"customClass" => "ganttRed"
    					]]
    			];
    		}
    		
    	}
    	
    	$bookingList[]= [
    			"name" => "",
    			"values" =>[[
    					"from" => $fromDate,
    					"to" => $toDate,
    					"label" => "",
    					"customClass" => "control-element",
    			]]
    	];
    	
    	return json_encode($bookingList);
    	//return $fromDate . " " . $toDate;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
