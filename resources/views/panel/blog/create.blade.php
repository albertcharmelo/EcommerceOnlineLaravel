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
        <h1>Create New Post</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/panel/tienda">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Blog</a></div>
            <div class="breadcrumb-item">Creear Nueva Noticia</div>
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
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Titulo</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Categoría</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric">
                                    <option>Tech</option>
                                    <option>News</option>
                                    <option>Political</option>
                                </select>
                                <button class="btn btn-primary mt-3">Añadir nueva Categoria</button>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contenido</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote-simple"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Portada</label>
                            <div class="col-sm-12 col-md-7">
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="image" id="image-upload" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Estado de
                                inicio</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric">
                                    <option>Publico</option>
                                    <option>Pendiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Create Post</button>
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
