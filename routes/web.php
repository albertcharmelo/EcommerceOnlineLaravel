<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




//Rutas de Cliente
Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/shop', function ($id) {
        
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

        Route::post('/get/usuarios', 'PanelController@getUsuarios');
    });

    //Blog
    Route::prefix('blog')->group(function () {
        Route::get('/create/post', 'PostController@create');
        Route::get('/create/categoria', 'PostController@createCategory');
    });


    //Articulos
    Route::prefix('articulos')->group(function () {
        Route::get('/create/articulos', 'ArticulosController@create');
        Route::get('/create/categoria', 'ArticulosController@createCategory');

        Route::post('/store/articulos', 'ArticulosController@store');
        Route::post('/store/articuloImagen', 'ArticulosController@storeImagen');

        Route::post('/store/plantilla', 'ArticulosController@storePlantilla');
        Route::post('/list/plantilla', 'ArticulosController@getPlantilla');
        Route::post('/set/plantilla', 'ArticulosController@setPlantilla');

        Route::get('/create/combo', 'ArticulosController@createCombo');

        Route::get('productos', 'ArticulosController@listaproductos')->name('producto.cargarproductos');
        Route::get('index', 'ArticulosController@index');
        Route::get('show', 'ArticulosController@show');
        Route::get('edit', 'ArticulosController@edit');
        Route::post('destroy', 'ArticulosController@destroy');
    });

    //Inventario
    Route::prefix('inventario')->group(function () {
        Route::get('reporte', 'InventarioController@reporte')->name('inventarioPDF');;
        Route::get('index', 'InventarioController@index');
    });

    //Administración
    Route::prefix('administracion')->group(function () {
        Route::get('/create/usuario', 'UsuarioController@index');
        Route::get('/list/usuario', 'UsuarioController@list');
        Route::post('/changeTipo/usuario', 'UsuarioController@changeTipoUser');
        Route::post('/changeTipoRegular/usuario', 'UsuarioController@changeTipoUserRegular');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
