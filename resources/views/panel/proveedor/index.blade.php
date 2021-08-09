<?php date_default_timezone_set('America/Caracas'); ?>
@extends('panel.layout')
@section('title', 'Produxtos')
@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Proveedores</h1>
            <div class="section-header-button">
                <a href="{{ url('/panel/articulos/create/articulos') }}" class="btn btn-primary">Crear Proveedor</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Blog</a></div>
                <div class="breadcrumb-item">Noticias</div>
            </div>
        </div>
        <div class="section-body">
            {{-- <h2 class="section-title">Noticas</h2>
            <p class="section-lead">
                Puedes administrar todas las noticas, además de editar, borrar y mas.

            </p> --}}

            {{-- <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Todos <span class="badge badge-white">5</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Publicados <span class="badge badge-primary">1</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Pendiente <span class="badge badge-primary">1</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Eliminados <span class="badge badge-primary">0</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            {{-- <div class="float-right">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}

                            {{-- <div class="clearfix mb-3">                                
                            </div> --}}

                            <div class="table-responsive table-sm">
                                <table class="table table-striped" id="proveedores">
                                    <thead class="thead-dark">
                                        <tr>
                                            {{-- <th class="text-center pt-2">
                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                    class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th> --}}
                                            <th width="40%">Proveedor</th>
                                            <th width="5%">Tipo/Documento</th>
                                            <th>N°.Documento</th>
                                            <th>Teléfono</th>
                                            <th>Email</th>
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
        $('#proveedores').DataTable({
            responsive: true,
            autoWidth: false,
            "ajax": "{{ route('proveedor.cargarproveedores') }}",
            "paginate": 3,
            "columns": [{
                    data: 'nombre'
                },
                {
                    data: 'tipo_documento',
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
                    data: 'num_documento'
                },
                {
                    data: 'telefono'
                },
                {
                    data: 'email'
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
                    " proveedores por página",
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
