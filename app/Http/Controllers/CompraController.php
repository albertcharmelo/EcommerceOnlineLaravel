<?php

namespace App\Http\Controllers;

use App\Compra;
use App\DetalleCompra;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCompraPost;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\TipoDocumento;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panel.compra.index');        
    }

    public function listacompras()
    {

        $compras = DB::table('compras')
            ->select('compras.*')
            ->get();

        return datatables()
            ->of($compras)
            ->addColumn('btn', 'panel.proveedor.opciones')
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
        $tipodocumentos= TipoDocumento::all();
        return view("panel.compra.create",compact('tipodocumentos'),['compra' => new Compra()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompraPost $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        try {
            DB::beginTransaction();

            $mytime = Carbon::now('America/Dominica');

            $compra = new Compra();
            $compra->proveedor_id = $request->idproveedor;
            $compra->user_id = Auth::id();
            $compra->tipo_identificacion = $request->tipo_identificacion;
            $compra->num_compra = $request->num_compra;
            $compra->fecha_compra = $mytime->toDateString();
            $compra->impuesto = $request->impuesto;
            $compra->total = $request->total;
            $compra->estado = 'Registrado';
            $compra->save();

            //Array de detalles
            $detalles = $request->data;

            // Recorro todos los elementos del Array $detalles

            foreach ($detalles as $a => $det) {
                $detalle = new DetalleCompra();
                /*enviamos valores a las propiedades del objeto detalle*/
                /*al compra_id del objeto detalle le envio el id del objeto compra, que es el objeto que se ingresó en la tabla compras de la bd*/
                $detalle->compra_id = $compra->id;
                $detalle->producto_id = $det['idproducto'];
                $detalle->cantidad = $det['cantidad'];
                $detalle->precio = $det['precio'];
                $detalle->save();
            }

            DB::commit();
        } catch (\Exception $exception) {        
            DB::rollBack();
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