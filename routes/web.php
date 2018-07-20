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

Auth::routes();

Route::get('/', 'PageController@index')->name('index');
Route::get('/profile', 'PageController@profile')->name('profile');

// Category Routes
Route::get('/category', 'CategoryController@index')->name('categories.index');
Route::get('/category/create', 'CategoryController@getCreate')->name('categories.create');
Route::post('/category/create', 'CategoryController@postCreate')->name('categories.create');

// Blog Routes
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/view/{id}', 'BlogController@view')->name('blog.view');
Route::get('/blog/category/view/{id}', 'BlogController@viewByCategory')->name('blog.category.view');
Route::get('/blog/edit/{id}', 'BlogController@getEdit')->name('blog.edit');
Route::post('/blog/edit', 'BlogController@postEdit')->name('blog.edit');
Route::get('/blog/create', 'BlogController@getCreate')->name('blog.create');
Route::post('/blog/create', 'BlogController@postCreate')->name('blog.create');
Route::post('/blog/delete/{id}', 'BlogController@postDelete')->name('blog.delete');

// Socialite Routes
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');