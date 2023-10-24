<div class="mx-auto px-2">
    <p class="mt-1 text-sm text-gray-600">
        Asegúrese de que su cuenta utilice una contraseña segura, 8 caracteres mínimo, letras mayúsculas y minúsculas y
        al
        menos un número.
    </p>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-group col-sm-6">
            <label for="password">Contraseña actual</label>
            <input type="password" id="current_password" name="current_password" placeholder="Contraseña actual"
                class="form-control">

        </div>
        <div class="row">
            <!-- Password Field -->
            <div class="form-group col-sm-6">
                <label for="password">Contraseña:</label>
                <input type="password" placeholder="Contraseña"
                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"
                    name="password" required>
                @error('password')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="password_confirmation">Confirmar Contraseña:</label>
                <input type="password" name="password_confirmation" class="form-control" required
                    placeholder={{ __('Confirm Password') }}>
            </div>
        </div>

        <div class="flex items-center gap-4 text-right">
            <button class="btn btn-primary ">Guardar</button>
        </div>
    </form>
</div>
