<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FacturaController extends Controller
{
    // Método para mostrar el formulario de creación de factura
    public function create()
    {
        // Obtener todos los clientes para el formulario
        $clientes = Cliente::all();
        return view('facturas.create', compact('clientes'));
    }

    // Método para almacenar una nueva factura
    public function store(Request $request)
    {
        // Validación de los campos del formulario
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id', // Validar que el cliente exista
            'numero_factura' => 'required|unique:facturas,numero_factura', // Validar que el número de factura sea único
            'monto_total' => 'required|numeric', // Validar que el monto sea numérico
            'estado' => 'required|in:pendiente,pagado,vencido', // Validar que el estado sea uno de los permitidos
        ]);

        // Agregar la fecha de emisión y la fecha de vencimiento automáticamente
        $validated['fecha_emision'] = Carbon::now(); // Fecha de emisión es la actual
        $validated['fecha_vencimiento'] = Carbon::now()->addDays(45); // Fecha de vencimiento es 45 días después

        // Crear la factura en la base de datos
        Factura::create($validated);

        // Redirigir a la página de listado de facturas con un mensaje de éxito
        return redirect()->route('facturas.index')->with('success', 'Factura creada con éxito');
    }

    // Método para editar una factura existente
    public function edit(Factura $factura)
    {
        // Obtener los clientes para el formulario de edición
        $clientes = Cliente::all();
        return view('facturas.edit', compact('factura', 'clientes'));
    }

    // Método para actualizar una factura existente
    public function update(Request $request, Factura $factura)
    {
        // Validación de los campos
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id', // Validar que el cliente exista
            'numero_factura' => 'required|unique:facturas,numero_factura,' . $factura->id, // Validar que el número de factura sea único excepto en esta factura
            'monto_total' => 'required|numeric', // Validar monto
            'estado' => 'required|in:pendiente,pagado,vencido', // Validar estado
        ]);

        // Actualizar los datos de la factura
        $factura->update($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('facturas.index')->with('success', 'Factura actualizada con éxito');
    }

    // Método para eliminar una factura
    public function destroy(Factura $factura)
    {
        // Eliminar la factura
        $factura->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('facturas.index')->with('success', 'Factura eliminada con éxito');
    }

    // Método para listar todas las facturas
    public function index()
    {
        // Obtener todas las facturas
        $facturas = Factura::all();
        return view('facturas.index', compact('facturas'));
    }
}
