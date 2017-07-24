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

Route::get('/', 'FrontendController@index');
Route::get('/{alias}', 'FrontendController@showpostincategory');
Route::get('/{c_alias}/{p_alias}', 'FrontendController@showpost');

