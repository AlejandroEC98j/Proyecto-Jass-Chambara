@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <!-- Título Principal -->
        <h1 class="text-3xl font-bold text-center mb-6 text-cyan-600">{{ __('Junta Administradora de Servicios de Saneamiento') }}</h1>

        <!-- Tarjetas de Información -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['title' => 'Clientes', 'count' => $totalClientes, 'color' => 'cyan', 'icon' => 'fa-users'],
                ['title' => 'Medidores', 'count' => $totalMedidores, 'color' => 'green', 'icon' => 'fa-tachometer-alt'],
                ['title' => 'Facturas', 'count' => $totalFacturas, 'color' => 'red', 'icon' => 'fa-file-invoice-dollar'],
                ['title' => 'Pagos', 'count' => $totalPagos, 'color' => 'purple', 'icon' => 'fa-credit-card']
            ] as $card)
                <div class="bg-white p-6 rounded-lg shadow-md text-center flex flex-col items-center">
                    <div class="text-6xl text-{{ $card['color'] }}-600">
                        <i class="fas {{ $card['icon'] }}"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-700 mt-3">{{ $card['title'] }}</h2>
                    <p class="text-4xl font-bold text-{{ $card['color'] }}-600">{{ $card['count'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- Botones de Navegación -->
        <div class="mt-8 text-center space-x-4">
            <a href="{{ route('clientes.index') }}" class="bg-cyan-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 transform hover:scale-105 transition-all">
                <i class="fas fa-users"></i> {{ __('Gestionar Clientes') }}
            </a>
            <a href="{{ route('medidores.index') }}" class="bg-green-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transform hover:scale-105 transition-all">
                <i class="fas fa-tachometer-alt"></i> {{ __('Gestionar Medidores') }}
            </a>
            <a href="{{ route('facturas.index') }}" class="bg-red-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transform hover:scale-105 transition-all">
                <i class="fas fa-file-invoice-dollar"></i> {{ __('Gestionar Facturas') }}
            </a>
            <a href="{{ route('pagos.index') }}" class="bg-purple-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 transform hover:scale-105 transition-all">
                <i class="fas fa-credit-card"></i> {{ __('Gestionar Pagos') }}
            </a>
        </div>

        <!-- Información Adicional o Frase -->
        <div class="mt-12 text-center text-gray-600">
            <p class="text-lg font-semibold text-cyan-600">
                {{ __('Cuidemos el agua. ¡Cada gota cuenta!') }}
            </p>
            <p class="mt-4 text-md text-gray-500">
                {{ __('JASS de Uñas - Huancayo, Perú. Proveedor de agua y servicios a la comunidad.') }}
            </p>
        </div>
    </div>
@endsection
