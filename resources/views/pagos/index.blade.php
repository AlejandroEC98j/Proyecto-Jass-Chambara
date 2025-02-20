<!-- resources/views/pagos/index.blade.php -->
@extends('layouts.app')

@section('title', 'Lista de Pagos')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center">Pagos Registrados</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-gray-200">
                    <tr class="text-gray-700">
                        <th class="border border-gray-300 px-4 py-2">Factura</th>
                        <th class="border border-gray-300 px-4 py-2">Monto Pagado</th>
                        <th class="border border-gray-300 px-4 py-2">Fecha de Pago</th>
                        <th class="border border-gray-300 px-4 py-2">Estado de la Factura</th>
                        <th class="border border-gray-300 px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pagos as $pago)
                        <tr class="border border-gray-300 hover:bg-gray-100 transition">
                            <td class="border px-4 py-2 text-center">{{ $pago->factura->numero_factura }}</td>
                            <td class="border px-4 py-2 text-center">{{ $pago->monto_pagado }}</td>
                            <td class="border px-4 py-2 text-center">{{ $pago->fecha_pago }}</td>
                            <td class="border px-4 py-2 text-center">
                                {{ $pago->factura->estado_pago }}
                            </td>
                            <td class="border px-4 py-2 text-center">
                                @if($pago->factura->estado_pago == 'Pendiente')
                                    <a href="{{ route('pagos.create') }}" class="text-blue-500 font-semibold hover:underline">Registrar Pago</a>
                                @else
                                    Pagado
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('pagos.create') }}" class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Registrar Pago
            </a>
        </div>
    </div>
@endsection
