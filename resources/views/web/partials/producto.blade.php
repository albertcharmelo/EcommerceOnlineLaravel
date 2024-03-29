<!-- Modal1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal1"></div>

    <div class="container">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                <img src="{{asset('images/icons/icon-close.png')}}" alt="CLOSE">
            </button>

            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots">

                            </div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" id="principal" data-thumb="">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="" id="imagenPrincipal" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="" id="muestra">
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14" id="productoTituloModal">
                           
                        </h4>

                        <span class="mtext-106 cl2" id="productoPrecioModal">
                         
                        </span>

                        {{-- <p class="stext-102 cl3 p-t-23">
                            Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat
                            ornare feugiat.
                        </p> --}}

                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10 d-flex justify-content-start">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    @auth
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                            name="num-product" id="productoCount" value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>  
                                    @endauth
                                    
                                    <input type="hidden" id='productoCompraID' value="">
                                    @auth
                                    <button onclick="AgregarProductoCarrito()"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" onclick="saludo()">
                                    AÑADIR AL CARRO
                                    </button>
                                    @endauth
                                    @guest
                                    <a href="/login" class=" text-white">
                                    <button onclick="AgregarProductoCarrito()" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" >
                                        Inicia sesión para realizar tu compra 
                                    </button>
                                    </a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    
                        @auth
                        @if (Auth::user()->rol->rol == 'admin' || Auth::user()->rol->rol == 'mayorista')
                        <div class="alert alert-info alert-dismissible show fade">
                            <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            <i class="fas fa-user-circle"></i> Precio mayorista activo
                            </div>
                        </div> 
                         @endif   
                        @endauth
                     

                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

