<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Estilos (Si usas Vite, incluye estos) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Barra de navegación -->
        @include('layouts.navigation')

        <!-- Contenido de la página -->
        <main class="flex-grow">
            @yield('content')  <!-- Aquí cargará el contenido de cada vista -->
        </main>
    </div>
</body>
</html>
