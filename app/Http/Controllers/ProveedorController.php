<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonaPost;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panel.proveedor.index');
    }

    public function listaproveedores()
    {

        $personas = DB::table('personas')
            ->select('personas.*')
            ->where('tipo_persona', '1')
            ->get();

        return datatables()
            ->of($personas)
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
        $tipodocumentos = DB::table('tipo_documentos')
            ->where('operacion', '=', '1')
            ->get();

        return view("panel.proveedor.create", compact('tipodocumentos'), ['proveedor' => new Persona()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonaPost $request)
    {
        Persona::create($request->validated());
        return back()->with('crear', 'ok');

        // $proveedor = Persona::create([
        //     'nombre' => $request->nombre,
        //     'tipo_documento_id' => $request->tipo_documento,
        //     'num_documento' => $request->num_documento,
        //     'direccion' => $request->direccion,
        //     'telefono' => $request->telefono,
        //     'email' => $request->email,
        //     'tipo_persona' => '1',
        // ]);

        // return $proveedor;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //  dd($persona);
        $tipodocumentos = DB::table('tipo_documentos')
            ->where('operacion', '=', '1')
            ->get();
        return view('panel.proveedor.show', compact('tipodocumentos'), ["persona" => $persona]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        $tipodocumentos = DB::table('tipo_documentos')
            ->where('operacion', '=', '1')
            ->get();
        return view('panel.proveedor.edit', compact('tipodocumentos'), ["proveedor" => $persona]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePersonaPost $request, Persona $persona)
    {
        $persona->update($request->validated());
        return back()->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect()->route('proveedor.index')->with('eliminar', 'ok');
    }
}
