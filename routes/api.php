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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'API\RegisterController@register');

Route::post('login', 'API\RegisterController@login');

Route::middleware('auth:api')->group( function () {
	Route::resource('offer', 'API\OfferController');
});

Route::middleware('auth:api')->group( function () {
	Route::resource('article', 'API\ArticleController');
});

Route::middleware('auth:api')->group( function () {
	Route::resource('cicle', 'API\CicleController');
});