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
Route::resource('users', 'UsersController');



Route::get('/logout', 'Auth\LoginController@logout');



Route::view('/', 'welcome');




Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('home');


Route::get('/users', 'UsersController@index');

