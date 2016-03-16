<?php

namespace Hotpms\Http\Controllers\Sandbox;

use Illuminate\Http\Request;

use Hotpms\Http\Requests;
use Hotpms\Http\Controllers\Controller;
use Hotpms\Http\Requests\CreateFacilityRequest;
use Illuminate\Support\Facades\Session;
use Hotpms\Http\Requests\EditFacilityRequest;
use Hotpms\Facility;
use Hotpms\ShortUrl;
use Hotpms\ShortUrlClickInfo;

class ShortenerController extends Controller
{
		
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        $shorturls= ShortUrl::all();
        return view('sandbox.shortener.index', compact('shorturls'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    	
    	$url= $request->get("long_url");
    	
        $shortUrl= new ShortUrl();
        $shortUrl->long_url= $url;
        $generatedUrl='';
        do{
        	$generatedUrl= str_random(4);
        }while(count(ShortUrl::where('short_url',$generatedUrl)->get()) > 0);
        
        $shortUrl->short_url= $generatedUrl;
        $shortUrl->save();
        
        //$pubDir= 'localhost/hotpms/public';
        $pubDir= 'hotpms.gopagoda.io';
        
        session(['generated_url' => 'http://'. $pubDir . $request->getPathInfo() . "/" . $generatedUrl]);
        
        return redirect()->route('sandbox.short.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($shortUrl, Request $request)
    {
    	$url= ShortUrl::where('short_url', $shortUrl)->first();
    	$location= \Location::get();
    	if($url !== null){
    		ShortUrlClickInfo::create([
    				'shorturl_id' => $url->id,
    				'country' => $location->countryName,
    				'ua' => $request->server->get("HTTP_USER_AGENT"),
    		]);
    	}
        
        
        return redirect()->route('sandbox.short.index');
    }
    
}
