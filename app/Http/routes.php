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

// User routes.
Route::group(['prefix' => 'user'], function()
{
	Route::group(['middleware' => 'guest'], function() {
		Route::get('/login', [
			'as' => 'user.login',
			'uses' => 'UserController@login'
		]);

		Route::post('/login', [
			'as' => 'user.login',
			'uses' => 'UserController@postLogin'
		]);
	});

	Route::get('/logout', [
		'middleware' => 'auth',
		'as' => 'user.logout',
		'uses' => 'UserController@logout'
	]);
});

Route::get('/blog/category/{id}', ['as' => 'blog.category', 'uses' => 'BlogController@category']);

Route::get('/file/{id}', ['as' => 'storage.file', 'uses' => 'StorageController@file']);
Route::get('/document/{id}', ['as' => 'storage.document', 'uses' => 'StorageController@document']);

Route::get('{uri?}', ['as' => 'website.page', 'uses' => 'WebsiteController@page']);
