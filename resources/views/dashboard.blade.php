@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <style>
        :root {
            --primary-color: #0891b2; /* cyan-600 */
            --primary-light: #ecfeff; /* cyan-50 */
            --primary-dark: #0e7490; /* cyan-700 */
            --secondary-color: #4f46e5; /* indigo-600 */
            --success-color: #16a34a; /* green-600 */
            --warning-color: #d97706; /* amber-600 */
            --danger-color: #dc2626; /* red-600 */
            --text-primary: #1e293b; /* slate-800 */
            --text-secondary: #64748b; /* slate-500 */
            --bg-light: #f8fafc; /* slate-50 */
            --border-color: #e2e8f0; /* slate-200 */
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --rounded-sm: 0.25rem;
            --rounded-md: 0.5rem;
            --rounded-lg: 0.75rem;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        .dashboard {
            font-family: 'Poppins', sans-serif;
            color: var(--text-primary);
            background: linear-gradient(to bottom, var(--bg-light), white);
        }

        /* Header Styles */
        .dashboard-header {
            position: relative;
            padding-bottom: 2rem;
            margin-bottom: 2rem;
        }

        .dashboard-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }

        .org-name {
            font-weight: 700;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.025em;
        }

        .org-location {
            color: var(--text-secondary);
            font-weight: 400;
        }

        /* Card Styles */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: white;
            border-radius: var(--rounded-lg);
            box-shadow: var(--shadow-md);
            padding: 1.75rem;
            transition: var(--transition);
            border: 1px solid var(--border-color);
            text-align: center;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .stat-icon {
            width: 3.5rem;
            height: 3.5rem;
            margin: 0 auto 1rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-count {
            font-size: 2.25rem;
            font-weight: 700;
            line-height: 1;
            margin: 0.5rem 0;
        }

        .stat-title {
            color: var(--text-secondary);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
        }

        /* Chart Container */
        .chart-container {
            background: white;
            border-radius: var(--rounded-lg);
            box-shadow: var(--shadow-md);
            padding: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .chart-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chart-wrapper {
            height: 300px;
            position: relative;
        }

        /* Navigation Buttons */
        .nav-buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2.5rem;
        }

        .nav-btn {
            padding: 0.875rem 1.75rem;
            border-radius: var(--rounded-md);
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
            text-transform: uppercase;
            font-size: 0.875rem;
            letter-spacing: 0.025em;
        }

        .nav-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .nav-btn i {
            font-size: 1rem;
        }

        /* Filter Controls */
        .filter-controls {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .filter-select {
            padding: 0.625rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: var(--rounded-md);
            background-color: white;
            font-size: 0.875rem;
            min-width: 150px;
            transition: var(--transition);
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(8, 145, 178, 0.2);
        }

        .filter-btn {
            background-color: var(--primary-color);
            color: white;
            padding: 0.625rem 1.5rem;
            border-radius: var(--rounded-md);
            font-weight: 500;
            transition: var(--transition);
        }

        .filter-btn:hover {
            background-color: var(--primary-dark);
        }

        /* Info Banner */
        .info-banner {
            background: linear-gradient(to right, rgba(8, 145, 178, 0.1), white);
            border-left: 4px solid var(--primary-color);
            padding: 1.5rem;
            border-radius: var(--rounded-md);
            margin-top: 2rem;
        }

        .info-title {
            font-weight: 600;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .info-text {
            color: var(--text-secondary);
            font-size: 0.9375rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .nav-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .nav-btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="max-w-7xl mx-auto dashboard p-6 md:p-8">
        <!-- Header Section -->
        <div class="dashboard-header text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">
                <span class="org-name">JUNTA ADMINISTRADORA DE SERVICIOS DE SANEAMIENTO</span>
            </h1>
            <p class="org-location text-lg md:text-xl">Chambara - Concepción</p>
        </div>

        <!-- Filter Controls -->
        <div class="filter-controls">
            <select id="yearFilter" class="filter-select">
                <option value="">Seleccionar año</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
            </select>
            
            <select id="monthFilter" class="filter-select">
                <option value="">Seleccionar mes</option>
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
            
            <button id="applyFilter" class="filter-btn">
                <i class="fas fa-filter mr-2"></i> Filtrar
            </button>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <!-- Clientes Card -->
            <div class="stat-card">
                <div class="stat-icon" style="background-color: rgba(8, 145, 178, 0.1); color: var(--primary-color);">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-count text-cyan-600">{{ $totalClientes }}</div>
                <div class="stat-title">Clientes Registrados</div>
            </div>
            
            <!-- Medidores Card -->
            <div class="stat-card">
                <div class="stat-icon" style="background-color: rgba(22, 163, 74, 0.1); color: var(--success-color);">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <div class="stat-count text-green-600">{{ $totalMedidores }}</div>
                <div class="stat-title">Medidores Activos</div>
            </div>
            
            <!-- Facturas Card -->
            <div class="stat-card">
                <div class="stat-icon" style="background-color: rgba(220, 38, 38, 0.1); color: var(--danger-color);">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <div class="stat-count text-red-600">{{ $totalFacturas }}</div>
                <div class="stat-title">Facturas Emitidas</div>
            </div>
            
            <!-- Pagos Card -->
            <div class="stat-card">
                <div class="stat-icon" style="background-color: rgba(124, 58, 237, 0.1); color: var(--secondary-color);">
                    <i class="fas fa-credit-card"></i>
                </div>
                <div class="stat-count text-indigo-600">{{ $totalPagos }}</div>
                <div class="stat-title">Pagos Registrados</div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Consumo Chart -->
            <div class="chart-container">
                <h3 class="chart-title">
                    <i class="fas fa-chart-bar mr-2"></i> Consumo Promedio (m³)
                </h3>
                <div class="chart-wrapper">
                    <canvas id="consumptionChart"></canvas>
                </div>
            </div>
            
            <!-- Pagos Chart -->
            <div class="chart-container">
                <h3 class="chart-title">
                    <i class="fas fa-chart-pie mr-2"></i> Estado de Pagos
                </h3>
                <div class="chart-wrapper">
                    <canvas id="paymentsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="nav-buttons">
            <a href="{{ route('clientes.index') }}" class="nav-btn bg-cyan-600 text-white hover:bg-cyan-700">
                <i class="fas fa-users"></i> Clientes
            </a>
            <a href="{{ route('medidores.index') }}" class="nav-btn bg-green-600 text-white hover:bg-green-700">
                <i class="fas fa-tachometer-alt"></i> Medidores
            </a>
            <a href="{{ route('facturas.index') }}" class="nav-btn bg-red-600 text-white hover:bg-red-700">
                <i class="fas fa-file-invoice-dollar"></i> Facturas
            </a>
            <a href="{{ route('pagos.index') }}" class="nav-btn bg-purple-600 text-white hover:bg-purple-700">
                <i class="fas fa-credit-card"></i> Pagos
            </a>
        </div>

        <!-- Info Banner -->
        <div class="info-banner">
            <h4 class="info-title">
                <i class="fas fa-tint"></i> Cuidemos el agua. ¡Cada gota cuenta!
            </h4>
            <p class="info-text">
                JASS Chambara - Proveedor de agua y servicios de saneamiento para nuestra comunidad.
                Reporte cualquier fuga o anomalía en el suministro.
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Consumption Chart
            const consumptionCtx = document.getElementById('consumptionChart')?.getContext('2d');
            if (consumptionCtx) {
                new Chart(consumptionCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Consumo (m³)',
                            data: [35, 42, 38, 45, 50, 48],
                            backgroundColor: 'rgba(8, 145, 178, 0.7)',
                            borderColor: 'rgba(8, 145, 178, 1)',
                            borderWidth: 1,
                            borderRadius: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return ` ${context.parsed.y} m³`;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Metros Cúbicos (m³)'
                                }
                            }
                        }
                    }
                });
            }

            // Payments Chart
            const paymentsCtx = document.getElementById('paymentsChart')?.getContext('2d');
            if (paymentsCtx) {
                new Chart(paymentsCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Pagados', 'Pendientes', 'Vencidos'],
                        datasets: [{
                            data: [75, 15, 10],
                            backgroundColor: [
                                'rgba(22, 163, 74, 0.7)',
                                'rgba(234, 179, 8, 0.7)',
                                'rgba(220, 38, 38, 0.7)'
                            ],
                            borderColor: [
                                'rgba(22, 163, 74, 1)',
                                'rgba(234, 179, 8, 1)',
                                'rgba(220, 38, 38, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return ` ${context.parsed}%`;
                                    }
                                }
                            }
                        },
                        cutout: '70%'
                    }
                });
            }

            // Filter functionality
            document.getElementById('applyFilter')?.addEventListener('click', function() {
                const year = document.getElementById('yearFilter').value;
                const month = document.getElementById('monthFilter').value;
                
                // Aquí iría la lógica para actualizar los datos con el filtro
                console.log(`Filtrar por año: ${year}, mes: ${month}`);
                // Podrías hacer una petición AJAX para actualizar los datos
            });
        });
    </script>
@endsection