
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
    return view('layouts.app');
});

Route::get('/posts', 'PostController@index')->name('posts.index')->middleware('auth');
Route::get('posts/create', 'PostController@create')->name('posts.create')->middleware('auth');
Route::post('posts', 'PostController@store')->name('posts.store')->middleware('auth');
Route::get('posts/{id}', 'PostController@show')->name('posts.show')->middleware('auth');
Route::get('posts/{id}/edit', 'PostController@edit')->name('posts.edit')->middleware('auth')->middleware('check');
Route::put('posts/{id}', 'PostController@update')->name('posts.update')->middleware('auth');

Route::delete('posts/{id}', 'PostController@destroy')->name('posts.destroy')->middleware('auth')->middleware('check');

Route::get('users/createProf', 'ProfileController@create')->name('users.create')->middleware('auth');
Route::post('users', 'ProfileController@store')->name('users.store')->middleware('auth');
Route::get('users/{id}', 'ProfileController@show')->name('users.show')->middleware('auth');
Route::get('users/{id}/edit', 'ProfileController@edit')->name('users.edit')->middleware('auth');
Route::put('users/{id}', 'ProfileController@update')->name('users.update')->middleware('auth');

Route::get('ajax', function(){ return view('ajax'); });
Route::post('/postajax','CommentController@createComment')->name('comment.create')->middleware('auth');
Route::get('comments/{id}/edit', 'CommentController@edit')->name('comments.edit')->middleware('auth')->middleware('check');
Route::put('comments/{id}', 'CommentController@update')->name('comments.update')->middleware('auth');


Route::delete('comments/{id}', 'CommentController@destroy')->name('comments.destroy')->middleware('auth')->middleware('check');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
