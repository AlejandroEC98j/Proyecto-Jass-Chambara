<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Medidor;
use App\Models\Factura;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalClientes' => Cliente::count(),
            'totalMedidores' => Medidor::count(),
            'totalFacturas' => Factura::count(),
        ]);
    }
}

