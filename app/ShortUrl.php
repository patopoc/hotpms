<?php namespace Hotpms;

use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model{
	
	public $timestamps= false;
	
	protected $table= "shorturls";
	
	protected $fillable = ['long_url','short_url'];
	
	public function clicksInfo(){
		return $this->hasMany('Hotpms\ShortUrlClickInfo', 'shorturl_id', 'id');
	}
			
}