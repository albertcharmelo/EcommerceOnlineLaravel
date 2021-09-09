<!-- Blog -->
<section class="sec-blog bg0 p-t-60 p-b-90">
    <div class="container">
        <div class="p-b-66">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Nuestro Blog
            </h3>
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
