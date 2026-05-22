<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "autos";

$conn = new mysqli($servername, $username, $password, $dbname);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced South Central</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        .panel_contenedor {
            width: 100%;
            display: flex;
            flex-direction: row;
        }

        .panel_datos {
            height: 87.3dvh;
            flex: 4;
        }

        /*-----------------------------------------------------------*/
        .stats_dashboard {
            padding: 24px;
            box-sizing: border-box;
            background-color: #f8f9fa;
            height: 100%;
            overflow-y: auto;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .stats_header {
            margin-bottom: 24px;
        }

        .stats_header h2 {
            margin: 0;
            font-size: 24px;
            color: #212529;
        }

        .stats_header p {
            margin: 4px 0 0 0;
            color: #6c757d;
            font-size: 14px;
        }

        /* Contenedores de Tarjetas de Resumen (KPIs) */
        .cards_grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 24px;
        }

        .stat_card {
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            border: 1px solid #dee2e6;
        }

        .stat_card h3 {
            margin: 0 0 8px 0;
            font-size: 14px;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat_card .number {
            font-size: 28px;
            font-weight: bold;
            color: #212529;
            margin: 0;
        }

        /* Contenedores de Gráficos */
        .charts_grid_top {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 20px;
            margin-bottom: 24px;
        }

        .charts_grid_bottom {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .chart_card {
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            border: 1px solid #dee2e6;
            min-height: 320px;
            display: flex;
            flex-direction: column;
        }

        .chart_card h3 {
            margin: 0 0 16px 0;
            font-size: 16px;
            color: #495057;
            border-bottom: 1px solid #f1f3f5;
            padding-bottom: 10px;
        }

        .chart_container {
            position: relative;
            flex: 1;
            width: 100%;
            height: 100%;
        }
    </style>

</head>

<body>

    <?php include '../topbar.php'; ?>

    <div class="panel_contenedor">

        <?php include '../admin/siderbar.php'; ?>

        <section class="panel_datos">

            <div class="stats_dashboard">
                <div class="stats_header">
                    <h2>Panel de Estadísticas</h2>
                    <p>Resumen visual del rendimiento de inventario y ventas.</p>
                </div>

                <div class="cards_grid">
                    <div class="stat_card">
                        <h3>Total Productos</h3>
                        <p class="number">1,240</p>
                    </div>
                    <div class="stat_card">
                        <h3>Productos Activos</h3>
                        <p class="number" style="color: #2b8a3e;">1,150</p>
                    </div>
                    <div class="stat_card">
                        <h3>Productos Inactivos</h3>
                        <p class="number" style="color: #c92a2a;">90</p>
                    </div>
                    <div class="stat_card">
                        <h3>Ventas del Mes</h3>
                        <p class="number" style="color: #1c7ed6;">342</p>
                    </div>
                </div>

                <div class="charts_grid_top">
                    <div class="chart_card">
                        <h3>Top 5 Productos más Vendidos</h3>
                        <div class="chart_container">
                            <canvas id="chartProductos"></canvas>
                        </div>
                    </div>

                    <div class="chart_card">
                        <h3>Top 5 Marcas más Vendidas</h3>
                        <div class="chart_container">
                            <canvas id="chartMarcas"></canvas>
                        </div>
                    </div>
                </div>

                <div class="charts_grid_bottom">
                    <div class="chart_card">
                        <h3>Estado del Inventario (Activos vs Inactivos)</h3>
                        <div class="chart_container" style="max-height: 260px;">
                            <canvas id="chartActivos"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        };

        // 1. Gráfico Top 5 Productos (Barras Horizontales)
        new Chart(document.getElementById('chartProductos'), {
            type: 'bar',
            data: {
                labels: ['Producto A', 'Producto B', 'Producto C', 'Producto D', 'Producto E'],
                datasets: [{
                    label: 'Unidades Vendidas',
                    data: [150, 120, 105, 90, 75],
                    backgroundColor: '#3b82f6',
                    borderRadius: 4
                }]
            },
            options: {
                ...chartOptions,
                indexAxis: 'y'
            }
        });

        // 2. Gráfico Top 5 Marcas (Barras Verticales)
        new Chart(document.getElementById('chartMarcas'), {
            type: 'bar',
            data: {
                labels: ['Marca v', 'Marca W', 'Marca X', 'Marca Y', 'Marca Z'],
                datasets: [{
                    label: 'Ventas por Marca',
                    data: [420, 380, 290, 210, 150],
                    backgroundColor: '#10b981',
                    borderRadius: 4
                }]
            },
            options: chartOptions
        });

        // 3. Gráfico de Activos vs Inactivos (Dona / Pie)
        new Chart(document.getElementById('chartActivos'), {
            type: 'doughnut',
            data: {
                labels: ['Activos', 'Inactivos'],
                datasets: [{
                    data: [1150, 90],
                    backgroundColor: ['#2b8a3e', '#c92a2a'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right'
                    }
                }
            }
        });
    </script>
</body>

</html>