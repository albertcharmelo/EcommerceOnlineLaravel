@extends('panel.layout')
@section('title', 'Ingresos')
@section('content')
    @include('panel.partials.validation-error')
    <div class="card card-info">
        <form action="{{ route('compra.store') }}" method="POST">
            @include('panel.compra._form')
        </form>
    </div>
@endsection

@section('js')
    <script>
        var _token = '{{ csrf_token() }}';
    </script>

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

    <script>
        $('#productos').DataTable({
            responsive: true,
            autoWidth: false,
            "ajax": "{{ route('producto.productosactivos') }}",
            "paginate": 3,
            "columns": [{
                    data: 'categoria_id'
                },
                {
                    data: 'codigo'
                },
                {
                    data: 'nombre'
                },
                {
                    data: 'stock'
                },
                {
                    'data': null,
                    'render': function(data, type, row) {
                        // return '<button onclick="SeleccionarProducto('+row.id+')">Edit</button>'                       
                        return '<a id="' + row.id +
                            '" onClick="SeleccionarProducto(this)" class="btn btn-primary btn-sm"><i class="fas fa-check"></i></a>'
                    }
                },
            ],
            "pageLength": 10,
            "language": {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar " +
                    `<select style="width: 70px;" class="cusom-select custom-select-sm form-control form-control-sm">                                                                         
                    <option value ='10'>10</option>
                    <option value ='25'>25</option>
                    <option value ='50'>50</option>
                    <option value ='100'>100</option>
                    <option value ='-1'>All</option>
                    </select>` +" productos por página",
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

    <script src="{{ asset('js/ComprasCreate.js') }}"></script>
    @if (session('crear') == 'ok')
        <script>
            Swal.fire(
                '¡Exito!',
                'Ingreso de Almacén registrado!',
                'success'
            )
        </script>
    @endif
@endsection
