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
    Route::prefix('dashboard')->group(function () {
        Route::get('/tienda', 'PanelController@index')->name('dashboard.tienda');
        Route::get('/usuarios', 'PanelController@usuarios');
        Route::get('/blog', 'PanelController@blog');
    });

    //Blog
    Route::prefix('blog')->group(function () {
        Route::get('/create/post', 'PostController@create');
        Route::get('/create/categoria', 'PostController@createCategory');
    });


    //Articulos
    Route::prefix('/articulos')->group(function () {
        Route::get('/create/articulos', 'ArticulosController@create');
        Route::get('/create/categoria', 'ArticulosController@createCategory');
<<<<<<< Updated upstream

        Route::post('/store/articulos', 'ArticulosController@store');
        Route::post('/store/articuloImagen', 'ArticulosController@storeImagen');
=======
        Route::get('productos', 'ArticulosController@listaproductos')->name('producto.cargarproductos');
        Route::get('index', 'ArticulosController@index');
        Route::get('show', 'ArticulosController@show');
        Route::get('edit', 'ArticulosController@edit');
        Route::post('destroy', 'ArticulosController@destroy');
>>>>>>> Stashed changes
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
