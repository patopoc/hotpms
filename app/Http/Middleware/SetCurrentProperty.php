<?php

namespace Hotpms\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Hotpms\Property;
use Illuminate\Support\Facades\Session;


class SetCurrentProperty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	
    	if(! Session::has('current_property')){
	    	$property= Property::findOrFail(Auth::user()->default_property);
	    	Session::flash('current_property', $property);
    	}
    	
    	if(!Session::has('available_properties')){
    		if(count(Auth::user()->properties) > 1){
    			Session::flash('available_properties', Auth::user()->properties);
    		}
    	}
    	
    	if($request->has('current_property')){
    		$property= Property::find($request->get('current_property'));
    		if($property !== null)
    			Session::flash('current_property', $property);
    	}
    	
        return $next($request);
    }
}
