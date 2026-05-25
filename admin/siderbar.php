<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced South Central</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        .panel {
            width: 260px;
            height: 827px;
            background: #0f172a;
            padding-top: 15px;
            box-sizing: border-box;
        }

        .panel-siderbar {
            display: block;
            margin: 4px 10px;
        }

        .panel-text {
            list-style: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
            color: #94a3b8;
            font-family: system-ui, -apple-system, sans-serif;
            font-size: 15px;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .panel-text::-webkit-details-marker {
            display: none;
        }

        .panel-text::after {
            content: '';
            width: 5px;
            height: 5px;
            border-right: 2px solid #94a3b8;
            border-bottom: 2px solid #94a3b8;
            transform: rotate(-45deg);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .panel-siderbar[open] .panel-text {
            background: rgba(255, 255, 255, 0.03);
            color: #ffffff;
        }

        .panel-siderbar[open] .panel-text::after {
            transform: rotate(45deg);
            border-color: #ffffff;
        }

        .submeu-links {
            display: flex;
            flex-direction: column;
            padding: 4px 0 8px 0;
            margin: 0 8px;
        }

        .submeu-links a {
            display: flex;
            align-items: center;
            padding: 10px 16px 10px 24px;
            color: #94a3b8;
            text-decoration: none;
            font-family: system-ui, -apple-system, sans-serif;
            font-size: 14px;
            font-weight: 400;
            border-radius: 6px;
            transition: all 0.15s ease;
        }

        .panel-text:hover,
        .submeu-links a:hover {
            background: rgba(255, 255, 255, 0.06);
            color: #ffffff;
        }

        .panel-titulo h1 {
            font-family: system-ui, -apple-system, sans-serif;
            font-size: 11px;
            font-weight: 700;
            color: #94a3b8;
            letter-spacing: 1px;
            padding: 10px 26px;
            margin: 0;
            opacity: 0.6;
        }

        @media (max-width: 768px) {
            .panel_contenedor {
                flex-direction: column;
            }

            .panel {
                width: 100%;
                height: auto;
                padding-bottom: 15px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            }

            .panel-titulo h1 {
                padding: 10px 16px;
            }
        }
    </style>

</head>

<body>
    <nav class="panel">

        <div class="panel-titulo">
            <h1>PANEL DE CONTROL</h1>
        </div>

        <details class="panel-siderbar">
            <summary class="panel-text" data-i18n="">Usuario</summary>
            <div class="submeu-links">
                <a href="#" data-i18n="">Datos Generales</a>
            </div>
        </details>

        <details class="panel-siderbar">
            <summary class="panel-text" data-i18n="">Productos</summary>
            <div class="submeu-links">
                <a href="#" data-i18n="">Datos Generales</a>
                <a href="#" data-i18n="">Marcas</a>
                <a href="#" data-i18n="">Modelos</a>
                <a href="#" data-i18n="">Destacados</a>
                <a href="#" data-i18n="">Inactivos</a>
            </div>
        </details>

        <details class="panel-siderbar">
            <summary class="panel-text" data-i18n="">Estadisticas</summary>
            <div class="submeu-links">
                <a href="#" data-i18n="">Datos Generales</a>
            </div>
        </details>

        <details class="panel-siderbar">
            <summary class="panel-text" data-i18n="">Paises</summary>
            <div class="submeu-links">
                <a href="#" data-i18n="">Datos Generales</a>
            </div>
        </details>
    </nav>
</body>

</html>