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
}
