@extends('layouts.app')

@section('title', 'Agregar Medidor')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Nuevo Medidor</h1>

        <form action="{{ route('medidores.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-bold">Número de Serie</label>
                <input type="text" name="numero_serie" class="w-full border px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Cliente</label>
                <select name="cliente_id" class="w-full border px-3 py-2">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Ubicación</label>
                <input type="text" name="ubicacion" class="w-full border px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Estado</label>
                <select name="estado" class="w-full border px-3 py-2">
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
@endsection
