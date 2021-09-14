<?php

use App\ProductoCarrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

//Rutas de Cliente
Route::prefix('/')->group(function () {
    Route::get('/','WebController@index');
  
    //Blog
    Route::get('/blog/{categoria_slug?}','PostController@blog');
    Route::get('/blog/post/{slug}','PostController@show');
    Route::post('/blog/search','PostController@bsuqueda');
    //Shop
    Route::post('/shop/filterProduct','WebController@filterPrice');
    Route::get('/shop/{slug?}','WebController@shop');
    Route::post('/search/producto', 'ProductoController@list');
    //Contacto
    Route::get('/contacto','WebController@contacto');
    //Nosotros
    Route::get('/nosotros','WebController@about');

});

//Rutas del Panel
Route::prefix('panel')->middleware(['auth','admin'])->group(function () {
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
        Route::post('/store/categoria','PostController@StoreCategory');
        Route::post('/store/post','PostController@store')->name('post.store');
        Route::post('/getPosts','PostController@getPosts');
    });

    //Articulos
    Route::prefix('productos')->group(function () {
        Route::get('/create/productos', 'ProductoController@create');
        Route::get('/create/categoria', 'ProductoController@createCategory');
        Route::get('/GaleryGet/{id}', 'ProductoController@GalerryGet');
        Route::post('/asignarCategoria', 'ProductoController@asignarCategoria');
        Route::post('/search/list', 'ProductoController@list');

        Route::post('/store/articulos', 'ProductoController@store');
        Route::post('/store/articuloImagen', 'ProductoController@storeImagen');

        Route::post('/store/plantilla', 'ProductoController@storePlantilla');
        Route::post('/list/plantilla', 'ProductoController@getPlantilla');
        Route::post('/set/plantilla', 'ProductoController@setPlantilla');

        Route::get('/create/combo', 'ProductoController@createCombo');

        Route::post('productoget', 'ArticulosController@productoget');

    });

    // proveedores
    Route::prefix('proveedores')->group(function () {
        Route::get('proveedores', 'ProveedorController@listaproveedores')->name('proveedor.cargarproveedores');
        Route::get('index', 'ProveedorController@index');
        Route::get('create', 'ProveedorController@create');
        Route::get('show', 'ProveedorController@show');
        Route::get('edit', 'ProveedorController@edit');
        Route::post('destroy', 'ProveedorController@destroy');
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

    //Modificar Index
    Route::prefix('modificar')->group(function () {
        //index
        Route::get('/index','ModificarController@index');
        Route::post('/uploadSliderImage','ModificarController@createImageSlider');
        Route::post('/toogleCheck','ModificarController@toogleCheck');
        Route::post('/comentarios','ModificarController@comentarios');
        // Producto (agregar imagen y categorias)
        Route::get('/producto','ModificarController@producto');


    });




});

Auth::routes();
Route::post('/cargar/provincias', function () {
    $provincias = DB::table('provincias')->get();
    return $provincias;
});
Route::get('/home', 'HomeController@index')->name('home');
