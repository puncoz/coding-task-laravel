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

Route::get('/', 'HomeController@home');
Route::get('/client', 'ClientController@lists');
Route::get('/client/page/{page?}', 'ClientController@lists');
Route::get('/client/add', 'ClientController@form');
Route::post('/client/add', 'ClientController@add');
Route::get('/client/edit/{id}', 'ClientController@form');
Route::post('/client/edit/{id}', 'ClientController@update');
Route::get('/client/delete/{id}', 'ClientController@delete');