@extends('welcome')
@section('content')
<style>
@media (max-width: 1360px) {
  .stext-103 {
    font-family: Poppins-Regular;
    font-size: 12px !important;
    line-height: 1.466667;
  }

}

</style>
    
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button id="allCategory"  class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						Todos los productos
					</button>


					@foreach ($categorias as $categoria)

				
					<button   class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 " data-filter=".{{ $categoria->boton }}">
						{{ $categoria->categoria }}
					</button>

					@endforeach
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filtro
					</div>

					{{-- <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Buscar
					</div> --}}
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" id="search-product" placeholder="Buscar Producto">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10 container">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Ordenar por
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link filter-order news stext-106 trans-04 filter-link-order-active " data-filter="news">
										Mas nuevos
									</a>
								</li>
								<li class="p-b-6">
									<a href="#" class="filter-link filter-order asc stext-106 trans-04" data-filter="asc">
										Precio: Menor a Mayor
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link filter-order desc stext-106 trans-04" data-filter="desc">
										Precio: Mayor a Menor
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Precio
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link all filter-price stext-106 trans-04 filter-link-active " data-filter-price="all">
										Todos
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link 500 filter-price stext-106 trans-04" data-filter-price="500">
										RD$0.00 - $500.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link 1000 filter-price stext-106 trans-04" data-filter-price="1000" >
										RD$501.00 - $1000.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link 5000 filter-price stext-106 trans-04" data-filter-price="5000">
										RD$1001.00 - $5000.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link 10000 filter-price stext-106 trans-04" data-filter-price="10000">
										RD$50001.00 - $10000.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link plus filter-price stext-106 trans-04" data-filter-price="plus">
										RD$10000.00+
									</a>
								</li>
							</ul>
						</div>
						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Filtrar
							</div>

							<ul>
								<li class="p-b-6">
									<div class="btn btn-info" id="btnFilter"><i class="fas fa-sync-alt"></i> Aplicar Filtro</div>
								</li>

							
							</ul>
						</div>


					</div>
				</div>
			</div>
			<div class="" style="height: auto">
				<div class="row isotope-grid" style="height: auto !important" id="listadoProductos">
					@foreach ($productos as $producto)
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $producto }} {{ $producto->boton }}">
						
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{ asset($producto->path) }}" data-titulo="{{ $producto->titulo }}" data-precio="{{ $producto->precio }}" data-producto="{{ $producto->id }}" alt="IMG-PRODUCT">
					
								<a href="#"  class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Compra Rápida
								</a>
							</div>
					
							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{ $producto->titulo }}
									</a>
					
									<span class="stext-105 cl3">

										@auth
										RD$
										@if (Auth::user()->rol->rol == 'admin' || Auth::user()->rol->rol == 'mayorista')
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
					
								<div class="block2-txt-child2 flex-r p-t-3">
								</div>
							</div>
						</div>
					</div>
					@endforeach
	
	
				</div>
			</div>
			

			{{-- <!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div> --}}
		</div>
	</div>
@endsection


@section('js')
	<script src="{{ asset('js/web/shop.js') }}"></script>
	<script>
		var producto = null;
		var categoria = "{{ $slug }}";
			if (categoria.length >=1) {
				let divCategory = document.getElementsByClassName('categoria')
			divCategory[0].click()
			}
			
		



		$('#search-product').autocomplete({
		   source:(request,response)=>{
			$.ajax({
			type: "POST",
			url: "/search/producto",
			data: {
			busqueda: request.term,
			origen:'shop'
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
				producto=`${ui.item.id}`;
			showImages(producto)
			},
			messages: {
			noResults: 'No hay Produto',
			results: function() {}
			}
		})
	</script>
	<script>
		$('.js-show-modal1').click(function (e) { 
			e.preventDefault();
			let src = e.target.previousElementSibling.src
			let id =e.target.previousElementSibling.getAttribute('data-producto')
			let precio =e.target.previousElementSibling.getAttribute('data-precio')
			let titulo =e.target.previousElementSibling.getAttribute('data-titulo')

			$('#productoID').val(id)
			document.getElementsByClassName('slick-active')[0].childNodes[0].src = src
			document.getElementById('imagenPrincipal').src = src;
			document.getElementsByClassName('mfp-img').src = src;
			document.getElementById('productoCompraID').value = id;
			document.getElementById('productoPrecioModal').textContent = `RD$ ${precio}`
			document.getElementById('productoTituloModal').textContent = `${titulo}`

		});

	

		$('#caritoplus').click(function (e) { 
			e.preventDefault();
			plusCarrito()
		});

		function AgregarProductoCarrito(){
			let data ={
				_token:$('meta[name="csrf-token"]').attr('content'),
				cantidad:document.getElementById('productoCount').value,
				productoId:document.getElementById('productoCompraID').value

			}
			$.post("/shop/AgregarAlCarrito", data,function (resp) {
					
				
			});

		}

		
		
		$('#btnFilter').click(function (e) { 
			e.preventDefault();
			redirectFilter()
		});
	
		$(document).ready(function () {
			let filterPrice = sessionStorage.getItem("filterPrice");
			let filterOrder =sessionStorage.getItem("filterOrder");
			if (filterPrice != undefined && filterOrder != undefined) {
					$(`.filter-link-active`).removeClass('filter-link-active');
					$(`.filter-link-order-active`).removeClass('filter-link-order-active');
					$(`.${filterPrice}`).addClass('filter-link-active');
					$(`.${filterOrder}`).addClass('filter-link-order-active');
					sessionStorage.clear();
			}


		});


		function redirectFilter(){
			let filterPrice = document.getElementsByClassName('filter-link-active')[0].getAttribute('data-filter-price')
			let filterOrder = document.getElementsByClassName('filter-link-order-active')[0].getAttribute('data-filter')
			sessionStorage.setItem("filterPrice", filterPrice);
			sessionStorage.setItem("filterOrder", filterOrder);





			if (filterOrder == 'news') {
				if (filterPrice == "500") {
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/news/0/500`;
				}else if(filterPrice == "1000"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/news/501/1000`;

				}else if(filterPrice == "5000"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/news/1001/5000`;

				}else if(filterPrice == "10000"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/news/5001/10000`;

				}else if(filterPrice == "plus"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/news/10001/9999999`;

				}else if(filterPrice == "all"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/news`;

				}
			}else if(filterOrder == 'asc'){
				if (filterPrice == "500") {
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/asc/0/500`;
				}else if(filterPrice == "1000"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/asc/501/1000`;

				}else if(filterPrice == "5000"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/asc/1001/5000`;

				}else if(filterPrice == "10000"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/asc/5001/10000`;

				}else if(filterPrice == "plus"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/asc/10001/9999999`;

				}else if(filterPrice == "all"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/asc`;

				}
			}else if(filterOrder == 'desc'){
				if (filterPrice == "500") {
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/desc/0/500`;
				}else if(filterPrice == "1000"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/desc/501/1000`;

				}else if(filterPrice == "5000"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/desc/1001/5000`;

				}else if(filterPrice == "10000"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/desc/5001/10000`;

				}else if(filterPrice == "plus"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/desc/10001/9999999`;

				}else if(filterPrice == "all"){
					window.location=`${window.location.protocol}//${window.location.hostname}/shop/filter/desc`;

				}
			}		
			
			
			
		}
		
		

		

	</script>
@endsection