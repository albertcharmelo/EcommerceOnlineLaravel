    @csrf
    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nombre</label>
        <div class="col-sm-12 col-md-7">
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $tipodocumento->nombre) }}" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-4">
        <label for="operacion" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipo de
            Operación</label>
        <div class="col-sm-12 col-md-7">
            <select title="Indique el tipo de operación" name="operacion" id="operacion" class="form-control selectric">
                @include('panel.partials.programa-estado',['val' => $tipodocumento->operacion])
            </select>
        </div>
    </div>

    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descripción</label>
        <div class="col-sm-12 col-md-7">
            <textarea name="descripcion" id="descripcion" 
                class="summernote-simple">
                {{ old('descripcion', $tipodocumento->descripcion) }}
            </textarea>
        </div>
    </div>

    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
        <div class="col-sm-12 col-md-7">
            <button type="submit" class="btn btn-success" id="saveBtn"><i class="fa fa-save"></i>
                Guardar</button>
            <a class="btn btn-primary mt-3 mb-3" href="{{ route('tipodocumento.index') }}"><i
                    class="fa fa-arrow-circle-left"></i> Regresar</a>
        </div>
    </div>