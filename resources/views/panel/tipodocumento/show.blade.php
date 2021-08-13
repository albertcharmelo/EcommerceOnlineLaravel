@extends('panel.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
    <link rel=" stylesheet" href="{{ asset('summernote/dist/summernote-bs4.css') }}">
@endsection
@section('content')
    @include('panel.partials.validation-error')

    <section class="section">

        <div class="section-header">
            <h1 class="section-title">Consultar Tipo de Documento</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Google Maps</a></div>
                <div class="breadcrumb-item">Geocoding</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nombre</label>
                                <div class="col-sm-12 col-md-7">
                                    <input readonly type="text" id="nombre" name="nombre"
                                        value="{{ old('nombre', $tipodocumento->nombre) }}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="operacion" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipo de
                                    Operación</label>
                                <div class="col-sm-12 col-md-7">
                                    <select readonly title="Indique el tipo de operación" id="operacion" name="operacion"
                                        class="form-control selectric">
                                        @include('panel.partials.programa-estado',['val' => $tipodocumento->operacion])
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descripción</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea readonly name="descripcion" id="descripcion"
                                        class="summernote-simple">{{ old('descripcion', $tipodocumento->descripcion) }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <a class="btn btn-primary mt-3 mb-3" href="{{ route('tipodocumento.index') }}"><i
                                            class="fa fa-arrow-circle-left"></i> Regresar</a>
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
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/panel/page/features-post-create.js') }}"></script>
    <script src="{{ asset('js/panel/page/components-multiple-upload.js') }}"></script>
@endsection
