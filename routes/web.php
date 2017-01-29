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

// Auth::routes();

// Route::get('/home', 'HomeController@index');
Route::get('backoffice', function () {
    return view('backoffice.main');
});

Route::resource('backoffice/user', 'UserController');

// Route::get('skills', function () {
//     return ['a', 'b', 'c'];
// });