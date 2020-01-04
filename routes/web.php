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

use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\SearchController;

Route::get('/', 'DashboardController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');


Route::resource('posts', 'PostsController');
Route::resource('users', 'UsersController');
Route::post('users/{query}', 'SearchController@searchUser');


Route::get('/logout', 'Auth\LoginController@logout');
Route::put('users/{id}', 'UsersController@show');







Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('home');
Route::get('/users', 'UsersController@index');
