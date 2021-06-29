<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




//Rutas de Cliente
Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});


//Rutas del Panel
Route::prefix('panel')->group(function () {
    Route::get('/', 'PanelController@index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
