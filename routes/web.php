<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MedidorController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\PagoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas de la aplicación. Se agrupan por middleware
| y se organizan para una mejor mantenibilidad.
|
*/

// Página principal
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de Clientes
    Route::resource('clientes', ClienteController::class);
    // Rutas de Medidores
    Route::resource('medidores', MedidorController::class);

    // Rutas de Facturas
    Route::resource('facturas', FacturaController::class);

    // Rutas de Pago
    Route::resource('pagos', PagoController::class)->middleware('auth');
});

// Incluir rutas de autenticación (login, register, etc.)
require __DIR__.'/auth.php';
