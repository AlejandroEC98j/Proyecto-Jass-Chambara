<!-- resources/views/pagos/create.blade.php -->
@extends('layouts.app')

@section('title', 'Registrar Pago')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center">Registrar Pago</h1>

        <form action="{{ route('pagos.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="factura_id" class="block text-gray-700">Selecciona la Factura</label>
                <select name="factura_id" id="factura_id" class="w-full p-2 border border-gray-300 rounded-md" required>
                    <option value="">Selecciona una factura</option>
                    @foreach($facturas as $factura)
                        <option value="{{ $factura->id }}">{{ $factura->numero_factura }} - {{ $factura->cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="monto_pagado" class="block text-gray-700">Monto Pagado</label>
                <input type="number" name="monto_pagado" id="monto_pagado" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="fecha_pago" class="block text-gray-700">Fecha de Pago</label>
                <input type="date" name="fecha_pago" id="fecha_pago" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <button type="submit" class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Registrar Pago
            </button>
        </form>
    </div>
@endsection
