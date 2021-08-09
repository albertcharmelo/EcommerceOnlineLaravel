<a href="{{ url('/panel/proveedores/show', $id) }}" title='Ver' class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"
        aria-hidden="true"></i></a>
<a href="{{ url('/panel/proveedores/edit', $id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
<form action="{{ url('/panel/proveedores/destroy', $id) }}" id="formDelete" class="d-inline formDelete" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" style="color:white;"></i></button>
</form>
