<x-guest-layout>
    <!-- Mensaje informativo sobre el restablecimiento de contraseña -->
    <div class="mb-6 text-sm text-gray-600 dark:text-gray-400 text-center">
        {{ __('¿Olvidaste tu contraseña? No te preocupes. Solo indícanos tu dirección de correo electrónico y te enviaremos un enlace para restablecer la contraseña que te permitirá elegir una nueva.') }}
    </div>

    <!-- Contenedor principal del formulario -->
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <!-- Estado de la sesión (si hay un mensaje) -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Campo de correo electrónico -->
            <div>
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="block mt-1 w-full p-3 border border-cyan-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Botón para enviar el enlace de restablecimiento -->
            <div class="flex justify-end mt-6">
                <x-primary-button class="bg-cyan-600 text-white py-2 px-4 rounded-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    {{ __('Enviar enlace para restablecer la contraseña') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
