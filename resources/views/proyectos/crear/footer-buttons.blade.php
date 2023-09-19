<div class="card-footer text-right">
    <div class="row">
        <div class="col-md-6 text-left">
            @if ($step != 1)
                <a href="{{route('proyectos.step'.$step-1)}}" class="btn btn-primary pull-right">Anterior</a>
            @endif
        </div>
        <div class="col-md-6 text-right">
            <button type="submit" class="btn btn-primary">Siguiente</button>
        </div>
    </div>
</div>
