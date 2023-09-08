<div class="row">
    <!-- Nombre Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Sigla Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('sigla', 'Siglas:') !!}
        {!! Form::text('sigla', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('sector', 'Sector:') !!}
        {!! Form::select('sector_id',$sectores, null, ['class' => 'form-control custom-select','placeholder' => 'Seleccione un sector']) !!}
    </div>
</div>


</div>

<!-- Button -->
<div class="row form-group  mt-4">
    <div class="col text-center">
        <a href="{{route('instituciones.index')}} " class="btn btn-primary btncancelarZarpes">Cancelar</a>
    </div>
    <div class=" col text-center">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
