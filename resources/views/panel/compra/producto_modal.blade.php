<div class="modal fade" id="productoModal" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width:80%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0">
                <form id="formulario-mesas">
                    @csrf

                    <div class="table-responsive table-sm">
                        <table class="table table-striped" id="productos">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="15%">Categoría</th>
                                    <th width="10%">Referencia</th>
                                    <th width="40%">Producto</th>  
                                    <th>Stock</th>                                   
                                    <th width="12%">Seleccione</th>
                                </tr>
                            </thead>

                        </table>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" class="close" data-dismiss="modal" data-toggle="modal">Regresar</button>
            </div>

        </div>
    </div>
</div>