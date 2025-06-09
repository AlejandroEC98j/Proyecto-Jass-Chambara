@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <style>
        /* Variables CSS actualizadas */
        :root {
            --primary-color: #0891b2; /* cyan-600 */
            --primary-color-hover: #0e7490; /* cyan-700 */
            --primary-text-color: #07575b; /* texto principal */
            --card-bg-color: #ffffff;
            --card-shadow: rgba(0, 0, 0, 0.1);
            --font-family: 'Poppins', 'Segoe UI', sans-serif; /* Fuente más moderna */
            --secondary-color: #4f46e5; /* Color adicional */
        }

        /* Importar fuente Poppins de Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        /* Aplicar fuente global */
        .dashboard-container {
            font-family: var(--font-family);
            color: var(--primary-text-color);
            line-height: 1.6;
        }

        /* Título principal con mejor jerarquía */
        .dashboard-title {
            color: var(--primary-color);
            font-weight: 600;
            letter-spacing: -0.5px;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }

        .dashboard-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        /* Botones mejorados */
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            transition: all 0.3s ease;
            border: none;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .btn-primary:hover {
            background-color: var(--primary-color-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(8, 145, 178, 0.2);
        }

        /* Tarjetas con efecto hover */
        .card {
            background-color: var(--card-bg-color);
            box-shadow: 0 4px 12px var(--card-shadow);
            border-radius: 12px;
            padding: 1.75rem;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            padding: 1rem;
            border-radius: 50%;
            background-color: rgba(8, 145, 178, 0.1);
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Colores para íconos */
        .text-cyan .card-icon {
            background-color: rgba(8, 145, 178, 0.1);
            color: var(--primary-color);
        }

        .text-green .card-icon {
            background-color: rgba(22, 163, 74, 0.1);
            color: #16a34a;
        }

        .text-red .card-icon {
            background-color: rgba(220, 38, 38, 0.1);
            color: #dc2626;
        }

        .text-purple .card-icon {
            background-color: rgba(124, 58, 237, 0.1);
            color: #7c3aed;
        }

        /* Botones de navegación mejorados */
        .nav-btn {
            padding: 0.85rem 1.75rem;
            border-radius: 8px;
            font-weight: 500;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .nav-btn:hover {
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .nav-btn:focus {
            outline: none;
            ring: 2px solid var(--primary-color);
        }

        /* Filtros mejorados */
        .filters {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .filters select {
            border-radius: 8px;
            padding: 0.65rem 1rem;
            border: 1px solid #e2e8f0;
            font-weight: 500;
            background-color: #f8fafc;
            transition: all 0.2s ease;
            min-width: 150px;
        }

        .filters select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(8, 145, 178, 0.2);
        }

        /* Contenedor principal */
        .dashboard-container {
            background: linear-gradient(to bottom, #f9fbfd, #ffffff);
            border-radius: 16px;
            padding: 2.5rem;
        }

        /* Texto de información */
        .info-text {
            background: rgba(8, 145, 178, 0.05);
            padding: 1.5rem;
            border-radius: 12px;
            border-left: 4px solid var(--primary-color);
            margin-top: 2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-title {
                font-size: 1.75rem;
            }
            
            .nav-btn {
                padding: 0.75rem 1.25rem;
                font-size: 0.85rem;
            }
        }
    </style>

    <div class="max-w-7xl mx-auto dashboard-container p-8 rounded-lg">
        <!-- Título Principal -->
        <div class="text-center">
            <h1 class="dashboard-title text-4xl font-bold inline-block">
                {{ __('Junta Administradora de Servicios de Saneamiento') }}
            </h1>
            <p class="text-xl text-gray-600 mt-2">{{ __('Chambara - Concepción') }}</p>
        </div>

        <!-- Filtros -->
        <div class="filters">
            <select id="yearFilter" class="border p-2 rounded">
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
            </select>
            <select id="monthFilter" class="border p-2 rounded">
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
                
            </select>
            <button id="applyFilter" class="btn-primary cursor-pointer px-6 py-2 rounded-lg">
                <i class="fas fa-filter mr-2"></i> {{ __('Filtrar') }}
            </button>
        </div>

        <!-- Tarjetas de Información -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['title' => 'Clientes', 'count' => $totalClientes, 'color' => 'cyan', 'icon' => 'fa-users'],
                ['title' => 'Medidores', 'count' => $totalMedidores, 'color' => 'green', 'icon' => 'fa-tachometer-alt'],
                ['title' => 'Facturas', 'count' => $totalFacturas, 'color' => 'red', 'icon' => 'fa-file-invoice-dollar'],
                ['title' => 'Pagos', 'count' => $totalPagos, 'color' => 'purple', 'icon' => 'fa-credit-card']
            ] as $card)
                <div class="text-{{ $card['color'] }}">
                    <div class="card">
                        <div class="card-icon">
                            <i class="fas {{ $card['icon'] }}"></i>
                        </div>
                        <h2 class="text-lg font-semibold text-gray-700">{{ $card['title'] }}</h2>
                        <p class="text-3xl font-bold mt-2">{{ $card['count'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Gráficos (sin cambios) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            <div class="card h-[400px] flex flex-col justify-center items-center">
                <h2 class="text-center text-lg font-semibold text-gray-700 mb-3">Consumo Promedio</h2>
                <div class="w-full h-[300px]">
                    <canvas id="consumptionChart"></canvas>
                </div>
            </div>
            <div class="card h-[400px] flex flex-col justify-center items-center">
                <h2 class="text-center text-lg font-semibold text-gray-700 mb-3">Estado de Pagos</h2>
                <div class="w-full h-[300px]">
                    <canvas id="paymentsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Botones de Navegación -->
        <div class="mt-8 text-center space-x-4 space-y-4 sm:space-y-0">
            <a href="{{ route('clientes.index') }}" class="nav-btn bg-cyan-600 text-white hover:bg-cyan-700">
                <i class="fas fa-users"></i> {{ __('Clientes') }}
            </a>
            <a href="{{ route('medidores.index') }}" class="nav-btn bg-green-600 text-white hover:bg-green-700">
                <i class="fas fa-tachometer-alt"></i> {{ __('Medidores') }}
            </a>
            <a href="{{ route('facturas.index') }}" class="nav-btn bg-red-600 text-white hover:bg-red-700">
                <i class="fas fa-file-invoice-dollar"></i> {{ __('Facturas') }}
            </a>
            <a href="{{ route('pagos.index') }}" class="nav-btn bg-purple-600 text-white hover:bg-purple-700">
                <i class="fas fa-credit-card"></i> {{ __('Pagos') }}
            </a>
        </div>

        <!-- Información Adicional -->
        <div class="info-text">
            <p class="text-lg font-semibold text-cyan-600 mb-2">
                <i class="fas fa-tint mr-2"></i>{{ __('Cuidemos el agua. ¡Cada gota cuenta!') }}
            </p>
            <p class="text-gray-600">
                {{ __('JASS Chambara - Proveedor de agua y servicios de saneamiento para nuestra comunidad.') }}
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
                            backgroundColor: 'rgba(8, 145, 178, 0.5)'
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