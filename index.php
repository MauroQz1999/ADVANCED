
<?php include $_SERVER['DOCUMENT_ROOT'] . '/ADVANCE/configuracion/conexion.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/ADVANCE/models/general_model.php'; ?>

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

        .indicator_banner {
            width: 100%;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            margin-top: 20px;
            border-radius: 2px;
            overflow: hidden;
        }

        .indicator_banner::after {
            content: '';
            display: block;
            height: 100%;
            width: 0%;
            background: #0d3446;
            animation: cargarBarra 10s linear infinite;
        }

        @keyframes cargarBarra {
            0% {
                width: 0%;
            }

            100% {
                width: 100%;
            }
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
            position: relative;
            box-sizing: border-box;
            overflow-x: auto;
            touch-action: pan-x;
            -webkit-overflow-scrolling: touch;
        }

        .carrusel_logos::-webkit-scrollbar {
            display: none;
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
            pointer-events: auto;
        }

        .carta_logo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            object-position: center;
            display: block;
            pointer-events: none;
        }

        .carta_logo:hover {
            transform: translateY(-4px);
        }

        @media (max-width: 580px) {
            .carrusel_logos {
                height: 50px;
                margin: 15px auto;
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
            width: 90%;
            max-width: 1400px;
            margin: 20px auto;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            gap: clamp(15px, 2vw, 30px);
            padding-bottom: 25px;
            padding-top: 10px;
            scrollbar-width: none;
            -webkit-overflow-scrolling: touch;
            overflow-x: auto;
            touch-action: pan-x;
            -webkit-overflow-scrolling: touch;
            user-select: none;

        }

        .carrusel_destacados::-webkit-scrollbar,
        .carrusel_destacados1::-webkit-scrollbar {
            display: none;
        }

        .carta_normal,
        .carta_normal1 {
            width: clamp(260px, 22vw, 320px);
            flex-shrink: 0;
            background-color: #ffffff;
            margin-bottom: 5px;
            border: 1px solid rgba(13, 52, 70, 0.12);
            border-radius: 16px;
            overflow: hidden;
            box-sizing: border-box;
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.5s ease, border-color 0.3s ease;
            pointer-events: auto;

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
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: clamp(12px, 3vw, 22px);
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

        .specs-overlay-lista {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: clamp(4px, 1.2vw, 10px);
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

        .spec-item>span:last-child {
            font-size: clamp(0.7rem, 0.8vw, 0.8rem);
            color: #0d3446;
            font-weight: 600;
            text-align: right;
            max-width: 65%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .specs-overlay .boton-negro,
        .specs-overlay div[style*="background: black"],
        .specs-overlay a[style*="background: black"] {
            width: 100%;
            height: clamp(32px, 3.5vw, 40px);
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

        @media (max-width: 480px) {
            .spec-item {
                flex-direction: row;
                justify-content: space-between;
            }

            .spec-item>span:last-child {
                max-width: 100%;
                text-align: right;
                font-size: 0.75rem;
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
            padding: clamp(30px, 5vw, 60px) 0;
            display: flex;
            justify-content: center;
            box-sizing: border-box;
        }

        .contenedor-mega {
            width: clamp(85%, 75vw, 90%);
            max-width: 1400px;
            box-sizing: border-box;
        }

        .tabs-navegacion {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: clamp(25px, 4vw, 35px);
            border-bottom: 2px solid rgba(13, 52, 70, 0.06);
            padding-bottom: 15px;
            box-sizing: border-box;
            overflow-x: auto;
            white-space: nowrap;
            scrollbar-width: none;
            -webkit-overflow-scrolling: touch;
        }

        .tabs-navegacion::-webkit-scrollbar {
            display: none;
        }

        .tab-btn {
            background: none;
            border: none;
            font-size: clamp(0.9rem, 1.1vw, 1rem);
            font-weight: 700;
            color: #64748b;
            padding: 10px clamp(16px, 2vw, 24px);
            cursor: pointer;
            position: relative;
            transition: color 0.3s ease;
            font-family: 'Outfit', sans-serif;
            flex-shrink: 0;
        }

        .tab-btn:hover,
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
            margin-left: 6px;
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

        .grid-mosaico,
        .grid-proposito {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(clamp(280px, 25vw, 380px), 1fr));
            gap: 25px;
            box-sizing: border-box;
        }

        .tarjeta-proposito {
            height: clamp(250px, 35vh, 300px);
            border-radius: 16px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(13, 52, 70, 0.04);
            box-sizing: border-box;
        }

        .tarjeta-proposito img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .tarjeta-proposito:hover img {
            transform: scale(1.06);
        }

        .capa-proposito {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(13, 52, 70, 0.95) 30%, rgba(13, 52, 70, 0.3) 70%, transparent);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 25px;
            box-sizing: border-box;
        }

        .capa-proposito h3 {
            color: #ffffff;
            font-size: clamp(1.1rem, 1.3vw, 1.3rem);
            margin: 0 0 8px 0;
            font-weight: 700;
        }

        .capa-proposito p {
            color: #cbd5e1;
            font-size: 0.85rem;
            line-height: 1.5;
            margin: 0 0 15px 0;
        }

        .capa-proposito a {
            color: #e58a13;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 700;
            transition: color 0.3s;
        }

        .capa-proposito a:hover {
            color: #ffffff;
        }

        .galeria-puerto {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 180px);
            gap: 20px;
            box-sizing: border-box;
        }

        .foto-galeria {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            box-sizing: border-box;
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
            background: rgba(13, 52, 70, 0.85);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            color: #ffffff;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 12px 20px;
            box-sizing: border-box;
        }

        .mini-carta-auto {
            background-color: #ffffff;
            border: 1px solid rgba(13, 52, 70, 0.08);
            border-radius: 12px;
            display: flex;
            align-items: stretch;
            overflow: hidden;
            height: 140px;
            box-sizing: border-box;
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .mini-carta-auto:hover {
            transform: translateY(-4px);
            border-color: rgba(13, 52, 70, 0.2);
            box-shadow: 0 12px 30px rgba(13, 52, 70, 0.06);
        }

        .mini-img {
            flex: 0 0 40%;
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
            background-color: rgba(13, 52, 70, 0.9);
            color: #ffffff;
            font-size: 0.6rem;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 4px;
        }

        .mini-info {
            flex: 1;
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-sizing: border-box;
            min-width: 0;
        }

        .mini-marca {
            font-size: 0.65rem;
            font-weight: 800;
            color: #e58a13;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .mini-info h4 {
            font-size: 0.95rem;
            color: #0d3446;
            font-weight: 700;
            margin: 2px 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .mini-info p {
            color: #64748b;
            font-size: 0.75rem;
            margin: 0;
        }

        .btn-mini-detalles {
            align-self: flex-start;
            text-decoration: none;
            font-size: 0.75rem;
            font-weight: 700;
            color: #0d3446;
            background-color: #f1f5f9;
            padding: 6px 14px;
            border-radius: 6px;
            transition: background-color 0.2s, color 0.2s;
        }

        .mini-carta-auto:hover .btn-mini-detalles {
            background-color: #0d3446;
            color: #ffffff;
        }

        @media (max-width: 1024px) {
            .galeria-puerto {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
            }

            .foto-galeria.grande,
            .foto-galeria {
                grid-row: auto;
                height: 220px;
            }
        }

        @media (max-width: 768px) {
            .contenedor-mega {
                width: 92%;
            }

            .tabs-navegacion {
                justify-content: flex-start;
                padding-left: 5px;
                border-bottom: 1px solid rgba(13, 52, 70, 0.1);
            }

            .tab-btn.active::after {
                bottom: -16px;
                height: 2px;
            }
        }

        @media (max-width: 480px) {

            .mini-carta-auto {
                height: 125px;
            }

            .mini-info {
                padding: 10px;
            }

            .mini-info h4 {
                font-size: 0.85rem;
            }

            .btn-mini-detalles {
                padding: 4px 10px;
                font-size: 0.7rem;
            }
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        .seccion-soporte-calculo {
            width: 100%;
            padding: clamp(30px, 5vw, 60px) 0;
            display: flex;
            justify-content: center;
            box-sizing: border-box;
        }

        .contenedor-soporte {
            width: clamp(85%, 75vw, 90%);
            max-width: 1400px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(clamp(300px, 45vw, 600px), 1fr));
            gap: clamp(20px, 4vw, 50px);
            box-sizing: border-box;
        }

        .bloque-calculadora,
        .bloque-faq {
            background-color: #ffffff;
            border: 1px solid rgba(13, 52, 70, 0.08);
            border-radius: 16px;
            padding: clamp(20px, 3vw, 40px);
            /* Espaciado interno elástico */
            box-shadow: 0 10px 30px rgba(13, 52, 70, 0.02);
            box-sizing: border-box;
            height: fit-content;
        }

        .bloque-calculadora h3,
        .bloque-faq h3 {
            font-size: clamp(1.2rem, 1.5vw, 1.4rem);
            color: #0d3446;
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 15px;
        }

        .calc-p {
            color: #64748b;
            font-size: clamp(0.85rem, 0.9vw, 0.9rem);
            margin-bottom: 25px;
            line-height: 1.6;
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

        .campo-calc select,
        .campo-calc input {
            width: 100%;
            padding: 12px clamp(10px, 1.5vw, 16px);
            border-radius: 8px;
            border: 1px solid rgba(13, 52, 70, 0.15);
            font-size: 0.9rem;
            color: #0d3446;
            outline: none;
            font-family: 'Outfit', sans-serif;
            background-color: #f8fafc;
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .campo-calc select:focus,
        .campo-calc input:focus {
            border-color: #0d3446;
            box-shadow: 0 0 0 3px rgba(13, 52, 70, 0.05);
        }

        .btn-calcular {
            width: 100%;
            background-color: #0d3446;
            color: #ffffff;
            border: none;
            padding: 14px;
            font-size: 0.95rem;
            font-weight: 700;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            font-family: 'Outfit', sans-serif;
            box-sizing: border-box;
        }

        .btn-calcular:hover {
            background-color: #e58a13;
        }

        .btn-calcular:active {
            transform: scale(0.98);
        }

        .resultado-caja {
            margin-top: 25px;
            padding: clamp(15px, 2vw, 20px);
            background-color: #f8fafc;
            border-radius: 8px;
            border-left: 4px solid #e58a13;
            display: flex;
            flex-direction: column;
            gap: 4px;
            box-sizing: border-box;
        }

        .resultado-caja span {
            font-size: 0.8rem;
            color: #64748b;
            font-weight: 600;
        }

        .resultado-caja strong {
            font-size: clamp(1.3rem, 1.8vw, 1.6rem);
            color: #0d3446;
            font-weight: 800;
        }

        .resultado-caja small {
            font-size: 0.72rem;
            color: #94a3b8;
            margin-top: 5px;
            line-height: 1.4;
        }

        .faq-item {
            border-bottom: 1px solid rgba(13, 52, 70, 0.08);
            padding: 15px 0;
            box-sizing: border-box;
        }

        .faq-pregunta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            user-select: none;
        }

        .faq-pregunta h4 {
            font-size: clamp(0.9rem, 1vw, 0.98rem);
            color: #334155;
            font-weight: 600;
            margin: 0;
            transition: color 0.3s;
            line-height: 1.4;
        }

        .faq-item:hover .faq-pregunta h4 {
            color: #e58a13;
        }

        .faq-icono {
            font-size: 1.2rem;
            color: #64748b;
            font-weight: 700;
            transition: transform 0.3s, color 0.3s;
            flex-shrink: 0;
        }

        .faq-respuesta {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .faq-respuesta p {
            color: #64748b;
            font-size: clamp(0.82rem, 0.88rem, 0.88rem);
            line-height: 1.6;
            padding-top: 10px;
            margin: 0;
        }

        .faq-item.active .faq-respuesta {
            max-height: 400px;
        }

        .faq-item.active .faq-icono {
            transform: rotate(45deg);
            color: #e58a13;
        }

        @media (max-width: 480px) {
            .seccion-soporte-calculo {
                padding: 20px 0;
            }

            .contenedor-soporte {
                width: 92%;
                gap: 20px;
            }

            .bloque-calculadora,
            .bloque-faq {
                border-radius: 12px;
            }

            .faq-pregunta {
                align-items: flex-start;
            }

            .faq-icono {
                margin-top: 2px;
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
            padding: clamp(40px, 6vw, 80px) 0;
            display: flex;
            justify-content: center;
            box-sizing: border-box;
        }

        .contenedor-operacion {
            width: clamp(88%, 75vw, 90%);
            max-width: 1500px;
            display: flex;
            flex-direction: column;
            gap: clamp(40px, 7vw, 90px);
            box-sizing: border-box;
        }

        .op-bloque {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: clamp(30px, 4vw, 60px);
            box-sizing: border-box;
        }

        .op-bloque.inverso {
            flex-direction: row-reverse;
        }

        .op-contenido {
            flex: 1;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
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
            font-size: clamp(1.4rem, 2vw, 1.8rem);
            color: #0d3446;
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .op-contenido p {
            color: #64748b;
            font-size: clamp(0.92rem, 0.98vw, 0.98rem);
            line-height: 1.6;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .op-lista {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .op-lista li {
            color: #334155;
            font-size: 0.9rem;
            font-weight: 600;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .op-imagen {
            flex: 1;
            width: 100%;
            height: clamp(260px, 35vh, 400px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(13, 52, 70, 0.05);
            border: 1px solid rgba(13, 52, 70, 0.08);
            box-sizing: border-box;
        }

        .op-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .op-bloque:hover .op-imagen img {
            transform: scale(1.04);
        }

        @media (max-width: 992px) {

            .op-bloque,
            .op-bloque.inverso {
                flex-direction: column;
                gap: 30px;
            }

            .op-contenido {
                order: 1;
            }

            .op-imagen {
                order: 2;
                height: 300px;
            }
        }

        @media (max-width: 480px) {
            .contenedor-operacion {
                width: 90%;
            }

            .op-imagen {
                height: 200px;
                border-radius: 14px;
            }
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        .contenedor-titulo-nosotros {
            width: 100%;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
            margin-top: clamp(40px, 6vw, 10px);
            margin-bottom: clamp(15px, 2vw, 25px);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0 clamp(16px, 4vw, 30px);
            box-sizing: border-box;
        }

        .nosotros-pre-titulo {
            font-size: clamp(0.7rem, 0.8vw, 0.8rem);
            font-weight: 800;
            color: #e58a13;
            text-transform: uppercase;
            letter-spacing: clamp(2px, 0.3vw, 4px);
            margin-bottom: 8px;
            line-height: 1.2;
        }

        .nosotros-titulo-principal {
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            font-weight: 900;
            color: #0d3446;
            letter-spacing: -0.5px;
            line-height: 1.15;
            text-transform: uppercase;
            margin: 0;
            position: relative;
            word-wrap: break-word;
        }

        .nosotros-linea-decorativa {
            width: clamp(45px, 5vw, 60px);
            height: 4px;
            background-color: #e58a13;
            border-radius: 2px;
            margin-top: clamp(12px, 1.5vw, 18px);
        }

        @media (max-width: 480px) {
            .contenedor-titulo-nosotros {
                margin-top: 35px;
            }

            .nosotros-titulo-principal {
                font-size: 1.65rem;
            }
        }
    </style>

</head>

<body>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/ADVANCE/vistas/topbar/topbar.php'; ?>

    <section class="hero-banner">
        <div class="carrusel-contenedor">

            <div class="slide activo">
                <div class="slide-info">
                    <span class="tagline" data-i18n="index_banner1">Logística y Exportación Global</span>
                    <h2 data-i18n="index_banner2">Desde las auctions de Japon directamente al mundo</h2>
                    <p data-i18n="index_banner3">Expertos en la exportación de vehículos. Tu socio confiable con acceso directo a las principales subastas y embarques de Japón.</p>
                    <a href="inventario.php" class="btn-cta" data-i18n="index_banner4">Ver Inventario Disponible</a>
                    <div class="indicator_banner"></div>
                </div>
                <div class="slide-imagen">
                    <img src="./puerto.jpeg" alt="Embarque de autos Advance Sound Center">
                </div>
            </div>

            <div class="slide">
                <div class="slide-info">
                    <span class="tagline" data-i18n="index_banner5">Subastas en Vivo</span>
                    <h2 data-i18n="index_banner6">Acceso directo a más de 100 subastas semanales</h2>
                    <p data-i18n="index_banner7">Inscríbete con nosotros y oferta en tiempo real por vehículos revisados por inspectores certificados.</p>
                    <a href="contacto.php" class="btn-cta" data-i18n="index_banner8">Contactar un Agente</a>
                    <div class="indicator_banner"></div>
                </div>
                <div class="slide-imagen">
                    <img src="./gemini.png" alt="Subastas de autos en Japón">
                </div>
            </div>

        </div>
    </section>

    <section class="carrusel_logos">

        <?php if ($logo->num_rows > 0) : ?>
            <?php while ($row = $logo->fetch_assoc()) : ?>

                <div class="carta_logo" onclick="window.location.href='inventario.php?marca=<?php echo urlencode($row['nombre_marca']); ?>'">
                    <img src="<?php echo htmlspecialchars($row['ruta']); ?>" alt="Car">
                </div>

            <?php endwhile; ?>
        <?php endif; ?>

    </section>

    <div class="sub-titulo">
        <h1 data-i18n="index_subtitulo1">Modelos Recomendados</h1>
    </div>

    <div class="carrusel_destacados">

        <?php if ($recomendado->num_rows > 0) : ?>
            <?php while ($row = $recomendado->fetch_assoc()) : ?>
                <div class="carta_normal" onclick="window.location.href='datos.php?id=<?php echo $row['id']; ?>'">
                    <div class="contenedor_img">
                        <img class="car-img" src="<?php echo htmlspecialchars($row['portada']); ?>" alt="Car">

                        <div class="specs-overlay">
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo35">Precio</span>
                                <span><?php echo htmlspecialchars($row['precio']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo36">Año</span>
                                <span><?php echo htmlspecialchars($row['first_registration']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo37">Transmision</span>
                                <span><?php echo htmlspecialchars($row['transmission']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo38">Motor</span>
                                <span><?php echo htmlspecialchars($row['engine_type']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo39">Status</span>
                                <span><?php echo htmlspecialchars($row['estado']); ?></span>
                            </div>
                            <button style="margin-top: 0px; background: #000; color: #fff; border: none; padding: 12px; cursor: pointer; font-family: 'Outfit'; font-weight: 600; letter-spacing: 2px;" data-i18n="index_subtitulo40">VER DETALLES</button>
                        </div>

                    </div>
                    <div class="info-car">
                        <div class="info_fabricante"><?php echo htmlspecialchars($row['marca']); ?></div>
                        <h2 class="info_modelo"><?php echo htmlspecialchars($row['modelo']); ?></h2>
                        <div class="indicator"></div>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>

    <div class="sub-titulo">
        <h1 data-i18n="index_subtitulo2">Modelos Destacados</h1>
    </div>

    <div class="carrusel_destacados1">

        <?php if ($destacado->num_rows > 0) : ?>
            <?php while ($row = $destacado->fetch_assoc()) : ?>

                <div class="carta_normal1" onclick="window.location.href='datos.php?id=<?php echo $row['id']; ?>'">
                    <div class="contenedor_img">
                        <img class="car-img" src="<?php echo htmlspecialchars($row['portada']); ?>" alt="Car">

                        <div class="specs-overlay">
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo35">Precio</span>
                                <span><?php echo htmlspecialchars($row['precio']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo36">Año</span>
                                <span><?php echo htmlspecialchars($row['first_registration']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo37">Transmision</span>
                                <span><?php echo htmlspecialchars($row['transmission']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo38">Motor</span>
                                <span><?php echo htmlspecialchars($row['engine_type']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo39">Status</span>
                                <span><?php echo htmlspecialchars($row['estado']); ?></span>
                            </div>
                            <button style="margin-top: 0px; background: #000; color: #fff; border: none; padding: 12px; cursor: pointer; font-family: 'Outfit'; font-weight: 600; letter-spacing: 2px;" data-i18n="index_subtitulo40">VER DETALLES</button>
                        </div>

                    </div>
                    <div class="info-car">
                        <div class="info_fabricante"><?php echo htmlspecialchars($row['marca']); ?></div>
                        <h2 class="info_modelo"><?php echo htmlspecialchars($row['modelo']); ?></h2>
                        <div class="indicator"></div>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>

    <div class="sub-titulo" style="margin-top: 20px;">
        <h1 data-i18n="index_subtitulo3">Lo más solicitado del mercado</h1>
    </div>

    <section class="seccion-tops">
        <div class="contenedor-tops">

            <div class="columna-top">
                <h3 data-i18n="index_subtitulo41">Top Marcas</h3>
                <div class="grupo-botones-top">

                    <?php

                    $posicion = 1;
                    if ($marcas->num_rows > 0) : ?>
                        <?php while ($row = $marcas->fetch_assoc()) : ?>

                            <a href="#" class="btn-top-item" onclick="window.location.href='inventario.php?marca=<?php echo urlencode($row['marca']); ?>'">
                                <?php echo htmlspecialchars($row['marca']); ?>
                                <span class="rank">
                                    #<?php echo $posicion; ?>
                                </span>
                            </a>

                            <?php
                            $posicion++;
                            ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>

            <div class="columna-top">
                <h3 data-i18n="index_subtitulo42">Modelos Más Vendidos</h3>
                <div class="grupo-botones-top">

                    <?php if ($modelos->num_rows > 0) : ?>
                        <?php while ($row = $modelos->fetch_assoc()) : ?>

                            <a href="#" class="btn-top-item" onclick="window.location.href='inventario.php?modelo=<?php echo urlencode($row['modelo']); ?>'">
                                <?php echo htmlspecialchars($row['modelo']); ?>
                                <span class="rank">
                                    #<?php echo $posicion; ?>
                                </span>
                            </a>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>

            <div class="columna-top">
                <h3 data-i18n="index_subtitulo43">Por Categoría</h3>
                <div class="grupo-botones-top">
                    <a href="inventario.php" class="btn-top-item">Deportivos JDM <span class="rank">★</span></a>
                    <a href="inventario" class="btn-top-item">Camionetas SUV <span class="rank">★</span></a>
                    <a href="inventario" class="btn-top-item">Vehículos Comerciales <span class="rank">★</span></a>
                    <a href="inventario" class="btn-top-item">Sedanes / Hatchback <span class="rank">★</span></a>
                    <a href="inventario" class="btn-top-item">Maquinaria Pesada <span class="rank">★</span></a>
                </div>
            </div>

            <div class="columna-top">
                <h3 data-i18n="index_subtitulo44">Servicios Especiales</h3>
                <div class="grupo-botones-top">
                    <a href="servicios.php" class="btn-top-item" data-i18n="index_ser1">Transporte interior</a>
                    <a href="servicios.php" class="btn-top-item" data-i18n="index_ser2">Mantenimiento y reparación</a>
                    <a href="servicios.php" class="btn-top-item" data-i18n="index_ser3">Inspección previa al envío</a>
                    <a href="servicios.php" class="btn-top-item" data-i18n="index_ser4">Emisión de certificado</a>
                    <a href="servicios.php" class="btn-top-item" data-i18n="index_ser5">Vanning</a>
                </div>
            </div>

        </div>
    </section>

    <div class="sub-titulo" style="margin-top: 20px;">
        <h1 data-i18n="index_subtitulo4">Explora Nuestro Stock y Operaciones</h1>
    </div>

    <section class="seccion-mega-inventario">
        <div class="contenedor-mega">
            <div class="tabs-navegacion">
                <button class="tab-btn active" onclick="cambiarPestaña(event, 'tab-subastas')" data-i18n="index_subtitulo45">
                    Más Vendidos
                </button>
                <button class="tab-btn" onclick="cambiarPestaña(event, 'tab-proposito')" data-i18n="index_subtitulo46">
                    Explorar por Tipo
                </button>
                <button class="tab-btn" onclick="cambiarPestaña(event, 'tab-puerto')" data-i18n="index_subtitulo47">
                    Operaciones
                </button>
            </div>
            <div class="tabs-contenido">
                <div id="tab-subastas" class="tab-panel active">
                    <div class="grid-mosaico">

                        <?php if ($vendidos->num_rows > 0) : ?>
                            <?php while ($row = $vendidos->fetch_assoc()) : ?>

                                <div class="mini-carta-auto">
                                    <div class="mini-img">
                                        <img class="ban-img" src="<?php echo htmlspecialchars($row['portada']); ?>" alt="Car">
                                        <span class="badge-subasta"><?php echo htmlspecialchars($row['vehicle_type']); ?></span>
                                    </div>
                                    <div class="mini-info">
                                        <span class="mini-marca"><?php echo htmlspecialchars($row['marca']); ?></span>
                                        <h4><?php echo htmlspecialchars($row['modelo']); ?></h4>
                                        <p><?php echo htmlspecialchars($row['first_registration']); ?> • <?php echo htmlspecialchars($row['mileage']); ?> km • <?php echo htmlspecialchars($row['transmission']); ?></p>
                                        <a href="#" class="btn-mini-detalles" onclick="window.location.href='datos.php?id=<?php echo $row['id']; ?>'" data-i18n="index_subtitulo63">Detalles</a>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </div>
                <div id="tab-proposito" class="tab-panel">
                    <div class="grid-proposito">
                        <div class="tarjeta-proposito">
                            <img src="https://images.unsplash.com/photo-1616422285623-13ff0162193c?q=80&w=600" alt="Deportivos JDM">
                            <div class="capa-proposito">
                                <h3 data-i18n="index_subtitulo68">Deportivos JDM</h3>
                                <p data-i18n="index_subtitulo69">Iconos de la ingeniería japonesa: Skylines, Supra, Evos y Civic Type R.</p>
                                <a href="inventario.php" data-i18n="index_subtitulo70">Ver Categoría →</a>
                            </div>
                        </div>
                        <div class="tarjeta-proposito">
                            <img src="https://images.unsplash.com/photo-1516515429572-bf32372f2409?q=80&w=600" alt="Vehículos Comerciales">
                            <div class="capa-proposito">
                                <h3 data-i18n="index_subtitulo71">Comerciales y Vans</h3>
                                <p data-i18n="index_subtitulo72">Furgonetas, camionetas de trabajo pesado y camionetas Toyota Probox/Hiace.</p>
                                <a href="inventario.php" data-i18n="index_subtitulo73">Ver Categoría →</a>
                            </div>
                        </div>
                        <div class="tarjeta-proposito">
                            <img src="https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?q=80&w=600" alt="SUVs Familiares">
                            <div class="capa-proposito">
                                <h3 data-i18n="index_subtitulo74">SUVs & Familiares</h3>
                                <p data-i18n="index_subtitulo75">Vehículos cómodos y de gran despeje para terrenos difíciles o viajes.</p>
                                <a href="inventario.php" data-i18n="index_subtitulo76">Ver Categoría →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-puerto" class="tab-panel">
                    <div class="galeria-puerto">
                        <div class="foto-galeria grande">
                            <img src="img/consolidacion.jpeg" alt="Logística real en contenedores">
                            <div class="info-foto" data-i18n="index_subtitulo77">Consolidación en Contenedores - Puerto de ""</div>
                        </div>
                        <div class="foto-galeria">
                            <img src="img/embarque.jpeg" alt="Patios puerto">
                            <div class="info-foto" data-i18n="index_subtitulo78">Unidades listas para embarque ""</div>
                        </div>
                        <div class="foto-galeria">
                            <img src="img/chasis.jpeg" alt="Inspeccion puerto">
                            <div class="info-foto" data-i18n="index_subtitulo79">Inspección de chasis previa a la estiba</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="sub-titulo" style="margin-top: 20px;">
        <h1 data-i18n="index_subtitulo5">Herramientas y Soporte</h1>
    </div>

    <section class="seccion-soporte-calculo">
        <div class="contenedor-soporte">

            <div class="bloque-calculadora">
                <h3 data-i18n="index_subtitulo49">Cotizador de Envío Estimado</h3>
                <p class="calc-p" data-i18n="index_subtitulo50">Calcula el costo aproximado de logística y flete marítimo desde Japón hasta tu región.</p>

                <form class="form-calculadora" onsubmit="calcularFlete(event)">
                    <div class="campo-calc">
                        <label data-i18n="index_subtitulo51">Categoría del Vehículo</label>
                        <select id="calc-tipo">
                            <option value="1200">Sedán / Compacto / JDM</option>
                            <option value="1600">SUV / Familiar / Pick-up</option>
                            <option value="2200">Vans / Camiones Ligeros</option>
                        </select>
                    </div>

                    <div class="campo-calc">
                        <label data-i18n="index_subtitulo52">Puerto de Destino</label>
                        <select id="calc-puerto">
                            <option value="400">Puerto de Callao (Perú) +$400</option>
                            <option value="350">Puerto de Iquique (Chile) +$350</option>
                            <option value="550">Puerto de Manzanillo (México) +$550</option>
                            <option value="600">Puerto de Santo Domingo (Rep. Dom) +$600</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-calcular" data-i18n="index_subtitulo53">Calcular Costo Logístico</button>
                </form>

                <div id="resultado-calculo" class="resultado-caja">
                    <span data-i18n="index_subtitulo54">Costo Marítimo Estimado:</span>
                    <strong id="monto-flete">$0.00 USD</strong>
                    <small data-i18n="index_subtitulo55">*Nota: No incluye el valor del vehículo en subasta ni impuestos locales de aduana.</small>
                </div>
            </div>

            <div class="bloque-faq">
                <h3 data-i18n="index_subtitulo56">Preguntas Frecuentes</h3>

                <div class="faq-item">
                    <div class="faq-pregunta" onclick="toggleFaq(this)">
                        <h4 data-i18n="index_subtitulo57">¿Cuánto tiempo tarda en llegar el vehículo?</h4>
                        <span class="faq-icono">+</span>
                    </div>
                    <div class="faq-respuesta">
                        <p data-i18n="index_subtitulo58">El tránsito marítimo promedio desde los puertos de Japón (Yokohama/Kobe) hasta Latinoamérica dura entre 35 y 45 días, dependiendo de las escalas del buque y la ruta de la naviera.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-pregunta" onclick="toggleFaq(this)">
                        <h4 data-i18n="index_subtitulo59">¿Qué documentos recibo para registrar el auto?</h4>
                        <span class="faq-icono">+</span>
                    </div>
                    <div class="faq-respuesta">
                        <p data-i18n="index_subtitulo60">Te enviamos por mensajería prioritaria (DHL) el Certificado de Exportación Original emitido en Japón, la Factura Comercial (Commercial Invoice) y el conocimiento de embarque (Bill of Lading - B/L).</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-pregunta" onclick="toggleFaq(this)">
                        <h4 data-i18n="index_subtitulo61">¿Cuáles son los métodos de pago aceptados?</h4>
                        <span class="faq-icono">+</span>
                    </div>
                    <div class="faq-respuesta">
                        <p data-i18n="index_subtitulo62">Trabajamos mediante Transferencia Bancaria Internacional (Telegraphic Transfer - T/T) directamente a nuestras cuentas corporativas en Japón, garantizando la máxima seguridad legal en la transacción.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="banner_pilares">
        <div class="pilar">
            <div class="texpilar">
                <span class="pilar-tag" data-i18n="index_subtitulo20">Control de Calidad</span>
                <h3 class="pilar-titulo" data-i18n="index_subtitulo21">Inspección Rigurosa en Patios de Subasta</h3>
                <p class="pilar-descripcion" data-i18n="index_subtitulo22">Asistimos físicamente a las terminales y casas de subastas en Japón para realizar una verificación técnica exhaustiva de cada unidad antes de realizar cualquier oferta de compra.</p>
                <ul class="pilar-lista">
                    <li>
                        <span class="pilar-check">
                            ✓
                        </span>
                        <a data-i18n="index_subtitulo23">
                            Verificación de estado de motor y transmisión.
                        </a>
                    </li>
                    <li>
                        <span class="pilar-check">
                            ✓
                        </span>
                        <a data-i18n="index_subtitulo24">
                            Certificación de kilometraje real sin alteraciones.
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pilar">
            <div class="texpilar">
                <span class="pilar-tag" data-i18n="index_subtitulo25">Gestión Documental</span>
                <h3 class="pilar-titulo" data-i18n="index_subtitulo26">Logística de Exportación y Trámites</h3>
                <p class="pilar-descripcion" data-i18n="index_subtitulo27">Nos encargamos de todo el complejo proceso administrativo aduanero dentro de Japón. Aseguramos el despacho rápido y reservamos espacios prioritarios en buques de carga.</p>
                <ul class="pilar-lista">
                    <li>
                        <span class="pilar-check">
                            ✓
                        </span>
                        <a data-i18n="index_subtitulo28">
                            Gestión completa de títulos de exportación (Export Certificate).
                        </a>
                    </li>
                    <li>
                        <span class="pilar-check">
                            ✓
                        </span>
                        <a data-i18n="index_subtitulo29">
                            Coordinación terrestre hacia los principales puertos.
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pilar">
            <div class="texpilar">
                <span class="pilar-tag" data-i18n="index_subtitulo30">Soporte y Entrega</span>
                <h3 class="pilar-titulo" data-i18n="index_subtitulo31">Embarque e Integridad Asegurada</h3>
                <p class="pilar-descripcion" data-i18n="index_subtitulo32">Supervisamos la estiba y el trincado de los vehículos en racks profesionales dentro del contenedor, garantizando la máxima protección y un tracking constante hasta tu puerto local.</p>
                <ul class="pilar-lista">
                    <li>
                        <span class="pilar-check">
                            ✓
                        </span>
                        <a data-i18n="index_subtitulo33">
                            Reportes fotográficos detallados pre-embarque.
                        </a>
                    </li>
                    <li>
                        <span class="pilar-check">
                            ✓
                        </span>
                        <a data-i18n="index_subtitulo34">
                            Envío prioritario y seguro de documentación por DHL.
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <div class="contenedor-titulo-nosotros">
        <span class="nosotros-pre-titulo">ADVANCED SOUTH CENTRAL</span>
        <h1 class="nosotros-titulo-principal" data-i18n="index_titulo1">Nuestra Operación en Japón</h1>
        <div class="nosotros-linea-decorativa"></div>
    </div>

    <section class="operacion-origen">
        <div class="contenedor-operacion">
            <div class="op-bloque">
                <div class="op-contenido">
                    <span class="op-tag" data-i18n="index_subtitulo6">Presencia en Subastas</span>
                    <h3 data-i18n="index_txt_1">Acceso Directo a las Subastas más Grandes de Japón</h3>
<<<<<<< HEAD
                    <p data-i18n="index_txt_2">Venta de maquinaria, camiones y carros seminuevos en oficina y de la subasta. Conducimos a las mejores AUCTIONS : USS, ARAI, CAA, TAA, HONDA, JU AICHI. Y también, puedes apostar en ASNET, la mayor plataforma de distribución de coches usados ​​de Japón.</p>
=======
                    <p data-i18n="index_txt_2">Venta de maquinaria, camiones y carros seminuevos en oficina y de la subasta. Conducimos a las mejores AUCTIONS : USS, ARAI,  CAA, TAA, HONDA, JU AICHI. Y también, puedes apostar en ASNET, la mayor plataforma de distribución de coches usados ​​de Japón.</p>
>>>>>>> 1d8b027f9e1084e11a01c8cb27086027ab0a17c9
                    <p data-i18n="index_txt_2.5">Dónde podrá usted verificar in situ la hoja de ruta del vehículo.</p>
                    <ul class="op-lista">
                        <li data-i18n="index_txt_3">
                            <span class="pilar-check">
                                ✓
                            </span>Filtros por año, millaje y condición de subasta.
                        </li>
                        <li data-i18n="index_txt_4">
                            <span class="pilar-check">
                                ✓
                            </span>Acceso a vehículos de reventa exclusiva en el mercado japonés.
                        </li>
                    </ul>
                </div>
                <div class="op-imagen">
                    <img src="img/pantallas-subastas.jpeg" alt="Subastas de autos en Japón">
                </div>
            </div>
            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <span class="op-tag" data-i18n="index_subtitulo7">Control de Calidad</span>
                    <h3 data-i18n="index_txt_5">Inspección Rigurosa y Verificación de Motores</h3>
                    <p data-i18n="index_txt_6">Nuestro personal calificado asiste físicamente a los patios para revisar el motor, la transmisión, el chasis y verificar que no existan problemas ocultos u oxidación por el clima costero.</p>
                    <p data-i18n="index_txt_6.5">Advanced South Central para la venta sólo compra sus vehículos de las AUCTIONS : donde; además, encontrarás toda la información sobre tu próximo auto; garantizando : su kilometraje, si tuvo un solo dueño y si fue accidentado.</p>
                    <ul class="op-lista">
                        <li data-i18n="index_txt_7">
                            <span class="pilar-check">
                                ✓
                            </span>
                            evisión exhaustiva por mecánicos expertos en el sitio.
                        </li>
                        <li data-i18n="index_txt_8">
                            <span class="pilar-check">
                                ✓
                            </span>
                            Certificación de kilometraje real antes del embarque.
                        </li>
                    </ul>
                </div>
                <div class="op-imagen">
                    <img src="img/inspeccion-motor.png" alt="Inspección de motor en Japón">
                </div>
            </div>
            <div class="op-bloque">
                <div class="op-contenido">
                    <span class="op-tag" data-i18n="index_subtitulo8">Logística de Exportación</span>
                    <h3 data-i18n="index_txt_9">Preparación de Cargamento y Logística Portuaria</h3>
                    <p data-i18n="index_txt_10">Una vez adquiridos, coordinamos el traslado interno hacia los puertos principales de embarque ( Roll-on/Roll-off o Ro-Ro para mercancías que tienen ruedas ). Y/ o al local de VANNING ( proceso de carga de mercancías o carga en un contenedor marítimo); donde nuestro experimentado personal de transporte cargará sus vehículos o mercancías de forma rápida, segura y sin ningún problema. Para luego, internar el vehículo o contenedor; previa solicitud de booking number.</p>
                    <ul class="op-lista">
                        <li data-i18n="index_txt_11">
                            <span class="pilar-check">
                                ✓
                            </span>
                            Manejo seguro de la carga en terminales portuarias.
                        </li>
                        <li data-i18n="index_txt_12">
                            <span class="pilar-check">
                                ✓
                            </span>
                            Despacho aduanero de exportación totalmente garantizado.
                        </li>
                    </ul>
                </div>
                <div class="op-imagen">
                    <img src="img/barco-maquinaria.png" alt="Embarque de vehículos en puerto japonés">
                </div>
            </div>
            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <span class="op-tag" data-i18n="index_subtitulo9">Carga y Logística</span>
                    <h3 data-i18n="index_txt_13">Maximización de Espacio y Embarque Seguro</h3>
                    <p data-i18n="index_txt_14">No solo enviamos autos; optimizamos cada contenedor utilizando sistemas de racks profesionales. Esto nos permite consolidar varios vehículos de manera fija y segura, reduciendo drásticamente los costos de flete marítimo para nuestros clientes sin arriesgar la integridad física de las unidades.</p>
                    <ul class="op-lista">
                        <li data-i18n="index_txt_15">
                            <span class="pilar-check">
                                ✓
                            </span>
                            Trincado profesional y distribución de peso certificada.
                        </li>
                        <li data-i18n="index_txt_16">
                            <span class="pilar-check">
                                ✓
                            </span>
                            Despacho aduanero y exportación directa desde puertos principales.
                        </li>
                    </ul>
                </div>
                <div class="op-imagen">
                    <img src="img/contenedores.png" alt="Contenedores en Japón">
                </div>
            </div>
        </div>
    </section>

    <div class="contenedor-titulo-nosotros">
        <span class="nosotros-pre-titulo" data-i18n="index_subtitulo10">Nuestra Trayectoria</span>
        <h1 class="nosotros-titulo-principal" data-i18n="index_titulo2">SOBRE NOSOTROS</h1>
        <div class="nosotros-linea-decorativa"></div>
    </div>

    <section class="mini-nosotros" style="width: 100%; padding: 60px 0; display: flex; justify-content: center; border-top: 1px solid rgba(13, 52, 70, 0.05);">
        <div style="width: 75%; max-width: 1400px; display: flex; align-items: center; gap: 50px; flex-wrap: wrap;">

            <div style="flex: 1; min-width: 300px; height: 350px; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <img src="img/advanced.png" alt="Oficinas corporativas" style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <div style="flex: 1; min-width: 300px; display: flex; flex-direction: column; justify-content: center;">
                <span style="font-size: 0.75rem; font-weight: 700; color: #e58a13; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px;" data-i18n="index_subtitulo11">¿Quiénes Somos?</span>
                <h2 style="font-size: 1.8rem; color: #0d3446; font-weight: 700; margin-bottom: 20px; line-height: 1.3;" data-i18n="index_txt_17">Conectando el Mercado Automotriz de Japón con el Mundo</h2>
                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6; margin-bottom: 25px;" data-i18n="index_txt_18">
                    En <strong>Advanced South Central</strong>, nos especializamos en la selección, inspección y exportación de vehículos JDM, comerciales y particulares directo desde las subastas niponas. Con años de experiencia en logística portuaria, aseguramos un proceso transparente, legal y seguro para que recibas tu auto sin complicaciones en tu país de origen.
                </p>
                <a href="aboutus.php" style="align-self: flex-start; text-decoration: none; background-color: #0d3446; color: #ffffff; padding: 12px 28px; font-size: 0.9rem; font-weight: 700; border-radius: 8px; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#e58a13'" onmouseout="this.style.backgroundColor='#0d3446'" data-i18n="index_txt_19">
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

                // Clonado para efecto infinito
                const itemsMarcas = sliderMarcas.querySelectorAll('.carta_logo');
                itemsMarcas.forEach(item => sliderMarcas.appendChild(item.cloneNode(true)));

                let isUserInteracting = false;
                let startX, scrollLeft;
                let moved = false; // Nueva bandera para saber si hubo arrastre

                // --- ANIMACIÓN ---
                function animar() {
                    if (!isUserInteracting) {
                        sliderMarcas.scrollLeft += 0.8;
                        if (sliderMarcas.scrollLeft >= (sliderMarcas.scrollWidth / 2)) {
                            sliderMarcas.scrollLeft = 0;
                        }
                    }
                    requestAnimationFrame(animar);
                }

                // --- LÓGICA DE ARRASTRE ---
                sliderMarcas.addEventListener('mousedown', (e) => {
                    isUserInteracting = true;
                    moved = false;
                    startX = e.pageX - sliderMarcas.offsetLeft;
                    scrollLeft = sliderMarcas.scrollLeft;
                });

                sliderMarcas.addEventListener('mousemove', (e) => {
                    if (!isUserInteracting) return;
                    e.preventDefault();
                    const x = e.pageX - sliderMarcas.offsetLeft;
                    const walk = (x - startX) * 1.5; // Velocidad de arrastre
                    sliderMarcas.scrollLeft = scrollLeft - walk;
                    if (Math.abs(walk) > 5) moved = true; // Si se movió más de 5px, es arrastre
                });

                const stopInteraction = () => {
                    isUserInteracting = false;
                };

                sliderMarcas.addEventListener('mouseup', stopInteraction);
                sliderMarcas.addEventListener('mouseleave', stopInteraction);

                // --- CORRECCIÓN DEL CLICK ---
                // Delegación de eventos para evitar que el link se abra al arrastrar
                sliderMarcas.addEventListener('click', (e) => {
                    if (moved) {
                        e.preventDefault(); // Bloquea el link si hubo arrastre
                        e.stopPropagation();
                    }
                });

                animar();
            }
        };

        // --- 2. CARRUSEL DE AUTOS (MOVIMIENTO POR PASOS - TU CÓDIGO) ---
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

        // --- 3. CARRUSEL DE AUTOS (MOVIMIENTO POR PASOS - TU CÓDIGO) ---
        const carruselAutos1 = document.querySelector('.carrusel_destacados1');

        if (carruselAutos1) {
            const itemsAutos = carruselAutos1.querySelectorAll('.carta_normal1');

            if (carruselAutos1.scrollWidth > carruselAutos1.offsetWidth) {

                // 1. Clonar para el efecto infinito
                itemsAutos.forEach(item => {
                    carruselAutos1.appendChild(item.cloneNode(true));
                });

                let isUserInteracting = false;
                let timer;
                const velocidad = 0.8; // Ajusta la velocidad aquí

                // 2. Animación fluida usando el valor actual de scrollLeft
                function animarContinuo() {
                    if (!isUserInteracting) {
                        carruselAutos1.scrollLeft += velocidad;

                        // Reseteo inteligente al llegar a la mitad
                        if (carruselAutos1.scrollLeft >= (carruselAutos1.scrollWidth / 2)) {
                            carruselAutos1.scrollLeft = 0;
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

                carruselAutos1.addEventListener('mousedown', startInteraction);
                carruselAutos1.addEventListener('touchstart', startInteraction);
                carruselAutos1.addEventListener('mouseup', endInteraction);
                carruselAutos1.addEventListener('mouseleave', endInteraction);
                carruselAutos1.addEventListener('touchend', endInteraction);

                animarContinuo();
            } else {
                carruselAutos1.style.justifyContent = 'center';
                carruselAutos1.style.overflowX = 'hidden';
            }
        }

        /*-----*/

        document.addEventListener("DOMContentLoaded", function() {
            const slides = document.querySelectorAll('.hero-banner .slide');
            let currentIndex = 0;
            const intervaloTiempo = 10000; // 10 segundos

            function cambiarSlide() {
                slides[currentIndex].classList.remove('activo');
                // Si hay 4 slides, la operación matemática hace: (0+1)%4 = 1, (1+1)%4 = 2, (2+1)%4 = 3, (3+1)%4 = 0
                currentIndex = (currentIndex + 1) % slides.length;
                slides[currentIndex].classList.add('activo');
            }

            setInterval(cambiarSlide, intervaloTiempo);
        });

        /*-----*/

        function iniciarAnimacionBarra(slide) {
            const barra = slide.querySelector('.indicator_banner::after'); 
            const indicador = slide.querySelector('.indicator_banner');

            indicador.style.setProperty('--animation-duration', '10s');

            const estiloBarra = indicador.querySelector('.indicator_banner');
            const el = slide.querySelector('.indicator_banner');
            el.style.animation = 'none';
            el.offsetHeight;
            el.style.animation = 'llenar 10s linear forwards';
        }

        setInterval(cambiarSlide, 10000);

        iniciarAnimacionBarra(slides[0]);

    </script>

</body>

</html>