@extends('layouts.app')

@section('title', 'Agregar Factura')

@section('content')
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-cyan-600">{{ __('Nueva Factura') }}</h2>

        <form action="{{ route('facturas.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Cliente -->
            <div>
                <x-input-label for="cliente_id" :value="__('Cliente')" />
                <select name="cliente_id" id="cliente_id" class="block mt-1 w-full p-3 border border-cyan-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
                    <option value="">{{ __('Selecciona un Cliente') }}</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('cliente_id')" class="mt-2" />
            </div>

            <!-- Número de Factura -->
            <div>
                <x-input-label for="numero_factura" :value="__('Número de Factura')" />
                <x-text-input id="numero_factura" class="block mt-1 w-full p-3 border border-cyan-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500"
                              type="text" name="numero_factura" :value="old('numero_factura')" required />
                <x-input-error :messages="$errors->get('numero_factura')" class="mt-2" />
            </div>

            <!-- Monto Total -->
            <div>
                <x-input-label for="monto_total" :value="__('Monto Total')" />
                <x-text-input id="monto_total" class="block mt-1 w-full p-3 border border-cyan-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500"
                              type="number" name="monto_total" :value="old('monto_total')" required />
                <x-input-error :messages="$errors->get('monto_total')" class="mt-2" />
            </div>

            <!-- Estado -->
            <div>
                <x-input-label for="estado" :value="__('Estado')" />
                <select name="estado" id="estado" class="block mt-1 w-full p-3 border border-cyan-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
                    <option value="pendiente">{{ __('Pendiente') }}</option>
                    <option value="pagado">{{ __('Pagado') }}</option>
                    <option value="vencido">{{ __('Vencido') }}</option>
                </select>
                <x-input-error :messages="$errors->get('estado')" class="mt-2" />
            </div>

            <!-- Botones -->
            <div class="flex justify-between mt-6">
                <a href="{{ route('facturas.index') }}" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    {{ __('Cancelar') }}
                </a>
                <x-primary-button class="bg-cyan-600 text-white py-2 px-4 rounded-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    {{ __('Guardar Factura') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection
