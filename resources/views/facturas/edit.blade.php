@extends('layouts.app')

@section('title', 'Editar Factura')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center">Editar Factura</h1>

        <form action="{{ route('facturas.update', $factura->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Cliente -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Cliente</label>
                <select name="cliente_id" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $cliente->id == $factura->cliente_id ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Número de factura -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Número de Factura</label>
                <input type="text" name="numero_factura" value="{{ $factura->numero_factura }}" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Monto total -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Monto Total</label>
                <input type="number" name="monto_total" value="{{ $factura->monto_total }}" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required step="0.01">
            </div>

            <!-- Estado -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Estado</label>
                <select name="estado" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="pendiente" {{ $factura->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="pagado" {{ $factura->estado == 'pagado' ? 'selected' : '' }}>Pagado</option>
                    <option value="vencido" {{ $factura->estado == 'vencido' ? 'selected' : '' }}>Vencido</option>
                </select>
            </div>

            <!-- Fecha de emisión -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Fecha de Emisión</label>
                <input type="text" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $factura->fecha_emision->format('Y-m-d') }}" disabled>
            </div>

            <!-- Fecha de vencimiento -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Fecha de Vencimiento</label>
                <input type="text" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $factura->fecha_vencimiento->format('Y-m-d') }}" disabled>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                Actualizar Factura
            </button>
        </form>
    </div>
@endsection
