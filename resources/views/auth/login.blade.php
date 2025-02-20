<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Contenedor principal con fondo blanco -->
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <!-- Logo de JASS -->
        <div class="text-center mb-6">
            <img src="{{ asset('jass-unas.jpg') }}" alt="Logo del JASS" class="h-24 mx-auto">
        </div>

        <h2 class="text-2xl font-bold text-center mb-6 text-cyan-600">{{ __('Iniciar Sesión') }}</h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="block mt-1 w-full p-3 border border-cyan-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500" 
                              type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                
                <x-text-input id="password" class="block mt-1 w-full p-3 border border-cyan-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500"
                              type="password" name="password" required autocomplete="current-password"
                              pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
                              title="Debe tener al menos 8 caracteres, incluyendo una mayúscula, una minúscula, un número y un carácter especial." />
                
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            
            <!-- Remember Me -->
            <div class="flex items-center mt-4">
                <input id="remember_me" type="checkbox" class="rounded border-cyan-300 text-cyan-600 focus:ring-cyan-500" name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</label>
            </div>

            <!-- Forgot Password Link & Submit Button -->
            <div class="flex justify-between items-center mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-cyan-600 hover:text-cyan-800" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
                <x-primary-button class="bg-cyan-600 text-white py-2 px-4 rounded-md hover:bg-cyan-800 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    {{ __('Iniciar Sesión') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Register Link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                {{ __('¿Aún no tienes cuenta?') }}
                <a href="{{ route('register') }}" class="text-cyan-600 hover:text-cyan-800 font-medium">{{ __('Regístrate aquí') }}</a>
            </p>
        </div>
    </div>
</x-guest-layout>
