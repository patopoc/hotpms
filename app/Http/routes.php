<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace'=> 'Admin'], function(){
	Route::resource('people', 'PeopleController');
	Route::resource('booking', 'BookingController');
	Route::resource('property', 'PropertyController');
	Route::resource('rate', 'RateController');
	Route::resource('services', 'ServicesController');
	Route::resource('facilities', 'FacilitiesController');
	Route::resource('service_plans', 'ServicePlanController');
	Route::resource('facility_plans', 'FacilityPlanController');
	
});