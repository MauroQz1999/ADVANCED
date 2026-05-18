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
                <h1>Subaru</h1>
                <a>Legacy</a>
            </div>
            <div class="subtitulo">
                <div class="barra"></div>
                <h2>GENERAL CHARACTERISTICS</h2>
            </div>
            <div class="detalles1">
                <div>
                    <h2>First registration</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Grade</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Engine type</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Transmission</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Fuel</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Capacity</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Color</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Chassis No</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Manufacture date</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Type</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Dispalcement</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Turbo</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Drive</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Steering Wheel</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Mileage</h2>
                    <a>2023</a>
                </div>
                <div>
                    <h2>Vehicle Type</h2>
                    <a>2023</a>
                </div>
            </div>
            <div class="subtitulo">
                <div class="barra"></div>
                <h2>AIR BAGS</h2>
            </div>
            <div class="detalles2">
                <div>
                    <h2>Driver</h2>
                    <a>a</a>
                </div>
                <div>
                    <h2>Passenger</h2>
                    <a>a</a>
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