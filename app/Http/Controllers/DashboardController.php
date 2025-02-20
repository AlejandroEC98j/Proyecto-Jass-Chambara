<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Medidor;
use App\Models\Factura;
use App\Models\Pago;

class DashboardController extends Controller
{
    /**
     * Constructor: Aplica middleware para restringir acceso solo a usuarios autenticados.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra la vista del dashboard con estadísticas generales.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalClientes = Cliente::count();
        $totalMedidores = Medidor::count();
        $totalFacturas = Factura::count();
        $totalPagos = Pago::count();

        return view('dashboard', compact('totalClientes', 'totalMedidores', 'totalFacturas', 'totalPagos'));
    }
}
