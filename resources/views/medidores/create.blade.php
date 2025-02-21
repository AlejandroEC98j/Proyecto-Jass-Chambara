@extends('layouts.app')

@section('title', 'Nuevo Medidor')

@section('content')
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-cyan-600 mb-6">{{ __('Nuevo Medidor') }}</h2>

        <form action="{{ route('medidores.store') }}" method="POST" class="space-y-4">
            @csrf

            @foreach ([
                'numero_serie' => 'Número de Serie',
                'monto_a_pagar' => 'Monto a Pagar 💰',
                'direccion' => 'Dirección'
            ] as $field => $label)
                <div>
                    <x-input-label for="{{ $field }}" :value="__($label)" />
                    <x-text-input id="{{ $field }}" class="block w-full p-3 border border-cyan-300 rounded-md focus:ring-2 focus:ring-cyan-500"
                                  type="text" name="{{ $field }}" value="{{ old($field) }}" required />
                    <x-input-error :messages="$errors->get($field)" class="mt-2" />
                </div>
            @endforeach

            <!-- Cliente -->
            <div>
                <x-input-label for="cliente_id" :value="__('Cliente')" />
                <select id="cliente_id" name="cliente_id" class="block w-full p-3 border border-cyan-300 rounded-md focus:ring-2 focus:ring-cyan-500" required>
                    <option value="">{{ __('Seleccione un cliente') }}</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('cliente_id')" class="mt-2" />
            </div>

            <!-- Estado -->
            <div>
                <x-input-label for="estado" :value="__('Estado')" />
                <select id="estado" name="estado" class="block w-full p-3 border border-cyan-300 rounded-md focus:ring-2 focus:ring-cyan-500" required>
                    <option value="Activo">{{ __('Activo') }}</option>
                    <option value="Inactivo">{{ __('Inactivo') }}</option>
                </select>
                <x-input-error :messages="$errors->get('estado')" class="mt-2" />
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('medidores.index') }}" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-400 focus:ring-2 focus:ring-gray-500">
                    ⬅️ {{ __('Cancelar') }}
                </a>
                <x-primary-button class="bg-cyan-600 text-white py-2 px-4 rounded-md hover:bg-cyan-700 focus:ring-2 focus:ring-cyan-500">
                    💾 {{ __('Guardar Medidor') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection
