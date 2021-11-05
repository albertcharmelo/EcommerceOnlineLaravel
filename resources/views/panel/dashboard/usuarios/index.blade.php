@extends('panel.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/datables') }}"> --}}
<link rel="stylesheet" href="{{ asset('datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Clientes</h1>
     
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Clientes</a></div>
            <div class="breadcrumb-item">Ver Clientes</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Usuarios</h2>
        <p class="section-lead">Observar los clientes y asignarle la opción de mayoritario </p>
  
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Todos los Clientes</h4>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3"></div>
                        @if (isset($status))
                        <div class="alert alert-primary alert-dismissible show fade">
                            <div class="alert-body">
                              <button class="close" data-dismiss="alert">
                                <span>×</span>
                              </button>
                                {{ $status }}
                            </div>
                        </div>
                        @endif
                       
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                  <tr>
                                    <th class="text-center">
                                      # Referencia
                                    </th>
                                    <th>Nombre Completo</th>
                                    <th>Ciudad</th>
                                    <th>Provincia</th>
                                    <th>Dirección</th>
                                    <th>RNC</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Rol</th>
                                    <th>Acción</th>



                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td style="width: 25%; white-space: nowrap;">@if($usuario->referenciaID){{ $usuario->referenciaID }}@else No posee @endif </td>
                                            <td style="width: 10%; white-space: nowrap;">{{ $usuario->name }} {{ $usuario->lname }}</td>
                                            <td style="width: 10%; white-space: nowrap;">{{ $usuario->ciudad }}</td>
                                            <td>{{ $usuario->provincia }}</td>
                                            <td style="width: 20%; white-space: nowrap;">{{ $usuario->direccion }}</td>
                                            <td>{{ $usuario->RNC }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td style="width: 10%; white-space: nowrap;">{{ $usuario->telefono }}</td>
                                            <td>
                                                @if ($usuario->rol->descripcion == 'Administrador') 
                                                <div class="badge badge-info">{{ $usuario->rol->descripcion }}</div>
                                                @elseif ($usuario->rol->descripcion == 'Cliente')    
                                                <div class="badge badge-success">{{ $usuario->rol->descripcion }}</div>
                                                @else
                                                <div class="badge badge-danger">{{ $usuario->rol->descripcion }}</div>
                                                @endif 
                                                                                                
                                            </td>
                                            <td><a href="{{ url('/panel/dashboard/usuariosMayorisa',$usuario->id) }}" style="color: white"><button class="btn btn-info"><i class="fas fa-coins"></i></button></a></td>


                                        </tr>
                                        
                                    @endforeach
                                </tbody>
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
<script src="{{ asset('js/panel/page/features-posts.js') }}"></script>
<script src="{{ asset('datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/panel/page/modules-datatables.js') }}"></script>
<script>
    var _token = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function () {
        getUsuarios()
    });

    function getUsuarios() {
        let url = '/panel/dashboard/get/usuarios';
        let data = {
            _token: _token
        }

        $.post(url, data, function (resp) {
            console.log(resp)

        });

    }

    function showUsers(cliente) {
        let tr = document.createElement('tr');
        let nombre = document.createElement('td');
        let apellido = document.createElement('td');
        let email = document.createElement('td');
        let tipo = document.createElement('td');
        let created_at = document.createElement('td');
        let option = document.createElement('div');
        let bullet = document.createElement('div');


        




    }

</script>
@endsection
