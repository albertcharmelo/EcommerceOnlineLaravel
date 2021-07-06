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
Route::prefix('panel')->middleware(['auth'])->group(function () {
    Route::get('/dashboard/tienda', 'PanelController@index');
    Route::get('/dashboard/usuarios', 'PanelController@usuarios');
    Route::get('/dashboard/blog', 'PanelController@blog');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
