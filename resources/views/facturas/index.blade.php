@extends('layouts.app')

@section('title', 'Lista de Facturas')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center">Facturas Registradas</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-gray-200">
                    <tr class="text-gray-700">
                        <th class="border border-gray-300 px-4 py-2">Número de Factura</th>
                        <th class="border border-gray-300 px-4 py-2">Cliente</th>
                        <th class="border border-gray-300 px-4 py-2">Monto Total</th>
                        <th class="border border-gray-300 px-4 py-2">Estado</th>
                        <th class="border border-gray-300 px-4 py-2">Fecha de Emisión</th>
                        <th class="border border-gray-300 px-4 py-2">Fecha de Vencimiento</th>
                        <th class="border border-gray-300 px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($facturas as $factura)
                        <tr class="border border-gray-300 hover:bg-gray-100 transition">
                            <td class="border px-4 py-2 text-center">{{ $factura->numero_factura }}</td>
                            <td class="border px-4 py-2">{{ $factura->cliente->nombre }}</td>
                            <td class="border px-4 py-2">{{ number_format($factura->monto_total, 2) }}</td>
                            <td class="border px-4 py-2 text-center">{{ ucfirst($factura->estado) }}</td>
                            <td class="border px-4 py-2 text-center">{{ \Carbon\Carbon::parse($factura->fecha_emision)->format('d/m/Y') }}</td>
                            <td class="border px-4 py-2 text-center">{{ \Carbon\Carbon::parse($factura->fecha_vencimiento)->format('d/m/Y') }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('facturas.edit', $factura->id) }}" class="text-blue-500 font-semibold hover:underline">Editar</a>
                                <form action="{{ route('facturas.destroy', $factura->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 font-semibold hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6 text-center">
            <a href="{{ route('facturas.create') }}" class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Agregar Factura
            </a>
        </div>
    </div>
@endsection
