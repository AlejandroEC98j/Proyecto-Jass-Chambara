@extends('layouts.app')

@section('title', 'Editar Medidor')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Editar Medidor</h1>

        <form action="{{ route('medidores.update', $medidor) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Número de Serie</label>
                <input type="text" name="numero_serie" value="{{ $medidor->numero_serie }}" class="w-full border px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Cliente</label>
                <select name="cliente_id" class="w-full border px-3 py-2">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $medidor->cliente_id == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Ubicación</label>
                <input type="text" name="ubicacion" value="{{ $medidor->ubicacion }}" class="w-full border px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Estado</label>
                <select name="estado" class="w-full border px-3 py-2">
                    <option value="Activo" {{ $medidor->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ $medidor->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
        </form>
    </div>
@endsection
