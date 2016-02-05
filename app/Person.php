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
	
	public function fullData(){
		$data= [
				'ci' => $this->ci,
				'name' =>$this->name,
				'last_name' => $this->last_name,
				'email' => $this->email,
				'telephone' => $this->telephone,
				'country' => $this->country->name
		];
		
		return $data;
	}
	
}