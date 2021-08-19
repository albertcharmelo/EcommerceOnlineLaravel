<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\ProductoApi;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
   public function create(Request $request){
    
    
    
        $producto = ProductoApi::create([
            'titulo'=> $request->titulo,
            'descripcion'=>$request->descripcion,
            'precio'=>$request->precio,
            'stock'=>$request->stock,
        ]);
        dd($producto);
        return response()->json($producto);

    }


}
