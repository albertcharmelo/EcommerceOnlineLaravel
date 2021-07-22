<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/estilospdfs.css') }}">
    <title>REPORTE DE INVENTARIO</title>
</head>

<body>
    <header>
        <p><strong>DEVIA RD</strong></p>
        <p>FECHA: 22/07/2021</p>
    </header>
    <main>
        <div class="container">
            <h5 style="text-align: center"> INVENTARIO DE ALMACEN <h5>
                    <hr>

                    <table class="table table-striped">
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
                                    <td>{{ $articulo->stock * $articulo->precio }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
    </main>

    {{-- <footer>
        <p><strong>mENSAJE PARA EL FOOTER DEL INVENTARIO></strong></p>
    </footer> --}}
</body>

</html>
