<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonaRequest;
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
            ->join('tipo_documentos', 'personas.tipo_documento_id', '=', 'tipo_documentos.id')
            ->select('personas.*', 'tipo_documentos.nombre as tipodoc')
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
            ->where('operacion', '=', '0')
            ->get();

        return view("panel.proveedor.create", compact('tipodocumentos'), ['proveedor' => new Persona()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonaRequest $request)
    {
        // $request->tipo_persona == '1';
        // Persona::create($request->validated());
        // return back()->with('crear', 'ok');
        $proveedor = Persona::create([
            'nombre' => $request->nombre,
            'tipo_documento_id' => $request->tipo_documento_id,
            'num_documento' => $request->num_documento,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'tipo_persona' => '1',
        ]);
        return back()->with('crear', 'ok');
        // return $proveedor;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $proveedor)
    {
        // dd($proveedor);
        $tipodocumentos = DB::table('tipo_documentos')
            ->where('operacion', '=', '0')
            ->get();
        return view('panel.proveedor.show', compact('tipodocumentos'), ["proveedor" => $proveedor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $proveedor)
    {

        $tipodocumentos = DB::table('tipo_documentos')
            ->where('operacion', '=', '0')
            ->get();
        return view('panel.proveedor.edit', compact('tipodocumentos'), ["proveedor" => $proveedor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePersonaRequest $request, Persona $proveedor)
    {
         //dd($request);
        // $proveedor = new Persona();
        // $proveedor = $proveedor->find($request->id);
        
        if (isset($proveedor->id)) {
            $proveedor->nombre = $request->nombre;
            $proveedor->tipo_documento_id = $request->tipo_documento_id;
            $proveedor->num_documento = $request->num_documento;
            $proveedor->direccion = $request->direccion;
            $proveedor->telefono = $request->telefono;
            $proveedor->email = $request->email;
            $proveedor->tipo_persona = '1';
            $proveedor->save();
        }
        return back()->with('actualizar', 'ok');

        // $proveedor->update($request->validated());
        // return back()->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedor.index')->with('eliminar', 'ok');
    }
}
