@extends('layouts.app')

@section('title', 'Editar Medidor')

@section('content')
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-cyan-600">{{ __('Editar Medidor') }}</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-4 text-center">
                <strong>¡Error!</strong> Revisa los campos e intenta nuevamente.
                <ul class="mt-2 text-left">
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
                <input type="text" name="numero_serie" value="{{ old('numero_serie', $medidor->numero_serie) }}" class="w-full border border-gray-300 px-4 py-3 rounded-md focus:ring focus:ring-cyan-300" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Cliente</label>
                <select name="cliente_id" class="w-full border border-gray-300 px-4 py-3 rounded-md focus:ring focus:ring-cyan-300" required>
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
                <input type="number" name="lectura_actual" value="{{ old('lectura_actual', $medidor->lectura_actual) }}" class="w-full border border-gray-300 px-4 py-3 rounded-md focus:ring focus:ring-cyan-300" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion', $medidor->direccion) }}" class="w-full border border-gray-300 px-4 py-3 rounded-md focus:ring focus:ring-cyan-300" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Estado</label>
                <select name="estado" class="w-full border border-gray-300 px-4 py-3 rounded-md focus:ring focus:ring-cyan-300" required>
                    <option value="Activo" {{ old('estado', $medidor->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ old('estado', $medidor->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="mt-6 flex justify-center space-x-4">
                <a href="{{ route('medidores.index') }}" class="bg-gray-500 text-white font-semibold px-6 py-3 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    {{ __('Cancelar') }}
                </a>
                <button type="submit" class="bg-cyan-600 text-white font-semibold px-6 py-3 rounded-md shadow-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    {{ __('Actualizar') }}
                </button>
            </div>
        </form>
    </div>
@endsection
