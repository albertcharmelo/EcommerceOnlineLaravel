@extends('panel.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
    <link rel=" stylesheet" href="{{ asset('summernote/dist/summernote-bs4.css') }}">
@endsection
@section('content')
    @include('panel.partials.validation-error')
    <section class="section">
        <div class="section-header">
            <h1 class="section-title">Editar Tipo de Documento</h1>
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
                            <form action="{{ route('tipodocumento.update', $tipodocumento->id) }}" method="POST">
                                @method('PUT')
                                @include('panel.tipodocumento._form')
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection

@section('js')
    @if (session('actualizar') == 'ok')
        <script>
            Swal.fire(
                '¡Exito!',
                'Tipo de documento actualizado!',
                'success'
            )
        </script>        
    @endif

    <script src="{{ asset('js/jquery.selectric.js') }}"></script>
    <script src="{{ asset('js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/panel/page/features-post-create.js') }}"></script>
    <script src="{{ asset('js/panel/page/components-multiple-upload.js') }}"></script>
@endsection