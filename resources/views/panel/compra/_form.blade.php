@include('panel.compra.proveedor_modal')
@include('panel.compra.producto_modal')
@csrf
<section class="section">

    <div class="section-header">
        <h1 class="section-title">Crear Ingresos</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Google Maps</a></div>
            <div class="breadcrumb-item">Geocoding</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row mb-4">
            <div class="col-4 col-12 col-md-6 col-lg-6">
                <form id="search-form">
                    <label for="proveedor" class="form-label">Proveedor</label>
                    <div class="input-group">
                        <input type="text" id="proveedor" class="form-control form-control-sm">
                        <div class="input-group-append">
                            <button data-toggle="modal" data-target="#proveedorModal"
                                class="btn btn-primary btn-sm">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3">
                <label for="impuesto" class="form-label">Impuesto</label>
                <input type="text" class="form-control form-control-sm" id="impuesto">
            </div>
            <div class="col-md-2">
                <label for="impuesto" class="form-label">Fecha</label>
                <input type="text" class="form-control form-control-sm" name="date" id="date" required readonly>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="tipodoc" class="form-label">Tipo Comprobante</label>
                <select class="select2 form-control input-sm" style="width: 80%;" title="Indique el Hipódromo"
                    name="tipodocumento" id="tipodoc" placeholder="Hipódromo...">
                    @foreach ($tipodocumentos as $tipodocumento)
                        <option value="{{ $tipodocumento->id }}"
                            {{ $compra->tipodocumento_id == $tipodocumento->id ? 'selected' : '' }}>
                            {{ $tipodocumento->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="serie" class="form-label">Serie/Folio</label>
                <input type="text" class="form-control form-control-sm" id="serie">
            </div>
            <div class="col-md-3">
                <label for="numero" class="form-label">Número</label>
                <input type="text" class="form-control form-control-sm" id="numero">
            </div>

            <div class="col-md-2">
                <label for="btnAgregar" class="form-label">Producto</label>
                <div class="form-group">
                    <button data-toggle="modal" data-target="#productoModal" type="button" id="btnAgregar"
                        onfocusout="delColorFocus2(this,'White','ForestGreen')"
                        onfocus="setColorFocus2(this,'ForestGreen')" class="btn btn-outline-success"><i
                            class="far fa-arrow-alt-circle-down"></i>
                        Agregar </button>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive table-sm">
                    <table class="table table-striped" id="sortable-table">
                        <thead>
                            <tr>
                                {{-- <th class="text-center">
                                    <i class="fas fa-th"></i>
                                </th> --}}
                                <th>Categoría</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio/Compra</th>
                                <th>Sub-total</th>                                
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="tblProductos">>


                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

</section>