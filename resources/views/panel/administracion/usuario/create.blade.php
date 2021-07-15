@extends('panel.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
<link rel=" stylesheet" href="{{ asset('summernote/dist/summernote-bs4.css') }}">
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Asignar usuario Publicador</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/panel/tienda">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Blog</a></div>
            <div class="breadcrumb-item">Crear Usuario Publicador</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Crear Nuevo usuario Publicador</h2>
        <p class="section-lead pb-0 mb-0">
            Agina el rol publicador mediante el correo electronico, o utiliza el autocompletado para buscar al uusuario
            correspondiente.

        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Busca al usuario mediante su email</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="email" id="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary" id="btnSend">Asignar Rol Publicador</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="section-title">Remover usuario Publicador</h2>
        <p class="section-lead pb-0 mb-0">
            Remueve el rol de usuario publicador ingresando su Email
        </p>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Busca al usuario mediante su email</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="email" id="" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-danger" id="btnSend-remove">Remover Rol Publicador</button>
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
    var loader = document.getElementById('loader');
    var _token = $('meta[name="csrf-token"]').attr('content');



    $('#btnSend').click(function (e) {
        e.preventDefault();
        let url = '/panel/administracion/changeTipo/usuario';
        let data = {
            _token: _token,
            email: $('#email-remove').val()
        }
        $.post(url, data, function (resp) {

            iziToast.success({
                title: 'Usuario Publicador Asignado',
                message: 'El usuario ahora puede ingresar al panel teniendo las funciones de publicador',
                position: 'bottomRight'
            });
        });

    });



    $('#btnSend-remove').click(function (e) {
        e.preventDefault();
        let url = '/panel/administracion/changeTipoRegular/usuario';
        let data = {
            _token: _token,
            email: $('#email').val()
        }
        $.post(url, data, function (resp) {

            iziToast.success({
                title: 'Usuario Publicador Removido',
                message: 'El usuario ahora es pose el rol de usuario regular.',
                position: 'bottomRight'
            });


        });

    });

</script>
@endsection
