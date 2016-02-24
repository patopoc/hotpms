<?php

namespace Hotpms\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Hotpms\Http\Requests;
use Hotpms\Http\Controllers\Controller;
use Hotpms\Booking;
use Hotpms\RoomType;

class AvailabilityController extends Controller
{
	public function __construct(){
	
		$this->middleware('access_control');
		$this->middleware('check_current_property');
		$currentRoute= $this->getRouter()->current()->getAction()["as"];
		$this->middleware('set_current_section:'.$currentRoute);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	    	
    	//$fromDate= date("Y-m-d");
    	$fromDate= Booking::all()->min('check_in');
    	$toDate= date('Y-m-d', strtotime('+1 month'));
    	    	
    	 
    	if($request->has("from_date") && $request->get("from_date") != "")
    		$fromDate= $request->get("from_date");
    	 
    	if($request->has("to_date") && $request->get("to_date") != "")
    		$toDate= $request->get("to_date");
    	else{
    		//$toDateSeconds= strtotime($fromDate) + 2592000;		 // one month timestamp
    		//$toDate= date("Y-m-d", $toDateSeconds);
    		$toDate= date('Y-m-d', strtotime('+6 month',strtotime($fromDate)));
    	}
    		
    	$data['fromDate']= $fromDate;
    	$data['toDate']= $toDate;
    	
        return view('admin.availability.index', compact('data'));
    }

    public function listAll($fromDate, $toDate){
    	
    	$bookingList= array();
    	$bookings= Booking::where('check_in', ">=", $fromDate)
    						->where('check_out', "<=", $toDate)
    						->where('id_property', session('current_property')->id)
    						->get();
    	$rooms= RoomType::all();
    	if($bookings->count() > 0  && count($rooms) > 0){
    		foreach ($rooms as $room){
    			$bookingsByRoom= $bookings->where('id_room_type',$room->id);
    			foreach ($bookingsByRoom as $booking)
    			if($booking !== null){
	    			$roomId= $booking->roomType->id;
	    			$roomName= $booking->roomType->name;
	    			
	    			//send the date along with the hour because the gantt widget needs it, otherwise
	    			//it gets confused with the timezone according to reports in the provider's bug tracker
	    			$checkIn= "/Date(". strtotime($booking->check_in . "23:59:00") * 1000 . ")/";
	    			$checkOut= "/Date(". strtotime($booking->check_out . "23:59:00") * 1000 . ")/";
		   			$person= $booking->personData->full_name;
		   			
		   			$registeredListItem= false;
		   			for($i=0; $i < count($bookingList); $i++){
		   				if($bookingList[$i]['name'] === $roomName){
		   					$bookingList[$i]['values'][]= [
	    							"from" => $checkIn,
	    							"to" => $checkOut,
	    							"label" => $person,
	    							"customClass" => "ganttRed"
	    					];
		   					$registeredListItem=true;	   					
		   					break;
		   				}
		   			}
	    			
		   			if(!$registeredListItem){
		    			$bookingList[]= [
		    					"name" => $roomName,
		    					"id" => $roomId,
		    					"values" =>[[
		    							"from" => $checkIn,
		    							"to" => $checkOut,
		    							"label" => $person,
		    							"customClass" => "ganttRed"
		    					]]
		    			];
		   			}
    			}
    			else{
    				$bookingList[]= [
    						"name" => $room->name,
    						"id" => $room->id,
    						"values" =>[]
    				];
    			}
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
