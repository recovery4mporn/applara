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
Route::get('/', 'WelcomeController@index');
Route::post('users/{id}/update_profile_picture', 'UsersController@update_profile_picture');
Route::post('families/{id}/update_profile_picture', 'FamiliesController@update_profile_picture');
Route::post('attendances/{id}/mark_attendance', 'AttendanceController@mark_attendance');
Route::resource('users', 'UsersController');
Route::resource('families', 'FamiliesController');
Route::resource('zones', 'ZoneController');

Route::resource('attendances', 'AttendanceController');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
