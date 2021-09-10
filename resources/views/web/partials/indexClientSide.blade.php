	{{-- Cliet Side --}}
	<section class="sec-blog bg0 p-t-60  p-b-90 client-sec">
		<div class="container">
			<div class="p-b-66">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Que opinan nuestros clientes?
				</h3>
				<p class=" text-center sub-text mt-4">
					Valoramos enormemente las relaciones sólidas y hemos visto los beneficios que aportan a nuestro
					negocio. La retroalimentación de los clientes es vital para ayudarnos a hacerlo bien.
				</p>
			</div>
			{{-- PopChat left --}}
			<div class="container-fluid">
				<div class="row justify-content-start">
					<div class=" col-sm-11 col-md-9 col-lg-8 col-xl-7">
						<div class="" data-aos="fade-up">

							<div class="card">
								<p class="post"> <span><img class="quote-img"
											src="{{asset('assets/img/comillas.png')}}"></span>
									<span class="post-txt">{{ $comentario1->contenido }} </span>  </p>
							</div>
							<div class="arrow-down"></div>
						</div>
						<div class="row d-flex justify-content-center" data-aos="zoom-in">
							<div class="d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block"> <img class="profile-pic fit-image" src="{{ asset('img/about/team-1.jpg') }}">
							</div>
							<p class="profile-name d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block ">{{ $comentario1->nombre }}</p>
						</div>
					</div>
				</div>
				{{-- PopChat rigth --}}
				<div class="row justify-content-end m-30" style="margin-top: 15%">
					<div class=" col-sm-11 col-md-9 col-lg-8 col-xl-7">
						<div class="" data-aos="fade-up">

							<div class="card-r">
								<p class="post"> <span><img class="quote-img-r"
											src="{{asset('assets/img/comillas.png')}}"></span>
									<span class="post-txt">{{ $comentario2->contenido }}</span>  </p>
							</div>
							<div class=" arrow-down-r"></div>
						</div>
						<div class="row d-flex justify-content-end pr-4" data-aos="zoom-in">
							
							<div class="mt-2 d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block "> <p class="profile-name-r d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block  "> {{ $comentario2->nombre }}</p><img class="profile-pic-r fit-image-r"
									src="{{ asset('img/about/team-2.jpg') }}"> </div>

						</div>

					</div>

				</div>
				{{-- PopChat left --}}

				<div class="row justify-content-start">
					<div class=" col-sm-11 col-md-9 col-lg-8 col-xl-7">
						<div class="" data-aos="fade-up">


							<div class="card">
								<p class="post"> <span><img class="quote-img"
											src="{{asset('assets/img/comillas.png')}}"></span>
									<span class="post-txt">{{ $comentario3->contenido }} </span> </p>
							</div>
							<div class="arrow-down"></div>
						</div>
						<div class="row d-flex justify-content-center" data-aos="zoom-in">
							<div class="d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block"> <img class="profile-pic fit-image" src="https://i.imgur.com/RCwPA3O.jpg">
							</div>
							<p class="profile-name d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block ">{{ $comentario3->nombre }}</p>
						</div>
					</div>
				</div>
				{{-- PopChat rigth --}}
				<div class="row justify-content-end m-30 " style="margin-top: 15%">
					<div class=" col-sm-11 col-md-9 col-lg-8 col-xl-7">
						<div class="" data-aos="fade-up">


							<div class="card-r">
								<p class="post"> <span><img class="quote-img-r"
											src="{{asset('assets/img/comillas.png')}}"></span>
									<span class="post-txt  ">{{ $comentario4->contenido }}</span>  </p>
							</div>
							<div class=" arrow-down-r"></div>
						</div>
						<div class="row d-flex justify-content-end pr-4" data-aos="zoom-in">

							<span class="profile-name-r d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block ">{{ $comentario4->nombre }}</span>
							<div class="mt-2 d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block "> <img class="profile-pic-r fit-image-r"
									src="{{ asset('img/about/team-4.jpg') }}"> </div>

						</div>

					</div>

				</div>


			</div>

	</section>

