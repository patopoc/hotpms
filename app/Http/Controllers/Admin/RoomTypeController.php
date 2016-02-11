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
use Hotpms\Helpers\PictureHelper;
class RoomTypeController extends Controller
{
	private $data=array();
	
	
	public function __construct(){
		$this->middleware('access_control');
		$this->middleware('check_current_property');
		$currentRoute= $this->getRouter()->current()->getAction()["as"];
		$this->middleware('set_current_section:'.$currentRoute);
		
		$this->data['service_plans']= \DB::table('service_plan')->lists('name','id');
		$this->data['properties']= \DB::table('property_settings')->lists('name','id');
		$this->data['facility_plans']= \DB::table('facilities_plan')->lists('name','id');
		$this->data['rate']= \DB::table('rates')->lists('name','id');
		$this->data['bed_type']= \DB::table('bed_types')->lists('type','id');		 
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_types= RoomType::all();
        return view('admin.room_types.index', compact('room_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$data= $this->data;
        return view('admin.room_types.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoomTypeRequest $request)
    {    	
    	$pictures= $request->file('pictures');
    	 
    	$destinationFolder= '/imgs/prop/';
    	$roomPictures= array();
    	
    	$roomType= new RoomType();
    	$roomType->fill($request->all());
    	$roomType->save();    	
    	
    	if($pictures[0] !== null){
	    	PictureHelper::savePictures($pictures, $roomType);
    	}
    	
        return \Redirect::route('admin.room_types.index');
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
    	$data= $this->data;
        $data['room']= RoomType::findOrFail($id);
        return view('admin.room_types.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRoomTypeRequest $request, $id)
    {
        $roomtype= RoomType::findOrFail($id);
        $roomtype->fill($request->all());
        $roomtype->save();
        
        if($request->file('pictures') !== null){
        	$roomType->removePictures();
        	PictureHelper::savePictures([$request->file('pictures')], $roomType);
        }
        
        $message= $roomtype->name.' updated successfully';
        if($request->ajax()){
        	return $message;
        }
        Session::flash('message',$message);
        return redirect()->route('admin.room_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $roomtype= RoomType::findOrFail($id);
        $roomtype->removePictures();
    	
        $message="";
        try{
        	$roomtype->delete();
        	$message= trans('appstrings.item_removed', ['item' => $roomtype->name]);
        	Session::flash('message_type', 'success');
        }
        catch(\PDOException $e){
        	$message= trans('sqlmessages.' . $e->getCode());
        	if($message == 'sqlmessages.' . $e->getCode()){
        		$message= trans('sqlmessages.undefined');
        	}
        	
        	if($request->ajax()){
        		return ['code'=>'error', 'message' => $message];
        	}
        	Session::flash('message_type', 'error');
        }
        
        if($request->ajax()){
        	return ['code'=>'ok', 'message' => $message];
        }
        Session::flash('message',$message);
        return redirect()->route('admin.room_types.index');
    }
}
