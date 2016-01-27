<?php namespace Hotpms;

use Illuminate\Database\Eloquent\Model;

class Person extends Model{
	
	public $timestamps= false;
	
	protected $fillable = ['ci', 'name', 'last_name', 'email', 'telephone', 'id_country'];
	
	public function country(){
		return $this->hasOne("Hotpms\Country","country_code", "id_country");
	}
	
	public function getFullNameAttribute(){
		return $this->name . " " . $this->last_name;
	}
	
}