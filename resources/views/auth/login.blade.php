@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('css/panel/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/panel/components.css') }}">
<section class="section">
    <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
            <div class="p-4 m-3">
                <img src="{{ asset('assets/img/devian rd2.png') }}" alt="logo" width="300"
                    class=" mb-5 mt-2">
                <h4 class="text-dark font-weight-normal">Bienvenido a <span class="font-weight-bold">Devia RD</span>
                </h4>
                <p class="text-muted">‎Antes de comenzar, debe iniciar sesión o registrarse si aún no tiene una cuenta.‎
                </p>
                <form method="POST" action="{{ route('login') }}" class="needs-validation"
                    novalidate="">
                    @csrf
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input id="email" type="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required
                            autofocus>
                        <div class="invalid-feedback">
                            Por favor complete su correo electrónico
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Contraseña</label>
                        </div>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2"
                            required>
                        <div class="invalid-feedback">
                            please fill in your password
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember"
                                {{ old('remember') ? 'checked' : '' }}
                                class="custom-control-input" tabindex="3" id="remember">
                            <label class="custom-control-label" for="remember">Recuerdame</label>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <a href="{{ route('password.request') }}" class="float-left mt-3">
                            Olvidaste tu contraseña?
                        </a>
                        <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                            Iniciar sesión
                        </button>
                    </div>

                    <div class="mt-5 text-center">
                        No tienes una cuenta? <a href="{{ route('register') }}">Crea una cuenta</a>
                    </div>
                </form>
                <div class="text-center mt-5 text-small">
                    <img src="{{ asset('assets/img/Bonao_logo.png') }}" style="max-width: 280px;max-height:400px"   alt="">
                </div>
                <div class="text-center mt-5 text-small">
                    Copyright &copy; DeviaRD
                    <div class="mt-2">
                        <a href="{{ url('/terms') }}">Politica de privacidad</a>
                        <div class="bullet"></div>
                        <a href="{{ url('/terms') }}">Terminos de Servicio</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
            data-background="{{ asset('assets/img/devian-login.jpg') }}">
            <div class="absolute-bottom-left index-2">
                <div class="text-light p-5 pb-2">
                    <div class="mb-5 pb-3">
                        <h1 class="mb-2 display-4 font-weight-bold">Bienvenido a Devia RD</h1>
                        <h5 class="font-weight-normal text-muted-transparent">Estamos aquí para servirle</h5>
                    </div>

                </div>
            </div>
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

<script src="{{ asset('js/jquery.pwstrength.min.js') }}"></script>
<script src="{{ asset('js/panel/page/auth-register.js') }}"></script>
<script src="{{ asset('js/panel/stisla.js') }}"></script>
<script src="{{ asset('js/panel/scripts.js') }}"></script>
<script src="{{ asset('js/panel/custom.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
