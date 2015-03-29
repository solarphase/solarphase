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

// TODO: Give names to all the routes.

Route::get('/file/{id}', 'StorageController@file');
Route::get('/document/{id}', 'StorageController@document');
Route::get('{uri?}', 'WebsiteController@page');
