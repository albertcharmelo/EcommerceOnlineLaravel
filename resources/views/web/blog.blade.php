@extends('welcome')
@section('css')
<link rel="stylesheet" href="{{ asset('css/web/jquery-ui.css') }}">

@endsection
@section('content')
<style>
    .page-item:last-child .page-link {
        border-radius: 50%;

    }

    .page-item:first-child .page-link {
        border-radius: 50%;

    }

    .page-link {
        width: 55px;
        height: 55px;
    }

    .how-pagination1:hover {
        background-color: #00A7B9;
        border-color: #00A7B9;
        border: 1px solid #00A7B9 color: #fff;
    }

    .ui-autocomplete {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        float: left;
        display: none;
        min-width: 160px;
        padding: 4px 0;
        margin: 0 0 10px 25px;
        list-style: none;
        background-color: #ffffff;
        border-color: #ccc;
        border-color: rgba(0, 0, 0, 0.2);
        border-style: solid;
        border-width: 1px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        *border-right-width: 2px;
        *border-bottom-width: 2px;
        border: 1px solid #e6e6e6;
        border-radius: 10px;
    }

    .ui-menu-item>div {
        display: block;
        padding: 3px 15px;
        clear: both;
        font-weight: normal;
        line-height: 18px;
        color: #555555;
        white-space: nowrap;
        text-decoration: none;
    }

    .ui-state-hover,
    .ui-state-active {
        color: #ffffff;
        text-decoration: none;
        background-color: #3AC0CB;
        border-radius: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        background-image: none;
    }
</style>
<section class="bg0 p-t-62 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">
                    <!-- item blog -->
                    @if ($posts)
                    @foreach ($posts as $post)
                    <div class="p-b-63">
                        <a href="{{ url('/blog/post',$post->slug) }}" class="hov-img0 how-pos5-parent">
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
                        </a>

                        <div class="p-t-32">
                            <h4 class="p-b-15">
                                <a href="{{ url('/blog/post',$post->slug) }}" class="ltext-108 cl2 hov-cl1 trans-04">
                                    {{ $post->titulo }}
                                </a>
                            </h4>

                            <p class="stext-117 cl6">
                                {!!Str::limit($post->contenido, 450, '...') !!}
                            </p>

                            <div class="flex-w flex-sb-m p-t-18">
                                <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                    <span>
                                        <span class="cl4">Autor: </span> {{ $post->autor }}
                                        <span class="cl12 m-l-4 m-r-6">|</span>
                                    </span>

                                    <span>
                                        {{ $post->categoria->categoria }}
                                        <span class="cl12 m-l-4 m-r-6">|</span>
                                    </span>
                                </span>

                                <a href="{{ url('/blog/post',$post->slug) }}"
                                    class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                    Continuar Leyendo

                                    <i class="fa fa-long-arrow-right m-l-9"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h4 class="p-b-15">
                        <a href="{{ url('/blog/post',$post->slug) }}" class="ltext-108 cl2 hov-cl1 trans-04">
                            {{ $post->titulo }}
                        </a>
                    </h4>

                    @endif





                    <!-- Pagination -->
                    <div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
                        {{ $posts->links()  }}
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3 p-b-80">
                <div class="side-menu">
                    <div class="bor17 of-hidden pos-relative">
                        <input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" id="search"
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
                                <a href="{{ url('/blog',$categoria->slug) }}"
                                    class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                    {{ $categoria->categoria }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>






                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('js')
<script src="{{ asset('js/web/jquery-ui.min.js') }}"></script>

<script>
    document.getElementsByClassName('page-link')[0].innerHTML  = "<i class='fas fa-long-arrow-alt-left'></i>"
    document.getElementsByClassName('page-link')[1].innerHTML  = "<i class='fas fa-long-arrow-alt-right'></i>"
    document.getElementsByClassName('page-link')[1].classList.add("flex-c-m","how-pagination1","trans-04" ,"m-all-7")
    document.getElementsByClassName('page-link')[0].classList.add("flex-c-m","how-pagination1","trans-04" ,"m-all-7")
    
    $('#search').autocomplete({
       source:(request,response)=>{
        $.ajax({
        type: "POST",
        url: "/blog/search",
        data: {
        busqueda: request.term
        },
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        success: function (data) {
        response(data);
        }
        });
        },
        select: function(event, ui) {
        location.href=`${ui.item.url}`;
        },
        messages: {
        noResults: '',
        results: function() {}
        }
    })
    
    
</script>
@endsection