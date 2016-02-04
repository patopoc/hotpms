<?php

namespace Hotpms;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table= "property_settings";
    
    public $timestamps= false;
    
    protected $fillable= ['name','info','address','checkin_time','checkout_time','cancelation_policy',
    						'timezone', 'conditions', 'pet_rules'
    ];
    
    public function pictures(){
    	return $this->hasMany('Hotpms\Picture','id_module','id');
    }
    
    public function getLogoAttribute(){
    	return $this->pictures->where('type','logo')->first();	
    }
    
    public function removeLogo(){
    	$logo= $this->logo;
    	if($logo !== null){
    		unlink(public_path() . $logo->url);
    		$logo->delete();   
    		
    	}
    }
}
