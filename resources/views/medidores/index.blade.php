@extends('layouts.app')

@section('title', 'Lista de Medidores')

@section('content')
<div class="max-w-7xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-100">
    <!-- Header with decorative elements -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Gestión de Medidores</h1>
        <div class="w-24 h-1 bg-gradient-to-r from-cyan-400 to-teal-400 mx-auto mb-4"></div>
        <p class="text-gray-600">Sistema de Administración JASS Chambara</p>
    </div>

    <!-- Meter Table -->
    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-cyan-500 to-teal-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Número de Serie</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Cliente</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($medidores as $medidor)
                <tr class="hover:bg-gray-50 transition duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $medidor->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $medidor->numero_serie }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $medidor->cliente->nombre ?? 'No asignado' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $medidor->estado == 'Activo' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $medidor->estado == 'Inactivo' ? 'bg-gray-100 text-gray-800' : '' }}
                            {{ $medidor->estado == 'Mantenimiento' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $medidor->estado == 'Dañado' ? 'bg-red-100 text-red-800' : '' }}">
                            {{ $medidor->estado }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('medidores.edit', $medidor->id) }}" 
                               class="text-cyan-600 hover:text-cyan-800 transition duration-200 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Editar
                            </a>
                            <form action="{{ route('medidores.destroy', $medidor->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-800 transition duration-200 flex items-center"
                                        onclick="return confirm('¿Está seguro de eliminar este medidor?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Meter Button -->
    <div class="mt-8 text-center">
        <a href="{{ route('medidores.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-cyan-500 to-teal-500 hover:from-cyan-600 hover:to-teal-600 text-white rounded-lg shadow-sm transition duration-200 focus:outline-none focus:ring-2 focus:ring-cyan-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
            </svg>
            Agregar Nuevo Medidor
        </a>
    </div>
</div>
@endsection