@extends('layouts.app')

@section('title', 'Editar Factura')

@section('content')
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg mt-6">
        <h2 class="text-2xl font-bold text-center text-cyan-600 mb-6">{{ __('Editar Factura') }}</h2>

        <form action="{{ route('facturas.update', $factura->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            @foreach ([
                'cliente_id' => 'Cliente',
                'numero_factura' => 'Número de Factura',
                'monto_total' => 'Monto Total'
            ] as $field => $label)
                <div>
                    <x-input-label for="{{ $field }}" :value="__($label)" />
                    @if ($field === 'cliente_id')
                        <select id="{{ $field }}" name="{{ $field }}" class="block w-full p-3 border border-cyan-300 rounded-md focus:ring-2 focus:ring-cyan-500" required>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ $cliente->id == $factura->$field ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    @else
                        <x-text-input id="{{ $field }}" class="block w-full p-3 border border-cyan-300 rounded-md focus:ring-2 focus:ring-cyan-500"
                                      type="{{ $field == 'monto_total' ? 'number' : 'text' }}" step="0.01" name="{{ $field }}" value="{{ old($field, $factura->$field) }}" required />
                    @endif
                    <x-input-error :messages="$errors->get($field)" class="mt-2" />
                </div>
            @endforeach
            
            <!-- Estado -->
            <div>
                <x-input-label for="estado" :value="__('Estado')" />
                <select id="estado" name="estado" class="block w-full p-3 border border-cyan-300 rounded-md focus:ring-2 focus:ring-cyan-500" required>
                    <option value="pendiente" {{ $factura->estado == 'pendiente' ? 'selected' : '' }}>{{ __('Pendiente') }}</option>
                    <option value="pagado" {{ $factura->estado == 'pagado' ? 'selected' : '' }}>{{ __('Pagado') }}</option>
                    <option value="vencido" {{ $factura->estado == 'vencido' ? 'selected' : '' }}>{{ __('Vencido') }}</option>
                </select>
                <x-input-error :messages="$errors->get('estado')" class="mt-2" />
            </div>
            
            <!-- Fechas -->
            @foreach ([
                'fecha_emision' => 'Fecha de Emisión',
                'fecha_vencimiento' => 'Fecha de Vencimiento'
            ] as $field => $label)
                <div>
                    <x-input-label for="{{ $field }}" :value="__($label)" />
                    <x-text-input id="{{ $field }}" class="block w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-gray-500" type="text" value="{{ $factura->$field->format('Y-m-d') }}" disabled />
                </div>
            @endforeach

            <!-- Botones -->
            <div class="flex justify-between">
                <a href="{{ route('facturas.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 focus:ring-2 focus:ring-gray-400">
                    {{ __('Cancelar') }}
                </a>
                <x-primary-button class="bg-cyan-600 text-white py-2 px-4 rounded-md hover:bg-cyan-700 focus:ring-2 focus:ring-cyan-500">
                    {{ __('Actualizar Factura') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection
