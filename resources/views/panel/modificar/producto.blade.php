@extends('panel.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/web/jquery-ui.css') }}">

<style>
    .gallery.gallery-md .gallery-item {
    width: 150px !important;
    height: 150px !important;
    margin-right: 10px;
    margin-bottom: 10px;
}
</style>
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
        <h2 class="section-title  text-capitaliz">Seleccione las imágenes y categoría del producto </h2>
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
                                <input type="text" class="form-control" id="producto">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Categoría</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control" name="" id="categoria">
                                   @foreach ($categorias as $categoria)
                                       <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                   @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imágenes</label>
                            <div class="col-sm-12 col-md-7">
                                
                                <form action="#" class="dropzone" id="mydropzone">
                                    <div class="dz-message" data-dz-message><span>Carga tu imagen aquí!</span>
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
                                <button class="btn btn-primary" id="save">Asignar Categoria</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4>Fotos del Producto</h4>
                    </div>
                    <div class="card-body">
                        <div class="gallery gallery-md">
                         
                      
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
@endsection
@section('js')

{{-- <script src="{{ asset('js/jquery.selectric.js') }}"></script> --}}

<script src="{{ asset('js/dropzone.min.js') }}"></script>
<script src="{{ asset('js/panel/page/features-post-create.js') }}"></script>
<script src="{{ asset('js/panel/page/components-multiple-upload.js') }}"></script>
<script src="{{ asset('js/web/jquery-ui.min.js') }}"></script>

<script>
    var producto = null;
    function showImages(id){
        
        $('.gallery').empty();
        let data = {
            
            id: id,
        }
        $.ajax({    
            type: "GET",
            url: "/panel/productos/GaleryGet/"+producto,
            
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
            success: function (response) {
                let fragment = document.createDocumentFragment()
                for (const image of response) {
                    let divImage = document.createElement('div')
                    divImage.classList.add('gallery-item')
                    divImage.setAttribute('data-image',`/${image.path}`)
                    divImage.setAttribute('href',`/${image.path}`)
                    divImage.setAttribute('title',$('.gallery').children().length+1)
                    divImage.setAttribute('style',`background-image: url("/${image.path}");`)
                    
                    
                    divImage.setAttribute('data-title',$('.gallery').children().length+1)

                    fragment.append(divImage)
                }
                $('.gallery').append(fragment);
                $('.gallery-item').Chocolat()
            }
        });


    }
</script>
<script>
  
$('#save').click(function (e) { 
    let data = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        categoria_id:$('#categoria').val(),
        producto:producto,
    }

    $.post("/panel/productos/asignarCategoria", data,function (resp) {
        iziToast.success({
            title: 'Categoria asiganada satisfactoriamente',
            message: 'El producto posee ahora una categoria',
            position: 'bottomRight' 
        });
    });
});

Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone", {
    addRemoveLinks: true,
    uploadMultiple: true,
    
    acceptedFiles: 'image/*',
    url: "/panel/productos/store/articuloImagen",

    init: function() {
       
        myDropzone = this;
        
        myDropzone.on("sending", function (file, xhr, formData) {
            formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
            formData.append("producto_id", producto);

        });
        this.on("complete", function(file) {
            myDropzone.removeFile(file);
            loader.classList.add('d-none');
            showImages(producto)
            iziToast.success({
            title: 'Imagen agregada satisfactoriamente',
            message: 'El producto posee imaganes para mostrar en la tienda',
            position: 'bottomRight' 
        });
        });

        this.on("success",
            myDropzone.processQueue.bind(myDropzone)
        );
    }
});

</script>


<script>
    $('#producto').autocomplete({
       source:(request,response)=>{
        $.ajax({
        type: "POST",
        url: "/panel/productos/search/list",
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
        console.log(e)
    });
</script>
@endsection
