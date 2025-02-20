@extends('layouts.app')

@section('title', 'Lista de Medidores')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center">Medidores Registrados</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-gray-200">
                    <tr class="text-gray-700">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Número de Serie</th>
                        <th class="border border-gray-300 px-4 py-2">Cliente</th>
                        <th class="border border-gray-300 px-4 py-2">Lectura Actual</th>
                        <th class="border border-gray-300 px-4 py-2">Dirección</th>
                        <th class="border border-gray-300 px-4 py-2">Estado</th>
                        <th class="border border-gray-300 px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medidores as $medidor)
                        <tr class="border border-gray-300 hover:bg-gray-100 transition">
                            <td class="border px-4 py-2 text-center">{{ $medidor->id }}</td>
                            <td class="border px-4 py-2">{{ $medidor->numero_serie }}</td>
                            <td class="border px-4 py-2">{{ $medidor->cliente->nombre }}</td>
                            <td class="border px-4 py-2">{{ $medidor->lectura_actual }}</td>
                            <td class="border px-4 py-2">{{ $medidor->direccion }}</td>
                            <td class="border px-4 py-2 text-center">
                                <span class="px-2 py-1 rounded-md text-white 
                                @if(strtolower(trim($medidor->estado)) === 'activo') bg-green-500 
                                @else bg-red-500 
                                @endif">
                                {{ ucfirst($medidor->estado) }}
                            </span>
                                                     
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('medidores.edit', $medidor->id) }}" 
                                    class="text-blue-500 font-semibold hover:underline">
                                     Editar
                                 </a>
                                    <form action="{{ route('medidores.destroy', $medidor->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 font-semibold hover:underline">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('medidores.create') }}" class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Agregar Medidor
            </a>
        </div>
    </div>
@endsection