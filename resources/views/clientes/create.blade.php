@extends('layouts.app')

@section('title', 'Nuevo Cliente')

@section('content')

    <!-- Contenedor principal -->
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-cyan-600 mb-6">{{ __('Nuevo Cliente') }}</h2>

        <form action="{{ route('clientes.store') }}" method="POST" class="space-y-4">
            @csrf
            
            @foreach ([
                'nombre' => 'Nombre',
                'direccion' => 'Dirección',
                'telefono' => 'Teléfono',
                'correo' => 'Correo Electrónico'
            ] as $field => $label)
                <div>
                    <x-input-label for="{{ $field }}" :value="__($label)" />
                    <x-text-input id="{{ $field }}" class="block w-full p-3 border border-cyan-300 rounded-md focus:ring-2 focus:ring-cyan-500"
                                  type="{{ $field == 'correo' ? 'email' : 'text' }}" name="{{ $field }}" value="{{ old($field) }}" required />
                    <x-input-error :messages="$errors->get($field)" class="mt-2" />
                </div>
            @endforeach

            <!-- Tipo de Contrato -->
            <div>
                <x-input-label for="tipo_contrato" :value="__('Tipo de Contrato')" />
                <select id="tipo_contrato" name="tipo_contrato" class="block w-full p-3 border border-cyan-300 rounded-md focus:ring-2 focus:ring-cyan-500" required>
                    <option value="con medidor" {{ old('tipo_contrato') == 'con medidor' ? 'selected' : '' }}>{{ __('Con medidor') }}</option>
                    <option value="sin medidor" {{ old('tipo_contrato') == 'sin medidor' ? 'selected' : '' }}>{{ __('Sin medidor') }}</option>
                </select>
                <x-input-error :messages="$errors->get('tipo_contrato')" class="mt-2" />
            </div>

            <!-- Botones de acción -->
            <div class="flex justify-between">
                <!-- Botón de Cancelar -->
                <a href="{{ route('clientes.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 focus:ring-2 focus:ring-gray-400">
                    {{ __('Cancelar') }}
                </a>

                <!-- Botón de Guardar -->
                <x-primary-button class="bg-cyan-600 text-white py-2 px-4 rounded-md hover:bg-cyan-700 focus:ring-2 focus:ring-cyan-500">
                    {{ __('Guardar Cliente') }}
                </x-primary-button>
            </div>
        </form>
    </div>

@endsection
