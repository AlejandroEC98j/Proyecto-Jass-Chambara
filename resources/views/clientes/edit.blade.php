@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-cyan-600">{{ __('Editar Cliente') }}</h2>

        <form action="{{ route('clientes.update', $cliente) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div>
                <x-input-label for="nombre" :value="__('Nombre')" />
                <x-text-input id="nombre" class="block mt-1 w-full p-3 border border-cyan-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500"
                              type="text" name="nombre" :value="old('nombre', $cliente->nombre)" required autofocus />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <!-- Dirección -->
            <div>
                <x-input-label for="direccion" :value="__('Dirección')" />
                <x-text-input id="direccion" class="block mt-1 w-full p-3 border border-cyan-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500"
                              type="text" name="direccion" :value="old('direccion', $cliente->direccion)" required />
                <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
            </div>

            <!-- Teléfono -->
            <div>
                <x-input-label for="telefono" :value="__('Teléfono')" />
                <x-text-input id="telefono" class="block mt-1 w-full p-3 border border-cyan-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500"
                              type="text" name="telefono" :value="old('telefono', $cliente->telefono)" required />
                <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
            </div>

            <!-- Correo Electrónico -->
            <div>
                <x-input-label for="correo" :value="__('Correo Electrónico')" />
                <x-text-input id="correo" class="block mt-1 w-full p-3 border border-cyan-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500"
                              type="email" name="correo" :value="old('correo', $cliente->correo)" required />
                <x-input-error :messages="$errors->get('correo')" class="mt-2" />
            </div>

            <!-- Botones -->
            <div class="flex justify-between mt-6">
                <a href="{{ route('clientes.index') }}" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    {{ __('Cancelar') }}
                </a>
                <x-primary-button class="bg-cyan-600 text-white py-2 px-4 rounded-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    {{ __('Actualizar Cliente') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection