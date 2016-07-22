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
//=======================Admin=========================
	Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	]);


	Route::group(array('prefix'=>'admin','middleware'=>'auth'),function(){


			///======================== Home admin =================
			Route::get('/','Admin\HomeController@home');


			//========================= User ===================================
			Route::get('/quan-tri-vien','Admin\UserController@list_user');
			Route::get('/add_user','Admin\UserController@add_user');
			Route::post('/do_add_user', 'Admin\UserController@do_add_user');
			Route::get('/edit_user/{id}','Admin\UserController@edit_user');
			Route::post('/do_edit_user/{id}', 'Admin\UserController@do_edit_user');
			Route::get('/delete_user/{id}','Admin\UserController@delete_user');

			//==================================================================
			

		});

//=================================================================

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
