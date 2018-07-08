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

// Category Routes
Route::get('/category', 'CategoryController@index')->name('category.index');
Route::get('/category/create', 'CategoryController@getCreate')->name('category.create');
Route::post('/category/create', 'CategoryController@postCreate')->name('category.create');

// Blog Routes
Route::get('/blog/create', 'BlogController@getCreate')->name('blog.create');
Route::post('/blog/create', 'BlogController@postCreate')->name('blog.create');

Route::get('/home', 'HomeController@index')->name('home');
