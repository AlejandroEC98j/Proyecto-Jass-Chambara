<x-guest-layout>
    <!-- Contenedor principal -->
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <!-- Mensaje inicial -->
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('¡Gracias por registrarte! Antes de comenzar, ¿podrías verificar tu dirección de correo electrónico haciendo clic en el enlace que te enviamos? Si no recibiste el correo, con gusto te enviaremos otro.') }}
        </div>

        <!-- Mensaje de estado (cuando se envía el enlace de verificación) -->
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionaste durante el registro.') }}
            </div>
        @endif

        <!-- Formulario para reenviar el correo de verificación y cerrar sesión -->
        <div class="mt-6 flex items-center justify-between">
            <!-- Formulario para reenviar el enlace de verificación -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div>
                    <x-primary-button class="bg-cyan-600 text-white py-2 px-4 rounded-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                        {{ __('Reenviar correo de verificación') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Formulario para cerrar sesión -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Cerrar sesión') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
