<?php

namespace Hotpms\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Hotpms\Http\Requests;
use Hotpms\Http\Controllers\Controller;
use Hotpms\Booking;
use Hotpms\Property;
use Illuminate\Database\Eloquent\Model;
use Hotpms\Person;

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
    public function create()
    {
    	$data['properties']= \DB::table('property_settings')->lists('name','id');
    	$data['countries']= \DB::table('countries')->lists('name', 'country_code');
    	$data['room_types']= \DB::table('room_types')->lists('name', 'id');
    	$data['rate_plans']= \DB::table('rates')->lists('name', 'id');
        return view('admin.booking.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        		'id_property' => $request->get('id_property'),
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
