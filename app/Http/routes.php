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
	Route::group(['middleware' => 'guest'], function()
	{
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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function()
{
	Route::resource('user', 'UserController');

	Route::group(['namespace' => 'Storage', 'prefix' => 'storage'], function()
	{
		Route::resource('file', 'FileController');
		Route::resource('document', 'DocumentController');
	});

	Route::group(['namespace' => 'Website', 'prefix' => 'website'], function()
	{
		Route::resource('link', 'LinkController');
		Route::resource('page', 'PageController');
	});

	Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function()
	{
		Route::resource('category', 'CategoryController');
		Route::resource('article', 'ArticleController');
	});
});

Route::get('/blog/category/{id}', ['as' => 'blog.category', 'uses' => 'BlogController@category']);
Route::get('/blog/article/{id}', ['as' => 'blog.article', 'uses' => 'BlogController@article']);

Route::get('/file/{id}', ['as' => 'storage.file', 'uses' => 'StorageController@file']);
Route::get('/document/{id}', ['as' => 'storage.document', 'uses' => 'StorageController@document']);

Route::get('{uri}', ['as' => 'website.page', 'uses' => 'WebsiteController@page'])->where('uri', '(.*)?');
