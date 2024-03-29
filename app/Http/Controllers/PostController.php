<?php

namespace App\Http\Controllers;

use App\Post;
use App\ProductoApi;
use App\PostCategoria;
use App\ProductoCarrito;
use App\CategoriaProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class PostController extends Controller
{


    protected $categoriasProducto;
    
    public function __construct() 
    {
        // Fetch the Site Settings object
        $this->categoriasProducto = CategoriaProducto::all();
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = PostCategoria::all();
        return view('panel.blog.create')->with(compact('categorias'));
    }
    public function createCategory()
    {
        return view('panel.blog.createCategory');
    }

    public function StoreCategory(Request $request)
    {
        PostCategoria::create([
            'categoria' => $request->categoria,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image') && Auth::check()) {

            $file = $request->file('image');

            $fileName = time() . $file->getClientOriginalName();
            $destinationPath = 'BlogPostImages/';
            $file->move($destinationPath, $fileName);
            $folderPath = $destinationPath . $fileName;
            $post =  Post::create([
                'titulo' => $request->titulo,
                'autor' => Auth::user()->name . ' ' . Auth::user()->lname,
                'contenido' => $request->contenido,
                'categoria_id' => $request->categoria,
                'estado' => $request->estado,
                'imagen' => $folderPath,
            ]);
        }

        return $post;
    }

    public function blog($slug = null)
    {
        $categoriasProducto =  $this->categoriasProducto;
        $categorias = PostCategoria::all();
        if ($slug == null) {
            $posts = Post::orderBy('created_at', 'desc')->where('estado','Publico')->simplePaginate(5);
        } else {
            $categoriaName = PostCategoria::where('slug', $slug)->get()->first();
            $posts = Post::where('categoria_id', $categoriaName->id)->where('estado','Publico')->orderBy('created_at', 'DESC')->simplePaginate(5);
        }

        if (Auth::check()) {
            $productosCarrito = PostController::carrito();


            
            return view('web.blog')->with(compact('productosCarrito', 'posts', 'categorias','categoriasProducto'));
        } else {
            return view('web.blog')->with(compact('posts', 'categorias','categoriasProducto'));
        }
    }

    public function bsuqueda(Request $request){

        $post = Post::where('titulo','like','%'.$request->busqueda.'%')->get();
        $data = [];
            foreach ($post as $post) {
                $data[]=[

                
                    'label'=>$post->titulo,
                    'url'=>'/blog/post/'.$post->slug,

                ];
            }

        return $data;
    }
    
    public static function carrito(){

        if (Auth::check()) {
            $productosCarrito = ProductoCarrito::join('producto_devia_api', 'producto_devia_api.id', '=', 'producto_cart.producto_id')
        ->join('producto_has_image','producto_has_image.producto_id','=','producto_cart.producto_id')
        ->select('producto_cart.lote as cantidad', 'producto_cart.user_id', 'producto_devia_api.*','producto_has_image.path','producto_cart.id as idCarrito')->where('user_id', Auth::user()->id)->get();

        return $productosCarrito;
        }

       
    }
    public function getPosts(Request $request)
    {


        if ($request->filtro == 'Pendiente') {

            $post = Post::join('blog_post_categoria', 'blog_post.categoria_id', '=', 'blog_post_categoria.id')
                ->select('blog_post.*', 'blog_post_categoria.categoria as categoria')
                ->where('estado', 'Privado')->paginate(4);
        } else if ($request->filtro == 'Publicados') {

            $post = Post::join('blog_post_categoria', 'blog_post.categoria_id', '=', 'blog_post_categoria.id')
                ->select('blog_post.*', 'blog_post_categoria.categoria as categoria')
                ->where('estado', 'Publico')->paginate(4);
            if ($request->palabra) {
                $post = Post::join('blog_post_categoria', 'blog_post.categoria_id', '=', 'blog_post_categoria.id')->select('blog_post.*', 'blog_post_categoria.categoria as categoria')->where('titulo', 'like', '%' . $request->palabra . '%')->orWhere('autor', 'like', '%' . $request->palabra . '%')
                    ->where('estado', 'Publico')->paginate(4);
            }
        } else {
            $post = Post::join('blog_post_categoria', 'blog_post.categoria_id', '=', 'blog_post_categoria.id')->select('blog_post.*', 'blog_post_categoria.categoria as categoria')->paginate(4);
            if ($request->palabra) {
                $post = Post::join('blog_post_categoria', 'blog_post.categoria_id', '=', 'blog_post_categoria.id')->select('blog_post.*', 'blog_post_categoria.categoria as categoria')->where('titulo', 'like', '%' . $request->palabra . '%')->orWhere('autor', 'like', '%' . $request->palabra . '%')->paginate(4);
            }
        }






        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $categoriasProducto =  $this->categoriasProducto;
        $categorias = PostCategoria::all();
        $productosRecomendados = ProductoApi::inRandomOrder()->with('imagenes')->where('categoria_id','!=',null)->limit(4)->get();
        $post = Post::where('slug', $slug)->get()->first();
        // dd($productosRecomendados);
        if (Auth::check()) {
            $productosCarrito = PostController::carrito();

            return view('web.post')->with(compact('productosCarrito', 'categorias', 'productosRecomendados', 'post','categoriasProducto'));
        } else {
            return view('web.post')->with(compact('categorias', 'productosRecomendados', 'post','categoriasProducto'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
