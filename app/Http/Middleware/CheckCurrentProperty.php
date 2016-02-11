<?php

namespace Hotpms\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Hotpms\Property;


class CheckCurrentProperty
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
    	if(session('current_property') === null)
    		return redirect()->route("admin.dashboard.index");
    	    	
        return $next($request);
    }
}
