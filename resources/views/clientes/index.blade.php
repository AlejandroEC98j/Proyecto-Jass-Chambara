@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Clientes Registrados</h1>

        @if(session('success'))
            <p class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</p>
        @endif

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
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
                    <tr class="border border-gray-300">
                        <td class="border px-4 py-2">{{ $cliente->id }}</td>
                        <td class="border px-4 py-2">{{ $cliente->nombre }}</td>
                        <td class="border px-4 py-2">{{ $cliente->direccion }}</td>
                        <td class="border px-4 py-2">{{ $cliente->telefono }}</td>
                        <td class="border px-4 py-2">{{ $cliente->correo }}</td>
                        <td class="border px-4 py-2">{{ $cliente->tipo_contrato }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="text-blue-500">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('clientes.create') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Agregar Cliente</a>
    </div>
@endsection
