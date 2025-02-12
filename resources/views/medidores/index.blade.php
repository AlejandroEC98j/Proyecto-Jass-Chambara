@extends('layouts.app')

@section('title', 'Medidores')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Lista de Medidores</h1>
        <a href="{{ route('medidores.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Agregar Medidor</a>

        <table class="mt-4 w-full border-collapse border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Número de Serie</th>
                    <th class="border px-4 py-2">Cliente</th>
                    <th class="border px-4 py-2">Ubicación</th>
                    <th class="border px-4 py-2">Estado</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medidores as $medidor)
                <tr>
                    <td class="border px-4 py-2">{{ $medidor->numero_serie }}</td>
                    <td class="border px-4 py-2">{{ $medidor->cliente->nombre }}</td>
                    <td class="border px-4 py-2">{{ $medidor->ubicacion }}</td>
                    <td class="border px-4 py-2">{{ $medidor->estado }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('medidores.edit', $medidor) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Editar</a>
                        <form action="{{ route('medidores.destroy', $medidor) }}" method="POST" class="inline">
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
