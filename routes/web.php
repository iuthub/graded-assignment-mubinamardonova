<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
	'uses' => 'TaskController@getIndex',
	'as' => 'mainIndex'
]);

Route::group([
	'prefix'=>'admin',
	'middleware' => ['auth', 'verified']
], function(){

	Route::get('/', [
		'uses' => 'TaskController@getAdminIndex',
		'as'=> 'adminIndex'
	]);

	Route::get('/edit/{id}', [
		'uses' => 'TaskController@getAdminEdit',
		'as' => 'adminEdit'
	]);


	Route::post('/edit', [
		'uses' => 'TaskController@postAdminEdit',
		'as' => 'adminEditPost'
	]);


	Route::get('/create', [
		'uses' => 'TaskController@getAdminCreate',
		'as' => 'adminCreate'
	]);

	Route::post('/create', [
		'uses' => 'TaskController@postAdminCreate',
		'as' => 'adminCreatePost'
	]);

	Route::get('/delete/{id}', [
		'uses' => 'TaskController@getAdminDelete',
		'as' => 'adminDelete'
	]);

		
});

Auth::routes(['verify'=>true]);
