<?php

namespace App\Http\Controllers;

use App\Post;
use Newsletter;
use App\ProductoApi;
use App\RegistroApi;
use App\PostCategoria;
use App\ProductoCarrito;
use App\CategoriaProducto;
use App\ModificacionIndex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use PhpParser\Node\Expr\FuncCall;

class WebController extends Controller
{


    protected $categoriasProducto;

    public function __construct() 
    {
        // Fetch the Site Settings object
        $this->categoriasProducto = CategoriaProducto::all()->take(4);
        
    }


    public static function getProductosApi(){
        $api_url = 'https://espinosatechnology.com/espinosa_api/api/cenllabo/get_articulos?es_api_cenllabo=1&token=AD419C02A85C54DD';
        $json_data = file_get_contents($api_url);
        $response_data = json_decode($json_data);
        
        foreach ($response_data->datos as $producto) {
            if ($producto->categoria == 'LAMINA' || $producto->categoria == 'PULSA' || $producto->categoria == 'MAQUINA'||$producto->categoria == 'CUCHILLA'|| $producto->categoria == 'ESPATULA' || $producto->categoria == 'DESINFECTOR BOX' || $producto->categoria == 'TOALLA' || $producto->categoria == 'ALMOHADILLA' || $producto->categoria == 'PLATAFORMA' || $producto->categoria == 'BLOWER' || $producto->categoria == 'PORTA CUCHILLA' || $producto->categoria == 'DEVIA PENCIL') {
                ProductoApi::updateOrCreate(
                    ['codigo' => $producto->codigo],
                    [
                        'titulo'=>$producto->nombre_producto,
                        'descripcion'=>$producto->descripcion,
                        'stock'=>$producto->disponible,
                        'precio'=>$producto->precio,
                        'producto_id'=>$producto->ID,
                        'categoria_id'=>1
                    ]
                );  
            }else if($producto->categoria == 'AURICULAR' ||$producto->categoria == 'BOCINA' ||$producto->categoria == 'HANDS FREE'){
                ProductoApi::updateOrCreate(
                    ['codigo' => $producto->codigo],
                    [
                        'titulo'=>$producto->nombre_producto,
                        'descripcion'=>$producto->descripcion,
                        'stock'=>$producto->disponible,
                        'precio'=>$producto->precio,
                        'producto_id'=>$producto->ID,
                        'categoria_id'=>2
                    ]
                );  
            }else if($producto->categoria == 'CABLE' ||$producto->categoria == 'CARGADOR' ||$producto->categoria == 'COVER' ||$producto->categoria == 'CARGADOR INALAMBRICO' ||$producto->categoria == 'CARGADOR CARRO'){
                ProductoApi::updateOrCreate(
                    ['codigo' => $producto->codigo],
                    [
                        'titulo'=>$producto->nombre_producto,
                        'descripcion'=>$producto->descripcion,
                        'stock'=>$producto->disponible,
                        'precio'=>$producto->precio,
                        'producto_id'=>$producto->ID,
                        'categoria_id'=>3
                    ]
                );  
            }else if($producto->categoria == 'ADAPTADOR' ||$producto->categoria == 'BLUETOOTH' ||$producto->categoria == 'FUENTE' ||$producto->categoria == 'ARO DE LUZ' ||$producto->categoria == 'PORTA CARRO' ||$producto->categoria == 'SOPORTE' ||$producto->categoria == 'POWER BANK'){
                ProductoApi::updateOrCreate(
                    ['codigo' => $producto->codigo],
                    [
                        'titulo'=>$producto->nombre_producto,
                        'descripcion'=>$producto->descripcion,
                        'stock'=>$producto->disponible,
                        'precio'=>$producto->precio,
                        'producto_id'=>$producto->ID,
                        'categoria_id'=>4
                    ]
                );  
            }



           

            
        }
        RegistroApi::create([
            'fecha'=> now()->format('d-m-y'),
            'motivo'=>'Obtener todos los Productos'
        ]);
        

    } 


    public function cart(){
        $productosCarrito = PostController::carrito();
        $categoriasProducto =  $this->categoriasProducto;
        // dd($productosCarrito);

        return view('web.carritoCompras')->with(compact('productosCarrito','categoriasProducto'));
    }


    public function pagar(Request $request){

      
        $productosCarrito = PostController::carrito();   
        $productos = []; 
        
        foreach ($productosCarrito as  $pCarrito) {
          $producto = array(
              'codigo'=>$pCarrito->codigo,
              'cantidad'=>$pCarrito->cantidad,
              'montund'=>floatval($pCarrito->precio),
              'montototal'=>$pCarrito->cantidad * $pCarrito->precio,
          );
          array_push( $productos,$producto);
        }  
        
        $cliente = array(
            'codigo' => Auth::user()->id,
            'nombre' => Auth::user()->name.' '.Auth::user()->lname,
            'email' => Auth::user()->email,
            'telefono' => Auth::user()->telefono,
            'direccion' => Auth::user()->direccion,
            'Identificacion' => Auth::user()->RNC,
            'TipoIdentificacion' =>  'personal'
        );

        $datosPago= array( 
        
        'codmoneda' => 'RD',
        'mtoimpuesto' => '0.00',
        'mtofactura' =>floatval($request->total),
        'fechafact' => now()->format('d-m-y'),
        'Montoenvio' => floatval($request->montoEnvio),
        'cliente'=>$cliente,
        'products'=>$productos,
        );

        $factura = array('datos_factura'=>$datosPago);

        //eliminar productos
        foreach ($productosCarrito as $productosCarrito) {
            
            ProductoCarrito::find($productosCarrito->idCarrito)->delete();
        }

        return $factura;



    }

    public static function removerDelCarrito(Request $request){

        ProductoCarrito::where('user_id',Auth::user()->id)->where('producto_id',$request->productoId)->delete();



    }




    public function index()
    {   
       
        $fecha_hoy = date('d-m-y');
        $fecha_ultimaPeticion = RegistroApi::all()->last();
        
        if ($fecha_ultimaPeticion->fecha != $fecha_hoy) {
            WebController::getProductosApi();
        }



        $categoriasProducto =  $this->categoriasProducto;
        $categorias = PostCategoria::all();
        $posts = Post::orderBy('created_at','DESC')->limit(3)->get();
        $sliderImages = ModificacionIndex::where('tipo','slider')->where('check','true')->limit(3)->get();
        $comentarios = ModificacionIndex::where('tipo','comentario')->limit(4)->get();
        $comentario1=$comentarios[0];
        $comentario2=$comentarios[1];
        $comentario3=$comentarios[2];
        $comentario4=$comentarios[3];
       
        if (Auth::check()) {
            $productosCarrito = PostController::carrito();

            return view('web.index')->with(compact('productosCarrito','categorias','posts','sliderImages','comentario1','comentario2','comentario3','comentario4',"categoriasProducto"));
        }
        return view('web.index')->with(compact('categorias','posts','sliderImages','comentario1','comentario2','comentario3','comentario4','categoriasProducto'));
    }

    public function AgregarProductoCarrito(Request $request){

       ProductoCarrito::create([
           'producto_id'=>$request->productoId,
           'lote'=>$request->cantidad,
           'user_id'=>Auth::user()->id,
       ]);             
    }

    public function contacto(){
        $categoriasProducto =  $this->categoriasProducto;
        $categorias = PostCategoria::all();
        if (Auth::check()) {
            $productosCarrito = PostController::carrito();

            return view('web.contacto')->with(compact('productosCarrito','categorias',"categoriasProducto"));
        }
        return view('web.contacto')->with(compact('categorias',"categoriasProducto"));

    }

    public function about(){
        $categoriasProducto =  $this->categoriasProducto;
        $categorias = PostCategoria::all();
        if (Auth::check()) {
            $productosCarrito = PostController::carrito();

            return view('web.about')->with(compact('productosCarrito','categorias',"categoriasProducto"));
        }
        return view('web.about')->with(compact('categorias',"categoriasProducto"));

    }
    public function terms(){
        $categoriasProducto =  $this->categoriasProducto;
        $categorias = PostCategoria::all();
        if (Auth::check()) {
            $productosCarrito = PostController::carrito();

            return view('web.terminos')->with(compact('productosCarrito','categorias',"categoriasProducto"));
        }
        return view('web.terminos')->with(compact('categorias',"categoriasProducto"));

    }

    public function guia_uso(){
        $categoriasProducto =  $this->categoriasProducto;
        $categorias = PostCategoria::all();
        if (Auth::check()) {
            $productosCarrito = PostController::carrito();

            return view('web.guia_uso')->with(compact('productosCarrito','categorias',"categoriasProducto"));
        }
        return view('web.guia_uso')->with(compact('categorias',"categoriasProducto"));

    }


    public function shop($slug = null)
    {   $categoriasProducto =  $this->categoriasProducto;
        $categorias = CategoriaProducto::all();
        $productos = ProductoApi::where('stock','>',0)->where('precio','!=',null)
        ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
        ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
        ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
        ->get();
        // dd($productos);
        if (Auth::check()) {
            $productosCarrito = PostController::carrito();
       
            return view('web.shop')->with(compact('productosCarrito','categorias','slug',"categoriasProducto",'productos'));
        }
        return view('web.shop')->with(compact('categorias','slug',"categoriasProducto",'productos'));
    }

    public function filter($order = null,$from = null, $to = null){
        
        if ($order == 'news') {
            if ($from == null && $to == null) {
                $productos = ProductoApi::where('stock','>',0)->where('precio','!=',null)
                 ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                 ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                 ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                 ->where('path','!=',null)
                 ->get();
              }else {
                 $productos = ProductoApi::where('stock','>',0)->whereBetween('precio',[$from,$to])
                 ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                 ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                 ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                 ->where('path','!=',null)
                 ->get();
              }
        }else if('asc'){
            if ($from == null && $to == null) {
                $productos = ProductoApi::where('stock','>',0)->where('precio','!=',null)
                ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                ->where('path','!=',null)
                ->orderBy('precio','asc')
                ->get();
             }else {
                $productos = ProductoApi::where('stock','>',0)->whereBetween('precio',[$from,$to])
                ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                ->where('path','!=',null)
                ->orderBy('precio','asc')
                ->get();
             } 
        }else if('desc'){
            if ($from == null && $to == null) {
                $productos = ProductoApi::where('stock','>',0)->where('precio','!=',null)
                ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                ->where('path','!=',null)
                ->orderBy('precio','desc')
                ->get();

                
             }else {
                $productos = ProductoApi::where('stock','>',0)->whereBetween('precio',[$from,$to])
                ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                ->where('path','!=',null)
                ->orderBy('precio','desc')
                ->get();
             }  

        }

        $slug = null;
        
       

         $categoriasProducto =  $this->categoriasProducto;
         $categorias = CategoriaProducto::all();
          if (Auth::check()) {
             $productosCarrito = PostController::carrito();
        
             return view('web.shop')->with(compact('productosCarrito','categorias','slug',"categoriasProducto",'productos'));
         }
         return view('web.shop')->with(compact('categorias','slug',"categoriasProducto",'productos'));
        


     


    }

    public static function orderByPrice($price = null,$to = null,$more = false, $OrderCondition = null){

        if ($price != null) {
            if ($more != false && $to == null) {
                $producto=ProductoApi::where('stock','>',0)->where('precio','>=',$price)
                ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                ->get();
            }else {
                $producto=ProductoApi::where('stock','>',0)->where('precio','<=',$price)
                ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                ->get();
            } 


            if ($to != null) {
                $producto= ProductoApi::where('stock','>',0)->whereBetween('precio',[$price,$to])
                ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                ->get();
            }
        }
        return $producto;
    }


    public function filterPrice(Request $request)
    {

        switch ($request->filter) {
            case 'all':
              $producto= ProductoApi::all();
                break;
            case '500':
                $producto=ProductoApi::where('stock','>',0)->where('precio','<=',500)
                ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                ->get();
                break;
            case '1000':
                $producto=  ProductoApi::where('stock','>',0)->whereBetween('precio',[501,1000])
                ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                ->get();
                break;
            case '5000':
                $producto=  ProductoApi::where('stock','>',0)->whereBetween('precio',[1000,5000])
                ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                ->get();

                break;
            case '10000':
                $producto= ProductoApi::where('stock','>',0)->whereBetween('precio',[5001,10000])
                ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                ->get();
                
                break;
            case 'plus':
                $producto=  ProductoApi::where('stock','>',0)->where('precio','>=',10001)
                ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                ->get();
                break;
            default:
                $producto=  ProductoApi::where('stock','!=',null)->where('precio','!=',null)->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
                ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
                ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
                ->get();

                break;
        }


       
        return $producto;

       
    }
}
