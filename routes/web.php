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

Route::get('/', 'IndexController@returnView')->name('index');
Route::get('search', 'SearchController@returnView')->name('search');

Route::get('movies/create', ['as' => 'movies.create', 'uses' => 'MovieController@returnCreateView'])->middleware('auth', 'admin');
Route::post('movies', ['as' => 'movies.store', 'uses' => 'MovieController@makeStoreRequest'])->middleware('auth', 'admin');
Route::get('movies/edit/{id}', ['as' => 'movies.edit', 'uses' => 'MovieController@returnEditView'])->middleware('auth', 'admin');
Route::put('movies/{id}', ['as' => 'movies.update', 'uses' => 'MovieController@makeUpdateRequest'])->middleware('auth', 'admin');;
Route::delete('movies/{id}', ['as' => 'movies.delete', 'uses' => 'MovieController@makeDeleteRequest'])->middleware('auth', 'admin');;

// Auth routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
