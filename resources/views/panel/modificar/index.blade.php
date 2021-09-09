@extends('panel.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/selectric.css') }}">

<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">

<link rel=" stylesheet" href="{{ asset('summernote/dist/summernote-bs4.css') }}">
<style>
    @media (min-width: 0) {
    .g-mr-15 {
        margin-right: 1.07143rem !important;
    }
}
@media (min-width: 0){
    .g-mt-3 {
        margin-top: 0.21429rem !important;
    }
}

.g-height-50 {
    height: 50px;
}

.g-width-50 {
    width: 50px !important;
}

@media (min-width: 0){
    .g-pa-30 {
        padding: 2.14286rem !important;
    }
}

.g-bg-secondary {
    background-color: #fafafa !important;
}

.u-shadow-v18 {
    box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
}

.g-color-gray-dark-v4 {
    color: #777 !important;
}

.g-font-size-12 {
    font-size: 0.85714rem !important;
}

.media-comment {
    margin-top:20px
}
</style>
@endsection
@section('content')
@include('panel.Articulos.plantilla-modal')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Modificaciones en la pagina</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/panel/tienda">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Producto</a></div>
            <div class="breadcrumb-item">Crear Producto</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Modificar el Index</h2>
        <p class="section-lead pb-0 mb-0">
            En esta página se pueden crear productos destinados a la Tienda, solo debe rellenar los siguientes campos.
            <p class=" section-lead text-danger pt-0 mt-0"> Nota: el usuario plublicador solo puede crear productos en
                estado PENDIENTE, a la espera de la validación del administrador</p>
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Modificaciones</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <h5>Slider</h5>
                            <div class="form-group">

                                <div class="row gutters-sm">

                                    @foreach ($SlidersImage as $image)
                                    <div class="col-12 col-sm-4">
                                        <label class="imagecheck mb-4">
                                            <input name="imagecheck" type="checkbox" @if ($image->check == 'true')
                                            checked
                                            @endif value={{ $image->id }}"
                                            class="imagecheck-input" />
                                            <figure class="imagecheck-figure">
                                                <img src="{{ asset("$image->src") }}" style="object-fit:cover"
                                                    width="700" height="200" alt="}" class="imagecheck-image">
                                            </figure>
                                        </label>
                                    </div>
                                    @endforeach

                                    <div class="col-12">


                                        <form action="#" class="dropzone" id="mydropzone">
                                            <div class="dz-message" data-dz-message><span>Carga tu imagen aqui!</span>
                                            </div>
                                            <div class="fallback">
                                                <input id="imagen" name="file" type="file" multiple />
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Modificaciones</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <h5>Comentarios de Clientes</h5>
                            <div class="form-group">

                                <div class="row gutters-sm">
                                   @foreach ($comentarios as $comentario)
                                   <div class="col-6">
                                    <div class="media g-mb-30 media-comment">
                                        <form action="" onsubmit="save(event,formulario{{ $comentario->id }})" id="formulario{{ $comentario->id }}">
                                            <img  class="d-flex input_{{ $comentario->id }} g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
                                            <input type="file" name="imagen"  class="d-none input_{{ $comentario->id }}">
                                            <input type="hidden" value="{{ $comentario->id }}" name="id">
                                            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                              <div class="g-mb-15 mb-3">
                                                <h5 class="h5 g-color-gray-dark-v1 mb-0"><input type="text" name="nombre"  class="form-control" value="{{ $comentario->nombre }}"></h5>
                                              </div>
                                        
                                              <p><textarea name="contenido"  class="form-control"  cols="100" rows="10">{{ $comentario->contenido }}</textarea></p>
                                        
                                              <ul class="list-inline d-sm-flex my-0">
                                               
                                                <li class="list-inline-item ml-auto">
                                                  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover"  href="#!">
                                                    
                                                    <button type="submit" id="hola{{ $comentario->id }}" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                                                  </a>
                                                </li>
                                              </ul>
                                            </div>
                                        </form>
                                       
                                    </div>
                                </div>   
                                   @endforeach
                                </div>

                                


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
<script src="{{ asset('js/dropzone.min.js') }}"></script>
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{ asset('js/panel/page/features-post-create.js') }}"></script>
<script src="{{ asset('js/panel/page/components-multiple-upload.js') }}"></script>
<script>
    Dropzone.autoDiscover = false;
let _token = $('meta[name="csrf-token"]').attr('content');
var myDropzone = new Dropzone(".dropzone", {
    addRemoveLinks: true,
    uploadMultiple: true,
    acceptedFiles: 'image/*',
    url: "/panel/modificar/uploadSliderImage",

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


$('.imagecheck-input').click(function (e) { 
    e.preventDefault();
    let element = this;
    let data = {
        _token:_token,
        imagen: this.value
    }
    
    $.post("/panel/modificar/toogleCheck", data,function (resp) {
            console.log(element)
            console.log(resp)
            if (resp.resp == 'false') {
                iziToast.error({
                        title: 'ERROR',
                        message: 'Hay mas de 3 imagenes seleccionadas',
                        position: 'bottomRight' 
                    });
                    
                        element.checked = false;
                        
                   
            }else{
                    iziToast.success({
                        title: 'Realizado con Éxito',
                        message: 'Cambio satisfactoriamente',
                        position: 'bottomRight' 
                    });
                    if (resp.image.check == 'false') {
                    element.checked = false;
                        
                    }else{

                        element.checked = true;
                    }
                   
            }





    });
});

</script>
<script>
    function save(e,id){
        e.preventDefault()
        
      
        var formEl = id
        var d = new FormData(formEl);
        


        let data = {
            _token:_token,
            nombre:d.get('nombre'),
            contenido:d.get('contenido'),
            id:d.get('id')
        }

        $.ajax({
            type: "POST",
            url: "/panel/modificar/comentarios",
            data: data,
            dataType: false,
            success: function (response) {
                iziToast.success({
            title: 'comentario de cliente modificado satisfactoriamente',
            message: '',
            position: 'bottomRight' 
        });
            }
        });


    }
</script>
@endsection
