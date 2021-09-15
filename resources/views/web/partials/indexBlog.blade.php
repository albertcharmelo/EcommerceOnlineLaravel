<!-- Blog -->

<section class="sec-blog bg0 p-t-60 p-b-90">
    <div class="container">
        <div class="p-b-66">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Nuestro Blog
            </h3>
            <p class=" text-center sub-text mt-4">
                Echa un vistazo a las ultimas noticias de nuestra tienda, No te pierdas de las novedades que tenemos para ti. 
            </p>
        </div>

        <div class="row">
            @foreach ($posts as $post)
            <div class="col-sm-6 col-md-4 p-b-40">
                <div class="blog-item">
                    <div class="hov-img0">
                        <a href="{{ url('/blog/post',$post->slug) }}">
                            <img src="{{ asset("$post->imagen") }}" style="max-width:370px;max-height:315px;object-fit: contain" alt="IMG-BLOG">
                        </a>
                    </div>

                    <div class="p-t-15">
                        <div class="stext-107 flex-w p-b-14">
                            <span class="m-r-3">
                                <span class="cl4">
                                    Autor
                                </span>

                                <span class="cl5">
                                    {{ $post->autor }}
                                </span>
                            </span>

                            <span>
                                <span class="cl4">
                                    el 
                                </span>

                                <span class="cl5">
                                    {{ $post->created_at->format('d') }}, {{ $post->created_at->monthName }} {{ $post->created_at->format('Y') }}
                                </span>
                            </span>
                        </div>

                        <h4 class="p-b-12">
                            <a href="{{ url('/blog/post',$post->slug) }}" class="mtext-101 cl2 hov-cl1 trans-04">
                                {{ $post->titulo }}
                            </a>
                        </h4>

                        <p class="stext-108 cl6">
                            {!!Str::limit($post->contenido, 450, '...') !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            

         
        </div>
    </div>
</section>


<!-- No pierdas Clientes -->
<section class="sec-blog bg0 p-t-60 p-b-90">
    <div class="container-fluid">
        <div class="p-b-66">
            <h3 class="ltext-105 cl5 txt-center respon1 text-capitalize">
                VENTAJAS DE NEGOCIO
            </h3>
            <p class=" text-center sub-text mt-4">
                No pierdas más ventas, atiende a todos tus clientes.
            </p>
        </div>

        <div class="row ">
            <div class="col-12 row justify-content-center d-flex">
                <div class="col-lg-3 col-12 ml-2 col-md-4 p-4 vatajas-card"
                    style="background-color: #343A40;min-height:230px">
                    <h4 class="font-weight-bold text-white h4">Inversión </h4>
                    <ul class="mt-4">
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Bajo riesgo de
                                inversión en el producto​</p>
                        </li>
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Retorno rápido de la
                                inversión</p>
                        </li>
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Recuperación total de
                                la inversión</p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-12 ml-2 col-md-4 p-4 vatajas-card"
                    style="background-color: #343A40;min-height:230px">
                    <h4 class="font-weight-bold text-white h4">Stock </h4>
                    <ul class="mt-4">
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Eliminación de stock en tienda​</p>
                        </li>
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Liberación de espacio en tienda</p>
                        </li>
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Eliminación gestión de tiempo y control de stock</p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-12 ml-2 col-md-4 p-4 vatajas-card"
                    style="background-color: #343A40;min-height:230px">
                    <h4 class="font-weight-bold text-white h4">Inventario </h4>
                    <ul class="mt-4">
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Eliminación global de referencias​</p>
                        </li>
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Implantación de una única referencia universal</p>
                        </li>
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Eliminación gestión tiempo y control de inventario</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 row justify-content-center d-flex mt-3">
                
                <div class="col-lg-3 col-12 ml-2 col-md-4 p-4 vatajas-card"
                style="background-color: #343A40;min-height:230px">
                <h4 class="font-weight-bold text-white h4">Compras</h4>
                <ul class="mt-4">
                    <li class=" text-white mb-3 ml-2">
                        <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Eliminación gestión tiempo de compras​</p>
                    </li>
                    <li class=" text-white mb-3 ml-2">
                        <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Eliminación gestión control de compras</p>
                    </li>
                    <li class=" text-white mb-3 ml-2">
                        <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Implantación de un único proveedor</p>
                    </li>
                </ul>
            </div>
                <div class="col-lg-3 col-12 ml-2 col-md-4 p-4 vatajas-card"
                    style="background-color: #343A40;min-height:230px">
                    <h4 class="font-weight-bold text-white h4">Ajuste oferta y demanda​ </h4>
                    <ul class="mt-4">
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Atención de todos los pedidos de los clientes​</p>
                        </li>
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Eliminación ventas perdidas</p>
                        </li>
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Eliminación insatisfacción de los clientes</p>
                        </li>
                    </ul>
                </div>
              
                <div class="col-lg-3 col-12 ml-2 col-md-4 p-4 vatajas-card"
                    style="background-color: #343A40;min-height:230px">
                    <h4 class="font-weight-bold text-white h4">Fidelización Clientes </h4>
                    <ul class="mt-4">
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Atención rápida al cliente​</p>
                        </li>
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Atención de todos los clientes</p>
                        </li>
                        <li class=" text-white mb-3 ml-2">
                            <p><i class="fas fa-circle" style="color:#3AC0CB;font-size:8px"></i> Garantia de calidad</p>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>