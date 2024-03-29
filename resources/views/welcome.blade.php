<!DOCTYPE html>
<html lang="es">

<head>
	<title>Devia RD</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{ header('Content-Type: text/html; charset=UTF-8') }}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" type="image/png" href="{{ asset('assets/img/devian-iso.png') }}">
	<!--===============================================================================================-->
	{{-- <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}"/> --}}
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/web/aos.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/web/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/web/main.css') }}">
	<link rel="stylesheet" href="{{ asset('css/web/jquery-ui.css') }}">
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
	
	<!--===============================================================================================-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
		integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<meta charset="UTF-8">
	<style>
		/* .m-30 {
			
			margin-bottom: 13vh;
		} */
		.client-sec {
			background-color: #fafafa;
		}

		.sub-text {
			font-size: 20px;
			padding-left: 50px;
			padding-right: 50px;
		}

		.card-r {
			position: relative;
			border: solid 1px rgb(43, 127, 140);
			padding: 45px 50px 25px 60px;
			/* margin-top: 40px; */
			background-color: transparent;
			background-image: linear-gradient(180deg, #4BBBCD 0%, #2aadc1 100%);
			border-radius: 10px;
			color: #fff
		}

		.post-txt-r {
			font-family: Poppins-Medium;
			font-size: 20px;
			margin-bottom: 0;
			color:#f0e7e7;
		}

		.quote-img-r {
			position: absolute;
			top: 32px;
			left: 25px;
			width: 30px;
			height: 30px
		}

		.nice-img-r {
			width: 20px;
			height: 25px;
			margin-bottom: 7px
		}

		.arrow-down-r {
			width: 0;
			height: 0;
			border-left: 25px solid transparent;
			border-right: 25px solid transparent;
			border-top: 20px solid rgb(43, 127, 140);
			margin-left: 88%;
		}

		.fit-image-r {
			width: 100%;
			object-fit: cover
		}

		.profile-pic-r {
			/* position: absolute; */
			width: 120px;
			height: 120px;
			border-radius: 100%;
			left: 60px;
			margin-top: 15px
		}

		.profile-name-r {
			/* position: absolute; */
			/* font-family: Poppins-Bold;
			font-size: 22px;
			margin-top: 60px;
			left: 0;
			color: #616161; */

			position: relative;
			font-family: Poppins-Bold;
			font-size: 22px;
			margin-top: 60px;
			left: 210px;
			color: #616161
		}
	</style>
	<style>
		.card {
			position: relative;
			border: solid 1px rgb(43, 127, 140);
			padding: 45px 50px 25px 60px;
			/* margin-top: 200px; */
			background-color: transparent;
			background-image: linear-gradient(180deg, #4BBBCD 0%, #2aadc1 100%);

			border-radius: 10px;
			color: #fff
		}

		.post-txt {
			font-family: Poppins-Medium;
			font-size: 20px;
			margin-bottom: 0;
			color:#f0e7e7;

		}

		.quote-img {
			position: absolute;
			top: 32px;
			left: 25px;
			width: 30px;
			height: 30px
		}

		.nice-img {
			width: 20px;
			height: 25px;
			margin-bottom: 7px
		}

		.arrow-down {
			width: 0;
			height: 0;
			border-left: 25px solid transparent;
			border-right: 25px solid transparent;
			border-top: 20px solid rgb(43, 127, 140);
			margin-left: 85px
		}

		.fit-image {
			width: 100%;
			object-fit: cover
		}

		.profile-pic {
			position: absolute;
			width: 120px;
			height: 120px;
			border-radius: 100%;
			left: 65px;
			margin-top: 15px
		}

		.profile-name {
			position: absolute;
			font-family: Poppins-Bold;
			font-size: 22px;
			margin-top: 60px;
			left: 210px;
			color: #616161
		}


		.login {
			font-family: Poppins-Medium;
			font-size: 17px;
		}
	</style>
	<style>
		@media only screen and (max-width: 1400px) {

			.main-menu > li > a {
					font-size: 11px;
			}
			.login {
					font-size: 14px;
			}
		
		
		}

		@media only screen and (max-width: 600px) {
			.sub-text {
				font-size: 20px;
				padding-left: 50px;
				padding-right: 50px;
			}

			.card {
				position: relative;
				border: solid 1px rgb(43, 127, 140);
				padding: 45px 50px 25px 60px;
				/* margin-top: 200px; */
				background-color: transparent;
			background-image: linear-gradient(180deg, #4BBBCD 0%, #2aadc1 100%);
				
				border-radius: 10px;
				color: #fff;
				margin-top: 20px;

			}

			.card-r {
				position: relative;
				border: solid 1px rgb(43, 127, 140);
				padding: 45px 50px 25px 60px;
				/* margin-top: 200px; */
				background-color: transparent;
			background-image: linear-gradient(180deg, #4BBBCD 0%, #2aadc1 100%);
				
				border-radius: 10px;
				color: #fff;
				margin-top: 20px;
			}

			.post-txt-r {
				color:#f0e7e7;
				font-family: Poppins-Medium;
				font-size: 20px;
				margin-bottom: 0
			}

			.quote-img-r {
				position: absolute;
				top: 32px;
				left: 25px;
				width: 30px;
				height: 30px
			}

			.nice-img-r {
				width: 20px;
				height: 25px;
				margin-bottom: 7px
			}

			.arrow-down-r {
				width: 0;
				height: 0;
				border-left: 25px solid transparent;
				border-right: 25px solid transparent;
				border-top: 20px solid rgb(43, 127, 140);
				margin-left: 85px
			}

			.fit-image-r {
				width: 100%;
				object-fit: cover
			}

			.profile-pic-r {
				position: absolute;
				width: 120px;
				height: 120px;
				border-radius: 100%;
				left: 65px;
				margin-top: 15px
			}
		}

		.profile-name-r {
			/* position: absolute; */
			position: absolute;
			font-family: Poppins-Bold;
			font-size: 22px;
			margin-top: 60px;
			left: 50%;
			color: #616161
		}
		}

		@media only screen and (max-width: 1351px) {
			.profile-name-r {
				/* position: absolute; */
				position: absolute;
				font-family: Poppins-Bold;
				font-size: 22px;
				margin-top: 60px;
				left: 30%;
				color: #616161
			}

		}
		.vatajas-card:hover{
			box-shadow: 0 8px 16px rgb(44 44 44 / 80%), 0 -8px 16px hsl(0deg 0% 90% / 80%);
    transform: translateY(-10px);
    transition: .3s;
		}

		.vatajas-card{
			border-radius: 3%;
		}

		@media only screen and (max-width: 768px) {
			.responsive-slider{

				object-fit: contain;
				max-height:260px !important;
			}


		}
	</style>
	@yield('css')
</head>

<body class="animsition">

	<!-- Header -->
	<header class="header-v2">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">

					<!-- Logo desktop -->
					<a href="/" class="logo">
						<img src="{{ asset('assets/img/devian rd2.png') }}" alt="Devia RD">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							{{-- @foreach ($categoriasProducto as $categoria)
							<li class="">
								<a class=" text-uppercase" href="/shop/{{ $categoria->slug }}">{{ $categoria->categoria }}</a>
							</li>
							@endforeach --}}
							<li>
								<a class=" text-uppercase" href="/shop">Tienda</a>
							</li>
							<li>
								<a href="/guia-uso">GUÍA DE USO</a>

							</li>
							<li>
								<a href="/blog">BLOG</a>
							</li>

							<li>
								<a href="/contacto">CONTACTO</a>

							</li>
							
							<li>
								<a href="/nosotros">NOSOTROS</a>

							</li>
						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">
						@auth
				
						<div class="flex-c-m h-full p-l-18 p-r-25 bor5">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
								data-notify="{{ $productosCarrito->count() }}">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
						</div>

						<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
								<i class="zmdi zmdi-menu"></i>
							</div>
						</div>
						@endauth
						@guest
						<div class="flex-c-m h-full p-l-18 p-r-25 bor5">
							<a href="/login" class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 login ">
								<span>Iniciar sesión</span> <i class="fas fa-sign-in-alt"></i>
							</a>
						</div>
						@endguest

					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="/"><img src="{{asset('assets/img/devian rd2.png')}}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
			
				
				@auth
				<div class="flex-c-m h-full p-lr-10 bor5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
					data-notify="{{ $productosCarrito->count() }}">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>
				@endauth
				
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				@foreach ($categoriasProducto as $categoria)
				<li class="">
					<a class=" text-uppercase" href="/shop/{{ $categoria->slug }}">{{ $categoria->categoria }}</a>
				</li>
				@endforeach
				<li>
					<a href="/guia-uso">GUÍA DE USO</a>

				</li>
				<li>
					<a href="/blog">BLOG</a>
				</li>

				<li>
					<a href="/contacto">CONTACTO</a>
				</li>
				
				<li>
					<a href="/nosotros">NOSOTROS</a>

				</li>
				@guest
					
				<li>
					<a href="/login" class="text-uppercase"><span>Iniciar sesión</span> <i class="ml-1 fas fa-sign-in-alt"></i></a>

				</li>
				@endguest
			</ul>
		</div>

		<!-- Modal Search -->
		{{-- <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Buscar">
				</form>
			</div>
		</div> --}}
	</header>



	@auth
	<!-- Sidebar -->
	<aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">


				<div class="sidebar-gallery w-full p-tb-30">
					<span class="mtext-101 cl5">
						@DeviaRD
					</span>

					<div class="flex-w flex-sb p-t-36 gallery-lb">
						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="{{ asset('web/banner-slide-mydeviacom4-min.jpg') }}"
								data-lightbox="gallery"
								style="background-image: url('web/banner-slide-mydeviacom4-min.jpg');object-fit: cover;"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="{{ asset('web/1.jpg') }}"
								data-lightbox="gallery"
								style="background-image: url('{{ asset('web/1.jpg') }}');object-fit: cover;"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="{{ asset('web/2.jpg') }}"
								data-lightbox="gallery"
								style="background-image: url('{{ asset('web/2.jpg') }}');object-fit: cover;"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="{{ asset('web/3.jpg') }}"
								data-lightbox="gallery"
								style="background-image: url('{{ asset('web/3.jpg') }}');object-fit: cover;"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="{{ asset('web/4.jpg') }}"
								data-lightbox="gallery"
								style="background-image: url('{{ asset('web/4.jpg') }}');object-fit: cover;"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="{{ asset('web/5.jpg') }}"
								data-lightbox="gallery"
								style="background-image: url('{{ asset('web/5.jpg') }}');object-fit: cover;"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="{{ asset('web/6.jpg') }}"
								data-lightbox="gallery"
								style="background-image: url('{{ asset('web/6.jpg') }}');object-fit: cover;"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="{{ asset('web/7.jpg') }}"
								data-lightbox="gallery"
								style="background-image: url('{{ asset('web/7.jpg') }}');object-fit: cover;"></a>
						</div>

						<!-- item gallery sidebar -->
						
					</div>
				</div>

				<div class="sidebar-gallery w-full">
					<span class="mtext-101 cl5">
						Acerca de nosotros
					</span>

					<p class="stext-108 cl6 p-t-27">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur maximus vulputate hendrerit.
						Praesent faucibus erat vitae rutrum gravida. Vestibulum tempus mi enim, in molestie sem
						fermentum quis.
					</p>
				</div>
				<form action="{{ url('logout') }}" class="mt-5" method="POST">
					@csrf
					<button class="btn btn-danger" type="submit">Cerrar Sesión</button>
				</form>
			</div>
		</div>
	</aside>
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Tu carrito
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					
					@foreach ($productosCarrito as $producto)
					
					
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="{{ asset($producto->path) }}" alt="IMG">
						</div>
						
						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								{{ $producto->titulo }}
							</a>
							
							<span class="header-cart-item-info">

								{{ $producto->cantidad }} x RD$ @if (Auth::user()->rol->rol == 'mayorista' || Auth::user()->rol->rol == 'admin' )
								{{ $producto->precio_mayor }}
								@else
								{{ $producto->precio }}

								@endif 
							</span>
						</div>
					</li>
					
					@endforeach
					
				</ul>
				
				<div class="w-full">
					{{-- <div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div> --}}
					
					<div class="header-cart-buttons flex-w w-full">
						<a href="/cart"
						class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
						Pagar Articulos
					</a>
				</div>
				
			</div>
		</div>
	</div>
</div>
</div>

@endauth
<!-- Cart -->
{{-- <div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Tu carrito de Compras
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div> --}}


@include('web.partials.producto')
@yield('content')


<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-lg-2 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Categorías
				</h4>

				<ul>
					@foreach ($categoriasProducto as $categoria)
					<li class="p-b-10">
						<a href="/shop/{{  $categoria->slug }}" class="stext-107 cl7 hov-cl1 trans-04">
							{{ $categoria->categoria }}
						</a>
					</li>

					@endforeach
				</ul>
			</div>



			<div class="col-sm-6 col-lg-2 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Encuéntranos
				</h4>

				<p class="stext-107 cl7 size-201">
					<i class="fas fa-map-marker-alt mr-1"></i> C/ Duarte No.224, Bonao 42000, Monseñor Nouel,
					República Dominicana, puede contactarnos al +1 (849) 450-7766
				</p>

				<div class="p-t-27">
					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-facebook"></i>
					</a>

					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-instagram"></i>
					</a>

					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-pinterest-p"></i>
					</a>
				</div>
			</div>

			<div class="col-sm-6 col-lg-2 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Contáctanos
				</h4>

				<form>

					<div class=" ">

						<a href="https://wa.me/18494507766" class="text-white"><i class="fab fa-whatsapp mr-2"
								style="font-size:18px"></i> <span style="font-size:17px"> Whatsapp</span> </a>

					</div>
					<div class="p-t-18 ">

						<a href="https://www.youtube.com/channel/UCb_JZZVD9T1fkO-FHgJ3sLA" class="text-white "><i
								class="fab fa-youtube mr-2" style="font-size:18px"></i> <span style="font-size:17px">
								Youtube</span> </a>

					</div>
					<div class="p-t-18 ">

						<a href="https://twitter.com/mydeviard" class="text-white"><i class="fab fa-twitter mr-2 "
								style="font-size:18px"></i> <span style="font-size:17px"> Twitter</span> </a>

					</div>
					<div class="p-t-18">

						<a href="https://www.instagram.com/mydeviard/" class="text-white"><i
								class="fab fa-instagram mr-2" style="font-size:18px"></i> <span style="font-size:17px">
								Instagram</span> </a>

					</div>
				</form>
			</div>
			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Confían en nosotros
				</h4>

				<form class="row">

					<div class="col-6">

						<img src="{{ asset('assets/img/logo-dark-el-arabe_blanco.png') }}" width="70%" alt="" srcset="">


					</div>
					<div class="p-t-18 col-6">

						<img src="{{ asset('assets/img/logo-dark-collatech_blanco.png') }}" width="70%" alt=""
							srcset="">


					</div>
					<div class="p-t-18 col-6">

						<img src="{{ asset('assets/img/logo-dark-ernesto-iphone-shop_blanco.png') }}" width="70%" alt=""
							srcset="">


					</div>
					<div class="p-t-18 col-6">
						<img src="{{ asset('assets/img/logos-dark-unlock-express_blanco.png') }}" width="70%" alt=""
							srcset="">


					</div>
				</form>
			</div>
			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Quiénes somos?
				</h4>

				<form class="row">

					<div class="col-6">

						<img src="{{ asset('assets/img/Bonao_logo_white.png') }}" style="max-width: 300px;max-height:400px" alt="" srcset="">


					</div>
					
				</form>
			</div>
		</div>
		
		<div class="p-t-40">
			<div class="flex-c-m flex-w p-b-18">
				<a href="#" class="m-all-1">
					<img src="{{ asset("images/icons/icon-pay-01.png") }}" alt="ICON-PAY">
				</a>

				<a href="#" class="m-all-1">
					<img src="{{ asset("images/icons/icon-pay-02.png") }}" alt="ICON-PAY">
				</a>

				<a href="#" class="m-all-1">
					<img src="{{ asset("images/icons/icon-pay-03.png") }}" alt="ICON-PAY">
				</a>

				<a href="#" class="m-all-1">
					<img src="{{ asset("images/icons/icon-pay-04.png") }}" alt="ICON-PAY">
				</a>

				<a href="#" class="m-all-1">
					<img src="{{ asset("images/icons/icon-pay-05.png") }}" alt="ICON-PAY">
				</a>
			</div>

			<p class="stext-107 cl6 txt-center">

				Copyright &copy;<script>
					document.write(new Date().getFullYear());
				</script> <a href="https://vissionsolutions.com/" target="_blank">VissionSolutions</a> | All rights
				reserved | <a href="{{ url('/terms') }}">Terminos y Condiciones</a>


			</p>
		</div>
	</div>
</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<script src="https://code-eu1.jivosite.com/widget/hNvRI306mz" async></script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('js/web/aos.js') }}"></script>
	<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
	<script>
		AOS.init();
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
	<script src="{{ asset('js/web/slick-custom.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/parallax100/parallax100.js') }}"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
	
	
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "ha sido añadido a su carrito de compra", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "ha sido añadido a la lista de deseos !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "ha sido añadido a su carrito de compra", "success");
			});
		});
	</script>
	<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
// mostrar imagenes en el modal
		$('.js-show-modal1').click(function (e) { 
			e.preventDefault();
			let src = e.target.previousElementSibling.src
			document.getElementsByClassName('slick-active')[0].childNodes[0].src = src
			document.getElementById('imagenPrincipal').src = src
			document.getElementsByClassName('mfp-img').src = src
			

		});

		function plusCarrito(){
			let data = {
				cantidad: $('#countProducto').val(),
				producto: $('#productoID').val()


			}


		}
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('js/web/main.js') }}"></script>
<script src="{{ asset('js/web/jquery-ui.min.js') }}"></script>
@yield('js')

</body>

</html>