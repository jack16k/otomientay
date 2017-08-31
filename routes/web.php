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
Route::group(['namespace' => 'Backend'], function() {
	Route::get('/quantri', 'BackendController@index');
	Route::post('/quantri/login', 'BackendController@login');
	Route::get('/quantri/logout', 'BackendController@logout');

	Route::get('/quantri/categories', 'CategoriesController@index');
	Route::get('/quantri/categories/add', 'CategoriesController@add');
	Route::post('/quantri/categories/checktitle', 'CategoriesController@checktitle');
	Route::post('/quantri/categories/insert', 'CategoriesController@insert');
	Route::get('/quantri/categories/edit/{id}', 'CategoriesController@edit');
	Route::post('/quantri/categories/update', 'CategoriesController@update');
	Route::post('/quantri/categories/delete', 'CategoriesController@delete');

	Route::get('/quantri/posts', 'PostsController@index');
	Route::get('/quantri/posts/add', 'PostsController@add');
	Route::post('/quantri/posts/insert', 'PostsController@insert');
	Route::post('/quantri/posts/checktag', 'PostsController@checktag');
	Route::post('/quantri/posts/addtag', 'TagsController@addtag');
});
Route::group(['namespace' => 'RaoVat','prefix'=>'raovat'], function() {
	Route::get('/','RaoVatController@index');
	Route::get('/item/{id}','RaoVatController@getItem');
	Route::get('/search/{city}/{manufacturer}/{type}','RaoVatController@filter');
	Route::post('/login','RaoVatController@login');
	Route::get('/dang-tin','RaoVatAdController@index');
	Route::post('/dang-tin','RaoVatAdController@postAd');
	Route::post('/file','FileUploadController@upload');
	Route::delete('/file/{filename}','FileUploadController@delete');
	Route::get('/image/{name}','RaoVatImageController@getImage');
});
Route::get('/', 'FrontendController@index');
Route::get('/{alias}', 'FrontendController@showpostincategory');
Route::get('/{c_alias}/{p_alias}', 'FrontendController@showpost');

