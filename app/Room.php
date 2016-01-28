<?php

namespace Hotpms;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table= "rooms";
    
    public $timestamps= false;
    
    protected $fillable= ['id_property', 
    					'room_type', 
    					'name', 
    					'total', 
    					'booked'];
    
   public function roomType(){
   		return $this->hasOne('Hotpms\RoomType', 'id', 'room_type');
   }
   
   public function property(){
   		return $this->hasOne('Hotpms\Property','id','id_property');
   }
}
