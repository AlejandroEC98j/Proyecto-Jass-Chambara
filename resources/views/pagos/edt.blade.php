@extends('layouts.app')

@section('title', 'Editar Pago')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">Editar Pago</h1>

        <form action="{{ route('pagos.update', $pago->id) }}" method="POST" class="mt-4 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <label class="block">Cliente:</label>
            <select name="cliente_id" class="border p-2 w-full" required>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $cliente->id == $pago->cliente_id ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                @endforeach
            </select>

            <label class="block mt-4">Monto:</label>
            <input type="number" name="monto" class="border p-2 w-full" value="{{ $pago->monto }}" required>

            <label class="block mt-4">Fecha:</label>
            <input type="date" name="fecha" class="border p-2 w-full" value="{{ $pago->fecha }}" required>

            <label class="block mt-4">Método de Pago:</label>
            <input type="text" name="metodo_pago" class="border p-2 w-full" value="{{ $pago->metodo_pago }}" required>

            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Actualizar Pago</button>
        </form>
    </div>
@endsection
