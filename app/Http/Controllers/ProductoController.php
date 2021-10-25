<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Http\Requests\StoreArticulosRequest;
use App\ProductoApi;
use App\ProductoImagen;
use App\ProductoPlantilla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panel.producto.index');
        //
    }

    public function listaproductos()
    {

        $productos = DB::table('productos')
            ->select('productos.*')
            ->get();

        return datatables()
            ->of($productos)
            ->addColumn('btn', 'panel.producto.opciones')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function productosActivos()
    {
        $productos = DB::table('productos')
            ->select('productos.*')
            ->get();

        return datatables()
            ->of($productos)
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.articulos.create');
    }
    public function list(Request $request)
    {
        $producto = ProductoApi::where('titulo', 'like', '%' . $request->busqueda . '%')->get();
       
            $producto = ProductoApi::where('titulo', 'like', '%' . $request->busqueda . '%')->where('stock','>',0)->where('precio','!=',null)
            ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
            ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
            ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
            ->get();
       
        $data = [];
        foreach ($producto as $producto) {
            $data[] = [
                'label' => $producto->titulo,
                'url' => '/blog/post/' . $producto->slug,
                'id' => $producto->id,
            ];
        }

        return $data;
    }
    public function asignarCategoria(Request $request)
    {
        if ($request->producto && $request->categoria_id) {
            
            $producto = ProductoApi::find($request->producto)->update(['categoria_id'=>$request->categoria_id]);
        }

        return $producto;

    }
    public function GalerryGet($id)
    {
        $producto = ProductoApi::findOrFail($id);

        return $producto->imagenes;
    }
    public function createCategory()
    {

        return view('panel.articulos.createCategory');
    }
    public function createCombo()
    {

        return view('panel.articulos.createCombo');
    }

    public function store(StoreArticulosRequest $request)
    {
        $producto = Articulo::create([
            'atributo' => $request->atributo,
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria_id,
            'descripcion' => $request->descripcion,
            'referencia' => $request->referencia,
            'stock' => $request->stock,
            'precio' => $request->precio,
            'tipo_unidad' => $request->tipo_unidad,
            'garantia' => $request->garantia,
            'estado' => $request->estado,
        ]);

        return $producto;
    }
    public function storeImagen(Request $request)
    {
        if ($request->hasFile('file')) {

            foreach ($request->file('file') as $file) {
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . $file->getClientOriginalName();
                $destinationPath = 'productoImagenes/';
                $file->move($destinationPath, $fileName);
                $folderPath = $destinationPath . $fileName;
                ProductoImagen::create([
                    'path' => $folderPath,
                    'producto_id' => $request->producto_id
                ]);
            }
        }
    }

    public static function getPlantilla(Request $request)
    {
        $plantillas = ProductoPlantilla::all();
        if (isset($plantillas)) {

            return $plantillas;
        }
    }

    public static function storePlantilla(Request $request)
    {
        if (isset($request->titulo) && isset($request->atributo)) {
            ProductoPlantilla::create([
                'titulo' => $request->titulo,
                'plantilla' => $request->atributo,
            ]);
            return ProductoPlantilla::all();
        }
    }

    public static function setPlantilla(Request $request)
    {
        if (isset($request->plantilla_id)) {
            $plantilla = ProductoPlantilla::where('id', '=', $request->plantilla_id)->get()->first();
            return $plantilla;
        }
    }


    public function productoget(Request $request)
    {
        try {
            $productos = DB::table('productos')
                ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
                ->select('productos.*', 'categorias.nombre as categoria')
                ->where('productos.id', request()->productoId)
                ->get();
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Hubo un error al recuperar los registros desde productos...'], 500);
        }
        return $productos;
    }
}
