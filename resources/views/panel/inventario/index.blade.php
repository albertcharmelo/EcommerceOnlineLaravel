<?php date_default_timezone_set('America/Caracas'); ?>
@extends('panel.layout')
@section('title', 'Inventario')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Inventario</h1>
            <div class="section-header-button">
                <a href="{{ route('inventarioPDF') }}" class="btn btn-primary">Generar Reporte de Inventario</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Blog</a></div>
                <div class="breadcrumb-item">Noticias</div>
            </div>
            
        </div>
        <div class="section-body">

            <h5 style="text-align: center"><strong> INVENTARIO DE ALMACEN </strong></h5>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Referencia</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Precio Total</th>
                            </tr>
                        </thead>
                       <tbody>
                        @foreach ($articulos as $articulo)
                                <tr>
                                    <th scope="row">{{ $articulo->id }}</th>
                                    <td>{{ $articulo->referencia }}</td>
                                    <td>{{ $articulo->nombre }}</td>
                                    <td>{{ $articulo->stock }}</td>
                                    <td>{{ $articulo->precio }}</td>
                                    <td>{{ $articulo->stock * $articulo->precio}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $articulos->links()}}



        </div>
    </section>
@endsection