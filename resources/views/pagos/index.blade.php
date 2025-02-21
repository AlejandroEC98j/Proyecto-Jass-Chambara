@extends('layouts.app')

@section('title', 'Lista de Pagos')

@section('content')
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-cyan-600">{{ __('Pagos Registrados') }}</h2>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-cyan-100 text-gray-700">
                    <tr>
                        <th class="border border-gray-300 px-4 py-3">Factura</th>
                        <th class="border border-gray-300 px-4 py-3">Monto Pagado</th>
                        <th class="border border-gray-300 px-4 py-3">Fecha de Pago</th>
                        <th class="border border-gray-300 px-4 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pagos as $pago)
                        <tr class="border border-gray-300 hover:bg-cyan-50 transition">
                            <td class="border px-4 py-3 text-center">{{ $pago->factura->numero_factura }}</td>
                            <td class="border px-4 py-3">{{ $pago->monto_pagado }}</td>
                            <td class="border px-4 py-3">{{ $pago->fecha_pago }}</td>
                            <td class="border px-4 py-3 text-center flex justify-center space-x-4">
                                <form action="{{ route('pagos.destroy', $pago->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 font-semibold hover:underline" onclick="return confirm('¿Estás seguro de eliminar este pago?')">
                                        {{ __('Eliminar') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="4" class="py-4 text-gray-500">{{ __('No hay pagos registrados') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-8 flex justify-center">
            <a href="{{ route('pagos.create', ['factura_id' => $pagos->first()->factura->id ?? 1]) }}" 
                class="bg-cyan-600 text-white font-semibold px-6 py-3 rounded-md shadow-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                {{ __('Registrar Nuevo Pago') }}
            </a>
        </div>
    </div>
@endsection
