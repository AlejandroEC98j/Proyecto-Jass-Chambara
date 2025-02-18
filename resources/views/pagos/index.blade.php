@extends('layouts.app')

@section('title', 'Lista de Pagos')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Pagos Realizados</h1>

        @if(session('success'))
            <p class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</p>
        @endif

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Factura</th>
                    <th class="border border-gray-300 px-4 py-2">Fecha</th>
                    <th class="border border-gray-300 px-4 py-2">Monto</th>
                    <th class="border border-gray-300 px-4 py-2">Método</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pagos as $pago)
                    <tr class="border border-gray-300">
                        <td class="border px-4 py-2">{{ $pago->factura->id }}</td>
                        <td class="border px-4 py-2">{{ $pago->fecha }}</td>
                        <td class="border px-4 py-2">{{ $pago->monto }}</td>
                        <td class="border px-4 py-2">{{ $pago->metodo }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('pagos.edit', $pago) }}" class="text-blue-500">Editar</a>
                            <form action="{{ route('pagos.destroy', $pago) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('pagos.create') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Agregar Pago</a>
    </div>
@endsection
