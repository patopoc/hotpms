<?php

namespace Hotpms\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Hotpms\Http\Requests;
use Hotpms\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Hotpms\RoomType;
use Hotpms\Http\Requests\CreateRoomTypeRequest;
use Hotpms\Http\Requests\EditRoomTypeRequest;
use Hotpms\RoomPicture;
use Illuminate\Database\Eloquent\Model;
use Image;
use Hotpms\Room;
use Hotpms\Http\Requests\CreateRoomRequest;
class RoomController extends Controller
{
	private $data=array();
	
	
	public function __construct(){
		$this->middleware('access_control');
		
		$this->data['properties']= \DB::table('property_settings')->lists('name','id');
		$this->data['roomTypes']= \DB::table('facilities_plan')->lists('name','id');				 
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms= Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$data= $this->data;
        return view('admin.rooms.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoomRequest $request)
    {    	
    	Room::create($request->all());               
        
        return \Redirect::route('admin.rooms.index');
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
        $room= Room::findOrFail($id);
        $data= $this->data;
        $data["room"]= $room;
        return view('admin.room_types.edit', compact('data'));
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
        $room= Room::findOrFail($id);
        $room->fill($request->all());
        $room->save();
        
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
        $room= Room::findOrFail($id);
        $room->delete();
        $message= "La propiedad ".$roomtype->name.' fue eliminada';
        if($request->ajax()){
        	return $message;
        }
        Session::flash('message',$message);
        return redirect()->route('admin.rooms.index');
    }
}
