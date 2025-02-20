@extends('layouts.app')

@section('title', 'Registrar Pago')

@section('content')
    <!-- Contenedor principal -->
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg mt-6">
        <h2 class="text-2xl font-bold text-center text-cyan-600 mb-6">{{ __('Registrar Pago') }}</h2>

        <form action="{{ route('pagos.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Selección de factura -->
            <div>
                <x-input-label for="factura_id" :value="__('Número de Factura')" />
                <select id="factura_id" name="factura_id" class="block w-full p-3 border border-cyan-300 rounded-md focus:ring-2 focus:ring-cyan-500" required>
                    <option value="">{{ __('Seleccione una factura') }}</option>
                    @foreach($facturas as $factura)
                        <option value="{{ $factura->id }}" {{ old('factura_id') == $factura->id ? 'selected' : '' }}>
                            {{ $factura->numero_factura }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('factura_id')" class="mt-2" />
            </div>

            <!-- Campos de pago -->
            @foreach ([
                'monto_pagado' => 'Monto Pagado',
                'fecha_pago' => 'Fecha de Pago'
            ] as $field => $label)
                <div>
                    <x-input-label for="{{ $field }}" :value="__($label)" />
                    <x-text-input id="{{ $field }}" class="block w-full p-3 border border-cyan-300 rounded-md focus:ring-2 focus:ring-cyan-500"
                                  type="{{ $field == 'monto_pagado' ? 'number' : 'date' }}" step="0.01" name="{{ $field }}" value="{{ old($field) }}" required />
                    <x-input-error :messages="$errors->get($field)" class="mt-2" />
                </div>
            @endforeach

            <!-- Botones de acción -->
            <div class="flex justify-between">
                <a href="{{ route('pagos.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 focus:ring-2 focus:ring-gray-400">
                    {{ __('Volver al listado de pagos') }}
                </a>
                <x-primary-button class="bg-cyan-600 text-white py-2 px-4 rounded-md hover:bg-cyan-700 focus:ring-2 focus:ring-cyan-500">
                    {{ __('Registrar Pago') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection
