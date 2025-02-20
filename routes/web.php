<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MedidorController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\PagoController;
use Illuminate\Support\Facades\Route;

// Página principal: Redirige al login si no está autenticado
Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard - Protegido por autenticación
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    // Perfil de usuario
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Rutas de gestión de entidades
    Route::resources([
        'clientes'  => ClienteController::class,
        'facturas'  => FacturaController::class,
        'pagos'     => PagoController::class,
    ]);
});

Route::resource('medidores', MedidorController::class)->parameters([
    'medidores' => 'medidor' // Cambia 'medidore' a 'medidor'
]);

// Incluir rutas de autenticación (login, register, etc.)
require __DIR__.'/auth.php';
