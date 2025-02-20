<!-- resources/views/pagos/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Pago</h1>
        <div>
            <p><strong>ID:</strong> {{ $pago->id }}</p>
            <p><strong>Factura:</strong> {{ $pago->factura->numero_factura }}</p>
            <p><strong>Monto Pagado:</strong> {{ $pago->monto_pagado }}</p>
            <p><strong>Fecha de Pago:</strong> {{ $pago->fecha_pago }}</p>
        </div>
        <a href="{{ route('pagos.index') }}" class="btn btn-primary">Volver a la lista de pagos</a>
    </div>
@endsection
