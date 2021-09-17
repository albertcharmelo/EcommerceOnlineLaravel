@extends('welcome');
@section('content')
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            inicio
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="/blog" class="stext-109 cl8 hov-cl1 trans-04">
            Blog
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            {{ $post->titulo }}
        </span>
    </div>
</div>


<!-- Content page -->
<section class="bg0 p-t-52 p-b-20">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">
                    <!--  -->
                    <div class="wrap-pic-w how-pos5-parent">
                        <img src="{{ asset("$post->imagen") }}" style='width:100%;height:70%;max-height: 480px;
                        object-fit: contain;' alt="IMG-BLOG">

                        <div class="flex-col-c-m size-123 bg9 how-pos5">
                            <span class="ltext-107 cl2 txt-center">
                                {{ $post->created_at->format('d') }}
                            </span>

                            <span class="stext-109 cl3 txt-center">
                                {{ $post->created_at->monthName }} {{ $post->created_at->format('Y') }}
                            </span>
                        </div>
                    </div>

                    <div class="p-t-32">
                        <span class="flex-w flex-m stext-111 cl2 p-b-19">
                            <span>
                                <span class="cl4">Autor: </span> {{ $post->autor }}
                                <span class="cl12 m-l-4 m-r-6">|</span>
                            </span>

                            <span>
                                {{ $post->created_at->format('d') }}  {{ $post->created_at->monthName }} , {{ $post->created_at->format('Y') }}
                                <span class="cl12 m-l-4 m-r-6">|</span>
                            </span>

                            <span>
                                {{ $post->categoria->categoria }}
                                <span class="cl12 m-l-4 m-r-6">|</span>
                            </span>
                        </span>

                        <h4 class="ltext-109 cl2 p-b-28">
                            {{ $post->titulo }}
                        </h4>

                        <p class="stext-117 cl6 p-b-26">
                            {!!$post->contenido !!}
                        </p>


                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3 p-b-80">
                <div class="side-menu">
                    <div class="bor17 of-hidden pos-relative">
                        <input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search"
                            placeholder="Buscar Noticia">

                        <button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </div>

                    <div class="p-t-55">
                        <h4 class="mtext-112 cl2 p-b-33">
                            Categorías
                        </h4>

                        <ul>
                            @foreach ($categorias as $categoria)
                            <li class="bor18">
                                <a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                    {{ $categoria->categoria }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="p-t-65">
                    <h4 class="mtext-112 cl2 p-b-33">
                        Productos que te interesen
                    </h4>
    
                    <ul>
                        @foreach ($productosRecomendados as $producto)
                              
    
                        <li class="flex-w flex-t p-b-30">
                            <a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
                                <img src="{{ asset($producto->imagenes->first()->path) }}" style="width: 90px !important;" alt="PRODUCT">
                            </a>
    
                            <div class="size-215 flex-col-t p-t-8">
                                <a href="#" class="stext-116 cl8 hov-cl1 trans-04">
                                    {{ $producto->titulo }}
                                </a>
    
                                <span class="stext-116 cl6 p-t-20">
                                    ${{ $producto->precio }}
                                </span>
                            </div>
                        </li>
                            
                        @endforeach
                    </ul>
                </div>
            </div>

           
        </div>
    </div>
    </div>
    </div>
</section>
@endsection