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
    Route::get('/', function () {
        return redirect()->route('dashboard.tienda');
    });

    //Dashboards
    Route::get('/dashboard/tienda', 'PanelController@index')->name('dashboard.tienda');
    Route::get('/dashboard/usuarios', 'PanelController@usuarios');
    Route::get('/dashboard/blog', 'PanelController@blog');

    //Blog
    Route::get('/create/post', 'PostController@create');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
