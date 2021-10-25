@extends('welcome')
@section('content')
    
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-12 col-lg-7">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Nuestra Historia
                    </h3>

                    <div class="pr-5 p-b-9 " style="    border-right: 3px solid #e6e6e6 !important;">
                        <p class="stext-114 cl6 p-r-40 p-b-11">
                            <ul style="list-style:initial !important">
                                <li class=" text-right" >Servir con excelencia.</li>
                                <li class=" text-right" >Siempre brindar la satisfacción de nuestros clientes.</li>
                                <li class=" text-right" >Generamos un ambiente de flexibilidad, entusiasmo y confianza</li>
                                <li class=" text-right" >Innovación y mejora continua</li>
                            </ul>
                        </p>
                        <p class="stext-113 cl6 p-b-26 text-right">
                            Alguna duda?, encuentrános C/ Duarte No.224, Bonao 42000, Monseñor Nouel, República Dominicana, puede contactarnos al +1 (849) 450-7766
                        </p>
                    </div>
                  
                </div>
            </div>

            <div class="col-12 col-md-5 col-lg-5 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="{{ asset('assets/img/Bonao_logo.png') }}" width="300px" alt="bonao">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Nuestra Misión 
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Somos una empresa comprometida con nuestros clientes así como con nuestro personal, laboramos bajo políticas, ofreciendo la variedad más rentable del mundo de la tecnología en la zona, buscando siempre la innovación y precios accesibles al público.
                    </p>

                    <div class="bor16 p-l-29 p-b-9 m-t-22">
                        <p class="stext-114 cl6 p-r-40 p-b-11">
                            <ul style="list-style: ">
                                <li>Servir con excelencia.</li>
                                <li>Siempre brindar la satisfacción de nuestros clientes.</li>
                                <li>Generamos un ambiente de flexibilidad, entusiasmo y confianza</li>
                                <li>Innovación y mejora continua</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>

            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="{{ asset('assets/img/devia_rd.png') }}" width="300px" alt="bonao">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>	



@endsection