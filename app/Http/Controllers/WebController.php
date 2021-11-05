<?php

namespace App\Http\Controllers;

use App\Post;
use Newsletter;
use App\ProductoApi;
use App\RegistroApi;
use App\PostCategoria;
use App\ProductoCarrito;
use App\CategoriaProducto;
use App\Factura;
use App\Factura_productos;
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
                        'precio'=>$producto->precio_al_detalle,
                        'producto_id'=>$producto->ID,
                        'categoria_id'=>1,
                        'precio_mayor'=>$producto->precio_por_mayor

                    ]
                );  
            }else if($producto->categoria == 'AURICULAR' ||$producto->categoria == 'BOCINA' ||$producto->categoria == 'HANDS FREE'){
                ProductoApi::updateOrCreate(
                    ['codigo' => $producto->codigo],
                    [
                        'titulo'=>$producto->nombre_producto,
                        'descripcion'=>$producto->descripcion,
                        'stock'=>$producto->disponible,
                        'precio'=>$producto->precio_al_detalle,
                        'producto_id'=>$producto->ID,
                        'categoria_id'=>2,
                        'precio_mayor'=>$producto->precio_por_mayor

                    ]
                );  
            }else if($producto->categoria == 'CABLE' ||$producto->categoria == 'CARGADOR' ||$producto->categoria == 'COVER' ||$producto->categoria == 'CARGADOR INALAMBRICO' ||$producto->categoria == 'CARGADOR CARRO'){
                ProductoApi::updateOrCreate(
                    ['codigo' => $producto->codigo],
                    [
                        'titulo'=>$producto->nombre_producto,
                        'descripcion'=>$producto->descripcion,
                        'stock'=>$producto->disponible,
                        'precio'=>$producto->precio_al_detalle,
                        'producto_id'=>$producto->ID,
                        'categoria_id'=>3,
                        'precio_mayor'=>$producto->precio_por_mayor

                    ]
                );  
            }else if($producto->categoria == 'ADAPTADOR' ||$producto->categoria == 'BLUETOOTH' ||$producto->categoria == 'FUENTE' ||$producto->categoria == 'ARO DE LUZ' ||$producto->categoria == 'PORTA CARRO' ||$producto->categoria == 'SOPORTE' ||$producto->categoria == 'POWER BANK'){
                ProductoApi::updateOrCreate(
                    ['codigo' => $producto->codigo],
                    [
                        'titulo'=>$producto->nombre_producto,
                        'descripcion'=>$producto->descripcion,
                        'stock'=>$producto->disponible,
                        'precio'=>$producto->precio_al_detalle,
                        'producto_id'=>$producto->ID,
                        'categoria_id'=>4,
                        'precio_mayor'=>$producto->precio_por_mayor
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


    public static function facturar($datosFactura){
        $url = "https://espinosatechnology.com/espinosa_api/api/cenllabo/crear_factura?es_api_cenllabo=1&token=AD419C02A85C54DD";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                  

        curl_setopt($curl, CURLOPT_POSTFIELDS, $datosFactura);

        $resp = curl_exec($curl);
        curl_close($curl);

       
    
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
            'codigo' => '12345689',
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
        'referencia'=> time() . rand(10*45, 100*98),
        'cliente'=>$cliente,
        'products'=>$productos,
        );
        $factura = array('datos_factura'=>$datosPago);




        try {
           $facturas = Factura::insertGetId([
                'codMoneda' => 'RD',
                'montoImpuesto' => '0.00',
                'montoFacturado' =>floatval($request->total),
                'fechaFact' => now()->format('d-m-y'),
                'montoEnvio' => floatval($request->montoEnvio),
                'referencia'=> time() . rand(10*45, 100*98), 
                'user_id_cliente'=> Auth::user()->referenciaID,
            ]);

            $registro_de_factura = Factura::find($facturas);
            RegistroApi::create([
                'fecha'=> now()->format('d-m-y'),
                'motivo'=>"Facturación $registro_de_factura->referencia"
            ]);
            
            foreach ($productosCarrito as $producto) {
                Factura_productos::create([
                    'factura_id'=> $facturas,
                    'producto_id'=>$producto->id
                ]);

            }

            
            // $url = "https://espinosatechnology.com/espinosa_api/api/cenllabo/crear_factura?es_api_cenllabo=1&token=AD419C02A85C54DD";
            // $curl = curl_init();
            // curl_setopt($curl, CURLOPT_URL, $url);
            // curl_setopt($curl, CURLOPT_POST, 1);
            // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            // curl_setopt($curl, CURLOPT_POSTFIELDS,json_encode($factura,JSON_PRETTY_PRINT));
            // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            // $resp = curl_exec($curl);
            // var_dump($resp);
            // curl_close($curl);


          

            // return json_encode($factura,JSON_PRETTY_PRINT);
       
            

        } catch (\Throwable $th) {
            return 'error de transaccion '.$th;
        }




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
        

        $productos = ProductoApi::where('stock','>',0)->where('precio','!=',null)
        ->join('producto_has_image','producto_has_image.producto_id','=','producto_devia_api.id')
        ->join('prodcuto_devia_api_categoria','prodcuto_devia_api_categoria.id','=','producto_devia_api.categoria_id')
        ->select('producto_devia_api.*','producto_has_image.path','prodcuto_devia_api_categoria.boton', 'prodcuto_devia_api_categoria.slug as categoriaSlug')
        ->with('categoria')
        ->get();
        
        if (Auth::check()) {
            $productosCarrito = PostController::carrito();

            return view('web.index')->with(compact('productosCarrito','categorias','posts','sliderImages','comentario1','comentario2','comentario3','comentario4',"categoriasProducto",'productos'));
        }
        return view('web.index')->with(compact('categorias','posts','sliderImages','comentario1','comentario2','comentario3','comentario4','categoriasProducto','productos'));
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
