
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

     });







    
});


