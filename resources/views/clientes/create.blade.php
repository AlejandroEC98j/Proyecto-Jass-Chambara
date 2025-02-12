@extends('layouts.app')

@section('title', 'Agregar Cliente')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Nuevo Cliente</h1>

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-bold">Nombre</label>
                <input type="text" name="nombre" class="w-full border px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Dirección</label>
                <input type="text" name="direccion" class="w-full border px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Teléfono</label>
                <input type="text" name="telefono" class="w-full border px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Correo Electrónico</label>
                <input type="email" name="correo" class="w-full border px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Tipo de Contrato</label>
                <select name="tipo_contrato" class="w-full border px-3 py-2" required>
                    <option value="con medidor">Con medidor</option>
                    <option value="sin medidor">Sin medidor</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
@endsection
