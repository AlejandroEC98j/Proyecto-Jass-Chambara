<?php

namespace App\Http\Controllers;

use App\Models\Medidor;
use App\Models\Cliente;
use Illuminate\Http\Request;

class MedidorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Requiere autenticación
    }

    public function index()
    {
        $medidores = Medidor::with('cliente')->paginate(10);
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
            'cliente_id' => 'nullable|exists:clientes,id',
            'numero_serie' => 'required|string|max:50|unique:medidores,numero_serie',
            'lectura_actual' => 'required|numeric|min:0',
            'estado' => 'required|in:Activo,Inactivo',
            'direccion' => 'required|string|max:255',
        ]);

        Medidor::create($request->only(['cliente_id', 'numero_serie', 'lectura_actual', 'estado', 'direccion']));

        return redirect()->route('medidores.index')->with('success', 'Medidor agregado correctamente.');
    }

    public function edit(Medidor $medidor)
    {
        $clientes = Cliente::all();
        return view('medidores.edit', compact('medidor', 'clientes'));
    }

    public function update(Request $request, Medidor $medidor)
    {
        $request->validate([
            'cliente_id' => 'nullable|exists:clientes,id',
            'numero_serie' => 'required|string|max:50|unique:medidores,numero_serie,' . $medidor->id,
            'lectura_actual' => 'required|numeric|min:0',
            'estado' => 'required|in:Activo,Inactivo',
            'direccion' => 'required|string|max:255',
        ]);

        $medidor->update($request->all());

        return redirect()->route('medidores.index')->with('success', 'Medidor actualizado correctamente.');
    }

    public function destroy(Medidor $medidor)
    {
        $medidor->delete();
        return redirect()->route('medidores.index')->with('success', 'Medidor eliminado correctamente.');
    }
}
