<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobante de Pago</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { width: 100%; max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .header { text-align: center; border-bottom: 2px solid #007bff; padding-bottom: 10px; }
        .header h2 { color: #007bff; margin: 0; }
        .jass-info { text-align: center; font-size: 14px; color: #555; margin-top: 5px; }
        .details { margin-top: 20px; }
        .details p { margin: 8px 0; font-size: 16px; }
        .details strong { color: #333; }
        .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #777; }
        .highlight { background: #007bff; color: white; padding: 5px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Comprobante de Pago</h2>
            <p class="jass-info">JASS UÑAS - Huancayo, Perú</p>
        </div>
        <div class="details">
            <p><strong>Cliente:</strong> {{ $pago->factura->cliente->nombre }}</p>
            <p><strong>DNI:</strong> {{ $pago->factura->cliente->dni }}</p>
            <p><strong>Factura:</strong> <span class="highlight">{{ $pago->factura->numero_factura }}</span></p>
            <p><strong>Monto Pagado:</strong> {{ number_format($pago->monto_pagado, 2) }} PEN</p>
            <p><strong>Fecha de Pago:</strong> {{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</p>
            <p><strong>Método de Pago:</strong> {{ $pago->metodo_pago ?? 'Efectivo' }}</p>
        </div>
        <div class="footer">
            <p>Gracias por su pago. <br> JASS UÑAS - Comprometidos con el servicio de agua potable.</p>
        </div>
    </div>
</body>
</html>
