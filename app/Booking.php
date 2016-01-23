<?php

namespace Hotpms;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	public $timestamps= false;
	
	protected $fillable = ['id_property', 'id_user', 'person', 'date', 'check_in', 
							'check_out', 'arrival_time', 'comments_and_requests', 
							'id_room_type', 'number_of_rooms', 'adults', 'children',
							'pets', 'rate_plan', 'notification','status'] ;
	
	public function property(){
		return $this->hasOne('Hotpms\Property','id','id_property');
	}
	
	public function user(){
		return $this->hasOne('Hotpms\User','id','id_user');
	}
	
	public function personData(){
		return $this->hasOne('Hotpms\Person','id','person');
	}
	
	public function roomType(){
		return $this->hasOne('Hotpms\RoomType','id','id_room_type');
	}
	
	public function rate(){
		return $this->hasOne('Hotpms\Rate','id','rate_plan');
	}
}
