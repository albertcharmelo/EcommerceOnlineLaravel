<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App\Articulo;

// use Barryvdh\DomPDF\PDF as DomPDFPDF;
// use Dompdf\Adapter\PDFLib;

class InventarioController extends Controller
{
    public function index()
    {
        $articulos = Articulo::paginate(10);
        return view('panel.inventario.index', compact('articulos'));

        
    }

    public function reporte()
    {
        $articulos = Articulo::all();
        $pdf = PDF::loadView('panel.inventario.report', compact('articulos'));
        return $pdf->stream('inventario.pdf');
    }
}
