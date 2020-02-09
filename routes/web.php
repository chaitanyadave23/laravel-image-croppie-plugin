<?php

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
Route::get('/', function () {
    return view('welcome');
});

Route::group( [ 'middleware' => 'guest' ], function()
{
	Route::get('/laravel','NewController@laravel')->name('register')->middleware('count');
	Route::post('/insert','NewController@insert');
	Route::get('/login','NewController@loginform')->name('login')->middleware('count');
	Route::any('checklogin','NewController@checklogin');
	Route::any('forgotPassword','NewController@forgotpassword');
	Route::any('mailsend','NewController@mailsend');

});

Route::any('state','NewController@state');
Route::any('fetchdata','NewController@fetchdata')->name('fetchdata');	
Route::any('logout','NewController@logout');
Route::any('reset_password','NewController@reset_password')->name('reset_password');


Route::group( [ 'middleware' => 'auth' ], function()
{
    Route::get('/homepage','NewController@successlogin');
	Route::get('profile','NewController@profile')->name('profile1');
	Route::any('update','NewController@update');	
	//Route::any('crop', ['as'=>'crop-image','uses'=>'ImageController@uploadImage']);
	Route::any('crop', 'ImageController@uploadImage')->name('crop-image');

});

Route::get('userlogin','ProductCategoryController@loginform')->name('userlogin');
Route::post('checklogin','ProductCategoryController@checklogin');
Route::get('dashboard','ProductCategoryController@successlogin')->name('dashboard');
Route::any('logout','ProductCategoryController@logout');
Route::any('category','ProductCategoryController@category');
Route::any('product','ProductCategoryController@product');
Route::any('addcategory','ProductCategoryController@addCategory');
Route::any('addproduct','ProductCategoryController@addProduct');
Route::any('search','ProductCategoryController@search');

