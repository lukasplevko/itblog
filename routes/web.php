<?php
use App\Mail\WelcomeMail;
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


Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('/lessons', 'LessonsController@classes');
    Route::get('/lessons/{lesson}', 'LessonsController@lessons');
    Route::get('/lessons/{id}/edit', 'LessonsController@edit');
    Route::delete('/lessons/{destroy}', 'LessonsController@destroy');
    Route::post('/lessons/{id}', 'UsersController@saveProgress')->name('users.progress');
    Route::get('/lessons/kurz/{slug}', 'LessonsController@show')->name('lessons.slug');
    Route::put('/lessons/kurz/{slug}', 'LessonsController@update')->name('lessons.update');
});

Auth::routes(['verify' => true]);
Route::get('/logout', 'Auth\LoginController@logout');

Route::resource('posts', 'PostsController');
Route::get('/posts/{slug}', 'PostsController@show')->name('posts.slug');
Route::get('/posts/category/{category}', 'PagesController@category');

Route::get('/home','HomeController@index');

Route::resource('users', 'UsersController');

Route::get('/users/{name}', 'UsersController@show')->name('name.search');




Route::get('/', 'PagesController@index');




Route::get('/dashboard', 'DashboardController@index')->name('home')->middleware('verified');

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

Route::get('/email', function () {
 return new WelcomeMail();
});









