<?php namespace Hotpms;

use Illuminate\Database\Eloquent\Model;

class ShortUrlClickInfo extends Model{
	
	public $timestamps= false;
	
	protected $table= "clicks_info";
	
	protected $fillable = ['shorturl_id','country','ua'];
			
}