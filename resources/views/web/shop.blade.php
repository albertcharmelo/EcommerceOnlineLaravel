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

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 plotters_de_hidrogel"  data-filter=".women">
						Plotters de hidrogel
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 protectores_de_pantalla" data-filter=".men">
						Protectores de Pantalla
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 laminas_para_vinilos" data-filter=".bag">
						Láminas para Vinilos
					</button>

					{{-- <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
						
					</button> --}}

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 accesorios" data-filter=".watches">
						Accesorios
					</button>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filtro
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Buscar
					</div>
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
									<a href="#" class="filter-link filter-order stext-106 trans-04 filter-link-order-active" data-filter="news">
										Mas nuevos
									</a>
								</li>
								<li class="p-b-6">
									<a href="#" class="filter-link filter-order stext-106 trans-04" data-filter="popularidad">
										Popularidad
									</a>
								</li>
								<li class="p-b-6">
									<a href="#" class="filter-link filter-order stext-106 trans-04" data-filter="toHigh">
										Precio: Menor a Mayor
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link filter-order stext-106 trans-04" data-filter="toLow">
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
									<a href="#" class="filter-link filter-price stext-106 trans-04 filter-link-active" data-filter-price="all">
										Todos
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link filter-price stext-106 trans-04" data-filter-price="10">
										$0.00 - $10.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link filter-price stext-106 trans-04" data-filter-price="30" >
										$10.00 - $30.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link filter-price stext-106 trans-04" data-filter-price="50">
										$30.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link filter-price stext-106 trans-04" data-filter-price="100">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link filter-price stext-106 trans-04" data-filter-price="plus">
										$100.00+
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="row isotope-grid">
				@include('web.partials.plotters')
				@include('web.partials.protectores-pantalla')
				@include('web.partials.laminas')
				@include('web.partials.accesorios')
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
				let divCategory = document.getElementsByClassName(categoria)
			divCategory[0].click()
			}
			
		



		$('#search-product').autocomplete({
		   source:(request,response)=>{
			$.ajax({
			type: "POST",
			url: "/search/producto",
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
			document.getElementsByClassName('slick-active')[0].childNodes[0].src = src
			document.getElementById('imagenPrincipal').src = src
			document.getElementsByClassName('mfp-img').src = src
			

		});
	</script>
@endsection