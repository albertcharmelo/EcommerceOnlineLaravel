@extends('panel.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
    <link rel=" stylesheet" href="{{ asset('summernote/dist/summernote-bs4.css') }}">
@endsection
@section('content')
    @include('panel.partials.validation-error')

    <section class="section">
        <div class="section-header">
            <h1 class="section-title">Consultar Proveedor</h1>
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
                                    <input readonly type="text" id="nombre"
                                        value="{{ old('nombre', $persona->nombre) }}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="tipo_documento"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipo
                                    Documento</label>
                                <div class="col-sm-12 col-md-7">
                                    <select readonly title="Indique el tipo de documento" name="tipodocumento"
                                        id="tipo_documento" class="form-control selectric">
                                        @foreach ($tipodocumentos as $tipodocumento)
                                            <option value="{{ $tipodocumento->id }}"
                                                {{ $persona->tipo_documento_id == $tipodocumento->id ? 'selected' : '' }}>
                                                {{ $tipodocumento->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Número</label>
                                <div class="col-sm-12 col-md-4">
                                    <input readonly min="0" id="num_documento" type="text"
                                        value="{{ old('num_documento', $persona->num_documento) }}" class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Dirección</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea readonly id="direccion"
                                        value="{{ old('direccion', $persona->direccion) }}"
                                        class="summernote-simple"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Telefono</label>
                                <div class="col-sm-12 col-md-4">
                                    <input readonly id="telefono" type="text"
                                        value="{{ old('telefono', $persona->telefono) }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="email"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                <div class="col-sm-12 col-md-6">
                                    <input readonly type="email" value="{{ old('email', $persona->email) }}"
                                        class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <a class="btn btn-primary mt-3 mb-3" href="{{ route('proveedor.index') }}"><i
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
