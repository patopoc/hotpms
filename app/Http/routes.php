<?php

use Hotpms\Person;
use Hotpms\Http\Controllers\Sandbox\ShortenerController;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::controllers([
	
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('/', function () {
    return redirect()->route('admin.dashboard.index');
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth','set_current_property'],'namespace'=> 'Admin'], function(){
	Route::get('people/search/{ci}', ['as' => 'peopleSearch', function($ci){		
		$person= Person::where('ci',$ci)->first();
		if($person !== null)
			return $person->toJson();
		return $person;
	}]);
	Route::get('availability/list/{fromDate}/{toDate}', ['as' => 'availabilityList', 'uses' =>'AvailabilityController@listAll']);
	Route::get('booking/canceled',["as" => "admin.booking.canceled",'uses' => 'BookingController@canceled']);
	Route::get('booking/arrival', ["as" => "admin.booking.arrival" ,'uses' => 'BookingController@arrival']);
	
	//the middleware for resource is defined within every controller constructor
	Route::resource('dashboard', 'DashboardController');
	Route::resource('people', 'PeopleController');
	Route::resource('booking', 'BookingController');
	Route::resource('property','PropertyController');
	Route::resource('rate', 'RateController');
	Route::resource('services', 'ServicesController');
	Route::resource('facilities', 'FacilitiesController');
	Route::resource('service_plans', 'ServicePlanController');
	Route::resource('facility_plans', 'FacilityPlanController');
	Route::resource('bed_types', 'BedTypeController');
	Route::resource('room_types', 'RoomTypeController');
	Route::resource('users', 'UserController');
	Route::resource('roles', 'RoleController');
	Route::resource('role_details', 'RoleDetailController');
	Route::resource('menus', 'MenuController');
	Route::resource('availability', 'AvailabilityController');
	
});

Route::group(['prefix' => 'sandbox', 'namespace' => 'Sandbox'], function(){
	Route::post('short/api', 'ShortenerController@shorten');
	Route::resource('short', 'ShortenerController');
	Route::get('network', function(){
		$data["remote"]= $_SERVER['REMOTE_ADDR'];
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	    {
	      $data['client']=$_SERVER['HTTP_CLIENT_IP'];
	    }
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	    {
	      $data['fwf1']=$_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED']))   //to check ip is pass from proxy
	    {
	    	$data['fwf2']=$_SERVER['HTTP_X_FORWARDED'];
	    }
	    elseif (!empty($_SERVER['HTTP_FORWARDED_FOR']))   //to check ip is pass from proxy
	    {
	    	$data['fwf3']=$_SERVER['HTTP_FORWARDED_FOR'];
	    }
	    elseif (!empty($_SERVER['HTTP_FORWARDED']))   //to check ip is pass from proxy
	    {
	    	$data['fwf4']=$_SERVER['HTTP_FORWARDED'];
	    }
	    
	    dd($data);
		return "";
	});
});