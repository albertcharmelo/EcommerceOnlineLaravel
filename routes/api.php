<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::prefix('producto')->middleware('auth:api')->group(function () {
    Route::post('/create', 'Api\ProductoController@create');
    Route::post('/edit', 'Api\ProductoController@edit');
    Route::post('/destroy', 'Api\ProductoController@destroy');

});

Route::post('/login', 'Api\AuthApiController@login');
