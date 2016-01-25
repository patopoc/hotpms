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
	Route::resource('people', 'PeopleController');
	Route::resource('booking', 'BookingController', ['middleware' => ['is_admin', 'is_user']]);
	Route::resource('property','PropertyController', ['middleware' => ['is_admin']]);
	Route::resource('rate', 'RateController', ['middleware' => ['is_admin']]);
	Route::resource('services', 'ServicesController', ['middleware' => ['is_admin']]);
	Route::resource('facilities', 'FacilitiesController', ['middleware' => ['is_admin']]);
	Route::resource('service_plans', 'ServicePlanController', ['middleware' => ['is_admin', 'is_user']]);
	Route::resource('facility_plans', 'FacilityPlanController', ['middleware' => ['is_admin', 'is_user']]);
	Route::resource('bed_types', 'BedTypeController',['middleware' => ['is_admin', 'is_user']]);
	Route::resource('room_types', 'RoomTypeController', ['middleware' => ['is_admin', 'is_user']]);
	Route::resource('users', 'UserController', ['middleware' => ['is_admin']]);
	
});