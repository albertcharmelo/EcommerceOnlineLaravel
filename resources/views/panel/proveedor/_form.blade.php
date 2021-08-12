@csrf
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nombre</label>
    <div class="col-sm-12 col-md-7">
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $proveedor->nombre) }}"
            class="form-control">
    </div>
</div>

<div class="form-group row mb-4">
    <label for="tipo_documento" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipo
        Documento</label>
    <div class="col-sm-12 col-md-7">
        <select title="Indique el tipo de documento" name="tipo_documento_id" id="tipo_documento"
            class="form-control selectric">
            @foreach ($tipodocumentos as $tipodocumento)
                <option value="{{ $tipodocumento->id }}"
                    {{ $proveedor->tipo_documento_id == $tipodocumento->id ? 'selected' : '' }}>
                    {{ $tipodocumento->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Número</label>
    <div class="col-sm-12 col-md-4">
        <input min="0" id="numero" name="num_documento" type="text"
            value="{{ old('num_documento', $proveedor->num_documento) }}" class="form-control" required>
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Dirección</label>
    <div class="col-sm-12 col-md-7">
        <textarea id="direccion" name="direccion" value="{{ old('direccion', $proveedor->direccion) }}"
            class="summernote-simple"></textarea>
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Telefono</label>
    <div class="col-sm-12 col-md-4">
        <input id="telefono" name="telefono" type="text" value="{{ old('telefono', $proveedor->telefono) }}"
            class="form-control" required>
    </div>
</div>
<div class="form-group row mb-4">
    <label for="email" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
    <div class="col-sm-12 col-md-6">
        <input type="email" id="email" name="email" value="{{ old('email', $proveedor->email) }}" class="form-control"
            placeholder="Email">
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
    <div class="col-sm-12 col-md-7">
        <button type="submit" class="btn btn-success" id="saveBtn"><i class="fa fa-save"></i>
            Guardar</button>
        <a class="btn btn-primary mt-3 mb-3" href="{{ route('proveedor.index') }}"><i
                class="fa fa-arrow-circle-left"></i> Regresar</a>
    </div>
</div>
