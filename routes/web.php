<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('logout', 'UserController@logout'); 

Route::group(['prefix' => 'login'], function () {
    Route::get('', function () {
        return view('login.login');    
    }); 
    Route::post('auth', 'UserController@auth'); 
});

Route::group(['prefix' => 'backoffice', 'middleware' => 'auth.login'], function () {
    Route::get('', function () {
        return view('backoffice.main');
    });

    Route::resource('user', 'UserController');
    Route::resource('truck', 'TruckController');
    Route::resource('truck-expire', 'TruckController@getTruckWillExpire');
    Route::resource('truckdriver', 'UserController@getTruckDriver');
});

Route::group(['prefix' => '', 'middleware' => 'auth.login'], function () {
    Route::get('', function () {
        return view('frontoffice.main');    
    });

    Route::resource('fuel', 'FuelController');        
    Route::resource('tire', 'TireController');    
    Route::resource('maintain', 'MaintainController');    
});