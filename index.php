<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "mysql.railway.internal";
$username = "root";
$password = "XGdcltEeQVjbsOjfHJmqpWnmQZqUqrOq";
$dbname = "railway";

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
        .hero-banner {
            width: 100%;
            padding: 30px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carrusel-contenedor {
            width: 90%;
            max-width: 1400px;
            height: clamp(380px, 34vw, 480px);
            background-color: #ffffff;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(13, 52, 70, 0.06);
            overflow: hidden;
            position: relative;
        }

        .slide {
            display: none;
            width: 100%;
            height: 100%;
            grid-template-columns: 42% 58%;
        }

        .slide.activo {
            display: grid;
        }

        .slide-info {
            padding: clamp(25px, 4vw, 60px) clamp(30px, 4.5vw, 60px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: #ffffff;
            z-index: 2;
        }

        .slide-info .tagline {
            color: #e58a13;
            font-size: clamp(0.75rem, 0.9vw, 0.85rem);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: clamp(6px, 1vw, 12px);
        }

        .slide-info h2 {
            color: #0d3446;
            font-size: clamp(1.5rem, 2.4vw, 2.3rem);
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: clamp(10px, 1.5vw, 18px);
            text-transform: uppercase;
        }

        .slide-info p {
            color: #64748b;
            font-size: clamp(0.85rem, 1vw, 0.98rem);
            line-height: 1.4;
            margin-bottom: clamp(15px, 2vw, 30px);
        }

        .slide-info .btn-cta {
            align-self: flex-start;
            background-color: #e58a13;
            color: #ffffff;
            text-decoration: none;
            padding: clamp(10px, 1vw, 14px) clamp(20px, 2.2vw, 32px);
            font-size: clamp(0.8rem, 0.9vw, 0.9rem);
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 8px;
            box-shadow: 0 4px 14px rgba(229, 138, 19, 0.3);
            transition: background-color 0.25s ease, transform 0.2s ease, box-shadow 0.25s ease;
        }

        .slide-info .btn-cta:hover {
            background-color: #c9750e;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(229, 138, 19, 0.45);
        }

        .slide-imagen {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .slide-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .slide-imagen::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 35%;
            height: 100%;
            background: linear-gradient(to right, #ffffff, transparent);
            z-index: 1;
        }

        @media (max-width: 680px) {
            .carrusel-contenedor {
                height: auto;
            }

            .slide.activo {
                display: flex;
                flex-direction: column-reverse;
            }

            .slide-info {
                padding: 30px 20px;
                text-align: center;
                align-items: center;
            }

            .slide-info h2 {
                font-size: 1.6rem;
            }

            .slide-info p {
                font-size: 0.95rem;
            }

            .slide-info .btn-cta {
                align-self: center;
            }

            .slide-imagen {
                height: 220px;
            }

            .slide-imagen::after {
                width: 100%;
                height: 40%;
                top: auto;
                bottom: 0;
                background: linear-gradient(to top, #ffffff, transparent);
            }
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        .carrusel_logos {
            width: 90%;
            max-width: 1400px;
            margin: 20px auto;
            border-top: 1px solid rgba(13, 52, 70, 0.15);
            border-bottom: 1px solid rgba(13, 52, 70, 0.15);
            height: 90px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            overflow: hidden;
            position: relative;
            box-sizing: border-box;
        }

        .carta_logo {
            width: 100px;
            height: 60px;
            margin-right: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            cursor: pointer;
            box-sizing: border-box;
            overflow: hidden;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .carta_logo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            object-position: center;
            display: block;
        }

        .carta_logo:hover {
            transform: translateY(-4px);
        }

        @media (max-width: 580px) {
            .carrusel_logos {
                height: 50px;
                margin: 15px auto;
                background-color: #ffffff;
                position: relative;
            }

            .carrusel_logos::before,
            .carrusel_logos::after {
                content: '';
                position: absolute;
                top: 0;
                width: 30px;
                height: 100%;
                z-index: 2;
            }

            .carrusel_logos::before {
                left: 0;
                background: linear-gradient(to right, #ffffff, transparent);
            }

            .carrusel_logos::after {
                right: 0;
                background: linear-gradient(to left, #ffffff, transparent);
            }

            .carta_logo {
                width: 50px;
                height: 30px;
                margin-right: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .carta_logo img {
                opacity: 0.6;
                width: auto;
                height: auto;
                max-width: 100%;
                max-height: 100%;
                object-fit: contain;
            }
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        .sub-titulo {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 10px;
            position: relative;
        }

        .sub-titulo h1 {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: #64748b;
            font-weight: 700;
            margin: 0;
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        .carrusel_destacados,
        .carrusel_destacados1 {
            /* Alineación idéntica al banner superior (90% de ancho) */
            width: 90%;
            max-width: 1400px;
            margin: 20px auto;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            /* Separación fluida entre tarjetas */
            gap: clamp(15px, 2vw, 30px);
            overflow-x: auto;
            scroll-behavior: smooth;
            /* Espacio inferior para evitar que las sombras de las cartas se corten al hacer hover */
            padding-bottom: 25px;
            padding-top: 10px;
            scrollbar-width: none;
            /* Añadimos scroll por inercia para una experiencia táctil premium en móviles y tablets */
            -webkit-overflow-scrolling: touch;
        }

        .carrusel_destacados::-webkit-scrollbar,
        .carrusel_destacados1::-webkit-scrollbar {
            display: none;
        }

        .carta_normal,
        .carta_normal1 {
            /* Usamos clamp para que la tarjeta reduzca su ancho suavemente en pantallas chicas */
            width: clamp(260px, 22vw, 320px);
            flex-shrink: 0;
            background-color: #ffffff;
            margin-bottom: 5px;
            border: 1px solid rgba(13, 52, 70, 0.12);
            border-radius: 16px;
            overflow: hidden;
            box-sizing: border-box;
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
            /* La altura de la imagen se adapta proporcionalmente al ancho de la tarjeta */
            height: clamp(190px, 18vw, 250px);
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
    
    /* Forzamos una distribución vertical perfecta */
    display: flex;
    flex-direction: column;
    justify-content: space-between; 
    
    /* Ajustamos el padding dinámicamente para que no empuje el contenido */
    padding: clamp(12px, 3vw, 22px);
    box-sizing: border-box;
    
    /* Estado inicial: oculto */
    opacity: 0;
    pointer-events: none; /* Evita interferencias cuando está oculto */
    transition: opacity 0.3s ease;
    z-index: 10;
}

/* Activadores del Hover: Asegura que se muestre en ambas clases de tarjetas */
.carta_normal:hover .specs-overlay,
.carta_normal1:hover .specs-overlay {
    opacity: 1;
    pointer-events: auto; /* Permite hacer clic en el botón negro al mostrarse */
}

/* Contenedor interno para agrupar las filas de datos */
.specs-overlay-lista {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: clamp(4px, 1.2vw, 10px); /* Separación elástica entre filas */
}

.spec-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #f1f5f9;
    padding-bottom: 5px;
    margin: 0;
    width: 100%;
}

.spec-label {
    font-size: 0.68rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #64748b;
    font-weight: 600;
    flex-shrink: 0;
}

/* El valor de la derecha (Año, Transmisión, etc.) */
.spec-item > span:last-child {
    font-size: clamp(0.7rem, 0.8vw, 0.8rem);
    color: #0d3446;
    font-weight: 600;
    text-align: right;
    max-width: 65%;
    
    /* Si el nombre del motor u otro dato es muy largo, se corta con (...) elegantemente */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* ========================================================
   EL BOTÓN NEGRO ("VER DETALLES") REUBICADO AL FONDO
   ======================================================== */
.specs-overlay .boton-negro,
.specs-overlay div[style*="background: black"],
.specs-overlay a[style*="background: black"] {
    width: 100%;
    height: clamp(32px, 3.5vw, 40px); /* Altura elástica y estilizada */
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
    
    /* Empuja el botón magnéticamente abajo del todo, respetando los datos */
    margin-top: auto; 
    box-sizing: border-box;
    cursor: pointer;
}

        .info-car {
            padding: clamp(15px, 1.5vw, 20px);
            background: #ffffff;
        }

        .info_fabricante {
            font-size: clamp(0.65rem, 0.7vw, 0.7rem);
            font-weight: 700;
            letter-spacing: 3px;
            color: #e58a13;
            text-transform: uppercase;
        }

        .info_modelo {
            font-size: clamp(1.1rem, 1.2vw, 1.3rem);
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

        /* ========================================================
   OPTIMIZACIONES EXCLUSIVAS PARA TABLETS Y MÓVILES
   ======================================================== */
        @media (max-width: 480px) {
            .spec-item {
                /* En celulares, si el texto es largo, se transforma en diseño vertical */
                flex-direction: row;
                justify-content: space-between;
            }

            /* Si tienes textos ultra largos en motores, este ajuste los pasa abajo limpiamente */
            .spec-item>span:last-child {
                max-width: 100%;
                text-align: right;
                font-size: 0.75rem;
                /* Ajuste sutil de tamaño para móvil */
            }
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        .seccion-tops {
            width: 100%;
            padding: 40px 0;
            display: flex;
            justify-content: center;
        }

        .contenedor-tops {
            width: 75%;
            max-width: 1400px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .columna-top {
            display: flex;
            flex-direction: column;
        }

        .columna-top h3 {
            font-size: 1.1rem;
            color: #0d3446;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 8px;
            border-bottom: 2px solid rgba(13, 52, 70, 0.1);
        }

        .columna-top h3::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: #e58a13;
        }

        .grupo-botones-top {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn-top-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-decoration: none;
            background-color: #ffffff;
            color: #475569;
            padding: 12px 16px;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 8px;
            border: 1px solid rgba(13, 52, 70, 0.08);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
            transition: all 0.25s ease;
        }

        .btn-top-item .rank {
            font-size: 0.75rem;
            color: #94a3b8;
            font-weight: 700;
            transition: color 0.25s ease;
        }

        .btn-top-item:hover {
            background-color: #0d3446;
            color: #ffffff;
            border-color: #0d3446;
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(13, 52, 70, 0.15);
        }

        .btn-top-item:hover .rank {
            color: #e58a13;
        }

        @media (max-width: 1200px) {
            .contenedor-tops {
                grid-template-columns: repeat(2, 1fr);
                gap: 40px;
            }
        }

        @media (max-width: 600px) {
            .contenedor-tops {
                width: 90%;
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        .seccion-mega-inventario {
            width: 100%;
            padding: 20px 0 40px 0;
            display: flex;
            justify-content: center;
        }

        .contenedor-mega {
            width: 75%;
            max-width: 1400px;
        }

        .tabs-navegacion {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 35px;
            border-bottom: 2px solid rgba(13, 52, 70, 0.06);
            padding-bottom: 15px;
        }

        .tab-btn {
            background: none;
            border: none;
            font-size: 1rem;
            font-weight: 700;
            color: #64748b;
            padding: 10px 24px;
            cursor: pointer;
            position: relative;
            transition: color 0.3s ease;
            font-family: 'Outfit', sans-serif;
        }

        .tab-btn:hover {
            color: #0d3446;
        }

        .tab-btn.active {
            color: #0d3446;
        }

        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -17px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #e58a13;
        }

        .tab-badge {
            background-color: #ef4444;
            color: #ffffff;
            font-size: 0.65rem;
            padding: 2px 6px;
            border-radius: 4px;
            margin-left: 5px;
            vertical-align: middle;
        }

        .tab-panel {
            display: none;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .tab-panel.active {
            display: block;
            opacity: 1;
        }

        .grid-mosaico {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .grid-proposito {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .tarjeta-proposito {
            height: 280px;
            border-radius: 16px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .tarjeta-proposito img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .capa-proposito {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(13, 52, 70, 0.95) 30%, rgba(13, 52, 70, 0.2));
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 25px;
        }

        .capa-proposito h3 {
            color: #ffffff;
            font-size: 1.3rem;
            margin-bottom: 8px;
        }

        .capa-proposito p {
            color: #cbd5e1;
            font-size: 0.85rem;
            line-height: 1.4;
            margin-bottom: 15px;
        }

        .capa-proposito a {
            color: #e58a13;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 700;
        }

        .tarjeta-proposito:hover img {
            transform: scale(1.05);
        }

        .galeria-puerto {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 180px);
            gap: 20px;
        }

        .foto-galeria {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
        }

        .foto-galeria.grande {
            grid-row: span 2;
        }

        .foto-galeria img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .info-foto {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(13, 52, 70, 0.8);
            backdrop-filter: blur(4px);
            color: #ffffff;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 12px 20px;
        }

        .mini-carta-auto {
            background-color: #ffffff;
            border: 1px solid rgba(13, 52, 70, 0.08);
            border-radius: 12px;
            display: flex;
            align-items: stretch;
            overflow: hidden;
            height: 140px;
            transition: all 0.3s;
        }

        .mini-carta-auto:hover {
            transform: translateY(-3px);
            border-color: rgba(13, 52, 70, 0.2);
            box-shadow: 0 10px 25px rgba(13, 52, 70, 0.06);
        }

        .mini-img {
            flex: 0 0 50%;
            max-width: 160px;
            min-width: 110px;
            position: relative;
            height: 100%;
        }

        .mini-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        .badge-subasta {
            position: absolute;
            bottom: 8px;
            left: 8px;
            background-color: rgba(13, 52, 70, 0.85);
            color: #ffffff;
            font-size: 0.6rem;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 4px;
        }

        .mini-info {
            width: 60%;
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .mini-marca {
            font-size: 0.65rem;
            font-weight: 800;
            color: #e58a13;
            letter-spacing: 1.5px;
        }

        .mini-info h4 {
            font-size: 0.95rem;
            color: #0d3446;
            font-weight: 700;
            margin: 2px 0;
        }

        .mini-info p {
            color: #64748b;
            font-size: 0.75rem;
        }

        .btn-mini-detalles {
            align-self: flex-start;
            text-decoration: none;
            font-size: 0.75rem;
            font-weight: 700;
            color: #0d3446;
            background-color: #f1f5f9;
            padding: 5px 14px;
            border-radius: 6px;
        }

        .mini-carta-auto:hover .btn-mini-detalles {
            background-color: #0d3446;
            color: #ffffff;
        }

        @media (max-width: 1024px) {

            .grid-mosaico,
            .grid-proposito {
                grid-template-columns: repeat(2, 1fr);
            }

            .galeria-puerto {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
            }

            .foto-galeria.grande {
                grid-row: auto;
                height: 250px;
            }

            .foto-galeria {
                height: 200px;
            }
        }

        @media (max-width: 768px) {
            .contenedor-mega {
                width: 90%;
            }

            .tabs-navegacion {
                flex-direction: column;
                gap: 5px;
            }

            .tab-btn.active::after {
                display: none;
            }

            .grid-mosaico,
            .grid-proposito {
                grid-template-columns: 1fr;
            }
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        .seccion-soporte-calculo {
            width: 100%;
            padding: 20px 0 60px 0;
            display: flex;
            justify-content: center;
        }

        .contenedor-soporte {
            width: 75%;
            max-width: 1400px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .bloque-calculadora,
        .bloque-faq {
            background-color: #ffffff;
            border: 1px solid rgba(13, 52, 70, 0.08);
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.01);
        }

        .bloque-calculadora h3,
        .bloque-faq h3 {
            font-size: 1.4rem;
            color: #0d3446;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .calc-p {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .form-calculadora {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .campo-calc {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .campo-calc label {
            font-size: 0.85rem;
            font-weight: 700;
            color: #334155;
        }

        .campo-calc select {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid rgba(13, 52, 70, 0.15);
            font-size: 0.9rem;
            color: #0d3446;
            outline: none;
            font-family: 'Outfit', sans-serif;
            background-color: #f8fafc;
        }

        .btn-calcular {
            background-color: #0d3446;
            color: #ffffff;
            border: none;
            padding: 14px;
            font-size: 0.95rem;
            font-weight: 700;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-family: 'Outfit', sans-serif;
        }

        .btn-calcular:hover {
            background-color: #e58a13;
        }

        .resultado-caja {
            margin-top: 25px;
            padding: 20px;
            background-color: #f8fafc;
            border-radius: 8px;
            border-left: 4px solid #e58a13;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .resultado-caja span {
            font-size: 0.8rem;
            color: #64748b;
            font-weight: 600;
        }

        .resultado-caja strong {
            font-size: 1.6rem;
            color: #0d3446;
            font-weight: 800;
        }

        .resultado-caja small {
            font-size: 0.72rem;
            color: #94a3b8;
            margin-top: 5px;
        }

        .faq-item {
            border-bottom: 1px solid rgba(13, 52, 70, 0.08);
            padding: 15px 0;
        }

        .faq-pregunta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }

        .faq-pregunta h4 {
            font-size: 0.98rem;
            color: #334155;
            font-weight: 600;
            transition: color 0.3s;
        }

        .faq-item:hover .faq-pregunta h4 {
            color: #e58a13;
        }

        .faq-icono {
            font-size: 1.2rem;
            color: #64748b;
            font-weight: 700;
            transition: transform 0.3s;
        }

        .faq-respuesta {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s cubic-bezier(0, 1, 0, 1);
        }

        .faq-respuesta p {
            color: #64748b;
            font-size: 0.88rem;
            line-height: 1.6;
            padding-top: 10px;
        }

        .faq-item.active .faq-respuesta {
            max-height: 300px;
            transition: max-height 0.3s cubic-bezier(1, 0, 1, 0);
        }

        .faq-item.active .faq-icono {
            transform: rotate(45deg);
            color: #e58a13;
        }

        @media (max-width: 992px) {
            .contenedor-soporte {
                grid-template-columns: 1fr;
                width: 90%;
                gap: 30px;
            }

            .bloque-calculadora,
            .bloque-faq {
                padding: 25px;
            }
        }

        /* -------------------------------------------------------------------------------------------------------------- */
        .banner_pilares {
            margin-top: 50px;
            margin-bottom: 50px;
            width: 100%;
            height: 500px;
            display: flex;
            flex-direction: row;
            overflow: hidden;
            position: relative;
            background-color: #000;
        }

        .banner_pilares::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('img/3.jpeg');
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 0;
        }

        .pilar {
            flex: 1;
            height: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            box-sizing: border-box;
            background: transparent;
            transition: flex 0.5s ease;
            z-index: 1;
        }

        .texpilar {
            flex: 1;
            min-width: 280px;
            max-width: 400px;
            padding: 30px 25px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 16px;
            box-sizing: border-box;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            transition: transform 0.4s ease, border-color 0.4s ease, background-color 0.4s ease;
            color: white;
        }

        .pilar:hover .texpilar {
            transform: translateY(-8px);
            background: rgba(0, 51, 78, 0.5);
            border-color: rgba(229, 138, 19, 0.4);
            color: white;
            cursor: pointer;
        }

        .pilar-tag {
            font-size: 0.72rem;
            font-weight: 700;
            color: #e58a13;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
        }

        .pilar-titulo {
            font-size: 1.45rem !important;
            font-weight: 800 !important;
            color: #ffffff;
            line-height: 1.25;
            margin-bottom: 14px;
            text-transform: none;
        }

        .pilar-descripcion {
            font-size: 0.88rem !important;
            line-height: 1.6 !important;
            color: #cbd5e1 !important;
            margin-bottom: 20px;
        }

        .pilar-lista {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .pilar-lista li {
            font-size: 0.85rem;
            color: #f8fafc;
            font-weight: 600;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            line-height: 1.4;
        }

        .pilar-check {
            color: #e58a13;
            font-weight: 800;
            font-size: 0.95rem;
        }

        @media (max-width: 768px) {
            .texpilar {
                width: 95% !important;
                padding: 20px !important;
            }

            .pilar-titulo {
                font-size: 1.25rem !important;
            }

            .banner_pilares {
                flex-direction: column;
                height: auto;
            }

            .banner_pilares::before {
                background-attachment: scroll;
            }

            .pilar {
                width: 100%;
                height: 300px;
            }
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        .operacion-origen {
            width: 100%;
            padding: 40px 0;
            display: flex;
            justify-content: center;
        }

        .contenedor-operacion {
            width: 90%;
            max-width: 1500px;
            display: flex;
            flex-direction: column;
            gap: 80px;
        }

        .op-bloque {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;
        }

        .op-bloque.inverso {
            flex-direction: row-reverse;
        }

        .op-contenido {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .op-tag {
            font-size: 0.75rem;
            font-weight: 700;
            color: #e58a13;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .op-contenido h3 {
            font-size: 1.8rem;
            color: #0d3446;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .op-contenido p {
            color: #64748b;
            font-size: 0.98rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .op-lista {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .op-lista li {
            color: #334155;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .op-imagen {
            flex: 1;
            height: 380px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(13, 52, 70, 0.06);
            border: 1px solid rgba(13, 52, 70, 0.08);
        }

        .op-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .op-bloque:hover .op-imagen img {
            transform: scale(1.03);
        }

        /* --- RESPONSIVE --- */
        @media (max-width: 992px) {
            .contenedor-operacion {
                width: 90%;
                gap: 50px;
            }

            .op-bloque,
            .op-bloque.inverso {
                flex-direction: column !important;
                gap: 25px;
            }

            .op-imagen {
                width: 100%;
                height: 250px;
            }

            .op-contenido h3 {
                font-size: 1.4rem;
            }
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        .contenedor-titulo-nosotros {
            width: 100%;
            max-width: 1400px;
            margin-top: 80px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0 20px;
        }

        .nosotros-pre-titulo {
            font-size: 0.8rem;
            font-weight: 800;
            color: #e58a13;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 8px;
        }

        .nosotros-titulo-principal {
            font-size: 2.8rem;
            font-weight: 900;
            color: #0d3446;
            letter-spacing: -1px;
            line-height: 1.1;
            text-transform: uppercase;
            position: relative;
        }

        .nosotros-linea-decorativa {
            width: 60px;
            height: 4px;
            background-color: #e58a13;
            border-radius: 2px;
            margin-top: 15px;
        }

        @media (max-width: 768px) {
            .contenedor-titulo-nosotros {
                margin-top: 50px;
            }

            .nosotros-titulo-principal {
                font-size: 2rem;
            }

            .nosotros-pre-titulo {
                font-size: 0.7rem;
                letter-spacing: 2px;
            }
        }
    </style>
</head>

<body>

    <?php include 'topbar.php'; ?>

    <section class="hero-banner">
        <div class="carrusel-contenedor">
            <div class="slide activo">
                <div class="slide-info">
                    <span class="tagline">Logística y Exportación Global</span>
                    <h2>Encontrando tu siguiente auto japonés desde el puerto</h2>
                    <p>Expertos en la exportación de vehículos. Tu socio confiable con acceso directo a las principales subastas y embarques de Japón.</p>
                    <a href="#" class="btn-cta">Ver Inventario Disponible</a>
                </div>
                <div class="slide-imagen">
                    <img src="./puerto.jpeg" alt="Embarque de autos Advance Sound Center">
                </div>
            </div>
        </div>
    </section>

    <section class="carrusel_logos">
        <?php
        $sql = "SELECT * 
                FROM marcas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="carta_logo" onclick="window.location.href='inventario.php?marca=<?php echo urlencode($row['nombre']); ?>'">
                    <img src="<?php echo htmlspecialchars($row['logo']); ?>" alt="Car">
                </div>
        <?php
            }
        } else {
            echo "<p>No hay vehículos disponibles en este momento.</p>";
        }
        ?>
    </section>

    <div class="sub-titulo">
        <h1>Modelos Destacados</h1>
    </div>

    <div class="carrusel_destacados">
        <?php
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
                WHERE a.destacado = 1
                GROUP BY a.id";
        $result = $conn->query($sql);

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

    <div class="sub-titulo">
        <h1>Modelos Recomendados</h1>
    </div>

    <div class="carrusel_destacados1">
        <?php
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
                WHERE a.destacado = 1
                GROUP BY a.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="carta_normal1" onclick="window.location.href='datos.php?id=<?php echo $row['id']; ?>'">
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

    <div class="sub-titulo" style="margin-top: 20px;">
        <h1>Lo más solicitado del mercado</h1>
    </div>

    <section class="seccion-tops">
        <div class="contenedor-tops">

            <div class="columna-top">
                <h3>Top Marcas</h3>
                <div class="grupo-botones-top">
                    <a href="#" class="btn-top-item">Toyota <span class="rank">#1</span></a>
                    <a href="#" class="btn-top-item">Nissan <span class="rank">#2</span></a>
                    <a href="#" class="btn-top-item">Honda <span class="rank">#3</span></a>
                    <a href="#" class="btn-top-item">Suzuki <span class="rank">#4</span></a>
                    <a href="#" class="btn-top-item">Mitsubishi <span class="rank">#5</span></a>
                </div>
            </div>

            <div class="columna-top">
                <h3>Modelos Más Vendidos</h3>
                <div class="grupo-botones-top">
                    <a href="#" class="btn-top-item">Toyota Hilux <span class="rank">#1</span></a>
                    <a href="#" class="btn-top-item">Nissan Caravan <span class="rank">#2</span></a>
                    <a href="#" class="btn-top-item">Toyota Probox <span class="rank">#3</span></a>
                    <a href="#" class="btn-top-item">Suzuki Hi jet <span class="rank">#4</span></a>
                    <a href="#" class="btn-top-item">Subaru Impreza <span class="rank">#5</span></a>
                </div>
            </div>

            <div class="columna-top">
                <h3>Por Categoría</h3>
                <div class="grupo-botones-top">
                    <a href="#" class="btn-top-item">Deportivos JDM <span class="rank">★</span></a>
                    <a href="#" class="btn-top-item">Camionetas SUV <span class="rank">★</span></a>
                    <a href="#" class="btn-top-item">Vehículos Comerciales <span class="rank">★</span></a>
                    <a href="#" class="btn-top-item">Sedanes / Hatchback <span class="rank">★</span></a>
                    <a href="#" class="btn-top-item">Maquinaria Pesada <span class="rank">★</span></a>
                </div>
            </div>

            <div class="columna-top">
                <h3>Servicios Especiales</h3>
                <div class="grupo-botones-top">
                    <a href="#" class="btn-top-item">Desarme para Repuestos</a>
                    <a href="#" class="btn-top-item">Compra Directa USS</a>
                    <a href="#" class="btn-top-item">Contenedores Completos</a>
                    <a href="#" class="btn-top-item">Envío RO-RO Seguro</a>
                    <a href="#" class="btn-top-item">Inspección Pre-Embarque</a>
                </div>
            </div>

        </div>
    </section>

    <div class="sub-titulo" style="margin-top: 20px;">
        <h1>Explora Nuestro Stock y Operaciones</h1>
    </div>

    <section class="seccion-mega-inventario">
        <div class="contenedor-mega">
            <div class="tabs-navegacion">
                <button class="tab-btn active" onclick="cambiarPestaña(event, 'tab-subastas')">
                    Más Vendidos <span class="tab-badge">Live</span>
                </button>
                <button class="tab-btn" onclick="cambiarPestaña(event, 'tab-proposito')">
                    Explorar por Tipo
                </button>
                <button class="tab-btn" onclick="cambiarPestaña(event, 'tab-puerto')">
                    Operaciones
                </button>
            </div>
            <div class="tabs-contenido">
                <div id="tab-subastas" class="tab-panel active">
                    <div class="grid-mosaico">
                        <div class="mini-carta-auto">
                            <div class="mini-img">
                                <img class="ban-img" src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=800" alt="Car">
                                <span class="badge-subasta">USS Tokyo</span>
                            </div>
                            <div class="mini-info">
                                <span class="mini-marca">NISSAN</span>
                                <h4>Skyline GT-R R34</h4>
                                <p>2002 • 84,000 km • Manual</p>
                                <a href="#" class="btn-mini-detalles">Detalles</a>
                            </div>
                        </div>
                        <div class="mini-carta-auto">
                            <div class="mini-img">
                                <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=500" alt="Toyota Hilux">
                                <span class="badge-subasta">TAA Kansai</span>
                            </div>
                            <div class="mini-info">
                                <span class="mini-marca">TOYOTA</span>
                                <h4>Hilux Revo 4x4</h4>
                                <p>2020 • 45,000 km • Auto</p>
                                <a href="#" class="btn-mini-detalles">Detalles</a>
                            </div>
                        </div>
                        <div class="mini-carta-auto">
                            <div class="mini-img">
                                <img src="https://images.unsplash.com/photo-1580273916550-e323be2ae537?q=80&w=500" alt="BMW">
                                <span class="badge-subasta">JAA</span>
                            </div>
                            <div class="mini-info">
                                <span class="mini-marca">BMW</span>
                                <h4>M3 Competition</h4>
                                <p>2018 • 62,000 km • DCT</p>
                                <a href="#" class="btn-mini-detalles">Detalles</a>
                            </div>
                        </div>
                        <div class="mini-carta-auto">
                            <div class="mini-img">
                                <img src="https://images.unsplash.com/photo-1606016159991-dfe4f2746ad5?q=80&w=500" alt="Subaru">
                                <span class="badge-subasta">USS Yokohama</span>
                            </div>
                            <div class="mini-info">
                                <span class="mini-marca">SUBARU</span>
                                <h4>Impreza WRX Sti</h4>
                                <p>2015 • 90,000 km • AWD</p>
                                <a href="#" class="btn-mini-detalles">Detalles</a>
                            </div>
                        </div>
                        <div class="mini-carta-auto">
                            <div class="mini-img">
                                <img src="https://images.unsplash.com/photo-1619767886558-efdc259cde1a?q=80&w=500" alt="Suzuki">
                                <span class="badge-subasta">JU Gifu</span>
                            </div>
                            <div class="mini-info">
                                <span class="mini-marca">SUZUKI</span>
                                <h4>Jimny Sierra</h4>
                                <p>2021 • 15,000 km • 4x4</p>
                                <a href="#" class="btn-mini-detalles">Detalles</a>
                            </div>
                        </div>
                        <div class="mini-carta-auto">
                            <div class="mini-img">
                                <img src="https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?q=80&w=500" alt="Toyota Probox">
                                <span class="badge-subasta">CAA Chubu</span>
                            </div>
                            <div class="mini-info">
                                <span class="mini-marca">TOYOTA</span>
                                <h4>Probox Van</h4>
                                <p>2017 • 110,000 km • FWD</p>
                                <a href="#" class="btn-mini-detalles">Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-proposito" class="tab-panel">
                    <div class="grid-proposito">
                        <div class="tarjeta-proposito">
                            <img src="https://images.unsplash.com/photo-1616422285623-13ff0162193c?q=80&w=600" alt="Deportivos JDM">
                            <div class="capa-proposito">
                                <h3>Deportivos JDM</h3>
                                <p>Iconos de la ingeniería japonesa: Skylines, Supra, Evos y Civic Type R.</p>
                                <a href="#">Ver Categoría →</a>
                            </div>
                        </div>
                        <div class="tarjeta-proposito">
                            <img src="https://images.unsplash.com/photo-1516515429572-bf32372f2409?q=80&w=600" alt="Vehículos Comerciales">
                            <div class="capa-proposito">
                                <h3>Comerciales y Vans</h3>
                                <p>Furgonetas, camionetas de trabajo pesado y camionetas Toyota Probox/Hiace.</p>
                                <a href="#">Ver Categoría →</a>
                            </div>
                        </div>
                        <div class="tarjeta-proposito">
                            <img src="https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?q=80&w=600" alt="SUVs Familiares">
                            <div class="capa-proposito">
                                <h3>SUVs & Familiares</h3>
                                <p>Vehículos cómodos y de gran despeje para terrenos difíciles o viajes.</p>
                                <a href="#">Ver Categoría →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-puerto" class="tab-panel">
                    <div class="galeria-puerto">
                        <div class="foto-galeria grande">
                            <img src="img/consolidacion.jpeg" alt="Logística real en contenedores">
                            <div class="info-foto">Consolidación en Contenedores - Puerto de ""</div>
                        </div>
                        <div class="foto-galeria">
                            <img src="img/embarque.jpeg" alt="Patios puerto">
                            <div class="info-foto">Unidades listas para embarque ""</div>
                        </div>
                        <div class="foto-galeria">
                            <img src="img/chasis.jpeg" alt="Inspeccion puerto">
                            <div class="info-foto">Inspección de chasis previa a la estiba</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="sub-titulo" style="margin-top: 20px;">
        <h1>Herramientas y Soporte</h1>
    </div>

    <section class="seccion-soporte-calculo">
        <div class="contenedor-soporte">

            <div class="bloque-calculadora">
                <h3>Cotizador de Envío Estimado</h3>
                <p class="calc-p">Calcula el costo aproximado de logística y flete marítimo desde Japón hasta tu región.</p>

                <form class="form-calculadora" onsubmit="calcularFlete(event)">
                    <div class="campo-calc">
                        <label>Categoría del Vehículo</label>
                        <select id="calc-tipo">
                            <option value="1200">Sedán / Compacto / JDM</option>
                            <option value="1600">SUV / Familiar / Pick-up</option>
                            <option value="2200">Vans / Camiones Ligeros</option>
                        </select>
                    </div>

                    <div class="campo-calc">
                        <label>Puerto de Destino</label>
                        <select id="calc-puerto">
                            <option value="400">Puerto de Callao (Perú) +$400</option>
                            <option value="350">Puerto de Iquique (Chile) +$350</option>
                            <option value="550">Puerto de Manzanillo (México) +$550</option>
                            <option value="600">Puerto de Santo Domingo (Rep. Dom) +$600</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-calcular">Calcular Costo Logístico</button>
                </form>

                <div id="resultado-calculo" class="resultado-caja">
                    <span>Costo Marítimo Estimado:</span>
                    <strong id="monto-flete">$0.00 USD</strong>
                    <small>*Nota: No incluye el valor del vehículo en subasta ni impuestos locales de aduana.</small>
                </div>
            </div>

            <div class="bloque-faq">
                <h3>Preguntas Frecuentes</h3>

                <div class="faq-item">
                    <div class="faq-pregunta" onclick="toggleFaq(this)">
                        <h4>¿Cuánto tiempo tarda en llegar el vehículo?</h4>
                        <span class="faq-icono">+</span>
                    </div>
                    <div class="faq-respuesta">
                        <p>El tránsito marítimo promedio desde los puertos de Japón (Yokohama/Kobe) hasta Latinoamérica dura entre 35 y 45 días, dependiendo de las escalas del buque y la ruta de la naviera.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-pregunta" onclick="toggleFaq(this)">
                        <h4>¿Qué documentos recibo para registrar el auto?</h4>
                        <span class="faq-icono">+</span>
                    </div>
                    <div class="faq-respuesta">
                        <p>Te enviamos por mensajería prioritaria (DHL) el Certificado de Exportación Original emitido en Japón, la Factura Comercial (Commercial Invoice) y el conocimiento de embarque (Bill of Lading - B/L).</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-pregunta" onclick="toggleFaq(this)">
                        <h4>¿Cuáles son los métodos de pago aceptados?</h4>
                        <span class="faq-icono">+</span>
                    </div>
                    <div class="faq-respuesta">
                        <p>Trabajamos mediante Transferencia Bancaria Internacional (Telegraphic Transfer - T/T) directamente a nuestras cuentas corporativas en Japón, garantizando la máxima seguridad legal en la transacción.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="banner_pilares">
        <div class="pilar">
            <div class="texpilar">
                <span class="pilar-tag">Control de Calidad</span>
                <h3 class="pilar-titulo">Inspección Rigurosa en Patios de Subasta</h3>
                <p class="pilar-descripcion">Asistimos físicamente a las terminales y casas de subastas en Japón para realizar una verificación técnica exhaustiva de cada unidad antes de realizar cualquier oferta de compra.</p>
                <ul class="pilar-lista">
                    <li><span class="pilar-check">✓</span> Verificación de estado de motor y transmisión.</li>
                    <li><span class="pilar-check">✓</span> Certificación de kilometraje real sin alteraciones.</li>
                </ul>
            </div>
        </div>

        <div class="pilar">
            <div class="texpilar">
                <span class="pilar-tag">Gestión Documental</span>
                <h3 class="pilar-titulo">Logística de Exportación y Trámites</h3>
                <p class="pilar-descripcion">Nos encargamos de todo el complejo proceso administrativo aduanero dentro de Japón. Aseguramos el despacho rápido y reservamos espacios prioritarios en buques de carga.</p>
                <ul class="pilar-lista">
                    <li><span class="pilar-check">✓</span> Gestión completa de títulos de exportación (Export Certificate).</li>
                    <li><span class="pilar-check">✓</span> Coordinación terrestre hacia los principales puertos.</li>
                </ul>
            </div>
        </div>

        <div class="pilar">
            <div class="texpilar">
                <span class="pilar-tag">Soporte y Entrega</span>
                <h3 class="pilar-titulo">Embarque e Integridad Asegurada</h3>
                <p class="pilar-descripcion">Supervisamos la estiba y el trincado de los vehículos en racks profesionales dentro del contenedor, garantizando la máxima protección y un tracking constante hasta tu puerto local.</p>
                <ul class="pilar-lista">
                    <li><span class="pilar-check">✓</span> Reportes fotográficos detallados pre-embarque.</li>
                    <li><span class="pilar-check">✓</span> Envío prioritario y seguro de documentación por DHL.</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="contenedor-titulo-nosotros">
        <span class="nosotros-pre-titulo">ADVANCED SOUND CENTER</span>
        <h1 class="nosotros-titulo-principal">Nuestra Operación en Japón</h1>
        <div class="nosotros-linea-decorativa"></div>
    </div>

    <section class="operacion-origen">
        <div class="contenedor-operacion">
            <div class="op-bloque">
                <div class="op-contenido">
                    <span class="op-tag">Presencia en Subastas</span>
                    <h3>Acceso Directo a las Subastas más Grandes de Japón</h3>
                    <p>Monitoreamos en tiempo real las principales plataformas de subastas japonesas (como USS, JAA y TAA). Esto nos permite filtrar miles de opciones diariamente para encontrar exactamente los modelos con mejor relación calidad-precio para nuestros clientes.</p>
                    <ul class="op-lista">
                        <li>✓ Filtros por año, millaje y condición de subasta.</li>
                        <li>✓ Acceso a vehículos de reventa exclusiva en el mercado japonés.</li>
                    </ul>
                </div>
                <div class="op-imagen">
                    <img src="img/pantallas-subastas.jpeg" alt="Subastas de autos en Japón">
                </div>
            </div>
            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <span class="op-tag">Control de Calidad</span>
                    <h3>Inspección Rigurosa y Verificación de Motores</h3>
                    <p>No compramos a ciegas. Nuestro personal calificado en Japón asiste físicamente a los patios para revisar el motor, la transmisión, el chasis y verificar que no existan problemas ocultos u oxidación por el clima costero.</p>
                    <ul class="op-lista">
                        <li>✓ Revisión exhaustiva por mecánicos expertos en el sitio.</li>
                        <li>✓ Certificación de kilometraje real antes del embarque.</li>
                    </ul>
                </div>
                <div class="op-imagen">
                    <img src="img/inspeccion-motor.jpeg" alt="Inspección de motor en Japón">
                </div>
            </div>
            <div class="op-bloque">
                <div class="op-contenido">
                    <span class="op-tag">Logística de Exportación</span>
                    <h3>Preparación de Cargamento y Logística Portuaria</h3>
                    <p>Una vez adquiridos, coordinamos el traslado interno hacia los puertos principales de embarque. Nos encargamos del desarme selectivo (si es necesario para repuestos), la consolidación de contenedores o el abordaje seguro en buques especializados Ro-Ro.</p>
                    <ul class="op-lista">
                        <li>✓ Manejo seguro de la carga en terminales portuarias.</li>
                        <li>✓ Despacho aduanero de exportación totalmente garantizado.</li>
                    </ul>
                </div>
                <div class="op-imagen">
                    <img src="img/barco-maquinaria.jpeg" alt="Embarque de vehículos en puerto japonés">
                </div>
            </div>
            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <span class="op-tag">Carga y Logística</span>
                    <h3>Maximización de Espacio y Embarque Seguro</h3>
                    <p>No solo enviamos autos; optimizamos cada contenedor utilizando sistemas de racks profesionales. Esto nos permite consolidar varios vehículos de manera fija y segura, reduciendo drásticamente los costos de flete marítimo para nuestros clientes sin arriesgar la integridad física de las unidades.</p>
                    <ul class="op-lista">
                        <li>✓ Trincado profesional y distribución de peso certificada.</li>
                        <li>✓ Despacho aduanero y exportación directa desde puertos principales.</li>
                    </ul>
                </div>
                <div class="op-imagen">
                    <img src="img/contenedores.jpeg" alt="Contenedores en Japón">
                </div>
            </div>
        </div>
    </section>

    <div class="contenedor-titulo-nosotros">
        <span class="nosotros-pre-titulo">Nuestra Trayectoria</span>
        <h1 class="nosotros-titulo-principal">SOBRE NOSOTROS</h1>
        <div class="nosotros-linea-decorativa"></div>
    </div>

    <section class="mini-nosotros" style="width: 100%; padding: 60px 0; display: flex; justify-content: center; border-top: 1px solid rgba(13, 52, 70, 0.05);">
        <div style="width: 75%; max-width: 1400px; display: flex; align-items: center; gap: 50px; flex-wrap: wrap;">

            <div style="flex: 1; min-width: 300px; height: 350px; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <img src="img/advanced.png" alt="Oficinas corporativas" style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <div style="flex: 1; min-width: 300px; display: flex; flex-direction: column; justify-content: center;">
                <span style="font-size: 0.75rem; font-weight: 700; color: #e58a13; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px;">¿Quiénes Somos?</span>
                <h2 style="font-size: 1.8rem; color: #0d3446; font-weight: 700; margin-bottom: 20px; line-height: 1.3;">Conectando el Mercado Automotriz de Japón con el Mundo</h2>
                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6; margin-bottom: 25px;">
                    En <strong>Advance Sound Center</strong>, nos especializamos en la selección, inspección y exportación de vehículos JDM, comerciales y particulares directo desde las subastas niponas. Con años de experiencia en logística portuaria, aseguramos un proceso transparente, legal y seguro para que recibas tu auto sin complicaciones en tu país de origen.
                </p>
                <a href="nosotros.php" style="align-self: flex-start; text-decoration: none; background-color: #0d3446; color: #ffffff; padding: 12px 28px; font-size: 0.9rem; font-weight: 700; border-radius: 8px; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#e58a13'" onmouseout="this.style.backgroundColor='#0d3446'">
                    Conoce Nuestra Historia →
                </a>
            </div>
        </div>
    </section>

    <script>
        function cambiarPestaña(evt, nombrePestaña) {
            // Escondemos todos los paneles de contenido
            const paneles = document.querySelectorAll('.tab-panel');
            paneles.forEach(panel => panel.classList.remove('active'));

            // Desactivamos todos los botones de las pestañas
            const botones = document.querySelectorAll('.tab-btn');
            botones.forEach(btn => btn.classList.remove('active'));

            // Mostramos el panel seleccionado y activamos su respectivo botón
            document.getElementById(nombrePestaña).classList.add('active');
            evt.currentTarget.classList.add('active');
        }

        // CONTROL DEL ACORDEÓN DE PREGUNTAS FRECUENTES
        function toggleFaq(elemento) {
            const item = elemento.parentElement;
            item.classList.toggle('active');
        }

        // LOGICA MATEMÁTICA DE LA CALCULADORA DE ENVÍO
        function calcularFlete(event) {
            event.preventDefault();

            const baseVehiculo = parseInt(document.getElementById('calc-tipo').value);
            const bonoPuerto = parseInt(document.getElementById('calc-puerto').value);

            const totalEstimado = baseVehiculo + bonoPuerto;

            // Animamos el cambio de texto del resultado
            document.getElementById('monto-flete').innerText = `$${totalEstimado.toLocaleString('en-US')}.00 USD`;
        }


        /* -------------------------------------------------------------------------------------------------------- */

        window.onload = function() {

            // --- 1. CARRUSEL DE LOGOS (MOVIMIENTO CONTINUO) ---
            const sliderMarcas = document.querySelector('.carrusel_logos');

            if (sliderMarcas) {
                const itemsMarcas = sliderMarcas.querySelectorAll('.carta_logo');

                if (sliderMarcas.scrollWidth > sliderMarcas.offsetWidth) {

                    itemsMarcas.forEach(item => {
                        const clon = item.cloneNode(true);
                        sliderMarcas.appendChild(clon);
                    });

                    let scrollPos = 0;
                    const velocidad = 0.8;

                    sliderMarcas.style.scrollBehavior = 'auto';

                    function animarContinuo() {
                        scrollPos += velocidad;

                        if (scrollPos >= sliderMarcas.scrollWidth / 2) {
                            scrollPos = 0;
                        }

                        sliderMarcas.scrollLeft = scrollPos;
                        requestAnimationFrame(animarContinuo);
                    }

                    animarContinuo();
                } else {
                    sliderMarcas.style.justifyContent = 'center';
                }
            }
        };

        // --- 2. CARRUSEL DE AUTOS (MOVIMIENTO POR PASOS - TU CÓDIGO) ---
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

        // --- 3. CARRUSEL DE AUTOS (MOVIMIENTO POR PASOS - TU CÓDIGO) ---
        const carruselAutos1 = document.querySelector('.carrusel_destacados1');

        if (carruselAutos1) {
            const itemsAutos = carruselAutos1.querySelectorAll('.carta_normal1');

            if (carruselAutos1.scrollWidth > carruselAutos1.offsetWidth) {

                itemsAutos.forEach(item => {
                    const clon = item.cloneNode(true);
                    carruselAutos1.appendChild(clon);
                });

                let scrollPos = 0;
                const velocidad = 0.4;

                carruselAutos1.style.scrollBehavior = 'auto';

                function animarContinuo() {
                    scrollPos += velocidad;

                    if (scrollPos >= carruselAutos1.scrollWidth / 2) {
                        scrollPos = 0;
                    }

                    carruselAutos1.scrollLeft = scrollPos;
                    requestAnimationFrame(animarContinuo);
                }

                animarContinuo();
            } else {
                carruselAutos1.style.justifyContent = 'center';
                carruselAutos1.style.overflowX = 'hidden';
            }
        }

        /*-----*/
    </script>

</body>

</html>