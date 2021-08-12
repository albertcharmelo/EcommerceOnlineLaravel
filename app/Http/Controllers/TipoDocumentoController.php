<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTipoDocumentoPost;
use App\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panel.tipodocumento.index');
    }

    public function listatipodocumentos()
    {

        $tipodocumentos = DB::table('tipo_documentos')
            ->select('tipo_documentos.*')
            ->get();

        return datatables()
            ->of($tipodocumentos)
            ->addColumn('btn', 'panel.tipodocumento.opciones')
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
        return view("panel.tipodocumento.create", ['tipodocumento' => new Tipodocumento()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoDocumentoPost $request)
    {
        TipoDocumento::create($request->validated());
        return back()->with('crear', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tipodocumento $tipodocumento)
    {
        // dd($tipodocumento);
        return view('panel.tipodocumento.show', ["tipodocumento" => $tipodocumento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipodocumento $tipodocumento)
    {
        return view('panel.tipodocumento.edit', ["tipodocumento" => $tipodocumento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    

    public function update(StoreTipoDocumentoPost $request, Tipodocumento $tipodocumento)
    {
        $tipodocumento->update($request->validated());
        return back()->with('actualizar', 'ok');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function destroy(Tipodocumento $tipodocumento)
    {
        $tipodocumento->delete();
        return redirect()->route('tipodocumento.index')->with('eliminar', 'ok');
    }
}
