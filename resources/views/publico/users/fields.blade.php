<!-- Email Field -->
<div class="row">
    <div class="form-group col-sm-12">
        <label for="email">Email:</label>
        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
            value="{{ $user->email ?? '' }}" placeholder="Email" required>
        @error('email')
            <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <!-- Nombres Field -->
    <div class="form-group col-sm-6">
        <label for="nombres">Nombres:</label>
        <input type="text" name="nombres" value="{{ $user->nombres ?? '' }}"required placeholder="Nombres"
            class="form-control">
    </div>

    <!-- Apellidos Field -->
    <div class="form-group col-sm-6">
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" value="{{ $user->apellidos ?? '' }}" required placeholder="Apellidos"
            class="form-control">
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="password_change" id="password_change" value="password"
                onclick="cambiar()">
            <label class="form-check-label" for="natural">
                Cambiar Contraseña
            </label>
        </div>
    </div>
</div>
<div id="password-div" style="display: none">
    <!-- Password Field -->
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                id="password" name="password">
            @error('password')
                <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group col-sm-6">
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" class="form-control"
                placeholder={{ __('Confirm Password') }}>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        <label for="rol">Rol asignado:</label>
        {{ html()->select()->name('roles')->options($roles)->value($roleUser[0]->id ?? '')->class('form-control custom-select')->placeholder('Puede asignar un Rol...')->required()->render() }}

        <small class="text-muted fw-lighter">Si no encuentra su Rol en el listado, asegúrese que el mismo tenga un Menú
            asociado</small>
    </div>
    <div class="form-group col-sm-6">
        <label for="institucion">Institución Asignada:</label>
        {{ html()->select()->name('institucion_id')->options($instituciones)->value($user->institucion_id ?? '')->class('form-control custom-select')->placeholder('Puede asignar una Institución...')->required()->render() }}
    </div>
</div>


<!-- Submit Field -->

<div class="row form-group  mt-4">
    <div class="col text-center">
        <a href="{{ route('users.index') }} " class="btn btn-primary btncancelarZarpes">Cancelar</a>
    </div>
    <div class=" col text-center">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
<input type="text" name="tipo_usuario" value="Usuario Interno" hidden>
