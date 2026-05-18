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

// NOTA: Aquí asumo que tienes una tabla de fotos relacionada o una lista separada por comas.
// Si no las tienes en la DB aún, puedes usar este array de ejemplo para probar el diseño:
$fotos_ejemplo = [
    "https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=1200",
    "https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=1200",
    "https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=1200",
    "https://images.unsplash.com/photo-1502877338535-766e1452684a?w=1200"
];
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

        .carrusel_destacados {
            width: 100%;
            min-height: 40dvh;
            display: flex;
            flex-direction: row;
            border: 1px solid #f0f0f0;
        }

        .carta_auto {
            margin: 15px;
            width: 18%;
            border: 1px solid #f0f0f0;
        }

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
                    <a><?php echo htmlspecialchars($auto['manufacture_date']); ?></a>
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
        <div class="carta_auto"></div>
    </div>
    <div class="final"></div>
</body>

</html>