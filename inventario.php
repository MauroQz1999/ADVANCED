<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "mysql.railway.internal";
$username = "root";
$password = "XGdcltEeQVjbsOjfHJmqpWnmQZqUqrOq";
$dbname = "railway";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("<h3 style='color:red; padding:20px;'>Error de Conexión a la Base de Datos: " . $conn->connect_error . "</h3>");
}

$conn->set_charset("utf8");

$sql = "SELECT 
            a.id,
            a.modelo_id,
            mar.nombre AS marca,
            mar.logo AS marca_logo, 
            md.nombre AS modelo,
            a.first_registration,
            a.rango,
            a.engine_type,
            a.transmission,
            a.fuel,
            a.capacity,
            a.color,
            a.chassis_no,
            a.manufacture_date,
            a.type_code,
            a.displacement,
            a.turbo,
            a.drive,
            a.steering_wheel,
            a.mileage,
            a.vehicle_type,
            a.precio,          
            a.estado,          
            a.driver_airbag,
            a.passenger_airbag,
            a.destacado,
            a.stock,
            a.img AS portada, 
            GROUP_CONCAT(DISTINCT img.ruta_img) AS galeria_fotos,
            GROUP_CONCAT(DISTINCT opc.nombre) AS lista_opciones
        FROM autos a
        LEFT JOIN modelos md ON a.modelo_id = md.id
        LEFT JOIN marcas mar ON md.marca_id = mar.id
        LEFT JOIN auto_imagenes img ON a.id = img.auto_id
        LEFT JOIN auto_opciones ao ON a.id = ao.auto_id      
        LEFT JOIN opciones opc ON ao.opcion_id = opc.id      
        GROUP BY a.id";

$result = $conn->query($sql);

if (!$result) {
    die("<div style='background:#fff5f5; color:#c53030; border:1px solid #feb2b2; padding:25px; margin:20px; font-family:sans-serif; border-radius:8px;'>
            <h2>❌ Error en la Consulta SQL</h2>
            <p>MySQL dice: <strong>" . $conn->error . "</strong></p>
            <p>Por favor, revisa que los nombres de las columnas en tu tabla <code>autos</code> coincidan exactamente con el código.</p>
         </div>");
}

$mysql_rows_count = $result->num_rows;
$autos = [];

if ($mysql_rows_count > 0) {
    while ($fila = $result->fetch_assoc()) {
        $fotos_array = $fila['galeria_fotos'] ? explode(',', $fila['galeria_fotos']) : [];
        $opciones_array = $fila['lista_opciones'] ? explode(',', $fila['lista_opciones']) : [];

        $autos[] = [
            "id" => (int)$fila['id'],
            "modelo_id" => (int)$fila['modelo_id'],
            "marca" => $fila['marca'],
            "marca_logo" => $fila['marca_logo'],
            "modelo" => $fila['modelo'],
            "first_registration" => $fila['first_registration'],
            "rango" => $fila['rango'],
            "engine_type" => $fila['engine_type'],
            "transmission" => $fila['transmission'],
            "fuel" => $fila['fuel'],
            "capacity" => (int)$fila['capacity'],
            "color" => $fila['color'],
            "chassis_no" => $fila['chassis_no'],
            "manufacture_date" => $fila['manufacture_date'],
            "type_code" => $fila['type_code'],
            "displacement" => (int)$fila['displacement'],
            "turbo" => $fila['turbo'],
            "drive" => $fila['drive'],
            "steering_wheel" => $fila['steering_wheel'],
            "mileage" => (int)$fila['mileage'],
            "vehicle_type" => $fila['vehicle_type'],
            "precio" => (int)$fila['precio'],
            "estado" => $fila['estado'],
            "driver_airbag" => (int)$fila['driver_airbag'],
            "passenger_airbag" => (int)$fila['passenger_airbag'],
            "destacado" => (int)$fila['destacado'],
            "stock" => (int)$fila['stock'],
            "img" => $fila['portada'],
            "imagenes" => $fotos_array,
            "options" => $opciones_array
        ];
    }
}

$json_autos = json_encode($autos);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced South Central</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;600;800&family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f1f5f9;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        /* BARRA DE BÚSQUEDA GENERAL */
        .search-bar {
            width: 100%;
            max-width: 100%;
            height: 60px;
            border-bottom: 1px solid #e8e8e8;
            background: #fcfcfc;
            display: flex;
            justify-content: center;
        }

        #generalSearch {
            width: 100%;
            max-width: 1440px;
            height: 100%;
            border: none;
            padding: 0 40px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1rem;
            outline: none;
            background: transparent;
        }

        /* CONTENEDOR DE LA APLICACIÓN */
        .app-container {
            display: flex;
            width: 100%;
            max-width: 100%;
            height: calc(100vh - 130px);
        }

        .center {
            display: flex;
            height: 100%;
        }

        .sidebar {
            width: 380px;
            min-width: 380px;
            height: 100%;
            border-right: 1px solid #e8e8e8;
            padding: 25px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 15px;
            align-content: start;
            overflow-y: auto;
            background: #ffffff;
        }

        .sidebar-title {
            grid-column: 1 / -1;
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 5px;
            color: #999999;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
        }

        .filter-group label {
            font-size: 0.55rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
            color: #999999;
        }

        select {
            padding: 8px;
            border: 1px solid #e8e8e8;
            background: #ffffff;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.75rem;
            outline: none;
            cursor: pointer;
            width: 100%;
            /* Asegura que rellene su columna */
        }

        select:focus {
            border-color: #000000;
        }

        .reset-btn {
            grid-column: 1 / -1;
            margin-top: 30px;
            /* Reducido de 60px para que no quede tan abajo */
            padding: 12px;
            background: #000000;
            color: #ffffff;
            border: none;
            font-weight: 700;
            cursor: pointer;
            font-size: 0.7rem;
            letter-spacing: 2px;
            transition: background 0.3s;
        }

        .reset-btn:hover {
            background: #ff3e3e;
        }

        /* ÁREA DEL CATÁLOGO */
        .catalog-area {
            flex: 1;
            overflow-y: auto;
            width: 100%;
            padding: 40px;
        }

        .grid {
            display: grid;
            /* Cambiamos el comportamiento para que se adapte mejor sin estirar en exceso */
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
        }

        .carta_normal {
            width: 100%;
            max-width: 340px;
            /* Al limitar el ancho máximo, no se deformarán en pantallas medianas */
            margin: 0 auto;
            /* Centra la tarjeta dentro de su celda de la rejilla */
            background-color: #ffffff;
            margin-bottom: 5px;
            border: 1px solid rgba(13, 52, 70, 0.12);
            border-radius: 16px;
            overflow: hidden;
            box-sizing: border-box;
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.5s ease, border-color 0.3s ease;
        }

        .carta_normal:hover {
            transform: translateY(-6px);
            border-color: rgba(13, 52, 70, 0.3);
            box-shadow: 0 20px 45px rgba(13, 52, 70, 0.08);
            cursor: pointer;
        }

        /* Puedes eliminar o conservar .carrusel_destacados1 y .carta_normal1 si no los usas en el HTML */
        .carrusel_destacados1 {
            width: 75%;
            margin: auto;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            gap: 30px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding-bottom: 15px;
            scrollbar-width: none;
        }

        .carrusel_destacados1::-webkit-scrollbar {
            display: none;
        }

        .carta_normal1 {
            width: 320px;
            flex-shrink: 0;
            background-color: #ffffff;
            margin-top: 10px;
            margin-bottom: 5px;
            border: 1px solid rgba(13, 52, 70, 0.12);
            border-radius: 16px;
            overflow: hidden;
            box-sizing: border-box;
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.5s ease, border-color 0.3s ease;
        }

        .carta_normal1:hover {
            transform: translateY(-6px);
            border-color: rgba(13, 52, 70, 0.3);
            box-shadow: 0 20px 45px rgba(13, 52, 70, 0.08);
            cursor: pointer;
        }

        .contenedor_img {
            position: relative;
            height: 250px;
            overflow: hidden;
            background-color: #f4f6f9;
        }

        .car-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .carta_normal:hover .car-img {
            transform: scale(1.08);
        }

        .carta_normal1:hover .car-img {
            transform: scale(1.08);
        }

        .specs-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(4px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 30px;
            box-sizing: border-box;
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 10;
        }

        .carta_normal:hover .specs-overlay {
            opacity: 1;
        }

        .carta_normal1:hover .specs-overlay {
            opacity: 1;
        }

        .spec-item {
            display: flex;
            justify-content: space-between;
            margin-top: 6px;
            margin-bottom: 6px;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 6px;
        }

        .spec-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            font-weight: 600;
        }

        .info-car {
            padding: 20px;
            background: #ffffff;
        }

        .info_fabricante {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 3px;
            color: #e58a13;
            text-transform: uppercase;
        }

        .info_modelo {
            font-size: 1.3rem;
            font-weight: 700;
            margin: 4px 0 0;
            color: #00334e;
        }

        .indicator {
            width: 25px;
            height: 3px;
            background: #e58a13;
            margin-top: 15px;
            border-radius: 2px;
            transition: width 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .carta_normal:hover .indicator {
            width: 100%;
        }

        .carta_normal1:hover .indicator {
            width: 100%;
        }

        .no-results {
            grid-column: 1 / -1;
            text-align: center;
            padding: 40px;
            font-family: 'Space Grotesk', sans-serif;
            color: #999;
            letter-spacing: 2px;
        }

        /* VERSIONES PARA CELULAR Y PANTALLAS MEDIANAS / PEQUEÑAS */
        @media (max-width: 992px) {

            /* Cambia la estructura principal a vertical */
            .app-container {
                flex-direction: column;
                height: auto;
                /* Permite que la pantalla haga scroll hacia abajo naturalmente */
            }

            .center {
                flex-direction: column;
                height: auto;
            }

            /* Adapta la barra lateral de filtros en la parte superior */
            .sidebar {
                width: 100%;
                min-width: 100%;
                height: auto;
                border-right: none;
                border-bottom: 1px solid #e8e8e8;
                padding: 20px;
                grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
                /* Los selectores se acomodan en rejilla pequeña */
            }

            .sidebar-title {
                grid-column: 1 / -1;
            }

            .reset-btn {
                grid-column: 1 / -1;
                margin-top: 15px;
                /* Reduce el espacio muerto en móvil */
            }
        }
    </style>
</head>

<body>

    <?php include 'topbar.php'; ?>

    <div class="search-bar">
        <input type="text" id="generalSearch" placeholder="Escribe para buscar (marca, modelo, motor...)">
    </div>

    <div class="app-container">
        <div class="center">
            <aside class="sidebar" id="sidebar">
                <div class="sidebar-title">Parámetros de Búsqueda</div>
                <button class="reset-btn" onclick="resetFilters()">LIMPIAR TODO</button>
            </aside>
        </div>

        <main class="catalog-area">
            <div class="grid" id="catalogGrid">
            </div>
        </main>
    </div>

    <script>
        const allCars = <?php echo $json_autos; ?>;
        let activeFilters = {};

        const filterKeys = [
            "marca", "modelo", "first_registration", "rango", "engine_type", "transmission",
            "fuel", "capacity", "color", "chassis_no",
            "manufacture_date", "type_code", "displacement", "turbo",
            "drive", "steering_wheel", "mileage", "vehicle_type"
        ];

        function init() {
            const urlParams = new URLSearchParams(window.location.search);
            const marcaUrl = urlParams.get('marca');

            if (marcaUrl) {
                activeFilters["marca"] = marcaUrl;
            }

            updateUI();
        }

        function updateUI() {
            const filtered = getFilteredData();
            renderFilters(filtered);
            renderCars(filtered);
        }

        function getFilteredData() {
            const searchText = document.getElementById('generalSearch').value.toLowerCase();

            return allCars.filter(car => {
                for (let key in activeFilters) {
                    if (activeFilters[key] && String(car[key]) !== activeFilters[key]) return false;
                }

                const valuesString = Object.values(car).join(" ").toLowerCase();
                return valuesString.includes(searchText);
            });
        }

        function renderFilters(data) {
            const sidebar = document.getElementById('sidebar');
            const resetButton = sidebar.querySelector('.reset-btn');

            document.querySelectorAll('.filter-group').forEach(el => el.remove());

            filterKeys.forEach(key => {
                const group = document.createElement('div');
                group.className = 'filter-group';

                const options = [...new Set(data.map(car => car[key]))].sort();

                let html = `<label>${key.replace('_', ' ')}</label>`;
                html += `<select onchange="handleFilterChange('${key}', this.value)">`;
                html += `<option value="">-</option>`;

                options.forEach(opt => {
                    if (opt !== undefined && opt !== null) {
                        const isSelected = activeFilters[key] === String(opt) ? 'selected' : '';
                        html += `<option value="${opt}" ${isSelected}>${opt}</option>`;
                    }
                });

                html += `</select>`;
                group.innerHTML = html;
                sidebar.insertBefore(group, resetButton);
            });
        }

        function handleFilterChange(key, value) {
            if (value === "") delete activeFilters[key];
            else activeFilters[key] = value;
            updateUI();
        }

        function renderCars(cars) {
            const grid = document.getElementById('catalogGrid');

            if (cars.length === 0) {
                grid.innerHTML = `<div class="no-results">NO SE ENCONTRARON COINCIDENCIAS</div>`;
                return;
            }

            grid.innerHTML = cars.map(car => `
                <div class="carta_normal" onclick="window.location.href='datos.php?id=${car.id}'">
                    <div class="contenedor_img">
                        <img class="car-img" src="${car.img}" alt="Car">

                        <div class="specs-overlay">
                            <div class="spec-item">
                                <span class="spec-label">Precio</span>
                                <span>$${Number(car.precio).toLocaleString()}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Año</span>
                                <span>${car.first_registration}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Transmision</span>
                                <span>${car.transmission}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Motor</span>
                                <span>${car.engine_type}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Status</span>
                                <span>${car.estado}</span>
                            </div>
                            <button style="margin-top: 0px; background: #000; color: #fff; border: none; padding: 12px; cursor: pointer; font-family: 'Outfit'; font-weight: 600; letter-spacing: 2px;">VER DETALLES</button>
                        </div>

                    </div>
                    <div class="info-car">
                        <div class="info_fabricante">${car.marca}</div>
                        <h2 class="info_modelo">${car.modelo}</h2>
                        <div class="indicator"></div>
                    </div>
                </div>
        `).join('');
        }

        function resetFilters() {
            activeFilters = {};
            document.getElementById('generalSearch').value = "";
            updateUI();
        }

        document.getElementById('generalSearch').addEventListener('input', updateUI);

        init();
    </script>

</body>

</html>