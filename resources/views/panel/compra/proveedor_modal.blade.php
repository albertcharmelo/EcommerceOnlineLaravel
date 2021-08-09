<div class="modal fade" id="proveedorModal" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width:80%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proveedores</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body pt-0">
                <form id="formulario-mesas">
                    @csrf

                    <div class="table-responsive table-sm">
                        <table class="table table-striped" id="proveedores">
                            <thead class="thead-dark">
                                <tr>
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

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" data-toggle="modal" class="btn btn-primary">Regresar</button>
            </div>

        </div>
    </div>
</div>