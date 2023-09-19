<div class="row">
    <!-- Nombre Field -->
    <div class="form-group col-sm-6">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" class="form-control" value="{{ $institucion->nombre ?? '' }}">
    </div>

    <!-- Sigla Field -->
    <div class="form-group col-sm-6">
        <label for="sigla">Siglas:</label>
        <input type="text" name="sigla" class="form-control" value="{{ $institucion->sigla ?? '' }}">
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-4">
        <label for="sector">Sector:</label>
        {{ html()->select()->name('sector_id')->options($sectores)->value($institucion->sector_id ?? '')->placeholder('Seleccion un sector')->class('form-control custom-select')->render() }}

    </div>
</div>


</div>

<!-- Button -->
<div class="row form-group  mt-4">
    <div class="col text-center">
        <a href="{{ route('instituciones.index') }} " class="btn btn-primary btncancelarZarpes">Cancelar</a>
    </div>
    <div class=" col text-center">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
