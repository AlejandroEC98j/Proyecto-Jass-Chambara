@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h2 class="text-xl font-semibold text-gray-700">Clientes</h2>
                <p class="text-4xl font-bold text-blue-600">{{ $totalClientes }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h2 class="text-xl font-semibold text-gray-700">Medidores</h2>
                <p class="text-4xl font-bold text-green-600">{{ $totalMedidores }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h2 class="text-xl font-semibold text-gray-700">Facturas</h2>
                <p class="text-4xl font-bold text-red-600">{{ $totalFacturas }}</p>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('clientes.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">Gestionar Clientes</a>
            <a href="{{ route('medidores.index') }}" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 ml-2">Gestionar Medidores</a>
            <a href="{{ route('facturas.index') }}" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 ml-2">Gestionar Facturas</a>
            <a href="{{ route('pagos.index') }}" class="bg-purple-600 text-white px-4 py-2 rounded shadow hover:bg-purple-700 ml-2">Gestionar Pagos</a>
        </div>
    </div>
@endsection
