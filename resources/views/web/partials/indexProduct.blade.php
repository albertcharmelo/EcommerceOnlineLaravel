	<!-- Product -->
	<section class="sec-product bg0 p-t-100 p-b-50">
		<div class="container">
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Vistazo a nuestra tienda
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">

					@foreach ($categoriasProducto as $categoria)
					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#{{ $categoria->boton }}" role="tab">{{ $categoria->categoria }}</a>
					</li>
					@endforeach

					{{-- <li class="nav-item p-b-10">
						<a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Fundas</a>
					</li>

					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#featured" role="tab">Plotter</a>
					</li>

					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#sale" role="tab">Accesorios Plotter</a>
					</li>

					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#top-rate" role="tab">Accesorios para móviles</a>
					</li> --}}
				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-50">
					<!-- - -->
					<div class="tab-pane fade show active" id="plotter" role="tabpanel">
						<!-- Slide2 -->
						<div class="wrap-slick2">
							<div class="slick2">
								@foreach ($productos as $producto)
								@if ($producto->categoria->categoria == 'Plotter Devia')
									<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
										<!-- Block2 -->
										<div class="block2">
											<div class="block2-pic hov-img0">
												<img src="{{ asset("$producto->path") }}" data-titulo="{{ $producto->titulo }}" data-precio="{{ $producto->precio }}" data-producto="{{ $producto->id }}" alt="IMG-PRODUCT">

												<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
													Ver Ahora
												</a>
											</div>

											<div class="block2-txt flex-w flex-t p-t-14">
												<div class="block2-txt-child1 flex-col-l ">
													<a href="#"
														class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
														{{ $producto->titulo }}
													</a>

													<span class="stext-105 cl3">
														@auth
														RD$ @if (Auth::user()->rol->rol == 'admin' || Auth::user()->rol->rol == 'mayorista')
														{{ $producto->precio_mayor }}
														@elseif( Auth::user()->rol->rol == 'regular')
														{{ $producto->precio }}
														@endif	
														@endauth
														@guest
														RD$ {{ $producto->precio }}
														@endguest
													
													</span>
												</div>

												
											</div>
										</div>
									</div>	
								@endif
								@endforeach
							</div>
						</div>
					</div>

					<!-- - -->
					<div class="tab-pane fade" id="sonido" role="tabpanel">
						<!-- Slide2 -->
						<div class="wrap-slick2">
							<div class="slick2">
								@foreach ($productos as $producto)
								@if ($producto->categoria->categoria == 'Sonido')
									<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
										<!-- Block2 -->
										<div class="block2">
											<div class="block2-pic hov-img0">
												<img src="{{ asset("$producto->path") }}" data-titulo="{{ $producto->titulo }}" data-precio="{{ $producto->precio }}" data-producto="{{ $producto->id }}" alt="IMG-PRODUCT">

												<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
													Ver Ahora
												</a>
											</div>

											<div class="block2-txt flex-w flex-t p-t-14">
												<div class="block2-txt-child1 flex-col-l ">
													<a href="#"
														class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
														{{ $producto->titulo }}
													</a>

													<span class="stext-105 cl3">
														@auth
														RD$ @if (Auth::user()->rol->rol == 'admin' || Auth::user()->rol->rol == 'mayorista')
														{{ $producto->precio_mayor }}
														@elseif( Auth::user()->rol->rol == 'regular')
														{{ $producto->precio }}
														@endif	
														@endauth
														@guest
														RD$ {{ $producto->precio }}
														@endguest
													
													</span>
												</div>

												
											</div>
										</div>
									</div>	
								@endif
								@endforeach
							</div>
						</div>
					</div>

					<!-- - -->
					<div class="tab-pane fade" id="accesorios" role="tabpanel">
						<!-- Slide2 -->
						<div class="wrap-slick2">
							<div class="slick2">
								@foreach ($productos as $producto)
								@if ($producto->categoria->categoria == 'Accesorios De Celulares ')
									<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
										<!-- Block2 -->
										<div class="block2">
											<div class="block2-pic hov-img0">
												<img src="{{ asset("$producto->path") }}" data-titulo="{{ $producto->titulo }}" data-precio="{{ $producto->precio }}" data-producto="{{ $producto->id }}" alt="IMG-PRODUCT">

												<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
													Ver Ahora
												</a>
											</div>

											<div class="block2-txt flex-w flex-t p-t-14">
												<div class="block2-txt-child1 flex-col-l ">
													<a href="#"
														class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
														{{ $producto->titulo }}
													</a>

													<span class="stext-105 cl3">
														@auth
														RD$ @if (Auth::user()->rol->rol == 'admin' || Auth::user()->rol->rol == 'mayorista')
														{{ $producto->precio_mayor }}
														@elseif( Auth::user()->rol->rol == 'regular')
														{{ $producto->precio }}
														@endif	
														@endauth
														@guest
														RD$ {{ $producto->precio }}
														@endguest
													
													</span>
												</div>

												
											</div>
										</div>
									</div>	
								@endif
								@endforeach
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="Oaccesorios" role="tabpanel">
						<!-- Slide2 -->
						<div class="wrap-slick2">
							<div class="slick2">
								@foreach ($productos as $producto)
								@if ($producto->categoria->categoria == 'Otros Accesorios')
									<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
										<!-- Block2 -->
										<div class="block2">
											<div class="block2-pic hov-img0">
												<img src="{{ asset("$producto->path") }}" data-titulo="{{ $producto->titulo }}" data-precio="{{ $producto->precio }}" data-producto="{{ $producto->id }}" alt="IMG-PRODUCT">

												<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
													Ver Ahora
												</a>
											</div>

											<div class="block2-txt flex-w flex-t p-t-14">
												<div class="block2-txt-child1 flex-col-l ">
													<a href="#"
														class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
														{{ $producto->titulo }} {{ $producto->categoria->categoria}}
													</a>

													<span class="stext-105 cl3">
														@auth
														RD$ @if (Auth::user()->rol->rol == 'admin' || Auth::user()->rol->rol == 'mayorista')
														{{ $producto->precio_mayor }}
														@elseif( Auth::user()->rol->rol == 'regular')
														{{ $producto->precio }}
														@endif	
														@endauth
														@guest
														RD$ {{ $producto->precio }}
														@endguest
													
													</span>
												</div>

											
											</div>
										</div>
									</div>	
								@endif
								@endforeach
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>