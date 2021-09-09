@extends('panel.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
<link rel=" stylesheet" href="{{ asset('summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">

@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1 class=" text-capitalize">Publica un Producto</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/panel/tienda">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Administración</a></div>
            <div class="breadcrumb-item">Publica un Producto</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title  text-capitaliz">Seleccione las imagenes y categoria del producto </h2>
        <p class="section-lead pb-0 mb-0">
            Para que el producto pueda estardisponible en la tienda, este debe de tener asignado la <strong>categoria</strong> y las <strong>imaganes</strong> 

        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Escribe Tu Categoría</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Producto</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" id="categoria">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Categoria</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control" name="" id="">
                                   @foreach ($categorias as $categoria)
                                       <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                   @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Categoria</label>
                            <div class="col-sm-12 col-md-7">
                                
                                <form action="#" class="dropzone" id="mydropzone">
                                    <div class="dz-message" data-dz-message><span>Carga tu imagen aqui!</span>
                                    </div>
                                    <div class="fallback">
                                        <input id="imagen" name="file" type="file" multiple />
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary" id="save">Publicar Producto</button>
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
<script src="{{ asset('js/dropzone.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('summernote/dist/summernote-bs4.js') }}"></script>
<script src="{{ asset('js/panel/page/features-post-create.js') }}"></script>
<script src="{{ asset('js/panel/page/components-multiple-upload.js') }}"></script>

<script>
$('#save').click(function (e) { 

});
    
var myDropzone = new Dropzone(".dropzone", {
    addRemoveLinks: true,
    uploadMultiple: true,
    acceptedFiles: 'image/*',
    url: "",

    init: function() {
       
        myDropzone = this;

        myDropzone.on("sending", function (file, xhr, formData) {
            formData.append("_token", _token);
        });
        this.on("complete", function(file) {
            myDropzone.removeFile(file);
            loader.classList.add('d-none');
        });

        this.on("success",
            myDropzone.processQueue.bind(myDropzone)
        );
    }
});

</script>
@endsection
