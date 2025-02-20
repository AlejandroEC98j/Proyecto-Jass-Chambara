@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-cyan-600">
            {{ __('Editar Cliente') }}
        </h2>

        <form action="{{ route('clientes.update', $cliente) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            @foreach ([
                'nombre' => 'Nombre',
                'direccion' => 'Dirección',
                'telefono' => 'Teléfono',
                'correo' => 'Correo Electrónico'
            ] as $field => $label)
                <div>
                    <x-input-label for="{{ $field }}" :value="__($label)" />
                    <x-text-input id="{{ $field }}" 
                                  class="block mt-1 w-full p-3 border border-cyan-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                  type="{{ $field == 'correo' ? 'email' : 'text' }}" 
                                  name="{{ $field }}" 
                                  :value="old($field, $cliente->$field)" 
                                  required />
                    <x-input-error :messages="$errors->get($field)" class="mt-2" />
                </div>
            @endforeach

            <div class="flex justify-between mt-6">
                <a href="{{ route('clientes.index') }}" 
                   class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    {{ __('Cancelar') }}
                </a>
                <x-primary-button class="bg-cyan-600 text-white py-2 px-4 rounded-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    {{ __('Actualizar Cliente') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection
