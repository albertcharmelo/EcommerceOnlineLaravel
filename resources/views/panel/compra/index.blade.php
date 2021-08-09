<?php date_default_timezone_set('America/Caracas'); ?>
@extends('panel.layout')
@section('title', 'Compras')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            {{-- <h1>Registro de Compras</h1> --}}
            <h1>Ingresos Almacén</h1>
            <div class="section-header-button">
                {{-- <a href="{{ url('/panel/compras/create') }}" class="btn btn-primary">Crear Compra</a> --}}
                <a href="{{ route('compra.create') }}" class="btn btn-primary">Nuevo Ingreso</a>
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
                                <table class="table table-striped" id="compras">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="10%">Fecha</th>
                                            <th width="20%">Proveedor</th>
                                            <th width="5%">Tipo/Documento</th>
                                            <th>N° Compra</th>
                                            <th>Impuesto</th>
                                            <th>Total</th>
                                            <th>Estado</th>
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
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
    <script>
        $('#compras').DataTable({
            responsive: true,
            autoWidth: false,
            "ajax": "{{ route('compra.cargarcompras') }}",
            "paginate": 3,
            "columns": [{
                    data: 'fecha_compra'
                }, {
                    data: 'proveedor_id'
                },
                {
                    data: 'tipodocumento_id',
                    render(data) {
                        if (data == 1) {
                            return '<span class="badge badge-pill badge-success text-center">' + 'CIE' +
                                '</span>';
                        } else {
                            return '<span class="badge badge-pill badge-danger text-white text-center">' +
                                'Dni' + '</sapn>';
                        }
                    }
                },
                {
                    data: 'num_compra'
                },
                {
                    data: 'impuesto'
                },
                {
                    data: 'total'
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
                    " compras por página",
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
