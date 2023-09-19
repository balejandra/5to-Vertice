<div class="row">
    <div class="col-lg-4 col-md-3"></div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="row border p-3">
            <div class="form-group col-lg-12 col-sm-6">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="{{ $tipoDesarrollo->nombre ?? '' }}">
            </div>
            <!-- Otros campos de tipo de desarrollo aquí si es necesario -->
            <div class="form-group col text-center">
                <a href="{{ route('tipoDesarrollos.index') }}" class="btn btncancelarZarpes">Cancelar</a>
            </div>
            <div class="form-group col text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-3"></div>
</div>
