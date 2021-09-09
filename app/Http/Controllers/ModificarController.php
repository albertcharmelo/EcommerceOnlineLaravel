<?php

namespace App\Http\Controllers;

use App\CategoriaProducto;
use App\ModificacionIndex;
use Illuminate\Http\Request;

class ModificarController extends Controller
{
    public function index()
    {


        $ShowerImage =  ModificacionIndex::where('tipo', 'slider')->where('check', 'true')->orderBy('created_at', 'DESC')->get();
        if ($ShowerImage->count() >= 6) {
            $SlidersImage = ModificacionIndex::where('tipo', 'slider')->where('check', 'true')->orderBy('updated_at', 'DESC')->limit(6)->get();
        } else {
            $limit = 6 - $ShowerImage->count();
            $SlidersImagefalse = ModificacionIndex::where('tipo', 'slider')->where('check', 'false')->orderBy('created_at', 'DESC')->take($limit);

            $SlidersImage = ModificacionIndex::where('tipo', 'slider')->where('check', 'true')
                ->limit(3)->union($SlidersImagefalse)->orderBy('check', 'desc')->limit(6)->get();
        }
        $comentarios = ModificacionIndex::where('tipo','comentario')->get();
        return view('panel.modificar.index')->with(compact('SlidersImage','comentarios'));
    }


    public function createImageSlider(Request $request)
    {

        if ($request->hasFile('file')) {

            foreach ($request->file('file') as $file) {
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . $file->getClientOriginalName();
                $destinationPath = 'indexSlider/';
                $file->move($destinationPath, $fileName);
                $folderPath = $destinationPath . $fileName;

                ModificacionIndex::create([
                    'tipo' => 'slider',
                    'check' => 'false',
                    'src' => $folderPath,
                ]);
            }
        }
    }

    public function toogleCheck(Request $request)
    {

        $image = ModificacionIndex::find($request->imagen);
        if ($image->check == 'true') {
            $image->check = 'false';
            $image->save();
            $response = [
                'resp' =>'true',
                'image'=>$image,
            ];
            return $response;

        } else {
            $ShowerImage =  ModificacionIndex::where('tipo', 'slider')->where('check', 'true')->orderBy('created_at', 'DESC')->get();
            if ($ShowerImage->count() >= 3) {

                $response = [
                    'resp' =>'false',
                    'image'=>$image,
                ];

                return $response;
            }else{

                $image->check = 'true';
                $image->save();
                $response = [
                    'resp' =>'true',
                    'image'=>$image,
                ];
                return $response;
            }
        }

        
    }

    public function producto(){
       $categorias = CategoriaProducto::get(['categoria','id']);
        return view('panel.modificar.producto')->with(compact('categorias'));

    }

    public function getImagesSlider()
    {

        $ShowerImage =  ModificacionIndex::where('tipo', 'slider')->where('check', 'true')->orderBy('created_at', 'DESC')->get();
        if ($ShowerImage->count() >= 6) {
            $SlidersImage = ModificacionIndex::where('tipo', 'slider')->where('check', 'true')->orderBy('updated_at', 'DESC')->limit(6)->get();
        } else {
            $limit = 6 - $ShowerImage->count();
            $SlidersImagefalse = ModificacionIndex::where('tipo', 'slider')->where('check', 'false')->orderBy('created_at', 'DESC')->take($limit);

            $SlidersImage = ModificacionIndex::where('tipo', 'slider')->where('check', 'true')
                ->limit(3)->union($SlidersImagefalse)->orderBy('check', 'desc')->limit(6)->get();
        }

        return $SlidersImage;
    }


    public function comentarios(Request $request){

        $comentario =ModificacionIndex::where('id',$request->id)->get()->first();
        $comentario->nombre = $request->nombre;
        $comentario->contenido = $request->contenido;
        $comentario->save();
        

    }
}
