
<?php include $_SERVER['DOCUMENT_ROOT'] . '/ADVANCE/configuracion/conexion.php'; ?>

<?php

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: nuevo.php");
    exit;
}

$id = intval($_GET['id']);

// Usamos LEFT JOIN para mayor seguridad y alias claros
$sql = "SELECT 
            a.id_auto AS id,
            a.id_modelo,
            mar.nombre_marca AS marca,
            mar.id_marca AS marca_id,
            md.nombre_modelo AS modelo,
            a.registro AS first_registration,
            a.grado AS rango,
            a.motor AS engine_type,
            a.transmision AS transmission,
            a.combustible AS fuel,
            a.capacidad,
            a.color,
            a.n_chasis AS chassis_no,
            a.fabricacion AS manufacture_date,
            a.homologacion AS type_code,
            a.cilindrada AS displacement,
            a.turbo,
            a.traccion AS drive,
            a.volante AS steering_wheel,
            a.millaje AS mileage,
            a.horometro,
            a.peso,
            a.tipo AS vehicle_type,
            a.precio,          
            a.estado,          
            a.conductor AS driver_airbag,
            a.pasajero AS passenger_airbag,
            a.stock,
            a.detalles,
            a.ruta AS portada, 
            a.destacado
        FROM general a
        LEFT JOIN marca mar ON a.id_marca = mar.id_marca
        LEFT JOIN modelo md ON a.id_modelo = md.id_modelo
        WHERE a.id_auto = $id
        GROUP BY a.id_auto";

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

$id_modelo = $auto['id_modelo'];
$id_marca = $auto['marca_id'];

// Verificamos si no están vacíos (esto es más seguro que > 0)
if (!empty($id_modelo) && !empty($id_marca)) {

    // Usamos una sentencia preparada para evitar errores de sintaxis y proteger la BD
    $stmt = $conn->prepare("INSERT INTO registro_vistas (id_modelo, id_marca, fecha_vista) VALUES (?, ?, NOW())");

    // "ss" significa que ambos valores son string
    $stmt->bind_param("ss", $id_modelo, $id_marca);

    if (!$stmt->execute()) {
        // Esto te mostrará si hay un error de llave foránea (Foreign Key)
        error_log("Error al insertar vista: " . $stmt->error);
    }

    $stmt->close();
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
            box-sizing: border-box;
        }

        .izquierda {
            flex: 1.4;
            width: 100%;
            min-height: 85vh;
            height: auto;
            display: flex;
            flex-direction: column;
            background-color: #ffffff;
            align-items: center;
            border-bottom: 1px solid #f0f0f0;
            box-sizing: border-box;
        }

        .derecha {
            background: #ffffff;
            flex: 1;
            min-height: 85vh;
            padding: clamp(15px, 3vw, 30px);
            border-left: 1px solid #eee;
            border-bottom: 1px solid #f0f0f0;
            box-sizing: border-box;
        }

        .img {
            margin-top: 2%;
            width: 96%;
            height: clamp(350px, 50vh, 600px);
            /* Altura elástica controlada */
            border: 1px solid #eee;
            border-radius: 12px;
            overflow: hidden;
            box-sizing: border-box;
        }

        .carrusel {
            width: 96%;
            margin-top: 15px;
            min-height: 120px;
            border: 1px solid #eee;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .marco_descripcion {
            width: 96%;
            margin-top: 2%;
            box-sizing: border-box;
        }

        .detalles {
            width: 96%;
            margin-top: 1%;
            margin-bottom: 2%;
            font-size: clamp(13px, 1vw, 15px);
            line-height: 1.6;
            color: #4a5568;
            background: #f8fafc;
            padding: clamp(15px, 2vw, 25px);
            border-radius: 12px;
            border-left: 4px solid #e58a13;
            overflow-wrap: break-word;
            box-sizing: border-box;
        }

        .titulo {
            width: 100%;
            margin-top: 10px;
            display: flex;
            flex-direction: row;
            align-items: baseline;
            flex-wrap: wrap;
        }

        .titulo h1 {
            font-size: clamp(24px, 2.5vw, 32px);
            font-weight: 700;
            text-transform: uppercase;
            margin: 0;
            color: #00334e;
        }

        .titulo a {
            font-size: clamp(20px, 2vw, 28px);
            font-weight: 300;
            margin-left: 10px;
            color: #64748b;
            text-decoration: none;
        }

        .subtitulo {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .subtitulo h2 {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1px;
            margin: 0;
            text-transform: uppercase;
            color: #00334e;
        }

        .barra {
            background-color: #e58a13;
            width: 4px;
            height: 20px;
            margin-right: 12px;
            border-radius: 2px;
        }

        .detalles1,
        .detalles2 {
            width: 100%;
            gap: 0 20px;
            padding: 5px 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        }

        .detalles1>div,
        .detalles2>div {
            padding: 10px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .detalles1 h2,
        .detalles2 h2 {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            font-weight: 600;
            margin: 0 0 4px 0;
        }

        .detalles1 a,
        .detalles2 a {
            font-size: 15px;
            color: #0d3446;
            font-weight: 600;
            text-decoration: none;
            display: block;
        }

        .detalles3 {
            width: 100%;
            padding: 15px 0;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #f1f5f9;
        }

        .detalles3 a {
            font-size: clamp(18px, 1.8vw, 22px);
            color: #e58a13;
            font-weight: 700;
            text-decoration: none;
        }

        .subtitulo_destacado {
            width: 100%;
            max-width: 1800px;
            margin: 40px auto 15px auto;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .subtitulo_destacado h2 {
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 2px;
            margin: 0;
            text-transform: uppercase;
            color: #00334e;
        }

        .carrusel_destacados,
        .carrusel_destacados1 {
            width: 100%;
            max-width: 1800px;
            margin: 0 auto;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            gap: 25px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding-bottom: 20px;
            scrollbar-width: none;
        }

        .carrusel_destacados::-webkit-scrollbar,
        .carrusel_destacados1::-webkit-scrollbar {
            display: none;
        }

        .carta_normal,
        .carta_normal1 {
            width: 300px;
            flex-shrink: 0;
            background-color: #ffffff;
            margin-bottom: 5px;
            border: 1px solid rgba(13, 52, 70, 0.12);
            border-radius: 16px;
            overflow: hidden;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.5s ease, border-color 0.3s ease;
        }

        .carta_normal:hover,
        .carta_normal1:hover {
            transform: translateY(-6px);
            border-color: rgba(13, 52, 70, 0.3);
            box-shadow: 0 20px 45px rgba(13, 52, 70, 0.08);
            cursor: pointer;
        }

        .contenedor_img {
            position: relative;
            height: 200px;
            overflow: hidden;
            background-color: #f4f6f9;
        }

        .car-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .carta_normal:hover .car-img,
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
            justify-content: space-between;
            padding: 20px;
            box-sizing: border-box;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            z-index: 10;
        }

        .carta_normal:hover .specs-overlay,
        .carta_normal1:hover .specs-overlay {
            opacity: 1;
            pointer-events: auto;
        }

        .spec-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 4px;
        }

        .spec-label {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            font-weight: 600;
        }

        .spec-item>span:last-child {
            font-size: 0.75rem;
            color: #0d3446;
            font-weight: 600;
            max-width: 65%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .specs-overlay .boton-negro,
        .specs-overlay div[style*="background: black"],
        .specs-overlay a[style*="background: black"] {
            width: 100%;
            height: 36px;
            background-color: #000000 !important;
            color: #ffffff !important;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            font-size: 0.7rem;
            letter-spacing: 1.5px;
            font-weight: 700;
            border-radius: 6px;
            text-decoration: none;
            margin-top: auto;
            box-sizing: border-box;
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
            font-size: 1.2rem;
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

        .carta_normal:hover .indicator,
        .carta_normal1:hover .indicator {
            width: 100%;
        }

        @media (max-width: 992px) {
            .contenedor {
                flex-direction: column;
            }

            .derecha {
                border-left: none;
                border-top: 1px solid #eee;
                padding: 30px 20px;
            }

            .img {
                height: 40vh;
            }
        }

        /* -------------------------------------------------------------------------------------------------------------- */


        .botones-acciones {
            display: flex;
            gap: 15px;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        .btn-accion {
            padding: 12px 28px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: inherit;
            outline: none;
        }

        .btn1 {
            text-decoration: none;
            background-color: #0d3446;
            color: #ffffff;
            border: 2px solid #0d3446;
            box-shadow: 0 4px 10px rgba(13, 52, 70, 0.15);
        }

        .btn1:hover {
            background-color: #144962;
            border-color: #144962;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(13, 52, 70, 0.25);
        }

        .btn2 {
            text-decoration: none;
            background-color: transparent;
            color: #0d3446;
            border: 2px solid #0d3446;
        }

        .btn2:hover {
            background-color: #0d3446;
            color: #ffffff;
            transform: translateY(-2px);
        }

        .btn-accion:active {
            transform: translateY(1px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
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
                    <h2 data-i18n="dat_text24">DESCRIPTION</h2>
                </div>
            </div>
            <div class="detalles">
                <a>
                    Este <strong><?php echo htmlspecialchars($auto['marca']) . " " . ($auto['modelo']); ?></strong> es la definición de excelencia.
                    Con solo <?php echo htmlspecialchars($auto['mileage']); ?> km, el vehículo se encuentra en estado impecable.
                    Equipado con transmisión <?php echo htmlspecialchars($auto['transmission']); ?> y un sistema de combustible <?php echo htmlspecialchars($auto['fuel']); ?>
                    que garantiza eficiencia y potencia. Ideal para quienes buscan un auto de la categoría <?php echo htmlspecialchars($auto['vehicle_type']); ?>.
                </a>
            </div>
        </div>
        <div class="derecha">
            <div class="titulo">
                <h1><?php echo htmlspecialchars($auto['marca']); ?></h1>
                <a><?php echo htmlspecialchars($auto['modelo']); ?></a>
            </div>
            <div class="subtitulo">
                <div class="barra"></div>
                <h2 data-i18n="dat_text1">GENERAL CHARACTERISTICS</h2>
            </div>
            <div class="detalles1">
                <div>
                    <h2 data-i18n="dat_text2">First registration</h2>
                    <a><?php echo htmlspecialchars($auto['first_registration']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text3">Grade</h2>
                    <a><?php echo htmlspecialchars($auto['rango']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text4">Engine type</h2>
                    <a><?php echo htmlspecialchars($auto['engine_type']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text5">Transmission</h2>
                    <a><?php echo htmlspecialchars($auto['transmission']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text6">Fuel</h2>
                    <a><?php echo htmlspecialchars($auto['fuel']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text7">Capacity</h2>
                    <a><?php echo htmlspecialchars($auto['capacidad']); ?></a>

                </div>
                <div>
                    <h2 data-i18n="dat_text8">Color</h2>
                    <a><?php echo htmlspecialchars($auto['color']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text9">Chassis No</h2>
                    <a><?php echo htmlspecialchars($auto['chassis_no']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text10">Manufacture date</h2>
                    <a><?php echo htmlspecialchars($auto['manufacture_date'] ?? ''); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text11">Homologation</h2>

                    <a><?php echo htmlspecialchars($auto['type_code']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text12">Dispalcement</h2>
                    <a><?php echo htmlspecialchars($auto['displacement']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text13">Turbo</h2>
                    <a><?php echo htmlspecialchars($auto['turbo']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text14">Drive</h2>
                    <a><?php echo htmlspecialchars($auto['drive']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text15">Steering Wheel</h2>
                    <a><?php echo htmlspecialchars($auto['steering_wheel']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text16">Mileage</h2>
                    <a><?php echo htmlspecialchars($auto['mileage']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text16.1">Horometer</h2>
                    <a><?php echo htmlspecialchars($auto['horometro']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text16.2">Weight</h2>
                    <a><?php echo htmlspecialchars($auto['peso']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text17">Vehicle Type</h2>
                    <a><?php echo htmlspecialchars($auto['vehicle_type']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text18">Precio</h2>
                    <a><?php echo htmlspecialchars($auto['precio']); ?></a>
                </div>
            </div>
            <div class="subtitulo">
                <div class="barra"></div>
                <h2 data-i18n="dat_text19">AIR BAGS</h2>
            </div>
            <div class="detalles2">
                <div>
                    <h2 data-i18n="dat_text20">Driver</h2>
                    <a><?php echo htmlspecialchars($auto['driver_airbag']); ?></a>
                </div>
                <div>
                    <h2 data-i18n="dat_text21">Passenger</h2>
                    <a><?php echo htmlspecialchars($auto['passenger_airbag']); ?></a>
                </div>
            </div>
            <div class="subtitulo">
                <div class="barra"></div>
                <h2 data-i18n="dat_text22">OPTIONS</h2>
            </div>
            <div class="detalles3">
                <a>Power Windows, Power Steering, ABS, Sun Roof, Auto AC</a>
            </div>
            <div class="botones-acciones">
                <a class="btn-accion btn1" href="how_to_buy.php">HOW TO BUY</a>
                <a class="btn-accion btn2" href="https://wa.me/51978631055?text=Hola%20Advance%20Advance%20South%20Central,%20solicito%20información%20sobre%20el%20<?php echo htmlspecialchars($auto['marca']); ?>%20<?php echo htmlspecialchars($auto['modelo']); ?>%20de%20<?php echo htmlspecialchars($auto['mileage']); ?>%20Km%20,%20<?php echo htmlspecialchars($auto['color']); ?>%20,%20<?php echo htmlspecialchars($auto['transmission']); ?>%20y%20la%20edición%20<?php echo htmlspecialchars($auto['rango']); ?>." target="_blank">COTIZAR</a>
            </div>
        </div>
    </div>
    <div class="subtitulo_destacado">
        <div class="barra"></div>
        <h2 data-i18n="dat_text23">RECOMMENDED MODELS</h2>
    </div>
    <div class="carrusel_destacados">

        <?php
        $sql1 = "SELECT 
                    a.id_auto AS id,
                    a.id_modelo,
                    mar.nombre_marca AS marca,
                    mar.id_marca AS marca_id,
                    md.nombre_modelo AS modelo,
                    a.registro AS first_registration,
                    a.grado AS rango,
                    a.motor AS engine_type,
                    a.transmision AS transmission,
                    a.combustible AS fuel,
                    a.capacidad,
                    a.color,
                    a.n_chasis AS chassis_no,
                    a.fabricacion AS manufacture_date,
                    a.homologacion AS type_code,
                    a.cilindrada AS displacement,
                    a.turbo,
                    a.traccion AS drive,
                    a.volante AS steering_wheel,
                    a.millaje AS mileage,
                    a.horometro,
                    a.peso,
                    a.tipo AS vehicle_type,
                    a.precio,          
                    a.estado,          
                    a.conductor AS driver_airbag,
                    a.pasajero AS passenger_airbag,
                    a.stock,
                    a.detalles,
                    a.ruta AS portada, 
                    a.destacado
                FROM general a
                LEFT JOIN marca mar ON a.id_marca = mar.id_marca
                LEFT JOIN modelo md ON a.id_modelo = md.id_modelo
                WHERE a.destacado = 1
                GROUP BY a.id_auto";

        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="carta_normal" onclick="window.location.href='datos.php?id=<?php echo $row['id']; ?>'">
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

    <script>
        window.onload = function() {

            // --- 1. CARRUSEL DE AUTOS (MOVIMIENTO POR PASOS - TU CÓDIGO) ---
            const carruselAutos = document.querySelector('.carrusel_destacados');

            if (carruselAutos) {
                const itemsAutos = carruselAutos.querySelectorAll('.carta_normal');

                if (carruselAutos.scrollWidth > carruselAutos.offsetWidth) {

                    // 1. Clonar para el efecto infinito
                    itemsAutos.forEach(item => {
                        carruselAutos.appendChild(item.cloneNode(true));
                    });

                    let isUserInteracting = false;
                    let timer;
                    const velocidad = 0.8; // Ajusta la velocidad aquí

                    // 2. Animación fluida usando el valor actual de scrollLeft
                    function animarContinuo() {
                        if (!isUserInteracting) {
                            carruselAutos.scrollLeft += velocidad;

                            // Reseteo inteligente al llegar a la mitad
                            if (carruselAutos.scrollLeft >= (carruselAutos.scrollWidth / 2)) {
                                carruselAutos.scrollLeft = 0;
                            }
                        }
                        requestAnimationFrame(animarContinuo);
                    }

                    // 3. Detectar interacción (Mouse/Touch)
                    const startInteraction = () => {
                        isUserInteracting = true;
                        clearTimeout(timer);
                    };
                    const endInteraction = () => {
                        // Espera un momento antes de reanudar el scroll automático
                        timer = setTimeout(() => {
                            isUserInteracting = false;
                        }, 1500);
                    };

                    carruselAutos.addEventListener('mousedown', startInteraction);
                    carruselAutos.addEventListener('touchstart', startInteraction);
                    carruselAutos.addEventListener('mouseup', endInteraction);
                    carruselAutos.addEventListener('mouseleave', endInteraction);
                    carruselAutos.addEventListener('touchend', endInteraction);
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