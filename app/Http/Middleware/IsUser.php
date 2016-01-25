<?php

namespace Hotpms\Http\Middleware;

use Closure;

class IsUser
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
        if( ! $this->auth->user()->isAdmin()){
			
			$this->auth->logout();
			
			if($request->ajax()){
				return response('Unauthorized.',401);
			}
			else{
				return redirect()->to('auth/login');
			}
		}
			
		return $next($request);
    }
}
