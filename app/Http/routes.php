<?php

use Hotpms\Person;
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
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth','namespace'=> 'Admin'], function(){
	Route::get('people/search/{ci}', ['as' => 'peopleSearch', function($ci){		
		$person= Person::where('ci',$ci)->first();
		if($person !== null)
			return $person->toJson();
		return $person;
	}]);
	Route::get('booking/canceled',['middleware' => ['is_admin'] ,'uses' => 'BookingController@canceled']);
	Route::get('booking/arrival', ['middleware' => ['is_admin', 'is_user'] ,'uses' => 'BookingController@arrival']);
	
	//the middleware for resource is defined within every controller
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
	
});