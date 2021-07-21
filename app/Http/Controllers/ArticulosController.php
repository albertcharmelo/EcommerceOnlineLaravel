<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Http\Requests\StoreArticulosRequest;
use App\ProductoPlantilla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticulosController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.articulos.create');
    }
    public function createCategory()
    {

        return view('panel.articulos.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                'plantilla' => $request->atributo
            ]);
            return  ProductoPlantilla::all();
        }
    }

    public static function setPlantilla(Request $request)
    {
        if (isset($request->plantilla_id)) {
            $plantilla = ProductoPlantilla::where('id', '=', $request->plantilla_id)->get()->first();
            return $plantilla;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
