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
			Route::get('/en','Admin\HomeController@en');
			Route::get('/vn','Admin\HomeController@vn');

			//========================= User ===================================
			Route::get('/quan-tri-vien','Admin\UserController@list_user');
			Route::get('/add_user','Admin\UserController@add_user');
			Route::post('/do_add_user', 'Admin\UserController@do_add_user');
			Route::get('/edit_user/{id}','Admin\UserController@edit_user');
			Route::post('/do_edit_user/{id}', 'Admin\UserController@do_edit_user');
			Route::get('/delete_user/{id}','Admin\UserController@delete_user');

			//=========================== Profile ====================================
			Route::get('/profile','Admin\ProfileController@list_profile');
			Route::get('/edit_profile/{id}','Admin\ProfileController@edit_profile');
			Route::post('/do_edit_profile/{id}','Admin\ProfileController@do_edit_profile');


			//=========================== Category About ====================================
			Route::get('/category_about','Admin\CategoryAboutController@list_category_about');
			Route::get('/add_category_about','Admin\CategoryAboutController@add_category_about');
			Route::post('/do_add_category_about', 'Admin\CategoryAboutController@do_add_category_about');
			Route::get('/edit_category_about/{id}','Admin\CategoryAboutController@edit_category_about');
			Route::post('/do_edit_category_about/{id}', 'Admin\CategoryAboutController@do_edit_category_about');
			Route::get('/delete_category_about/{id}','Admin\CategoryAboutController@delete_category_about');


			//===========================  About ====================================
			Route::get('/about','Admin\AboutController@list_about');
			Route::get('/add_about','Admin\AboutController@add_about');
			Route::post('/do_add_about', 'Admin\AboutController@do_add_about');
			Route::get('/edit_about/{id}','Admin\AboutController@edit_about');
			Route::post('/do_edit_about/{id}', 'Admin\AboutController@do_edit_about');
			Route::get('/delete_about/{id}','Admin\AboutController@delete_about');

			//=========================== Category service ====================================
			Route::get('/category_service','Admin\CategoryServiceController@list_category_service');
			Route::get('/add_category_service','Admin\CategoryServiceController@add_category_service');
			Route::post('/do_add_category_service', 'Admin\CategoryServiceController@do_add_category_service');
			Route::get('/edit_category_service/{id}','Admin\CategoryServiceController@edit_category_service');
			Route::post('/do_edit_category_service/{id}', 'Admin\CategoryServiceController@do_edit_category_service');
			Route::get('/delete_category_service/{id}','Admin\CategoryServiceController@delete_category_service');

			//===========================  Service ====================================
			Route::get('/service','Admin\ServiceController@list_service');
			Route::get('/add_service','Admin\ServiceController@add_service');
			Route::post('/do_add_service', 'Admin\ServiceController@do_add_service');
			Route::get('/edit_service/{id}','Admin\ServiceController@edit_service');
			Route::post('/do_edit_service/{id}', 'Admin\ServiceController@do_edit_service');
			Route::get('/delete_service/{id}','Admin\ServiceController@delete_service');

			//=========================== Category Other ====================================
			Route::get('/category_other','Admin\CategoryOtherController@list_category_other');
			Route::get('/add_category_other','Admin\CategoryOtherController@add_category_other');
			Route::post('/do_add_category_other', 'Admin\CategoryOtherController@do_add_category_other');
			Route::get('/edit_category_other/{id}','Admin\CategoryOtherController@edit_category_other');
			Route::post('/do_edit_category_other/{id}', 'Admin\CategoryOtherController@do_edit_category_other');
			Route::get('/delete_category_other/{id}','Admin\CategoryOtherController@delete_category_other');

			//===========================  Other ====================================
			Route::get('/other','Admin\OtherController@list_other');
			Route::get('/add_other','Admin\OtherController@add_other');
			Route::post('/do_add_other', 'Admin\OtherController@do_add_other');
			Route::get('/edit_other/{id}','Admin\OtherController@edit_other');
			Route::post('/do_edit_other/{id}', 'Admin\OtherController@do_edit_other');
			Route::get('/delete_other/{id}','Admin\OtherController@delete_other');

			//===========================  Science ====================================
			Route::get('/science','Admin\ScienceController@list_science');
			Route::get('/add_science','Admin\ScienceController@add_science');
			Route::post('/do_add_science', 'Admin\ScienceController@do_add_science');
			Route::get('/edit_science/{id}','Admin\ScienceController@edit_science');
			Route::post('/do_edit_science/{id}', 'Admin\ScienceController@do_edit_science');
			Route::get('/delete_science/{id}','Admin\ScienceController@delete_science');

			//===========================  News ====================================
			Route::get('/news','Admin\NewsController@list_news');
			Route::get('/add_news','Admin\NewsController@add_news');
			Route::post('/do_add_news', 'Admin\NewsController@do_add_news');
			Route::get('/edit_news/{id}','Admin\NewsController@edit_news');
			Route::post('/do_edit_news/{id}', 'Admin\NewsController@do_edit_news');
			Route::get('/delete_news/{id}','Admin\NewsController@delete_news');

			//===========================  Document ====================================
			Route::get('/document','Admin\DocumentController@list_document');
			Route::get('/add_document','Admin\DocumentController@add_document');
			Route::post('/do_add_document', 'Admin\DocumentController@do_add_document');
			Route::get('/edit_document/{id}','Admin\DocumentController@edit_document');
			Route::post('/do_edit_document/{id}', 'Admin\DocumentController@do_edit_document');
			Route::get('/delete_document/{id}','Admin\DocumentController@delete_document');

			//===========================  Video ====================================
			Route::get('/video','Admin\VideoController@list_video');
			Route::get('/add_video','Admin\VideoController@add_video');
			Route::post('/do_add_video', 'Admin\VideoController@do_add_video');
			Route::get('/edit_video/{id}','Admin\VideoController@edit_video');
			Route::post('/do_edit_video/{id}', 'Admin\VideoController@do_edit_video');
			Route::get('/delete_video/{id}','Admin\VideoController@delete_video');

			//===========================  Link ====================================
			Route::get('/link','Admin\LinkController@list_link');
			Route::get('/add_link','Admin\LinkController@add_link');
			Route::post('/do_add_link', 'Admin\LinkController@do_add_link');
			Route::get('/edit_link/{id}','Admin\LinkController@edit_link');
			Route::post('/do_edit_link/{id}', 'Admin\LinkController@do_edit_link');
			Route::get('/delete_link/{id}','Admin\LinkController@delete_link');

			//===========================  Q&A ====================================
			Route::get('/qa','Admin\QaController@list_qa');
			Route::get('/add_qa','Admin\QaController@add_qa');
			Route::post('/do_add_qa', 'Admin\QaController@do_add_qa');
			Route::get('/edit_qa/{id}','Admin\QaController@edit_qa');
			Route::post('/do_edit_qa/{id}', 'Admin\QaController@do_edit_qa');
			Route::get('/delete_qa/{id}','Admin\QaController@delete_qa');

			//===========================  Contact ====================================
			Route::get('/contact','Admin\ContactController@list_contact');
			Route::get('/add_contact','Admin\ContactController@add_contact');
			Route::post('/do_add_contact', 'Admin\ContactController@do_add_contact');
			Route::get('/edit_contact/{id}','Admin\ContactController@edit_contact');
			Route::post('/do_edit_contact/{id}', 'Admin\ContactController@do_edit_contact');
			Route::get('/delete_contact/{id}','Admin\ContactController@delete_contact');


		});

//=================================================================

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
