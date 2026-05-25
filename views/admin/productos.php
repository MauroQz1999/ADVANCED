<?php include $_SERVER['DOCUMENT_ROOT'] . '/ADVANCE/configuracion/conexion.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/ADVANCE/models/admin/productos_model.php'; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/ADVANCE/models/general_model.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced South Central</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        /* CONTENEDOR DATOS ------------------------------------------------------------ */

        .datos_contenedor_general {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            flex-shrink: 0;
        }

        /* TEXTOS ---------------------------------------------------------------------- */

        .tabla_titulo {
            margin: 0;
            font-size: 24px;
            color: #212529;
        }

        .tabla_subtitulo {
            margin: 4px 0 0 0;
            color: #6c757d;
            font-size: 14px;
        }

        /* CONTENEDOR ACCIONES --------------------------------------------------------- */

        .contenedor_acciones {
            text-align: center;
            white-space: nowrap;
        }

        /* BTNS ------------------------------------------------------------------------ */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 12px;
            font-size: 13px;
            font-weight: 500;
            border-radius: 4px;
            border: 1px solid transparent;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        /* ------------------------------- */

        .btn-add {
            background-color: #2b8a3e;
            color: white;
            padding: 10px 16px;
            font-size: 14px;
        }

        .btn-add:hover {
            background-color: #237032;
        }

        /* ------------------------------- */

        .btn-edit {
            background-color: #e7f5ff;
            color: #1c7ed6;
            border-color: #a5d8ff;
        }

        .btn-edit:hover {
            background-color: #d0ebff;
        }

        /* ------------------------------- */

        .btn-delete {
            background-color: #fff5f5;
            color: #e03131;
            border-color: #ffc9c9;
            margin-left: 6px;
        }

        .btn-delete:hover {
            background-color: #ffe3e3;
        }

        /* ------------------------------- */

        .btn-primary {
            background-color: #1c7ed6;
            color: white;
            padding: 10px 18px;
            font-size: 14px;
        }

        .btn-primary:hover {
            background-color: #1971c2;
        }

        /* ------------------------------- */

        .btn-secondary {
            background-color: #ff922b;
            color: white;
            padding: 10px 18px;
            font-size: 14px;
        }

        .btn-secondary:hover {
            background-color: #f76707;
        }

        /* ------------------------------- */

        .btn-cancel {
            background-color: #6c757d;
            color: white;
            margin-left: 10px;
            padding: 10px 18px;
            font-size: 14px;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
        }

        /* CONTENEDOR FILTRO ------------------------------------------------------------ */

        .filtros_contenedor_general {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
            flex-shrink: 0;
            background: #ffffff;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        }

        /* BUSCADOR -------------------------------------------------------------------- */

        .buscador {
            flex: 1;
        }

        .form_control {
            width: 100%;
            padding: 10px 12px;
            font-size: 14px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            box-sizing: border-box;
            color: #212529;
        }

        .form_control:focus {
            outline: none;
            border-color: #339af0;
            box-shadow: 0 0 0 3px rgba(51, 154, 240, 0.25);
        }

        /* CONTENEDOR TABLA ------------------------------------------------------------ */

        .tabla_contenedor_general {
            background-color: #f8f9fa;
            height: 100%;
            display: flex;
            flex-direction: column;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* TABLA GENERAL --------------------------------------------------------------- */

        .tabla_container {
            overflow-y: auto;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            background: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            margin-bottom: 16px;
        }

        .tabla_general {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }

        .tabla_general th {
            background-color: #f1f3f5;
            color: #495057;
            font-weight: 600;
            padding: 14px 16px;
            border-bottom: 2px solid #dee2e6;
            top: 0;
            z-index: 2;
        }

        .tabla_general td {
            padding: 12px 16px;
            border-bottom: 1px solid #eff2f5;
            color: #343a40;
            vertical-align: middle;
        }

        .tabla_general tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* VALOR ACTIVO ---------------------------------------------------------------- */

        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 4px;
            text-align: center;
        }

        .badge-active {
            background-color: #e6f4ea;
            color: #137333;
        }

        .badge-inactive {
            background-color: #fce8e6;
            color: #c5221f;
        }

        /* CONTADOR -------------------------------------------------------------------- */

        .contador {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
            padding: 12px 16px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            font-size: 14px;
            color: #6c757d;
            flex-shrink: 0;
        }

        /* FALTA REPARAR --------------------------------------------------------------- */

        .crud_header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            flex-shrink: 0;
        }

        .crud_header h2 {
            margin: 0;
            font-size: 24px;
            color: #212529;
        }

        .form_card {
            box-sizing: border-box;
            width: 100%;
            background: white;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 24px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
        }

        .form_group {
            margin-bottom: 20px;
        }

        .form_group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #495057;
        }

        .form_control {
            width: 100%;
            padding: 10px 12px;
            font-size: 14px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            box-sizing: border-box;
            color: #212529;
        }

        .form_control:focus {
            outline: none;
            border-color: #339af0;
            box-shadow: 0 0 0 3px rgba(51, 154, 240, 0.25);
        }

        .form_row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            gap: 16px;
        }
    </style>

</head>

<body>

    <div>

        <div id="vista_lista">

            <div class="datos_contenedor_general">
                <div>
                    <h2 class="tabla_titulo">
                        Tabla de Productos
                    </h2>
                    <p class="tabla_subtitulo">
                        Subtitulo
                    </p>
                </div>
                <button type="button" class="btn btn-add" onclick="cambiarVista('create')">
                    + Agregar
                </button>
            </div>

            <div class="filtros_contenedor_general">
                <div class="buscador">
                    <input type="text" id="js_search_input" class="form_control" placeholder="🔍 Buscar por ...">
                </div>
            </div>

            <div class="tabla_contenedor_general">
                <div class="tabla_container">
                    <table class="tabla_general">

                        <thead>

                            <tr>
                                <th>Id</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>registro</th>
                                <th>Grado</th>
                                <th>motor</th>
                                <th>Transmisión</th>
                                <th>Combustible</th>
                                <th>Capacidad</th>
                                <th>Color</th>
                                <th>N.º chasis</th>
                                <th>Fabricación</th>
                                <th>Homologación</th>
                                <th>Cilindrada</th>
                                <th>Turbo</th>
                                <th>Traccion</th>
                                <th>Volante</th>
                                <th>Millaje</th>
                                <th>Horometro</th>
                                <th>Peso</th>
                                <th>Tipo</th>
                                <th>Conductor</th>
                                <th>Pasajero</th>
                                <th>Ruta</th>
                                <th>Detalles</th>
                                <th>Stock</th>
                                <th>Destacado</th>
                                <th>Precio</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php if ($result->num_rows > 0) : ?>
                                <?php while ($auto = $result->fetch_assoc()) : ?>

                                    <tr>

                                        <td><?php echo htmlspecialchars($auto['id']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['marca']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['modelo']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['first_registration']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['rango']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['engine_type']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['transmission']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['fuel']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['capacidad']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['color']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['chassis_no']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['manufacture_date']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['type_code']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['displacement']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['turbo']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['drive']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['steering_wheel']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['mileage']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['horometro']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['peso']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['vehicle_type']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['driver_airbag']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['passenger_airbag']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['portada']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['detalles']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['destacado']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['stock']); ?></td>
                                        <td><?php echo htmlspecialchars($auto['precio']); ?></td>

                                        <td><span class="badge badge-active">Activo</span></td>

                                        <td class="contenedor_acciones">
                                            <button type="button" class="btn btn-edit" onclick="cambiarVista('edit', <?php echo $auto['id']; ?>)">Editar</button>
                                            <button type="button" class="btn btn-delete" onclick="cambiarVista('delete', <?php echo $auto['id']; ?>)">Eliminar</button>
                                        </td>

                                    </tr>

                                <?php endwhile; ?>
                            <?php endif; ?>

                            <tr id="no-results-row" style="display: none;">
                                <td colspan="4" style="text-align: center; padding: 20px;">No se encontraron resultados</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="contador">
                <div id="js_counter"></div>
            </div>

        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById('js_search_input');
            const tableBody = document.querySelector('tbody');
            const noResultsRow = document.getElementById('no-results-row');

            const counterElement = document.getElementById('js_counter');
            const originalRows = Array.from(tableBody.querySelectorAll('tr:not(#no-results-row)'));

            function filterAndSortTable() {
                const searchTerm = searchInput.value.toLowerCase();
                let visibleCount = 0;

                originalRows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    const isVisible = text.includes(searchTerm);

                    row.style.display = isVisible ? '' : 'none';
                    if (isVisible) visibleCount++;
                });

                noResultsRow.style.display = visibleCount === 0 ? '' : 'none';
                counterElement.textContent = `Mostrando ${visibleCount} de ${originalRows.length} registros`;
            }

            filterAndSortTable();
            searchInput.addEventListener('input', filterAndSortTable);
        });
    </script>

</body>

</html>