<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced South Central</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

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

        /* --- BARRA PRINCIPAL --- */
        .topbar {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            position: sticky;
            top: 0;
            left: 0;
            z-index: 2000;
            width: 100%;
            height: 80px;
        }

        .cont-topbar {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* --- CONTENIDO IZQUIERDO --- */
        .cont-izquierdo {
            text-decoration: none;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 12px;
            padding-left: 2%;
            width: 35%;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 55px;
            width: 55px;
        }

        .logo img {
            height: 100%;
            width: 100%;
            object-fit: contain;
        }

        .logo-titulo h1 {
            font-size: 1.1rem;
            font-weight: 800;
            color: #0d3446;
            margin: 0;
            line-height: 1.1;
            letter-spacing: 0.3px;
        }

        .logo-titulo h2 {
            font-size: 0.68rem;
            font-weight: 600;
            color: #e58a13;
            margin: 0;
            margin-top: 2px;
            letter-spacing: 0.5px;
        }

        /* --- CONTENIDO CENTRAL --- */
        .cont-central {
            width: 30%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu-principal {
            display: flex;
            flex-direction: row;
            list-style: none;
            gap: 35px;
            margin: 0;
            padding: 0;
        }

        .menu-principal a {
            text-decoration: none;
            color: #576574;
            font-size: 0.95rem;
            font-weight: 600;
            display: inline-block;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .menu-principal a:hover {
            color: #0d3446;
            transform: translateY(-2px);
        }

        .menu-principal a.enlace-activo {
            color: #0d3446;
            position: relative;
        }

        .menu-principal a.enlace-activo::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #e58a13;
            border-radius: 2px;
        }

        /* --- CONTENIDO DERECHO --- */
        .cont-derecho {
            width: 35%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 25px;
            padding-right: 2%;
        }

        .selector-idioma {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            font-weight: 700;
        }

        .idioma-activo {
            text-decoration: none;
            color: #0d3446;
        }

        .divisor {
            color: #cbd5e1;
        }

        .idioma-opcion {
            text-decoration: none;
            color: #94a3b8;
            transition: color 0.2s ease;
        }

        .idioma-opcion:hover {
            cursor: pointer;
            color: #e58a13;
        }

        .menu-redes {
            position: relative;
            display: inline-block;
        }

        .btn-contacto {
            background-color: #0d3446;
            color: #ffffff;
            border: none;
            padding: 12px 35px;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .flecha-abajo {
            font-size: 0.65rem;
            transition: transform 0.3s ease;
        }

        .lista-redes {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #ffffff;
            min-width: 160px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            padding: 8px 0;
            margin-top: 8px;
            list-style: none;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 2500;
        }

        .red-link {
            display: block;
            padding: 10px 18px;
            text-decoration: none;
            color: #334155;
            font-size: 0.88rem;
            font-weight: 600;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .red-link.wsp:hover {
            background-color: #ecfdf5;
            color: #10b981;
        }

        .red-link.fb:hover {
            background-color: #eff6ff;
            color: #1d4ed8;
        }

        .red-link.tk:hover {
            background-color: #f8fafc;
            color: #0f172a;
        }

        .red-link.insta:hover {
            background-color: #fff5f5;
            color: #db2777;
        }

        .menu-redes:hover .lista-redes {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .menu-redes:hover .btn-contacto {
            background-color: #e58a13;
        }

        .menu-redes:hover .flecha-abajo {
            transform: rotate(180deg);
        }

        /* --- BARRA SECUNDARIA --- */
        .min-topbar {
            background-color: #0d3446;
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            left: 0;
            z-index: 2000;
            width: 100%;
            height: 40px;
        }

        .cont-mintopbar {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .mini-links {
            display: flex;
            list-style: none;
            gap: 50px;
        }

        .mini-links a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 500;
            display: inline-block;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .mini-links a:hover {
            transform: scale(1.05);
            color: #ffffff;
        }

        @media (max-width: 992px) {

            html,
            body {
                overflow-x: hidden;
                width: 100%;
            }

            .topbar {
                top: 0 !important;
                padding: 0 10px;
                height: 70px;
            }

            .cont-topbar {
                justify-content: space-between;
            }

            .cont-izquierdo {
                width: auto !important;
                padding-left: 0 !important;
                gap: 8px !important;
            }

            .logo {
                height: 40px !important;
                width: 40px !important;
            }

            .logo-titulo h1 {
                font-size: 0.85rem !important;
            }

            .logo-titulo h2 {
                font-size: 0.55rem !important;
            }

            .cont-central {
                position: fixed !important;
                top: 70px;
                right: -100%;
                visibility: hidden;
                width: 260px;
                height: calc(100vh - 70px);
                background-color: rgba(255, 255, 255, 0.98) !important;
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                box-shadow: -10px 10px 30px rgba(0, 0, 0, 0.08);
                flex-direction: column !important;
                justify-content: flex-start !important;
                align-items: flex-start !important;
                padding: 40px 25px !important;
                transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.4s !important;
                z-index: 2999 !important;
            }

            .cont-central.activo {
                right: 0 !important;
                visibility: visible !important;
            }

            .menu-principal {
                flex-direction: column !important;
                gap: 25px !important;
                width: 100% !important;
            }

            .menu-principal a {
                font-size: 1.1rem !important;
                width: 100% !important;
                display: block;
            }

            .cont-derecho {
                display: flex !important;
                width: auto !important;
                align-items: center !important;
                justify-content: flex-end !important;
                gap: 12px !important;
                padding-right: 0 !important;
                margin-left: auto;
                margin-right: 8px;
            }

            .btn-contacto {
                padding: 8px 14px !important;
                font-size: 0.8rem !important;
                border-radius: 6px !important;
            }

            .selector-idioma {
                font-size: 0.8rem !important;
            }

            .lista-redes {
                right: 0 !important;
                left: auto !important;
                width: 150px !important;
            }

            .btn-hamburguesa {
                display: flex !important;
                padding: 5px !important;
            }
        }

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
    <nav class="min-topbar">
        <div class="cont-mintopbar">
            <ul class="mini-links">
                <li><a href="#">Countries</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
        </div>
    </nav>
    <nav class="topbar">
        <div class="cont-topbar">
            <a href="index.php" class="cont-izquierdo">
                <div class="logo">
                    <img src="./logo.png" alt="Logo Advance Sound Center">
                </div>
                <div class="logo-titulo">
                    <h1>ADVANCED SOUND CENTER</h1>
                    <h2>JAPANE USED CAR EXPORTER</h2>
                </div>
            </a>
            <div class="cont-central">
                <ul class="menu-principal">
                    <li><a href="#">Catalog</a></li>
                    <li><a href="#">Catalog</a></li>
                    <li><a href="#">Catalog</a></li>
                </ul>
            </div>
            <div class="cont-derecho">
                <div class="selector-idioma">
                    <span class="idioma-opcion">ES</span>
                    <span class="divisor">|</span>
                    <a href="#" class="idioma-activo">EN</a>
                </div>
                <div class="menu-redes">
                    <button class="btn-contacto">
                        Contact us
                        <span class="flecha-abajo">▼</span>
                    </button>
                    <ul class="lista-redes">
                        <li><a href="https://wa.me/51978631055?text=Hola%20Advance%20Sound%20Center,%20solicito%20información%20sobre%20el%20catálogo%20de%20autos." class="red-link wsp" target="_blank">WhatsApp</a></li>
                        <li><a href="#" class="red-link fb" target="_blank">Facebook</a></li>
                        <li><a href="#" class="red-link tk" target="_blank">TikTok</a></li>
                        <li><a href="https://instagram.com/advancedsouthcentral" class="red-link insta" target="_blank">Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
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