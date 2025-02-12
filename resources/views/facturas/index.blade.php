@extends('layouts.app')

@section('title', 'Facturas')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Lista de Facturas</h1>
        <a href="{{ route('facturas.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Agregar Factura</a>

        <table class="mt-4 w-full border-collapse border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Cliente</th>
                    <th class="border px-4 py-2">Fecha</th>
                    <th class="border px-4 py-2">Monto</th>
                    <th class="border px-4 py-2">Estado</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($facturas as $factura)
                <tr>
                    <td class="border px-4 py-2">{{ $factura->cliente->nombre }}</td>
                    <td class="border px-4 py-2">{{ $factura->fecha }}</td>
                    <td class="border px-4 py-2">{{ $factura->monto }}</td>
                    <td class="border px-4 py-2">{{ $factura->estado }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('facturas.edit', $factura) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Editar</a>
                        <form action="{{ route('facturas.destroy', $factura) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
