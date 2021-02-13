<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'cors'], function() {

	Route::group(['prefix' => 'auth'], function () {

	    Route::post('login', 'Auth\AuthController@login')->name('login');
	    Route::post('signup', 'Auth\AuthController@signUp');

	    Route::group(['middleware' => 'auth:api'], function() {

	        Route::get('logout', 'Auth\AuthController@logout');
	        Route::get('user', 'Auth\AuthController@user');
	    });
	});


	Route::group(['middleware' => 'auth:api'], function() {
		
		// Corporativos
		Route::get('corporativos', 'CorporativosController@index');
		Route::post('corporativos', 'CorporativosController@store');
		Route::get('corporativos/{id}', 'CorporativosController@show');
		Route::put('corporativos/{id}', 'CorporativosController@update');
		Route::patch('corporativos/{id}', 'CorporativosController@update');
	});
});

