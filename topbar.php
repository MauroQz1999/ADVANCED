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

        .btn-hamburguesa {
            display: none;
            background: none;
            border: none;
            flex-direction: column;
            justify-content: space-between;
            width: 24px;
            height: 18px;
            cursor: pointer;
            z-index: 3000;
        }

        .btn-hamburguesa span {
            width: 100%;
            height: 3px;
            background-color: #0d3446;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        @media (max-width: 992px) {

            html,
            body {
                position: relative;
                overflow-x: hidden !important;
                width: 100% !important;
                max-width: 100% !important;
                min-height: 100vh;
                display: block !important;
            }

            .min-topbar,
            .topbar {
                display: flex !important;
                flex-shrink: 0;
            }

            .min-topbar {
                position: sticky;
                top: 0;
                z-index: 2001;
                width: 100%;
                height: 40px;
                max-width: 100%;
            }

            .cont-mintopbar {
                width: 100%;
                padding: 0 10px;
            }

            .mini-links {
                gap: 15px !important;
                width: 100%;
                justify-content: center;
                padding: 0;
            }

            .mini-links a {
                font-size: 0.75rem !important;
                white-space: nowrap;
            }

            .topbar {
                position: sticky;
                top: 40px !important;
                padding: 0 12px;
                height: 70px;
                width: 100%;
                max-width: 100%;
            }

            .cont-topbar {
                justify-content: space-between;
                width: 100%;
            }

            .cont-izquierdo {
                width: auto !important;
                padding-left: 0 !important;
                gap: 6px !important;
            }

            .logo {
                height: 38px !important;
                width: 38px !important;
            }

            .logo-titulo h1 {
                font-size: 0.8rem !important;
            }

            .logo-titulo h2 {
                font-size: 0.52rem !important;
            }

            .cont-central {
                position: fixed !important;
                top: 68px;
                right: -100%;
                visibility: hidden;
                width: 270px;
                height: calc(100vh - 110px);
                background-color: rgba(255, 255, 255, 0.98) !important;
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                box-shadow: -10px 10px 30px rgba(0, 0, 0, 0.1);
                flex-direction: column !important;
                justify-content: flex-start !important;
                align-items: flex-start !important;
                padding: 30px 25px 40px 25px !important;
                transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.4s !important;
                z-index: 2999 !important;
                overflow-y: auto;
            }

            .cont-central.activo {
                right: 0 !important;
                visibility: visible !important;
            }

            .menu-principal {
                flex-direction: column !important;
                gap: 20px !important;
                width: 100% !important;
            }

            .menu-principal a {
                font-size: 1.15rem !important;
                width: 100% !important;
                display: block;
                padding: 8px 0;
                border-bottom: 1px solid #f1f5f9;
            }

            .cont-derecho {
                display: flex !important;
                width: auto !important;
                align-items: center !important;
                justify-content: flex-end !important;
                gap: 8px !important;
                padding-right: 0 !important;
                margin-left: auto;
            }

            .btn-contacto {
                padding: 8px 12px !important;
                font-size: 0.8rem !important;
                border-radius: 6px !important;
                white-space: nowrap;
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
                flex-direction: column;
                justify-content: space-between;
                width: 22px;
                height: 16px;
                background: none;
                border: none;
                cursor: pointer;
                z-index: 3000;
                padding: 0 !important;
            }

            .btn-hamburguesa span {
                width: 100%;
                height: 3px;
                background-color: #0d3446;
                border-radius: 2px;
                transition: all 0.3s ease;
            }

            .btn-hamburguesa.activo span:nth-child(1) {
                transform: translateY(6px) rotate(45deg);
            }

            .btn-hamburguesa.activo span:nth-child(2) {
                opacity: 0;
            }

            .btn-hamburguesa.activo span:nth-child(3) {
                transform: translateY(-7px) rotate(-45deg);
            }
        }
    </style>

</head>

<body>
    <nav class="min-topbar">
        <div class="cont-mintopbar">
            <ul class="mini-links">
                <li><a href="#" data-i18n="min_top1">Países</a></li>
                <li><a href="how_to_buy.php" data-i18n="min_top2">Cómo comprar</a></li>
                <li><a href="servicios.php" data-i18n="min_top3">Servicios</a></li>
                <li><a href="aboutus.php" data-i18n="min_top4">Sobre nosotros</a></li>
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
                    <h1>ADVANCED SOUTH CENTRAL</h1>
                    <h2>JAPANE USED CAR EXPORTER</h2>
                </div>
            </a>
            <div class="cont-central" id="menuCentral">
                <ul class="menu-principal">
                    <li><a href="inventario.php" data-i18n="top1">Catalogo</a></li>
                    <li><a href="inventario.php" data-i18n="top2">Catalogo</a></li>
                    <li><a href="inventario.php" data-i18n="top3">Catalogo</a></li>
                </ul>
            </div>
            <div class="cont-derecho">
                <div class="selector-idioma" id="language-selector">
                    <span class="idioma-activo" data-lang="es">ES</span>
                    <span class="divisor">|</span>
                    <a href="javascript:void(0);" class="idioma-opcion" data-lang="en">EN</a>
                </div>
                <div class="menu-redes">
                    <button class="btn-contacto">
                        Contact us
                        <span class="flecha-abajo">▼</span>
                    </button>
                    <ul class="lista-redes">
                        <li><a href="https://wa.me/51978631055?text=Hola%20Advance%20South%20Central,%20solicito%20información%20sobre%20el%20catálogo%20de%20autos." class="red-link wsp" target="_blank">WhatsApp</a></li>
                        <li><a href="#" class="red-link fb" target="_blank">Facebook</a></li>
                        <li><a href="#" class="red-link tk" target="_blank">TikTok</a></li>
                        <li><a href="https://instagram.com/advancedsouthcentral" class="red-link insta" target="_blank">Instagram</a></li>
                    </ul>
                </div>

                <button class="btn-hamburguesa" id="btnMenu" aria-label="Abrir menú">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnMenu = document.getElementById('btnMenu');
            const menuCentral = document.getElementById('menuCentral');

            if (btnMenu && menuCentral) {

                btnMenu.addEventListener('click', (e) => {
                    e.stopPropagation();
                    btnMenu.classList.toggle('activo');
                    menuCentral.classList.toggle('activo');
                });

                document.addEventListener('click', (e) => {
                    if (!menuCentral.contains(e.target) && !btnMenu.contains(e.target)) {
                        btnMenu.classList.remove('activo');
                        menuCentral.classList.remove('activo');
                    }
                });
            }
        });

        /* --------------------------------------------------------------------------------------------- */

        let currentLang = localStorage.getItem('language') || 'es';

        // 1. Cargar el archivo JSON
        async function loadTranslations(lang) {
            try {
                const response = await fetch(`lang/${lang}.json`);
                return await response.json();
            } catch (error) {
                console.error("Error cargando el idioma:", error);
            }
        }

        // 2. Aplicar la traducción y actualizar los estilos del botón
        async function translatePage(lang) {
            const translations = await loadTranslations(lang);
            if (!translations) return;

            // Traducir todos los elementos con data-i18n
            document.querySelectorAll('[data-i18n]').forEach(element => {
                const key = element.getAttribute('data-i18n');
                if (translations[key]) {
                    element.textContent = translations[key];
                }
            });

            // Cambiar el atributo lang del documento
            document.documentElement.lang = lang;

            // Actualizar visualmente tu selector de idioma
            updateSelectorUI(lang);
        }

        // 3. Función para cambiar las clases de tu HTML (intercambiar ES y EN)
        function updateSelectorUI(lang) {
            const selector = document.getElementById('language-selector');
            if (!selector) return;

            // Limpiamos el contenedor para redibujarlo con el orden correcto
            if (lang === 'es') {
                selector.innerHTML = `
            <span class="idioma-activo" data-lang="es">ES</span>
            <span class="divisor">|</span>
            <a href="javascript:void(0);" class="idioma-opcion" data-lang="en">EN</a>
        `;
            } else {
                selector.innerHTML = `
            <a href="javascript:void(0);" class="idioma-opcion" data-lang="es">ES</a>
            <span class="divisor">|</span>
            <span class="idioma-activa" class="idioma-activo" data-lang="en">EN</span>
        `;
            }

            // Volver a escuchar los clics en el nuevo enlace generado
            addSelectorEvent();
        }

        // 4. Escuchar el clic en la opción que no está activa
        function addSelectorEvent() {
            const opcionCambio = document.querySelector('.idioma-opcion');
            if (opcionCambio) {
                opcionCambio.addEventListener('click', () => {
                    const targetLang = opcionCambio.getAttribute('data-lang');
                    currentLang = targetLang;
                    localStorage.setItem('language', currentLang);
                    translatePage(currentLang);
                });
            }
        }

        // Iniciar el script al cargar la página
        document.addEventListener('DOMContentLoaded', () => {
            translatePage(currentLang);
        });
    </script>
</body>

</html>