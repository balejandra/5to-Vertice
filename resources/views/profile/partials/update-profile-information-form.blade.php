<div class="mx-auto px-2">
    <p class="mt-1 text-sm text-gray-600">
        Actualice la información del perfil y la dirección de correo electrónico de su cuenta.
    </p>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="email">Email:</label>
                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    name="email" value="{{ $user->email ?? '' }}" placeholder="Email" required>
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
                <input type="text" name="apellidos" value="{{ $user->apellidos ?? '' }}" required
                    placeholder="Apellidos" class="form-control">
            </div>
        </div>
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif
</div>

<div class="flex items-center gap-4 text-right">
    <button class="btn btn-primary ">Guardar</button>
</div>
</form>
</div>
