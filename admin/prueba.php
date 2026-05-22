<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "autos";

$conn = new mysqli($servername, $username, $password, $dbname);

// --- PROCESAMIENTO DEL FORMULARIO ---
$mensaje_alerta = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'subir') {
    $marca = $conn->real_escape_string($_POST['marca']);
    $modelo = $conn->real_escape_string($_POST['modelo']);
    $precio = $conn->real_escape_string($_POST['precio']);
    $anio = $conn->real_escape_string($_POST['anio']);
    
    $sql = "INSERT INTO autos (marca, modelo, precio, anio) VALUES ('$marca', '$modelo', '$precio', '$anio')";
    
    if ($conn->query($sql) === TRUE) {
        $mensaje_alerta = "<div class='alert success'>¡Vehículo registrado con éxito!</div>";
    } else {
        $mensaje_alerta = "<div class='alert error'>Error al registrar: " . $conn->error . "</div>";
    }
}

// --- CONSULTA DE ESTADÍSTICAS ---
$total_autos = 0;
$res = $conn->query("SELECT COUNT(*) as total FROM autos");
if($res) { 
    $row = $res->fetch_assoc(); 
    $total_autos = $row['total']; 
}

// Métricas de ejemplo que puedes automatizar después
$nuevos_ingresos = 12; 
$visitas_totales = 1420; 

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced South Central</title>
    <link rel="stylesheet" href="styles.css">

    <!-- Iconos y Gráficos Modernos via CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* CONFIGURACIÓN Y VARIABLES DEL PANEL */
        :root {
            --bg-admin: #f8fafc;
            --bg-sidebar: #0f172a;
            --bg-card: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --border-color: #e2e8f0;
            --radius: 12px;
        }

        /* Contenedor General del Área de Administración */
        .admin-dashboard {
            display: flex;
            background-color: var(--bg-admin);
            color: var(--text-main);
            min-height: calc(100vh - 60px); /* Ajustado por si tu topbar mide aprox 60px */
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        /* BARRA LATERAL */
        .sidebar {
            width: 260px;
            background-color: var(--bg-sidebar);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            padding: 2rem 1.5rem;
        }

        .sidebar-brand h2 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 2.5rem;
            background: linear-gradient(to right, #6366f1, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: #94a3b8;
            text-decoration: none;
            padding: 0.75rem 1rem;
            border-radius: var(--radius);
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .menu-item:hover, .menu-item.active {
            background-color: rgba(255, 255, 255, 0.05);
            color: #ffffff;
        }

        .menu-item.active {
            background-color: var(--primary);
        }

        /* CONTENIDO PRINCIPAL */
        .main-content {
            flex: 1;
            padding: 2.5rem;
        }

        .main-header {
            margin-bottom: 2.5rem;
        }

        .main-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0f172a;
        }

        .main-header p {
            color: var(--text-muted);
            margin-top: 0.25rem;
        }

        /* TARJETAS DE ESTADÍSTICAS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background-color: var(--bg-card);
            padding: 1.5rem;
            border-radius: var(--radius);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 1.25rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .stat-icon.blue { background-color: #e0e7ff; color: #4f46e5; }
        .stat-icon.green { background-color: #d1fae5; color: #059669; }
        .stat-icon.purple { background-color: #f3e8ff; color: #7c3aed; }

        .stat-info h3 { font-size: 1.6rem; font-weight: 700; line-height: 1.2; }
        .stat-info p { color: var(--text-muted); font-size: 0.85rem; }

        /* VISTA EN CUADRÍCULA PANEL */
        .content-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 1.5rem;
        }

        .card-panel {
            background-color: var(--bg-card);
            border-radius: var(--radius);
            border: 1px solid var(--border-color);
            padding: 1.75rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }

        .card-header {
            margin-bottom: 1.5rem;
        }

        .card-header h2 {
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            color: #0f172a;
        }

        /* FORMULARIO DE SUBIDA */
        .admin-form {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .admin-form label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #475569;
        }

        .admin-form input {
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
            outline: none;
            transition: all 0.2s ease;
        }

        .admin-form input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .btn-submit {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.85rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-top: 0.5rem;
        }

        .btn-submit:hover { background-color: var(--primary-hover); }

        /* GRÁFICO CONTAINER */
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        /* NOTIFICACIONES */
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            font-size: 0.9rem;
            margin-bottom: 1.25rem;
        }
        .alert.success { background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .alert.error { background-color: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; }

        /* ADAPTACIÓN MÓVIL */
        @media (max-width: 1024px) {
            .content-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 768px) {
            .admin-dashboard { flex-direction: column; }
            .sidebar { width: 100%; padding: 1.5rem; }
            .main-content { padding: 1.5rem; }
        }
    </style>

</head>

<body>

    <?php include '../topbar.php'; ?>

    <!-- ENTORNO DEL PANEL DE ADMINISTRACIÓN -->
    <div class="admin-dashboard">
        
        <!-- SIDEBAR (Navegación Lateral Izquierda) -->
        <aside class="sidebar">
            <div class="sidebar-brand">
                <h2>ASC Panel</h2>
            </div>
            <nav class="sidebar-menu">
                <a href="#" class="menu-item active"><i data-lucide="layout-dashboard"></i> Dashboard</a>
                <a href="#subir-auto" class="menu-item"><i data-lucide="plus-circle"></i> Subir Datos</a>
                <a href="#estadisticas" class="menu-item"><i data-lucide="bar-chart-3"></i> Estadísticas</a>
            </nav>
        </aside>

        <!-- SECCIÓN DE CONTENIDO DERECHO -->
        <main class="main-content">
            
            <header class="main-header">
                <h1>Panel de Control del Servidor</h1>
                <p>Monitoreo del inventario del sistema y flujos de interacción.</p>
            </header>

            <!-- BLOQUE DE INDICADORES / TARJETAS -->
            <section class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon blue"><i data-lucide="car"></i></div>
                    <div class="stat-info">
                        <h3><?php echo $total_autos; ?></h3>
                        <p>Autos Totales</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon green"><i data-lucide="calendar"></i></div>
                    <div class="stat-info">
                        <h3>+<?php echo $nuevos_ingresos; ?></h3>
                        <p>Agregados este mes</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon purple"><i data-lucide="activity"></i></div>
                    <div class="stat-info">
                        <h3><?php echo $visitas_totales; ?></h3>
                        <p>Tráfico de Sesiones</p>
                    </div>
                </div>
            </section>

            <!-- ESPACIO DE FORMULARIO Y GRÁFICAS -->
            <div class="content-grid">
                
                <!-- REGISTRO / SUBIDA -->
                <section class="card-panel" id="subir-auto">
                    <div class="card-header">
                        <h2><i data-lucide="plus-circle"></i> Cargar Datos del Vehículo</h2>
                    </div>

                    <?php if(!empty($mensaje_alerta)) echo $mensaje_alerta; ?>

                    <form action="" method="POST" class="admin-form">
                        <input type="hidden" name="action" value="subir">
                        
                        <div class="form-group">
                            <label for="marca">Marca del Auto</label>
                            <input type="text" id="marca" name="marca" placeholder="Ej. Ford" required>
                        </div>
                        <div class="form-group">
                            <label for="modelo">Modelo</label>
                            <input type="text" id="modelo" name="modelo" placeholder="Ej. Mustang" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="precio">Precio (USD)</label>
                                <input type="number" id="precio" name="precio" placeholder="45000" required>
                            </div>
                            <div class="form-group">
                                <label for="anio">Año Fabricación</label>
                                <input type="number" id="anio" name="anio" placeholder="2025" required>
                            </div>
                        </div>
                        <button type="submit" class="btn-submit">Subir Datos al Servidor</button>
                    </form>
                </section>

                <!-- ESTADÍSTICAS DEL SISTEMA -->
                <section class="card-panel" id="estadisticas">
                    <div class="card-header">
                        <h2><i data-lucide="bar-chart-3"></i> Rendimiento de Interacciones</h2>
                    </div>
                    <div class="chart-container">
                        <canvas id="dashboardChart"></canvas>
                    </div>
                </section>

            </div>

        </main>
    </div>

    <!-- RENDERIZADO ASÍNCRONO DE INTERFAZ -->
    <script>
        // Transforma las etiquetas 'data-lucide' en vectores SVG limpios
        lucide.createIcons();

        // Construcción del Gráfico Lineal de visitas
        const ctx = document.getElementById('dashboardChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Actual'],
                datasets: [{
                    label: 'Visitas',
                    data: [310, 640, 490, 820, 1100, <?php echo $visitas_totales; ?>],
                    borderColor: '#4f46e5',
                    backgroundColor: 'rgba(79, 70, 229, 0.06)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.38
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { grid: { color: '#f1f5f9' }, ticks: { color: '#64748b' } },
                    x: { grid: { display: false }, ticks: { color: '#64748b' } }
                }
            }
        });
    </script>

</body>

</html>