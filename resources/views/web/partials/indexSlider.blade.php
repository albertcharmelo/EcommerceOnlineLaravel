	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1 rs1-slick1">
			<div class="slick1">
				@foreach ($sliderImages as $image)
				<div class="item-slick1" style="background-image: url('{{ asset($image->src) }}');object-fit: cover;">
					<div class="container h-full"></div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
