@extends('layouts.app')

@section('title', 'Lista de Medidores')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Medidores Registrados</h1>

        @if(session('success'))
            <p class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</p>
        @endif

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Número de Serie</th>
                    <th class="border border-gray-300 px-4 py-2">Cliente</th>
                    <th class="border border-gray-300 px-4 py-2">Ubicación</th>
                    <th class="border border-gray-300 px-4 py-2">Estado</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medidores as $medidor)
                    <tr class="border border-gray-300">
                        <td class="border px-4 py-2">{{ $medidor->numero_serie }}</td>
                        <td class="border px-4 py-2">{{ $medidor->cliente->nombre }}</td>
                        <td class="border px-4 py-2">{{ $medidor->ubicacion }}</td>
                        <td class="border px-4 py-2">{{ $medidor->estado }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('medidores.edit', $medidor) }}" class="text-blue-500">Editar</a>
                            <form action="{{ route('medidores.destroy', $medidor) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('medidores.create') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Agregar Medidor</a>
    </div>
@endsection
