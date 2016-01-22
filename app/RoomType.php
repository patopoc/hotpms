<?php

namespace Hotpms;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table= "room_types";
    
    public $timestamps= false;
    
    protected $fillable= ['name', 
    					'description', 
    					'id_service_plan', 
    					'id_rate', 
    					'id_facilities_plan', 
    					'size', 'id_bed_type', 
    					'id_room_picture', 
    					'cancelation_fee'];
    
    public function servicePlans(){
    	return $this->hasOne("Hotpms\ServicePlan", "id", "id_service_plan");
    }
    
    public function facilityPlans(){
    	return $this->hasOne('Hotpms\FacilityPlan', 'id', 'id_facilities_plan');
    }
    
    public function bedType(){
    	return $this->hasOne('Hotpms\BedType', 'id', 'id_bed_type');
    }
    
    public function pictures(){
    	return $this->hasMany('Hotpms\RoomPicture','id_room_types', 'id');
    }
}
