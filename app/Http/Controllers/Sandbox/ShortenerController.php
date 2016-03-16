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
	
	//private $pubDir= 'localhost/hotpms/public';
    private $pubDir= 'hotpms.gopagoda.io';
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
        	$generatedUrl= 'http://'. $this->pubDir . $request->getPathInfo() . "/" . str_random(4);
        }while(count(ShortUrl::where('short_url',$generatedUrl)->get()) > 0);
        
        $shortUrl->short_url= $generatedUrl;
        $shortUrl->save();       
        
        
        session(['generated_url' => $generatedUrl]);
        
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
    	$url= ShortUrl::where('short_url','LIKE', '%'.$shortUrl)->first();
    	$location= \Location::get();
    	if($url !== null){
    		ShortUrlClickInfo::create([
    				'shorturl_id' => $url->id,
    				'country' => $location->countryName,
    				'ua' => $request->server->get("HTTP_USER_AGENT"),
    		]);
    	}
        
        
        return redirect()->to($url->long_url);
    }
    
}
