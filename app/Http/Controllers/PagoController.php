<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Factura;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    // Mostrar el formulario para crear un nuevo pago
    public function create($factura_id)
    {
        $factura = Factura::findOrFail($factura_id); // Encuentra la factura asociada
        return view('pagos.create', compact('factura')); // Pasa la factura a la vista
    }

    // Almacenar el pago en la base de datos
    public function store(Request $request)
    {
        // Validación de los campos del formulario
        $request->validate([
            'factura_id' => 'required|exists:facturas,id', // Verifica que la factura exista
            'monto_pagado' => 'required|numeric', // Verifica que el monto sea numérico
            'fecha_pago' => 'required|date', // Verifica que la fecha sea válida
        ]);

        // Crear un nuevo pago en la base de datos
        Pago::create([
            'factura_id' => $request->factura_id,
            'monto_pagado' => $request->monto_pagado,
            'fecha_pago' => $request->fecha_pago,
        ]);

        // Redirige a la lista de pagos o a la vista de facturas con un mensaje de éxito
        return redirect()->route('facturas.index')->with('success', 'Pago registrado correctamente.');
    }
}
