<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobante de Pago</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; }
        h2 { text-align: center; color: #2c3e50; }
        .details { margin-top: 20px; }
        .details p { margin: 5px 0; }
        .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Comprobante de Pago</h2>
        <div class="details">
            <p><strong>Cliente:</strong> {{ $pago->factura->cliente->nombre }}</p>
            <p><strong>Número de Factura:</strong> {{ $pago->factura->numero_factura }}</p>
            <p><strong>Monto Pagado:</strong> {{ number_format($pago->monto_pagado, 2) }} PEN</p>
            <p><strong>Fecha de Pago:</strong> {{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</p>
        </div>
        <div class="footer">
            <p>Gracias por su pago.</p>
        </div>
    </div>
</body>
</html>
