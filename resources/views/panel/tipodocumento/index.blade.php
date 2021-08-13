<?php date_default_timezone_set('America/Caracas'); ?>
@extends('panel.layout')
@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tipo de Documentos</h1>
            <div class="section-header-button">
                <a href="{{ route('tipodocumento.create') }}" class="btn btn-primary">Crear Tipo Documento</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Blog</a></div>
                <div class="breadcrumb-item">Noticias</div>
            </div>
        </div>
        <div class="section-body">

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive table-sm">
                                <table class="table table-striped" id="tipodocumentos">
                                    <thead class="thead-dark">
                                        <tr>
                                           
                                            <th width="40%">Nombre</th>
                                            <th width="5%">Tipo/Operación</th>
                                            <th width="12%">Opciones</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    {{-- <script src="{{ asset('js/panel/page/features-posts.js') }}"></script> --}}

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
    <script>
        $('#tipodocumentos').DataTable({
            responsive: true,
            autoWidth: false,
            "ajax": "{{ route('tipodocumento.cargartipodocumentos') }}",
            "paginate": 3,
            "columns": [
                {
                    data: 'nombre'
                },
                {
                    data: 'operacion',
                    render(data) {
                        if (data == 1) {
                            return '<span class="badge badge-pill badge-success text-center">' + 'Compras' +
                                '</span>';
                        } else if (data == 0) {
                            return '<span class="badge badge-pill badge-danger text-white text-center">' +
                                'Proveedores' + '</sapn>';
                        } else {
                            return '<span class="badge badge-pill badge-primary text-white text-center">' +
                                'Clientes' + '</sapn>';
                        }
                    }

                },
                {
                    data: 'btn'
                },
            ],
            "pageLength": 10,
            "language": {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar " +
                    `<select class="cusom-select custom-select-sm form-control form-control-sm">                                                                         
                                                                                                                          <option value ='10'>10</option>
                                                                                                                          <option value ='25'>25</option>
                                                                                                                          <option value ='50'>50</option>
                                                                                                                          <option value ='100'>100</option>
                                                                                                                          <option value ='-1'>All</option>
                                                                                                                          </select>` +
                    " registros por página",
                "zeroRecords": "No se encontraron resultados!",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                'search': 'Buscar:',
                "loadingRecords": "Cargando Información...",
                'paginate': {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    </script>

@endsection
