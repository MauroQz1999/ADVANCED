<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "mysql.railway.internal";
$username = "root";
$password = "XGdcltEeQVjbsOjfHJmqpWnmQZqUqrOq";
$dbname = "railway";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: nuevo.php");
    exit;
}

$id = intval($_GET['id']);

// Usamos LEFT JOIN para mayor seguridad y alias claros
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
                WHERE a.id = $id
                GROUP BY a.id";

$result = $conn->query($sql);

// Verificación de error para depuración
if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

$auto = $result->fetch_assoc();

if (!$auto) {
    echo "El vehículo solicitado no existe.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced South Central</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        /* -------------------------------------------------------------------------------------------------------------- */

        .contenedor {
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: row;
        }

        .izquierda {
            flex: 1.4;
            width: 100%;
            min-height: 85dvh;
            height: auto;
            display: flex;
            flex-direction: column;
            background-color: #fff;
            align-items: center;
            border-bottom: 1px solid #f0f0f0;
        }

        .img {
            margin-top: 2%;
            width: 96%;
            min-height: 60dvh;
            border: 1px solid #eee;
        }

        .carrusel {
            width: 96%;
            min-height: 20dvh;
            border: 1px solid #eee;
        }

        .marco_descripcion {
            width: 96%;
            margin-top: 1%;
        }

        .detalles {
            width: 96%;
            margin-top: 1%;
            margin-bottom: 1%;
            font-size: 14px;
            min-height: 18dvh;
            line-height: 1.6;
            color: #555;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            border-left: 4px solid #ddd;
            overflow-wrap: break-word;
        }

        .derecha {
            background: #fff;
            flex: 1;
            min-height: 85dvh;
            padding: 0 30px 30px 30px;
            border-left: 1px solid #eee;
            border-bottom: 1px solid #f0f0f0;
        }

        .titulo {
            width: 100%;
            margin-top: 10px;
            display: flex;
            flex-direction: row;
            align-items: baseline;
        }

        .titulo h1 {
            font-size: 32px;
            font-weight: 700;
            text-transform: uppercase;
            margin: 0;
            color: #1a1a1a;
        }

        .titulo a {
            font-size: 28px;
            font-weight: 300;
            margin-left: 10px;
            color: #666;
            text-decoration: none;
        }

        .subtitulo {
            width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .subtitulo h2 {
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1px;
            margin: 0;
            color: #1a1a1a;
        }

        .barra {
            background-color: #e31837;
            width: 4px;
            height: 24px;
            margin-right: 12px;
            border-radius: 2px;
        }

        .detalles1 {
            width: 100%;
            gap: 6px;
            padding: 0px 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .detalles1>div {
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detalles1 h2 {
            font-size: 11px;
            text-transform: uppercase;
            color: #888;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .detalles1 a {
            font-size: 15px;
            color: #070707;
            font-weight: 500;
        }

        .detalles2 {
            width: 100%;
            gap: 6px;
            padding: 0px 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .detalles2>div {
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detalles2 h2 {
            font-size: 11px;
            text-transform: uppercase;
            color: #888;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .detalles2 a {
            font-size: 15px;
            color: #070707;
            font-weight: 500;
        }

        .detalles3 {
            width: 100%;
            gap: 6px;
            padding: 0px 0;
            display: flex;
            align-items: center;
        }

        .detalles3>div {
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detalles3 a {
            font-size: 15px;
            color: #070707;
            font-weight: 500;
        }

        .subtitulo_destacado {
            width: 100%;
            margin-left: 15px;
            margin-top: 10px;
            margin-bottom: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .subtitulo_destacado h2 {
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1px;
            margin: 0;
            color: #1a1a1a;
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        .carrusel_destacados {
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

        .carrusel_destacados::-webkit-scrollbar {
            display: none;
        }

        .carta_normal {
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

        .carta_normal:hover {
            transform: translateY(-6px);
            border-color: rgba(13, 52, 70, 0.3);
            box-shadow: 0 20px 45px rgba(13, 52, 70, 0.08);
            cursor: pointer;
        }

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

        /* -------------------------------------------------------------------------------------------------------------- */

        .final {
            width: 100%;
            min-height: 10dvh;
            background: #070707;
        }
    </style>

</head>

<body>

    <?php include 'topbar.php'; ?>

    <div class="contenedor">
        <div class="izquierda">
            <div class="img">
                <img class="car-img" src="<?php echo htmlspecialchars($auto['portada']); ?>" alt="Car">
            </div>
            <div class="carrusel">
            </div>
            <div class="marco_descripcion">
                <div class="subtitulo">
                    <div class="barra"></div>
                    <h2>GENERAL CHARACTERISTICS</h2>
                </div>
            </div>
            <div class="detalles">
                <a>a</a>
            </div>
        </div>
        <div class="derecha">
            <div class="titulo">
                <h1><?php echo htmlspecialchars($auto['marca']); ?></h1>
                <a><?php echo htmlspecialchars($auto['modelo']); ?></a>
            </div>
            <div class="subtitulo">
                <div class="barra"></div>
                <h2>GENERAL CHARACTERISTICS</h2>
            </div>
            <div class="detalles1">
                <div>
                    <h2>First registration</h2>
                    <a><?php echo htmlspecialchars($auto['first_registration']); ?></a>
                </div>
                <div>
                    <h2>Grade</h2>
                    <a><?php echo htmlspecialchars($auto['rango']); ?></a>
                </div>
                <div>
                    <h2>Engine type</h2>
                    <a><?php echo htmlspecialchars($auto['engine_type']); ?></a>
                </div>
                <div>
                    <h2>Transmission</h2>
                    <a><?php echo htmlspecialchars($auto['transmission']); ?></a>
                </div>
                <div>
                    <h2>Fuel</h2>
                    <a><?php echo htmlspecialchars($auto['fuel']); ?></a>
                </div>
                <div>
                    <h2>Capacity</h2>
                    <a><?php echo htmlspecialchars($auto['capacity']); ?></a>
                </div>
                <div>
                    <h2>Color</h2>
                    <a><?php echo htmlspecialchars($auto['color']); ?></a>
                </div>
                <div>
                    <h2>Chassis No</h2>
                    <a><?php echo htmlspecialchars($auto['chassis_no']); ?></a>
                </div>
                <div>
                    <h2>Manufacture date</h2>
                    <a><?php echo htmlspecialchars($auto['manufacture_date'] ?? ''); ?></a>
                </div>
                <div>
                    <h2>Type</h2>
                    <a><?php echo htmlspecialchars($auto['type_code']); ?></a>
                </div>
                <div>
                    <h2>Dispalcement</h2>
                    <a><?php echo htmlspecialchars($auto['displacement']); ?></a>
                </div>
                <div>
                    <h2>Turbo</h2>
                    <a><?php echo htmlspecialchars($auto['turbo']); ?></a>
                </div>
                <div>
                    <h2>Drive</h2>
                    <a><?php echo htmlspecialchars($auto['drive']); ?></a>
                </div>
                <div>
                    <h2>Steering Wheel</h2>
                    <a><?php echo htmlspecialchars($auto['steering_wheel']); ?></a>
                </div>
                <div>
                    <h2>Mileage</h2>
                    <a><?php echo htmlspecialchars($auto['mileage']); ?></a>
                </div>
                <div>
                    <h2>Vehicle Type</h2>
                    <a><?php echo htmlspecialchars($auto['vehicle_type']); ?></a>
                </div>
            </div>
            <div class="subtitulo">
                <div class="barra"></div>
                <h2>AIR BAGS</h2>
            </div>
            <div class="detalles2">
                <div>
                    <h2>Driver</h2>
                    <a><?php echo htmlspecialchars($auto['driver_airbag']); ?></a>
                </div>
                <div>
                    <h2>Passenger</h2>
                    <a><?php echo htmlspecialchars($auto['passenger_airbag']); ?></a>
                </div>
            </div>
            <div class="subtitulo">
                <div class="barra"></div>
                <h2>OPTIONS</h2>
            </div>
            <div class="detalles3">
                <a>Power Windows, Power Steering, ABS, Sun Roof, Auto AC</a>
            </div>
            <div>
            </div>
        </div>
    </div>
    <div class="subtitulo_destacado">
        <div class="barra"></div>
        <h2>GENERAL CHARACTERISTICS</h2>
    </div>
    <div class="carrusel_destacados">

        <?php

        $v_type = $conn->real_escape_string($auto['vehicle_type']);

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
                WHERE a.vehicle_type = '$v_type' AND a.id != $id
                GROUP BY a.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="carta_normal" onclick="window.location.href='datos.php?id=${id}'">
                    <div class="contenedor_img">
                        <img class="car-img" src="<?php echo htmlspecialchars($row['portada']); ?>" alt="Car">

                        <div class="specs-overlay">
                            <div class="spec-item">
                                <span class="spec-label">Precio</span>
                                <span><?php echo htmlspecialchars($row['precio']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Año</span>
                                <span><?php echo htmlspecialchars($row['first_registration']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Transmision</span>
                                <span><?php echo htmlspecialchars($row['transmission']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Motor</span>
                                <span><?php echo htmlspecialchars($row['engine_type']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Status</span>
                                <span><?php echo htmlspecialchars($row['estado']); ?></span>
                            </div>
                            <button style="margin-top: 0px; background: #000; color: #fff; border: none; padding: 12px; cursor: pointer; font-family: 'Outfit'; font-weight: 600; letter-spacing: 2px;">VER DETALLES</button>
                        </div>

                    </div>
                    <div class="info-car">
                        <div class="info_fabricante"><?php echo htmlspecialchars($row['marca']); ?></div>
                        <h2 class="info_modelo"><?php echo htmlspecialchars($row['modelo']); ?></h2>
                        <div class="indicator"></div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>No hay vehículos disponibles en este momento.</p>";
        }
        ?>
    </div>
    <div class="final"></div>

    <script>
        window.onload = function() {

            // --- 1. CARRUSEL DE AUTOS (MOVIMIENTO POR PASOS - TU CÓDIGO) ---
            const carruselAutos = document.querySelector('.carrusel_destacados');

            if (carruselAutos) {
                const itemsAutos = carruselAutos.querySelectorAll('.carta_normal');

                if (carruselAutos.scrollWidth > carruselAutos.offsetWidth) {

                    itemsAutos.forEach(item => {
                        const clon = item.cloneNode(true);
                        carruselAutos.appendChild(clon);
                    });

                    let scrollPos = 0;
                    const velocidad = 0.4;

                    carruselAutos.style.scrollBehavior = 'auto';

                    function animarContinuo() {
                        scrollPos += velocidad;

                        if (scrollPos >= carruselAutos.scrollWidth / 2) {
                            scrollPos = 0;
                        }

                        carruselAutos.scrollLeft = scrollPos;
                        requestAnimationFrame(animarContinuo);
                    }

                    animarContinuo();
                } else {
                    carruselAutos.style.justifyContent = 'center';
                    carruselAutos.style.overflowX = 'hidden';
                }
            }
        }
    </script>
</body>

</html>