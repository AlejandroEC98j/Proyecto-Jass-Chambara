@extends('layouts.app')

@section('title', 'Agregar Factura')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Nueva Factura</h1>

        <form action="{{ route('facturas.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-bold">Cliente</label>
                <select name="cliente_id" class="w-full border px-3 py-2">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Fecha</label>
                <input type="date" name="fecha" class="w-full border px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Monto</label>
                <input type="number" name="monto" class="w-full border px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Estado</label>
                <select name="estado" class="w-full border px-3 py-2">
                    <option value="Pendiente">Pendiente</option>
                    <option value="Pagado">Pagado</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
@endsection
