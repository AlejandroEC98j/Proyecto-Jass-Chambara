@extends('layouts.app')

@section('title', 'Lista de Facturas')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Facturas Registradas</h1>

        @if(session('success'))
            <p class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</p>
        @endif

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Cliente</th>
                    <th class="border border-gray-300 px-4 py-2">Fecha</th>
                    <th class="border border-gray-300 px-4 py-2">Monto</th>
                    <th class="border border-gray-300 px-4 py-2">Estado</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($facturas as $factura)
                    <tr class="border border-gray-300">
                        <td class="border px-4 py-2">{{ $factura->cliente->nombre }}</td>
                        <td class="border px-4 py-2">{{ $factura->fecha }}</td>
                        <td class="border px-4 py-2">{{ $factura->monto }}</td>
                        <td class="border px-4 py-2">{{ $factura->estado }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('facturas.edit', $factura) }}" class="text-blue-500">Editar</a>
                            <form action="{{ route('facturas.destroy', $factura) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('facturas.create') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Agregar Factura</a>
    </div>
@endsection
