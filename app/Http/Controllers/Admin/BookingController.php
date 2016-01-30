<?php

namespace Hotpms\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Hotpms\Http\Requests;
use Hotpms\Http\Controllers\Controller;
use Hotpms\Booking;
use Hotpms\Property;
use Illuminate\Database\Eloquent\Model;
use Hotpms\Person;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
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
        $bookings= Booking::where('status','a')->get();
        return view('admin.booking.index',compact('bookings'));
        
    }

    public function canceled(){
    	$bookings= Booking::where('status','c')->get();
        
        return view('admin.booking.index',compact('bookings'));
    }
    
    public function arrival(){
    	$data['today']= Booking::where('check_in',date('Y/m/d'))->get();
    	$data['tomorrow']= Booking::where('check_in',date('Y/m/d', strtotime('+1 day')))->get();
    	return view('admin.booking.index',compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {       	
    	if($request->has("date"))
    		$data["date"]= $request->get("date");
    	if($request->has("room"))
    		$data["room"]= $request->get("room");
    	
    	//$data['properties']= \DB::table('property_settings')->lists('name','id');
    	$user= Auth::user();
    	$data['countries']= \DB::table('countries')->lists('name', 'country_code');
    	$data['room_types']= \DB::table('room_types')->where('id_property',$user->id_property)
    												->where('available',1)
    												->lists('name', 'id');
    	$data['rate_plans']= \DB::table('rates')->lists('name', 'id');
    	
    	$data['disabledDates']= json_encode($this->getDisabledDates());
        return view('admin.booking.create', compact('data'));
    }
    
    private function getDisabledDates(){
    	$dates= \DB::table('bookings')->lists('check_out', 'check_in');
    	$disabledDates= array();
    	foreach ($dates as $checkIn => $checkOut){
			$disabledDates= array_merge($disabledDates, $this->date_range($checkIn, $checkOut));    		
    	}
    	return $disabledDates;
    }
    
    private function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d' ) {

	    $dates = array();
	    $current = strtotime($first);
	    $last = strtotime($last);
	
	    while( $current <= $last ) {
	
	        $dates[] = date($output_format, $current);
	        $current = strtotime($step, $current);
	    }
	
	    return $dates;
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->checkAvailability($request);
    	
    	//dd(Person::where('ci',$request->get('ci')));
        if(count(Person::where('ci',$request->get('ci'))->get()) == 0){
        	Person::create([
        			'ci' => $request->get('ci'),
        			'name' => $request->get('name'),
        			'last_name' => $request->get('last_name'),
        			'email' => $request->get('email'),
        			'telephone' => $request->get('telephone'),
        			'id_country' => $request->get('id_country'),
        	]);
        }
    	
        $person= Person::where('ci',$request->get('ci'))->get()->first();
        
    	$booking= new Booking([
        		'id_property' => Auth::user()->id_property,
        		'id_user' => $request->get('id_user'),
        		'person' => $person->id,
        		'date' => date("Y/m/d"),
        		'check_in' => $request->get('check_in'),
        		'check_out' => $request->get('check_out'),
        		'arrival_time' => $request->get('arrival_time'),
        		'comments_and_requests' => $request->get('comments_and_requests'),
        		'id_room_type' => $request->get('id_room_type'),
        		'number_of_rooms' => $request->get('number_of_rooms'),
        		'adults' => $request->get('adults'),
        		'children' => $request->get('children'),
        		'pets' => $request->get('pets'),
        		'rate_plan' => $request->get('rate_plan'), 		
        		
        		]);
        
        $reference_code;
        do{
        	$reference_code= str_random(10);
        }while(count(Booking::where('reference_code',$reference_code)->get()) > 0);
        $booking->reference_code= $reference_code;
        $booking->save();
               
        
        return redirect()->route('admin.booking.index');
    }

    private function checkAvailability($request){
    	$booking= Booking::where("id_room_type", $request->get("id_room_type"))
    						->where("check_in",">=", $request->get("check_in"))
    						->where("check_in","<=", $request->get("check_out"))
    						->first();
    	if($booking !== null){
	    	$message= "Room already reserved for given dates";
	    	if($request->ajax()){
	    		return $message;
	    	}
	    	Session::flash('message',$message);
	    	return redirect()->route('admin.bookings.create');
    	}
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking= Booking::findOrFail($id);
        dd($booking->personData->name);
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
