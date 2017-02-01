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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'backoffice'], function () {
    Route::get('', function () {
        return view('backoffice.main');
    });

    Route::resource('user', 'UserController');
    Route::resource('truck', 'TruckController');
});