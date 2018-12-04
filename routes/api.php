<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('movies', 'App\Http\Controllers\MovieApiController@index');
    $api->post('movies', 'App\Http\Controllers\MovieApiController@store');
    $api->get('movies/{id}', 'App\Http\Controllers\MovieApiController@show');
    $api->put('movies/{id}', 'App\Http\Controllers\MovieApiController@update');
    $api->delete('movies/{id}', 'App\Http\Controllers\MovieApiController@destroy');

    $api->get('genres', 'App\Http\Controllers\GenreApiController@index');
});
