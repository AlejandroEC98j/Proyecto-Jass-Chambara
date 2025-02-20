@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Pago</h1>

    <!-- Formulario para registrar el pago -->
    <form action="{{ route('pagos.store') }}" method="POST">
        @csrf

        <!-- Campo de monto pagado -->
        <div class="row mb-3">
            <label for="monto_pagado" class="col-sm-2 col-form-label">Monto Pagado</label>
            <div class="col-sm-10">
                <input type="number" name="monto_pagado" class="form-control" id="monto_pagado" required>
                <div class="invalid-feedback">
                    Por favor, ingresa un monto válido.
                </div>
            </div>
        </div>

        <!-- Campo de fecha de pago -->
        <div class="row mb-3">
            <label for="fecha_pago" class="col-sm-2 col-form-label">Fecha de Pago</label>
            <div class="col-sm-10">
                <input type="date" name="fecha_pago" class="form-control" id="fecha_pago" required>
                <div class="invalid-feedback">
                    Por favor, selecciona una fecha válida.
                </div>
            </div>
        </div>

        <!-- Campo de factura_id (oculto) -->
        <input type="hidden" name="factura_id" value="{{ $factura->id }}">

        <!-- Botón de enviar -->
        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Registrar Pago</button>
            </div>
        </div>
    </form>

    <br>
    <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Volver al listado de pagos</a>
</div>
@endsection
