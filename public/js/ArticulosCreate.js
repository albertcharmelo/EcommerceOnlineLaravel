$(document).ready(function () {
    getPlantillas();
});



//totken
var loader = document.getElementById('loader');
var _token = $('meta[name="csrf-token"]').attr('content');
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone", {
    addRemoveLinks: true,
    autoProcessQueue: false,
    uploadMultiple: true,
    acceptedFiles: 'image/*',
    url: "/panel/articulos/store/articuloImagen",

    init: function() {
        var submitBtn = document.getElementById("saveBtn");
        myDropzone = this;


        this.on("complete", function(file) {
            myDropzone.removeFile(file);
            loader.classList.add('d-none');
        });

        this.on("success",
            myDropzone.processQueue.bind(myDropzone)
        );
    }
});

function getPlantillas(){
    let url = '/panel/articulos/list/plantilla';
    let data = {
        _token: _token,
        
    }
   
    $.post(url, data,function (resp) {
        let fragment = document.createDocumentFragment();
        for (const plantilla of resp) {
            let option = document.createElement('option');
            option.value = plantilla.id;
            option.textContent = plantilla.titulo;
            $('#plantilla').append(option).selectric();
        }
       
    });

}


//Guardar el Producto
$('#saveBtn').click(function (e) { 
    loader.classList.remove('d-none');
    e.preventDefault();
    let url = '/panel/articulos/store/articulos';
    let data = {
        _token : _token,
        nombre: $('#titulo').val(),
        stock:$('#stock').val(),
        precio:$('#precio').val(),
        tipo_unidad:$('#Uventa').val(),
        categoria_id:parseInt($('#categoria').val()),
        atributo: $('#caracteristica').summernote('code'),
        descripcion:$('#descripcion').summernote('code'),
        estado:$("#estado").val(),
        referencia:$('#referencia').val(),
        garantia:$('#garantia').val(),

        
    }
  

    $.post(url, data,function (resp) {
         
        myDropzone.on("sending", function (file, xhr, formData) {
            formData.append("_token", _token);
        });
        myDropzone.processQueue();  
        iziToast.success({
            title: 'Producto creado satisfactoriamente',
            message: 'mas detalles en Administracion - Publicaciones Tienda',
            position: 'bottomRight' 
        });
        

     });
});


$('#savePlantilla').click(function (e) { 
   
    let url = '/panel/articulos/store/plantilla';
    let data = {
        _token: _token,
        titulo: $('#titulo-plantilla').val(),
        atributo: $('#caracteristica').summernote('code'),
    }
    $.post(url, data,function (resp) {
        $('#plantilla').empty().selectric();
        getPlantillas();
        $('.modal-backdrop').remove();
        $('#pantilla-modal').modal('hide');
        
        
    });
});

// $('#plantilla').change(function (e) { 
//     e.preventDefault();
//     let url = '/panel/articulos/set/plantilla'
//     let data = {
//         _token: _token,
//         plantilla_id: $('#plantilla').val()
//     }

//     $.post(url, data,function (resp) {
//         $('#caracteristica').summernote('code'," ");
//         $('#caracteristica').summernote('code', resp.plantilla);

//     });
// });

$('.close').click(function (e) { 

    $('.modal-backdrop').remove();
});
// Or, with plugin options
$('#plantilla').selectric({
    onChange: function() {
        let id =  $(this).val();
        console.log(id)
        let url = '/panel/articulos/set/plantilla'
        let data = {
            _token: _token,
            plantilla_id:id,
        }
       
        $.post(url, data,function (resp) {
            $('#caracteristica').summernote('code'," ");
            $('#caracteristica').summernote('code', resp.plantilla);
    
        });
    },

});


