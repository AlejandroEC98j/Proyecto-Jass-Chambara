<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\Cliente;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with('cliente')->get();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('pagos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'monto' => 'required|numeric|min:0',
            'fecha' => 'required|date',
            'metodo_pago' => 'required|string'
        ]);

        Pago::create($request->all());
        return redirect()->route('pagos.index')->with('success', 'Pago registrado correctamente.');
    }

    public function edit(Pago $pago)
    {
        $clientes = Cliente::all();
        return view('pagos.edit', compact('pago', 'clientes'));
    }

    public function update(Request $request, Pago $pago)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'monto' => 'required|numeric|min:0',
            'fecha' => 'required|date',
            'metodo_pago' => 'required|string'
        ]);

        $pago->update($request->all());
        return redirect()->route('pagos.index')->with('success', 'Pago actualizado correctamente.');
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();
        return redirect()->route('pagos.index')->with('success', 'Pago eliminado correctamente.');
    }
}
