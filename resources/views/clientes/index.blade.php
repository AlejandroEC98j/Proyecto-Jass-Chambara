@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center">Clientes Registrados</h1>

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
                        <th class="border border-gray-300 px-4 py-2">Nombre</th>
                        <th class="border border-gray-300 px-4 py-2">Dirección</th>
                        <th class="border border-gray-300 px-4 py-2">Teléfono</th>
                        <th class="border border-gray-300 px-4 py-2">Correo</th>
                        <th class="border border-gray-300 px-4 py-2">Tipo de Contrato</th>
                        <th class="border border-gray-300 px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr class="border border-gray-300 hover:bg-gray-100 transition">
                            <td class="border px-4 py-2 text-center">{{ $cliente->id }}</td>
                            <td class="border px-4 py-2">{{ $cliente->nombre }}</td>
                            <td class="border px-4 py-2">{{ $cliente->direccion }}</td>
                            <td class="border px-4 py-2 text-center">{{ $cliente->telefono }}</td>
                            <td class="border px-4 py-2">{{ $cliente->correo }}</td>
                            <td class="border px-4 py-2 text-center">{{ $cliente->tipo_contrato }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="text-blue-500 font-semibold hover:underline">Editar</a>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline-block ml-2">
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
            <a href="{{ route('clientes.create') }}" class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Agregar Cliente
            </a>
        </div>
    </div>
@endsection
