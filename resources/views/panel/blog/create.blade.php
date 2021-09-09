@extends('panel.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
<link rel=" stylesheet" href="{{ asset('summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('css/selectric.css') }}">

@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Crear Nueva Noticia</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/panel/tienda">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Blog</a></div>
            <div class="breadcrumb-item">Crear Nueva Noticia</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Crear Nueva Noticia</h2>
        <p class="section-lead pb-0 mb-0">
            En esta página se pueden crear Noticias destinadas al Blog, solo debe rellenar los siguientes campos. <p
                class=" section-lead text-danger pt-0 mt-0"> Nota: el usuario plublicador solo puede crear Noticias en
                esttado PENDIENTE, a la espera de la validación del administrador</p>
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Escribe Tu Noticia</h4>
                    </div>

                    <div class="card-body">
                        @csrf

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Titulo</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="titulo" id="titulo" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Categoría</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" id="categoria" name="categoria">
                                    @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id}}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contenido</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote-simple" name="contenido"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Portada</label>
                            <div class="col-sm-12 col-md-7">
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Imagen</label>
                                    <input type="file" name="file" class="form-control" id="image-upload" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Estado de
                                inicio</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" id="estado" name="estado">
                                    <option value="0">Publico</option>
                                    <option value="1">Pendiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary" id="saveBtn">Crear Post</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')

<script src="{{ asset('js/jquery.selectric.js') }}"></script>
<script src="{{ asset('js/jquery.uploadPreview.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('summernote/dist/summernote-bs4.js') }}"></script>
<script src="{{ asset('js/panel/page/features-post-create.js') }}"></script>


<script>
    var _token = $('meta[name="csrf-token"]').attr('content');
    $('#saveBtn').click(function (e) { 
        e.preventDefault();
        let data ={
        _token:_token,
        titulo:$('#titulo').val(),
        categoria:$('#categoria').val(),
        estado:$('#estado').val(),
        file:$('#image-upload')[0].files[0],
        contenido:$('.summernote-simple').summernote('code')
    }

    var formData = new FormData();
    formData.append('image',$('#image')[0].files[0]);
    formData.append('titulo',data.titulo);
    formData.append('categoria',data.categoria);
    formData.append('estado',data.estado);
    formData.append('contenido',data.contenido);

    // console.log(data);
    // $.post("/panel/blog/store/post", data,function (resp) {
    //        console.log(resp) 
    // });
        $.ajax({
            headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            type: "POST",
            url: "/panel/blog/store/post",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                iziToast.success({
                title: 'Post creado satisfactoriamente',
                message: 'Post publicado en la seccion de blog enla web oficial',
                position: 'bottomRight' 
                });
                $('#titulo').val(' ');
                $('#categoria').val(' ');
                $('#estado').val(' ');
                $('#image-upload').val(' ');
                $('.summernote-simple').summernote('code', '');


            }
        });
    });
    
   
</script>


@endsection