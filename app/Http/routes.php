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

Route::get('/', 'HomeController@index');
/*****User*******/
Route::group(['middleware' => 'auth'], function () {
	Route::post('/user/create', 'UsersController@store');
	Route::get('/user/create', 'UsersController@create');
	Route::get('/user/', 'UsersController@index');
	Route::get('/user/my','UsersController@my');
	Route::get('/user/business','UsersController@business');
	Route::get('/user/edit/{id}','UsersController@edit');
	Route::post('/user/remove/{id}', 'UsersController@remove');
	Route::post('/user/update/{id}', 'UsersController@update');
	/*****Business*******/
	Route::post('/business/create', 'BusinessesController@store');
	Route::get('/business/create', 'BusinessesController@create');
	Route::get('/business/', 'BusinessesController@index');
	Route::get('/business/edit/{id}', 'BusinessesController@edit');
	Route::get('/business/show/{id}', 'BusinessesController@show');
	Route::post('/business/remove/{id}', 'BusinessesController@remove');
	Route::post('/business/update/{id}', 'BusinessesController@update');
	/*****Profiles*******/
	Route::post('/profiles/create', 'ProfilesController@store');
	Route::get('/profiles/save', 'ProfilesController@save');
	Route::get('/profiles/create', 'ProfilesController@create');
	Route::get('/profiles/show/{id}', 'ProfilesController@show');

});



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
