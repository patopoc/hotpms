<?php

namespace Hotpms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class RoomType extends Model
{
    protected $table= "room_types";
    
    public $timestamps= false;
    
    protected $fillable= ['name', 
    					'description', 
    					'id_property',
    					'id_service_plan', 
    					'id_rate', 
    					'id_facilities_plan', 
    					'size', 'id_bed_type', 
    					'id_room_picture', 
    					'cancelation_fee',
    					'available',
    					'occupied'
    ];
    
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
    	return $this->hasMany('Hotpms\Picture','id_module', 'id');
    }
    
    public function property(){
    	return $this->hasOne('Hotpms\Property', 'id', 'id_property');
    }
    
    public function removePictures(){
    	foreach($this->pictures as $picture){
    		if(! unlink(public_path() . $picture->url))
    			dd("can't delete " . public_path() . $picture->url);
    		$picture->delete();
    	}
    }
    
    public function fullData(){
    	$pictureUrl="";
    	if($this->pictures->count() > 0)
    		$pictureUrl= asset($this->pictures[0]->url);
    	 
    	$data=[
    			'picture' => $pictureUrl,    			
    	];
    	return $data;
    }
}
