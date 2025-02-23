@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-7xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <!-- Título Principal -->
        <h1 class="text-3xl font-bold text-center mb-6 text-cyan-600">
            {{ __('Junta Administradora de Servicios de Saneamiento') }}
        </h1>

        <!-- Filtros -->
        <div class="flex flex-wrap justify-center space-x-4 mb-6">
            <select id="yearFilter" class="border p-2 rounded">
                <option value="2024">2024</option>
                <option value="2023">2023</option>
            </select>
            <select id="monthFilter" class="border p-2 rounded">
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
            </select>
            <button id="applyFilter" class="bg-cyan-600 text-white px-4 py-2 rounded hover:bg-cyan-700">Filtrar</button>
        </div>

        <!-- Tarjetas de Información -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['title' => 'Clientes', 'count' => $totalClientes, 'color' => 'cyan', 'icon' => 'fa-users'],
                ['title' => 'Medidores', 'count' => $totalMedidores, 'color' => 'green', 'icon' => 'fa-tachometer-alt'],
                ['title' => 'Facturas', 'count' => $totalFacturas, 'color' => 'red', 'icon' => 'fa-file-invoice-dollar'],
                ['title' => 'Pagos', 'count' => $totalPagos, 'color' => 'purple', 'icon' => 'fa-credit-card']
            ] as $card)
                <div class="bg-white p-6 rounded-lg shadow-md text-center flex flex-col items-center">
                    <div class="text-5xl text-{{ $card['color'] }}-600">
                        <i class="fas {{ $card['icon'] }}"></i>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-700 mt-3">{{ $card['title'] }}</h2>
                    <p class="text-3xl font-bold text-{{ $card['color'] }}-600">{{ $card['count'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- Gráficos -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            <div class="bg-white p-4 rounded-lg shadow-md h-[400px] flex flex-col justify-center items-center">
                <h2 class="text-center text-lg font-semibold text-gray-700 mb-3">Consumo Promedio</h2>
                <div class="w-full h-[300px]">
                    <canvas id="consumptionChart"></canvas>
                </div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md h-[400px] flex flex-col justify-center items-center">
                <h2 class="text-center text-lg font-semibold text-gray-700 mb-3">Estado de Pagos</h2>
                <div class="w-full h-[300px]">
                    <canvas id="paymentsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Botones de Navegación -->
        <div class="mt-8 text-center space-x-4">
            <a href="{{ route('clientes.index') }}" class="bg-cyan-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 transform hover:scale-105 transition-all">
                <i class="fas fa-users"></i> {{ __('Gestionar Clientes') }}
            </a>
            <a href="{{ route('medidores.index') }}" class="bg-green-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transform hover:scale-105 transition-all">
                <i class="fas fa-tachometer-alt"></i> {{ __('Gestionar Medidores') }}
            </a>
            <a href="{{ route('facturas.index') }}" class="bg-red-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transform hover:scale-105 transition-all">
                <i class="fas fa-file-invoice-dollar"></i> {{ __('Gestionar Facturas') }}
            </a>
            <a href="{{ route('pagos.index') }}" class="bg-purple-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 transform hover:scale-105 transition-all">
                <i class="fas fa-credit-card"></i> {{ __('Gestionar Pagos') }}
            </a>
        </div>

        <!-- Información Adicional o Frase -->
        <div class="mt-12 text-center text-gray-600">
            <p class="text-lg font-semibold text-cyan-600">
                {{ __('Cuidemos el agua. ¡Cada gota cuenta!') }}
            </p>
            <p class="mt-4 text-md text-gray-500">
                {{ __('JASS de Uñas - Huancayo, Perú. Proveedor de agua y servicios a la comunidad.') }}
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx1 = document.getElementById('consumptionChart')?.getContext('2d');
            const ctx2 = document.getElementById('paymentsChart')?.getContext('2d');

            if (ctx1) {
                new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: ['Enero', 'Febrero', 'Marzo'],
                        datasets: [{
                            label: 'Consumo Promedio (m³)',
                            data: [50, 70, 60],
                            backgroundColor: 'rgba(0, 150, 255, 0.5)'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: { beginAtZero: true }
                        }
                    }
                });
            }

            if (ctx2) {
                new Chart(ctx2, {
                    type: 'pie',
                    data: {
                        labels: ['Pagado', 'Pendiente'],
                        datasets: [{
                            data: [80, 20],
                            backgroundColor: ['#4CAF50', '#F44336']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            }
        });
    </script>
@endsection
