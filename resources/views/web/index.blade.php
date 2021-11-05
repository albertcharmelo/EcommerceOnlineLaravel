@extends('welcome')
@section('content')
@include('web.partials.indexSlider')
@include('web.partials.indexCategory')
@include('web.partials.indexProduct')
@include('web.partials.indexClientSide')
@include('web.partials.indexBlog')
@endsection
@section('js')
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
    </script>
@endsection