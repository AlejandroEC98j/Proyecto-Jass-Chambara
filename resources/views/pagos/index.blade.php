@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">

    <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center">Pagos Registrados</h1>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded-md mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Listado de pagos -->
    <div class="overflow-x-auto bg-white shadow-sm rounded-lg">
        <table class="w-full border-collapse border border-gray-300 rounded-lg shadow-md">
            <thead class="bg-gray-200">
                <tr class="text-gray-700">
                    <th class="border border-gray-300 px-4 py-2">Factura</th>
                    <th class="border border-gray-300 px-4 py-2">Monto Pagado</th>
                    <th class="border border-gray-300 px-4 py-2">Fecha de Pago</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pagos as $pago)
                    <tr class="border border-gray-300 hover:bg-gray-100 transition">
                        <td class="border px-4 py-2">{{ $pago->factura->numero_factura }}</td>
                        <td class="border px-4 py-2">{{ $pago->monto_pagado }}</td>
                        <td class="border px-4 py-2">{{ $pago->fecha_pago }}</td>
                        <td class="border px-4 py-2 text-center">
                            <!-- Enlace para registrar un nuevo pago para la factura -->
                            <a href="{{ route('pagos.create', ['factura_id' => $pago->factura->id]) }}" 
                                class="text-blue-500 font-semibold hover:underline">Registrar Pago
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
