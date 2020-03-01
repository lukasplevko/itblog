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






Route::resource('posts', 'PostsController');
Route::get('/posts/{slug}', 'PostsController@show')->name('posts.slug');
Route::get('/posts/category/{category}', 'PagesController@category');
Route::resource('users', 'UsersController');
Route::get('/users/{name}', 'UsersController@show')->name('name.search');




Route::get('/logout', 'Auth\LoginController@logout');



Route::get('/', 'PagesController@index');
Route::get('/home','HomeController@index');





Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('home');


Route::get('/users', 'UsersController@index');

