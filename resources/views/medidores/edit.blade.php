@extends('layouts.app')

@section('title', 'Editar Medidor')

@section('content')
    <div class="bg-white p-6 rounded shadow-md max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Editar Medidor</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                <strong>¡Error!</strong> Revisa los campos e intenta nuevamente.
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('medidores.update', $medidor->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium text-gray-700">Número de Serie</label>
                <input type="text" name="numero_serie" value="{{ old('numero_serie', $medidor->numero_serie) }}" class="w-full border border-gray-300 px-4 py-2 rounded focus:ring focus:ring-blue-200" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Cliente</label>
                <select name="cliente_id" class="w-full border border-gray-300 px-4 py-2 rounded focus:ring focus:ring-blue-200" required>
                    <option value="">Seleccione un cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ old('cliente_id', $medidor->cliente_id) == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Lectura Actual</label>
                <input type="number" name="lectura_actual" value="{{ old('lectura_actual', $medidor->lectura_actual) }}" class="w-full border border-gray-300 px-4 py-2 rounded focus:ring focus:ring-blue-200" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion', $medidor->direccion) }}" class="w-full border border-gray-300 px-4 py-2 rounded focus:ring focus:ring-blue-200" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Estado</label>
                <select name="estado" class="w-full border border-gray-300 px-4 py-2 rounded focus:ring focus:ring-blue-200" required>
                    <option value="Activo" {{ old('estado', $medidor->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ old('estado', $medidor->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('medidores.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancelar</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
