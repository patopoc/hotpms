<?php namespace Hotpms;

use Illuminate\Database\Eloquent\Model;

class Person extends Model{
	
	public $timestamps= false;
	
	protected $fillable = ['ci', 'name', 'last_name', 'email', 'telephone', 'id_country'];
	
}