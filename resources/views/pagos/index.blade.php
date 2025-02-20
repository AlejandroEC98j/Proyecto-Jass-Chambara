@extends('layouts.app')

@section('title', 'Lista de Pagos')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded-md mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-2xl font-bold text-center mb-6 text-cyan-600">{{ __('Pagos Registrados') }}</h1>

    <div class="overflow-x-auto bg-white shadow-sm rounded-lg">
        <table class="w-full border-collapse border border-gray-300 rounded-lg shadow-md">
            <thead class="bg-gray-200">
                <tr class="text-gray-700">
                    <th class="border border-gray-300 px-4 py-3">Factura</th>
                    <th class="border border-gray-300 px-4 py-3">Monto Pagado</th>
                    <th class="border border-gray-300 px-4 py-3">Fecha de Pago</th>
                    <th class="border border-gray-300 px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pagos as $pago)
                    <tr class="border border-gray-300 hover:bg-gray-100 transition">
                        <td class="border px-4 py-3 text-center">{{ $pago->factura->numero_factura }}</td>
                        <td class="border px-4 py-3">{{ $pago->monto_pagado }}</td>
                        <td class="border px-4 py-3">{{ $pago->fecha_pago }}</td>
                        <td class="border px-4 py-3 text-center">
                            <a href="{{ route('pagos.create', ['factura_id' => $pago->factura->id]) }}" class="text-blue-500 font-semibold hover:underline">Registrar Pago</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
