@extends('panel.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">

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
                                <input type="text" id="titulo" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stock</label>
                            <div class="col-sm-12 col-md-4">
                                <input min="0" id="stock" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Precio</label>
                            <div class="col-sm-12 col-md-4">
                                <input min="0" id="precio" type="number" step="any" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Unidades por
                                venta</label>
                            <div class="col-sm-12 col-md-4">
                                <input min="1" max="9" id="Uventa" value="1" type="number" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Referencia del
                                Producto</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" min="10000" id="referencia" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Garantia</label>
                            <div class="col-sm-12 col-md-4">
                                <input min="0" id="garantia" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Categoría</label>
                            <div class="col-sm-12 col-md-7">
                                <select id="categoria" class="form-control selectric">
                                    <option value="1">Tech</option>
                                    <option value="2">News</option>
                                    <option value="3">Political</option>
                                </select>
                                <button class="btn btn-primary mt-3">Añadir nueva Categoria</button>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Característica</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea id="caracteristica" class="summernote-simple"></textarea>
                            </div>

                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descripcion</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea id="descripcion" class="summernote-simple"></textarea>
                            </div>
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Elejir
                                plantilla</label>
                            <div class="col-sm-12 col-md-7 row">
                                <button class="btn btn-primary col-md-3 col-sm-12 mr-2">Añadir nueva Plantilla</button>
                                <div class="col-md-8 col-sm-12">
                                    <select class="form-control selectric ">
                                        <option>Plantilla 1</option>
                                        <option>Plantilla 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imagenes de
                                Presentación</label>
                            <div class="col-sm-12 col-md-7">
                                <form action="#" class="dropzone" id="mydropzone">
                                    <div class="fallback">
                                        <input id="imagen" name="file" type="file" multiple />
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Estado de
                                inicio</label>
                            <div class="col-sm-12 col-md-7">
                                <select id="estado" class="form-control selectric">
                                    <option value="1">Publico</option>
                                    <option value="2">Pendiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary" id="saveBtn">Crear Articulo</button>
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
<script src="{{ asset('js/panel/page/features-post-create.js') }}"></script>
<script src="{{ asset('js/panel/page/components-multiple-upload.js') }}"></script>
<script src="{{ asset('js/ArticulosCreate.js') }}"></script>

@endsection
