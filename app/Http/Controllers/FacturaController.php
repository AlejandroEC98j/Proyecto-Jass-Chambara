<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::with('cliente')->get();
        return view('facturas.index', compact('facturas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('facturas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_emision' => 'required|date',
            'monto' => 'required|numeric',
            'estado' => 'required'
        ]);

        Factura::create($request->all());
        return redirect()->route('facturas.index')->with('success', 'Factura generada.');
    }

    public function edit(Factura $factura)
    {
        $clientes = Cliente::all();
        return view('facturas.edit', compact('factura', 'clientes'));
    }

    public function update(Request $request, Factura $factura)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_emision' => 'required|date',
            'monto' => 'required|numeric',
            'estado' => 'required'
        ]);

        $factura->update($request->all());
        return redirect()->route('facturas.index')->with('success', 'Factura actualizada.');
    }

    public function destroy(Factura $factura)
    {
        $factura->delete();
        return redirect()->route('facturas.index')->with('success', 'Factura eliminada.');
    }
}
