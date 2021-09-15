@extends('welcome')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('indexSlider/1630447579banner-slide-mydeviacom4-min.jpg') }}');">
   
</section>	


<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form>
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Envianos un mensaje
                    </h4>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Tu correo electrónico">
                        <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
                    </div>

                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Como podemos ayudarte?"></textarea>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Enviar
                    </button>
                </form>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Dirección
                        </span>

                        <p class="stext-115 cl6 size-213 p-t-18">
                            C/ Duarte No.224, Bonao 42000, Monseñor Nouel, República Dominicana 
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            <a href="https://wa.me/18494507766" class="cl2">+1 (849) 450-7766</a> 
                        </span>

                        
                    </div>
                </div>
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <i class="fab fa-instagram"></i>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            <a href="https://www.instagram.com/mydeviard/?hl=es" class="cl2">@<span>mydeviard</span> </a> 
                        </span>
                    </div>
                </div>
                <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-envelope"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Soporte de Ventas
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            <a href="mailto:contacto@mydevia.com.do">contacto@mydevia.com.do</a> 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>	


<!-- Map -->
<div class="map">
    <iframe style="width: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3773.895759707187!2d-70.4120017851009!3d18.936007587168408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eafdf8ecae1c42f%3A0xce6b7476fcd73ddb!2sBONAO%20UNLOCK!5e0!3m2!1ses-419!2sve!4v1630674623365!5m2!1ses-419!2sve" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> 
</div>

@endsection