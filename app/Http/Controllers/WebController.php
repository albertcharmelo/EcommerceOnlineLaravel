<?php

namespace App\Http\Controllers;

use App\ModificacionIndex;
use App\Post;
use App\ProductoApi;
use App\PostCategoria;
use App\ProductoCarrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function index()
    {
        $categorias = PostCategoria::all();
        $posts = Post::orderBy('created_at','DESC')->limit(3)->get();
        $sliderImages = ModificacionIndex::where('tipo','slider')->where('check','true')->limit(3)->get();
        $comentarios = ModificacionIndex::where('tipo','comentario')->limit(4)->get();
        $comentario1=$comentarios[0];
        $comentario2=$comentarios[1];
        $comentario3=$comentarios[2];
        $comentario4=$comentarios[3];
       
        if (Auth::check()) {
            $productosCarrito = ProductoCarrito::join('producto_devia_api','producto_devia_api.id','=','producto_cart.producto_id')
            ->select('producto_cart.lote as cantidad','producto_cart.user_id','producto_devia_api.*')->where('user_id',Auth::user()->id )->get();
            return view('web.index')->with(compact('productosCarrito','categorias','posts','sliderImages','comentario1','comentario2','comentario3','comentario4'));
        }
        return view('web.index')->with(compact('categorias','posts','sliderImages','comentario1','comentario2','comentario3','comentario4'));
    }


    public function contacto(){

        $categorias = PostCategoria::all();
        if (Auth::check()) {
            $productosCarrito = ProductoCarrito::join('producto_devia_api','producto_devia_api.id','=','producto_cart.producto_id')
            ->select('producto_cart.lote as cantidad','producto_cart.user_id','producto_devia_api.*')->where('user_id',Auth::user()->id )->get();
            return view('web.contacto')->with(compact('productosCarrito','categorias'));
        }
        return view('web.contacto')->with(compact('categorias'));

    }


    public function shop()
    {
        $categorias = PostCategoria::all();

        if (Auth::check()) {
            $productosCarrito = ProductoCarrito::join('producto_devia_api','producto_devia_api.id','=','producto_cart.producto_id')
            ->select('producto_cart.lote as cantidad','producto_cart.user_id','producto_devia_api.*')->where('user_id',Auth::user()->id )->get();       
            return view('web.shop')->with(compact('productosCarrito','categorias'));
        }
        return view('web.shop')->with(compact('categorias'));
    }

    public function filterPrice(Request $request)
    {

        switch ($request->filter) {
            case 'all':
              $producto= ProductoApi::all();
                break;
            case '10':
                $producto= ProductoApi::where('precio','<=',10)->get();
                break;
            case '30':
                $producto= ProductoApi::whereBetween('precio',[10,30])->get();
                break;
            case '50':
                $producto= ProductoApi::whereBetween('precio',[30,50])->get();

                break;
            case '100':
                $producto= ProductoApi::whereBetween('precio',[50,100])->get();
                
                break;
            case 'plus':
                $producto= ProductoApi::where('precio','>=',100)->get();
                break;
            default:
            $producto=  ProductoApi::all();
                break;
        }

        return $producto;

       
    }
}
