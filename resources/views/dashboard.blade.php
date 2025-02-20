@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['title' => 'Clientes', 'count' => $totalClientes, 'color' => 'blue-600', 'icon' => 'fa-users'],
                ['title' => 'Medidores', 'count' => $totalMedidores, 'color' => 'green-600', 'icon' => 'fa-tachometer-alt'],
                ['title' => 'Facturas', 'count' => $totalFacturas, 'color' => 'red-600', 'icon' => 'fa-file-invoice-dollar'],
                ['title' => 'Pagos', 'count' => $totalPagos, 'color' => 'purple-600', 'icon' => 'fa-credit-card']
            ] as $card)
                <div class="bg-white p-6 rounded-lg shadow-md text-center flex flex-col items-center">
                    <div class="text-4xl text-{{ $card['color'] }}">
                        <i class="fas {{ $card['icon'] }}"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-700 mt-3">{{ $card['title'] }}</h2>
                    <p class="text-4xl font-bold text-{{ $card['color'] }}">{{ $card['count'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-8 text-center space-x-2">
            <a href="{{ route('clientes.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                <i class="fas fa-users"></i> Gestionar Clientes
            </a>
            <a href="{{ route('medidores.index') }}" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700">
                <i class="fas fa-tachometer-alt"></i> Gestionar Medidores
            </a>
            <a href="{{ route('facturas.index') }}" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700">
                <i class="fas fa-file-invoice-dollar"></i> Gestionar Facturas
            </a>
            <a href="{{ route('pagos.index') }}" class="bg-purple-600 text-white px-4 py-2 rounded shadow hover:bg-purple-700">
                <i class="fas fa-credit-card"></i> Gestionar Pagos
            </a>
        </div>
    </div>
@endsection
