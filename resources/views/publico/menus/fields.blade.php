<!-- Enabled Field -->
<div class="form-group row">
    <label for="name">Roles:</label>
    @foreach ($roles as $key => $item)
        <div class="form-check form-switch col-sm-6 ">
            <input class="form-check-input" type="checkbox" name="role[]" id='role' value="{{ $item->id }}"
                style="margin-left: auto;" {{ $item->checked }}>
            <label class="form-check-label" for="flexSwitchCheckDefault"
                style="margin-inline-start: 30px;">{{ $item->name }} </label>
        </div>
    @endforeach
</div>
<!-- Name Field -->
<div class="form-group row">
    <div class="form-group col-sm-6">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $menu->name ?? '' }}">
    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-6">
        <label for="description">Descripción:</label>
        <input type="text" name="description" id="description" class="form-control"
            value="{{ $menu->description ?? '' }}">
    </div>
</div>
<div class="form-group row">
    <!-- Url Field -->
    <div class="form-group col-sm-6">
        <label for="url">URL:</label>
        <input type="text" name="url" id="url" class="form-control" value="{{ $menu->url ?? '' }}">
    </div>
    <div class="form-group col-sm-6">
        <label for="parent">Menú padre:</label>
        {{ html()->select()->name('parent')->options($parent)->value($menu->parent ?? '')->placeholder('Seleccion un menu padre')->class('form-control')->render() }}
    </div>
</div>
<div class="form-group row">
    <!-- Order Field -->
    <div class="form-group col-sm-6">
        <label for="order">Orden:</label>
        <input type="number" name="order" id="order" class="form-control" value="{{ $menu->order ?? '' }}">
    </div>

    <!-- Icono Field -->
    <div class="form-group col-sm-6">
        <label for="icono">Icono:</label>
        <input type="text" name="icono" id="icono" class="form-control" value="{{ $menu->icono ?? '' }}">
    </div>
</div>
<!-- Enabled Field -->
<div class="form-group col-sm-6">
    {{ html()->checkbox('enabled')->checked($menu->enabled ?? '')->class('checkbox-inline') }}
    <label class="checkbox-inline" for="flexCheckDefault">
        Habilitado:
    </label>
</div>


<!-- Submit Field -->
<div class="row form-group">
    <div class="col text-center">
        <a href="{{ route('menus.index') }}   " class="btn btn-ligth btncancelarZarpes ">Cancelar</a>

    </div>
    <div class="col text-center">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

</div>
