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
        <h1>Crear Nueva Categoría Para El Articulos</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/panel/tienda">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Articulos</a></div>
            <div class="breadcrumb-item">Creear Nueva Categoría</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Crear Nueva Categoria</h2>
        <p class="section-lead pb-0">
            En esta página se pueden crear categorías destinadas al Blog, solo debe rellenar los siguientes campos.

        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Escribe Tu Categoría</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Titulo</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Crear Categoría</button>
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
@endsection
