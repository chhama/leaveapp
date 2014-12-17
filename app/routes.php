<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('login', ['uses'=>'UserController@login','as'=>'login']);
Route::post('login', ['uses'=>'UserController@authenticate','as'=>'login']);

Route::group(array('before'=>'auth'),function(){
	Route::get('/', ['uses'=>'HomeController@index','as'=>'index']);
	Route::get('logout', ['uses'=>'UserController@logout','as'=>'logout']);
	Route::resource('user','UserController'); 
	Route::resource('leave','LeaveController'); 
	Route::resource('leavetaken','LeaveTakenController'); 
	Route::put('user/{id}/updateprofile', array('uses'=>'UserController@updateProfile','as'=>'user.updateprofile'));
	Route::post('leavetaken/{id}/reject',['uses'=>'LeaveTakenController@reject','as'=>'leavetaken.reject']);
	Route::get('leavetaken/{id}/accept',['uses'=>'LeaveTakenController@accept','as'=>'leavetaken.accept']);

});