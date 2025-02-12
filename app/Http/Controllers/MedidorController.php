<?php

namespace App\Http\Controllers;

use App\Models\Medidor;
use App\Models\Cliente;
use Illuminate\Http\Request;

class MedidorController extends Controller
{
    public function index()
    {
        $medidores = Medidor::with('cliente')->get();
        return view('medidores.index', compact('medidores'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('medidores.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'codigo_medidor' => 'required|unique:medidores',
            'lectura_actual' => 'required|numeric'
        ]);

        Medidor::create($request->all());
        return redirect()->route('medidores.index')->with('success', 'Medidor agregado.');
    }

    public function edit(Medidor $medidor)
    {
        $clientes = Cliente::all();
        return view('medidores.edit', compact('medidor', 'clientes'));
    }

    public function update(Request $request, Medidor $medidor)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'codigo_medidor' => 'required|unique:medidores,codigo_medidor,' . $medidor->id,
            'lectura_actual' => 'required|numeric'
        ]);

        $medidor->update($request->all());
        return redirect()->route('medidores.index')->with('success', 'Medidor actualizado.');
    }

    public function destroy(Medidor $medidor)
    {
        $medidor->delete();
        return redirect()->route('medidores.index')->with('success', 'Medidor eliminado.');
    }
}
