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
        // Obtener todas las facturas vencidas
        $facturasVencidas = Factura::where('estado', 'vencido')->get();

        // Obtener los pagos por mes (esto es solo un ejemplo, ajusta según tu lógica)
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril'];  // Ejemplo de meses
        $pagosPorMes = [100, 150, 120, 80];  // Ejemplo de pagos por mes

        return view('dashboard', [
            'totalClientes' => Cliente::count(),
            'totalMedidores' => Medidor::count(),
            'totalFacturas' => Factura::count(),
            'totalPagos' => Pago::count(),
            'facturasVencidas' => $facturasVencidas, // Se pasa la variable a la vista
            'meses' => $meses,  // Pasa los meses a la vista
            'pagosPorMes' => $pagosPorMes,  // Pasa los pagos por mes a la vista
        ]);
    }
}
