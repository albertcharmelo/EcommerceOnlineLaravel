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
        
        return response()->json($producto,201);

    }

    public function edit(Request $request){
    
        if ($request->codigo) {
            $producto = ProductoApi::where('codigo',$request->codigo)->firstOrFail();
            
            if ($request->stock) {
                $producto->stock = $request->stock;
            }
            if ($request->precio) {
                $producto->precio = $request->precio;
            }
            if ($request->titulo) {
                $producto->titulo = $request->titulo;
            }
            if ($request->descripcion) {
                $producto->descripcion = $request->descripcion;
            }

            $producto->save();

            return response()->json($producto,200);

        }
        
        return response()->json(400);
        
       

    }

    public function destroy(Request $request){
    
        if ($request->codigo) {
            $producto = ProductoApi::where('codigo',$request->codigo)->firstOrFail();
            
            if ($request->disable && $request->disable == 'true') {
                $producto->disable = $request->disable;
            }else if ($request->disable && $request->disable == 'true') {
                $producto->disable = $request->disable;
            }else{
                $producto->delete();
            }
         

            $producto->save();

            return response()->json($producto,200);

        }
        
        return response()->json(400);
        
       

    }


}
