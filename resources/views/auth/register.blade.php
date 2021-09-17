@extends('layouts.app')
@section('css')
<link rel="icon" type="image/png" href="{{ asset('assets/img/devian-iso.png') }}">

    
@endsection
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('css/panel/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/panel/components.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">
--}}

<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <form method="POST" action="{{ route('register') }}"
                    class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    @csrf
                    <div class="login-brand">

                        <img src="{{ asset('assets/img/devian rd.png') }}" alt="logo"
                            width="150" style="height: auto" class=" ">
                            <img src="{{ asset('assets/img/Bonao_logo.png') }}" alt="logo"
                            width="150" height="134" style="height: auto" class=" ">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Registro</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name">Nombre</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="lname">Apellido</label>
                                        <input id="lname" type="text"
                                            class="form-control @error('lname') is-invalid @enderror" name="lname">
                                        @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Correo Electrónico</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email">
                                    <div class="invalid-feedback">
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Contraseña</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror "
                                             name="password">
                                       
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Confirmar Contraseña</label>
                                        <input id="password2" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Teléfono</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+1</div>
                                            </div>
                                            <input id="telefono" placeholder="8494507766" type="tel" class="form-control @error('telefono') is-invalid @enderror""
                                               maxlength="12"  name="telefono" required >
                                        </div>
                                        @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="form-divider">
                                    Tu ubicación
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Provincias</label>
                                        <select class="form-control selectric" name="provincia" id="provincia">
                                          
                                        </select>
                                        @error('provincia')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Ciudad</label>
                                        <input type="text" class="form-control" name="ciudad">
                                        @error('ciudad')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label>Dirección</label>
                                        <input type="text" class="form-control" name="direccion">
                                        @error('direccion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                        <label class="custom-control-label" for="agree">Estoy de acuerdo con los
                                            terminos
                                            y condiciones</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


<script src="{{ asset('js/panel/page/auth-register.js') }}"></script>
<script src="{{ asset('js/panel/stisla.js') }}"></script>
<script src="{{ asset('js/panel/scripts.js') }}"></script>
<script src="{{ asset('js/panel/custom.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function () {
            cargarProvincias()


    });

    function cargarProvincias(){

        $.ajax({
            type: "POST",
            url: '/cargar/provincias',
            data: '',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                    let fragment = document.createDocumentFragment();
                    for (const provincia of response) {
                        let option = document.createElement('option');
                        option.value = provincia.provincia;
                        option.textContent = provincia.provincia;

                        fragment.append(option)
                    }

                    $('#provincia').append(fragment);



            }
        });


    }
</script>
@endsection
