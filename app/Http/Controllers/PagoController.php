<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Factura;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    // Método para mostrar la lista de pagos
    public function index()
    {
        // Obtener todos los pagos registrados
        $pagos = Pago::all();

        // Pasar los pagos a la vista
        return view('pagos.index', compact('pagos'));
    }

    // Mostrar el formulario para registrar un pago
    public function create($factura_id)
    {
        // Obtener la factura asociada al pago
        $factura = Factura::findOrFail($factura_id);

        // Pasar la factura a la vista
        return view('pagos.create', compact('factura'));
    }

    // Almacenar el pago
    public function store(Request $request)
    {
        // Validar los datos del pago
        $request->validate([
            'factura_id' => 'required|exists:facturas,id', // Validación de la factura
            'monto_pagado' => 'required|numeric', // Validación del monto
            'fecha_pago' => 'required|date', // Validación de la fecha
        ]);

        // Crear el pago
        Pago::create([
            'factura_id' => $request->factura_id,
            'monto_pagado' => $request->monto_pagado,
            'fecha_pago' => $request->fecha_pago,
        ]);

        // Redirigir al listado de pagos con mensaje de éxito
        return redirect()->route('pagos.index')->with('success', 'Pago registrado exitosamente.');
    }
}
