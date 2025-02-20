@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">

    <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Registrar Pago</h1>

    <!-- Formulario para registrar el pago -->
    <form action="{{ route('pagos.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Campo de monto pagado -->
        <div>
            <label for="monto_pagado" class="block font-medium text-gray-700">Monto Pagado</label>
            <input type="number" name="monto_pagado" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-300" id="monto_pagado" required>
            <div class="text-red-500 text-sm mt-2" id="monto_pagado_error"></div>
        </div>

        <!-- Campo de fecha de pago -->
        <div>
            <label for="fecha_pago" class="block font-medium text-gray-700">Fecha de Pago</label>
            <input type="date" name="fecha_pago" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-300" id="fecha_pago" required>
            <div class="text-red-500 text-sm mt-2" id="fecha_pago_error"></div>
        </div>

        <!-- Campo de factura_id (oculto) -->
        <input type="hidden" name="factura_id" value="{{ $factura->id }}">

        <!-- Botón de enviar -->
        <div class="flex justify-end gap-4">
            <a href="{{ route('pagos.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gray-600 transition duration-300">
                Volver al listado de pagos
            </a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Registrar Pago
            </button>
        </div>
    </form>
</div>
@endsection
