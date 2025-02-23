@extends('layouts.app')

@section('title', 'Editar Medidor')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-center text-cyan-600 mb-6">Editar Medidor</h2>

    <form action="{{ route('medidores.update', $medidor->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Cliente (Opcional) -->
        <div>
            <x-input-label for="cliente_id" value="Cliente (Opcional)" />
            <select id="cliente_id" name="cliente_id" class="block w-full p-3 border border-cyan-300 rounded-md focus:ring-2 focus:ring-cyan-500">
                <option value="">-- Seleccionar Cliente --</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ old('cliente_id', $medidor->cliente_id) == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nombre }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('cliente_id')" class="mt-2" />
        </div>

        <!-- Campos -->
        @foreach ([
            'numero_serie' => 'Número de Serie',
            'monto_a_pagar' => 'Monto a Pagar 💰',
            'direccion' => 'Dirección'
        ] as $field => $label)
            <div>
                <x-input-label for="{{ $field }}" :value="__($label)" />
                <x-text-input id="{{ $field }}" class="block w-full p-3 border border-cyan-300 rounded-md focus:ring-2 focus:ring-cyan-500"
                              type="text" name="{{ $field }}" value="{{ old($field, $medidor->$field) }}" required />
                <x-input-error :messages="$errors->get($field)" class="mt-2" />
            </div>
        @endforeach

        <!-- Estado -->
        <div>
            <x-input-label for="estado" value="Estado" />
            <select id="estado" name="estado" class="block w-full p-3 border border-cyan-300 rounded-md focus:ring-2 focus:ring-cyan-500" required>
                <option value="Activo" {{ old('estado', $medidor->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ old('estado', $medidor->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                <option value="Mantenimiento" {{ old('estado', $medidor->estado) == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                <option value="Dañado" {{ old('estado', $medidor->estado) == 'Dañado' ? 'selected' : '' }}>Dañado</option>
            </select>
            <x-input-error :messages="$errors->get('estado')" class="mt-2" />
        </div>

        <!-- Botones -->
        <div class="flex justify-between mt-6">
            <a href="{{ route('medidores.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 focus:ring-2 focus:ring-gray-500">
                ⬅️ Cancelar
            </a>
            <x-primary-button class="bg-cyan-600 text-white py-2 px-4 rounded-md hover:bg-cyan-700 focus:ring-2 focus:ring-cyan-500">
                Guardar Cambios
            </x-primary-button>
        </div>
    </form>
</div>
@endsection
