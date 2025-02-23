@extends('layouts.app')

@section('title', 'Lista de Medidores')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-center text-cyan-600 mb-6">Lista de Medidores</h2>

    <!-- Tabla de Medidores -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-cyan-500 text-white">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Número de Serie</th>
                    <th class="border border-gray-300 px-4 py-2">Cliente</th>
                    <th class="border border-gray-300 px-4 py-2">Estado</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medidores as $medidor)
                <tr class="text-center">
                    <td class="border border-gray-300 px-4 py-2">{{ $medidor->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $medidor->numero_serie }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $medidor->cliente->nombre ?? 'No asignado' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $medidor->estado }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('medidores.edit', $medidor->id) }}" class="text-blue-500 hover:underline">✏️ Editar</a>
                        <form action="{{ route('medidores.destroy', $medidor->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Botón "Agregar Medidor" CENTRADO ABAJO -->
    <div class="mt-6 flex justify-center">
        <a href="{{ route('medidores.create') }}" class="bg-cyan-600 text-white py-3 px-6 rounded-md hover:bg-cyan-700 focus:ring-2 focus:ring-cyan-500">
            ➕ Agregar Medidor
        </a>
    </div>
</div>
@endsection
