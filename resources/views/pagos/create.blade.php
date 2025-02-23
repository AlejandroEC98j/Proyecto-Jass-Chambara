@extends('layouts.app')

@section('title', 'Registrar Pago')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-cyan-600">Registrar Pago</h2>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pagos.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Seleccionar la factura --}}
            <div>
                <label for="factura_id" class="block text-gray-700 font-semibold">Seleccionar Factura:</label>
                <select name="factura_id" id="factura_id" class="w-full border-gray-300 p-2 rounded">
                    <option value="" disabled selected>Elige una factura</option>
                    @foreach($facturas as $factura)
                        <option value="{{ $factura->id }}">
                            Factura #{{ $factura->numero_factura }} - Cliente: {{ $factura->cliente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Monto a pagar --}}
            <div>
                <label class="block text-gray-700 font-semibold">Monto a Pagar:</label>
                <input type="number" name="monto_pagado" step="0.01" class="w-full border-gray-300 p-2 rounded" required>
            </div>

            {{-- Fecha de Pago --}}
            <div>
                <label class="block text-gray-700 font-semibold">Fecha de Pago:</label>
                <input type="date" name="fecha_pago" value="{{ date('Y-m-d') }}" class="w-full border-gray-300 p-2 rounded">
            </div>

            {{-- Botón para pagar --}}
            <div class="flex justify-center">
                <button type="submit" class="bg-cyan-600 text-white font-semibold px-6 py-3 rounded-md shadow-md hover:bg-cyan-700">
                    💰 Pagar
                </button>
            </div>
        </form>
    </div>
@endsection
