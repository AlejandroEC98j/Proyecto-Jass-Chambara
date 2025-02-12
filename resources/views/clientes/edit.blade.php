@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Editar Cliente</h1>

        <form action="{{ route('clientes.update', $cliente) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Nombre</label>
                <input type="text" name="nombre" value="{{ $cliente->nombre }}" class="w-full border px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Dirección</label>
                <input type="text" name="direccion" value="{{ $cliente->direccion }}" class="w-full border px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Teléfono</label>
                <input type="text" name="telefono" value="{{ $cliente->telefono }}" class="w-full border px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Correo</label>
                <input type="email" name="correo" value="{{ $cliente->correo }}" class="w-full border px-3 py-2">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
        </form>
    </div>
@endsection
