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
        Route::get('/create/articulos', 'ProductoController@create');
        Route::get('/create/categoria', 'ProductoController@createCategory');

        Route::post('/store/articulos', 'ProductoController@store');
        Route::post('/store/articuloImagen', 'ProductoController@storeImagen');

        Route::post('/store/plantilla', 'ProductoController@storePlantilla');
        Route::post('/list/plantilla', 'ProductoController@getPlantilla');
        Route::post('/set/plantilla', 'ProductoController@setPlantilla');

        Route::get('/create/combo', 'ProductoController@createCombo');

        Route::get('productos/cargar', 'ProductoController@listaproductos')->name('producto.cargarproductos');
        Route::get('productos', 'ProductoController@productosactivos')->name('producto.productosactivos');
        
        Route::post('productoget', 'ProductoController@productoget');

        Route::resource('producto', 'ProductoController');

    });

    // tipo_documentos
    Route::prefix('tipodocumentos')->group(function () {
        Route::get('tipodocumentos', 'TipoDocumentoController@listatipodocumentos')->name('tipodocumento.cargartipodocumentos');
        Route::resource('tipodocumento', 'TipoDocumentoController');
    });

    // proveedores
    Route::prefix('proveedores')->group(function () {
        Route::get('proveedores', 'ProveedorController@listaproveedores')->name('proveedor.cargarproveedores');
        Route::resource('proveedor', 'ProveedorController');
    });

    // compras
    Route::prefix('compras')->group(function () {
        Route::get('compras', 'CompraController@listacompras')->name('compra.cargarcompras');

        Route::resource('compra', 'CompraController');

        Route::get('index', 'CompraController@index');
        Route::get('create', 'CompraController@create');
        Route::get('show', 'CompraController@show');
        Route::get('edit', 'CompraController@edit');
        Route::post('destroy', 'CompraController@destroy');
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
