<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "autos";

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
        .panel_contenedor {
            width: 100%;
            display: flex;
            flex-direction: row;
        }

        .panel_datos {
            height: 87.3dvh;
            flex: 4;
        }

        /*-----------------------------------------------------------------------------*/
        .crud_container {
            padding: 24px;
            box-sizing: border-box;
            background-color: #f8f9fa;
            height: 100%;
            display: flex;
            flex-direction: column;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

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

        .filter_bar {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
            flex-shrink: 0;
            background: #ffffff;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        }

        .search_input_wrapper {
            flex: 1;
        }

        .filter_select_wrapper {
            width: 240px;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: 14px;
            font-weight: 500;
            flex-shrink: 0;
        }

        .alert-success {
            background-color: #d1e7dd;
            color: #0f5132;
            border: 1px solid #badbcc;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
        }

        .table_scroll_container {
            flex: 1;
            overflow-y: auto;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            background: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            margin-bottom: 16px;
        }

        .products_table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }

        .products_table th {
            background-color: #f1f3f5;
            color: #495057;
            font-weight: 600;
            padding: 14px 16px;
            border-bottom: 2px solid #dee2e6;
            position: sticky;
            top: 0;
            z-index: 2;
        }

        .products_table td {
            padding: 12px 16px;
            border-bottom: 1px solid #eff2f5;
            color: #343a40;
            vertical-align: middle;
        }

        .products_table tbody tr:hover {
            background-color: #f8f9fa;
        }

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

        .btn-add {
            background-color: #2b8a3e;
            color: white;
            padding: 10px 16px;
            font-size: 14px;
        }

        .btn-add:hover {
            background-color: #237032;
        }

        .btn-edit {
            background-color: #e7f5ff;
            color: #1c7ed6;
            border-color: #a5d8ff;
        }

        .btn-edit:hover {
            background-color: #d0ebff;
        }

        .btn-delete {
            background-color: #fff5f5;
            color: #e03131;
            border-color: #ffc9c9;
            margin-left: 6px;
        }

        .btn-delete:hover {
            background-color: #ffe3e3;
        }

        .btn-primary {
            background-color: #1c7ed6;
            color: white;
            padding: 10px 18px;
            font-size: 14px;
        }

        .btn-primary:hover {
            background-color: #1971c2;
        }

        .btn-secondary {
            background-color: #ff922b;
            color: white;
            padding: 10px 18px;
            font-size: 14px;
        }

        .btn-secondary:hover {
            background-color: #f76707;
        }

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

        .pagination_mock {
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

        .form_card {
            background: white;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 24px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            max-width: 700px;
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
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
    </style>

</head>

<body>

    <?php include '../topbar.php'; ?>

    <div class="panel_contenedor">

        <?php include '../admin/siderbar.php'; ?>

        <section class="panel_datos">

            <div class="crud_container">

                <!-- NOTIFICACIONES (Mostrar u ocultar con tu lógica de backend) -->
                <div class="alert alert-success" id="alert_success" style="display: none;">Mensaje de éxito.</div>
                <div class="alert alert-danger" id="alert_error" style="display: none;">Mensaje de error.</div>

                <!-- VISTA 1: FORMULARIO DE AGREGAR PRODUCTO (Ocultar por defecto con style="display:none;") -->
                <div id="vista_create" style="display: none;">
                    <div class="crud_header">
                        <h2>Agregar Nuevo Producto</h2>
                    </div>
                    <div class="form_card">
                        <form action="" method="POST">
                            <div class="form_group">
                                <label for="prod_name">Nombre del Producto / Repuesto</label>
                                <input type="text" id="prod_name" name="name" class="form_control" placeholder="Ej. Kit Embrague Amortiguador" required>
                            </div>
                            <div class="form_row">
                                <div class="form_group">
                                    <label for="prod_brand">Marca u Origen</label>
                                    <input type="text" id="prod_brand" name="brand" class="form_control" placeholder="Ej. Toyota, Denso" required>
                                </div>
                                <div class="form_group">
                                    <label for="prod_sku">Código Interno (SKU)</label>
                                    <input type="text" id="prod_sku" name="sku" class="form_control" placeholder="Ej. SKU-8849" required>
                                </div>
                            </div>
                            <div class="form_row">
                                <div class="form_group">
                                    <label for="prod_price">Precio de Lista ($)</label>
                                    <input type="number" step="0.01" id="prod_price" name="price" class="form_control" placeholder="0.00" required>
                                </div>
                                <div class="form_group">
                                    <label for="prod_stock">Cantidad Inicial en Stock</label>
                                    <input type="number" id="prod_stock" name="stock" class="form_control" placeholder="0" required>
                                </div>
                            </div>
                            <div class="form_group">
                                <label for="prod_status">Estado de Publicación</label>
                                <select id="prod_status" name="status" class="form_control">
                                    <option value="Activo">Activo (Disponible de inmediato)</option>
                                    <option value="Inactivo">Inactivo (Guardar como borrador)</option>
                                </select>
                            </div>
                            <div style="margin-top: 24px; border-top: 1px solid #dee2e6; padding-top: 16px;">
                                <button type="submit" class="btn btn-primary" style="background-color: #2b8a3e;">Registrar Producto</button>
                                <button type="button" class="btn btn-cancel" onclick="cambiarVista('lista')">Cancelar y Volver</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- VISTA 2: FORMULARIO DE EDICIÓN (Ocultar por defecto con style="display:none;") -->
                <div id="vista_edit" style="display: none;">
                    <div class="crud_header">
                        <h2>Modificar Producto</h2>
                    </div>
                    <div class="form_card">
                        <form action="" method="POST">
                            <input type="hidden" id="edit_prod_id" name="id">
                            <div class="form_group">
                                <label for="edit_prod_name">Nombre Completo del Producto</label>
                                <input type="text" id="edit_prod_name" name="name" class="form_control" required>
                            </div>
                            <div class="form_row">
                                <div class="form_group">
                                    <label for="edit_prod_brand">Marca u Origen</label>
                                    <input type="text" id="edit_prod_brand" name="brand" class="form_control" required>
                                </div>
                                <div class="form_group">
                                    <label for="edit_prod_sku">Código Interno (SKU)</label>
                                    <input type="text" id="edit_prod_sku" name="sku" class="form_control" required>
                                </div>
                            </div>
                            <div class="form_row">
                                <div class="form_group">
                                    <label for="edit_prod_price">Precio de Venta ($)</label>
                                    <input type="number" step="0.01" id="edit_prod_price" name="price" class="form_control" required>
                                </div>
                                <div class="form_group">
                                    <label for="edit_prod_stock">Cantidad en Stock</label>
                                    <input type="number" id="edit_prod_stock" name="stock" class="form_control" required>
                                </div>
                            </div>
                            <div class="form_group">
                                <label for="edit_prod_status">Estado Disponibilidad</label>
                                <select id="edit_prod_status" name="status" class="form_control">
                                    <option value="Activo">Activo (Visible en tienda)</option>
                                    <option value="Inactivo">Inactivo (Deshabilitado)</option>
                                </select>
                            </div>
                            <div style="margin-top: 24px; border-top: 1px solid #dee2e6; padding-top: 16px;">
                                <button type="submit" class="btn btn-secondary">Guardar Cambios</button>
                                <button type="button" class="btn btn-cancel" onclick="cambiarVista('lista')">Regresar a la Tabla</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- VISTA 3: CONFIRMACIÓN DE ELIMINACIÓN (Ocultar por defecto con style="display:none;") -->
                <div id="vista_delete" style="display: none;">
                    <div class="crud_header">
                        <h2>Confirmación de Baja</h2>
                    </div>
                    <div class="form_card" style="border-left: 4px solid #e03131;">
                        <h3 style="margin-top:0; color: #e03131;">¿Estás seguro de eliminar este ítem?</h3>
                        <p style="color:#495057; font-size: 15px;">Vas a dar de baja al registro de forma permanente de la base de datos.</p>
                        <form action="" method="POST">
                            <input type="hidden" id="delete_prod_id" name="id">
                            <div style="margin-top: 24px; padding-top: 16px; border-top: 1px solid #dee2e6;">
                                <button type="submit" class="btn btn-primary" style="background-color: #e03131;">Sí, Confirmar Eliminación</button>
                                <button type="button" class="btn btn-cancel" onclick="cambiarVista('lista')">Cancelar y Volver</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- VISTA 4: TABLA PRINCIPAL (Visible por defecto) -->
                <div id="vista_lista">
                    <div class="crud_header">
                        <div>
                            <h2>Inventario de Repuestos y Productos</h2>
                            <p style="margin:4px 0 0 0; color:#6c757d; font-size:14px;">Manejo interno de existencias con scroll e hileras fijas.</p>
                        </div>
                        <button type="button" class="btn btn-add" onclick="cambiarVista('create')">+ Agregar Producto</button>
                    </div>

                    <div class="filter_bar">
                        <div class="search_input_wrapper">
                            <input type="text" id="js_search_input" class="form_control" placeholder="🔍 Buscar por descripción, marca o código SKU...">
                        </div>
                        <div class="filter_select_wrapper">
                            <select id="js_sort_select" class="form_control">
                                <option value="default">Por defecto (ID)</option>
                                <option value="alpha_az">Descripción: A a la Z</option>
                                <option value="alpha_za">Descripción: Z a la A</option>
                                <option value="price_asc">Precio: Menor a Mayor</option>
                                <option value="price_desc">Precio: Mayor a Menor</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tabla Totalmente Vacía lista para tu bucle While/Foreach en PHP -->
                    <div class="table_scroll_container">
                        <table class="products_table" id="js_inventory_table">
                            <thead>
                                <tr>
                                    <!--   <th>uno</th>
                                    <th>dos</th>
                                    <th>tres</th>
                                    <th>cuatro</th>
                                    <th>cinco</th>
                                    <th>seis</th>
                                    <th>siete</th>
                                    <th>ocho</th>
                                    <th>nueve</th>
                                    <th>diez</th>
                                    <th>once</th>
                                    <th>doce</th>
                                    <th>trece</th>
                                    <th>catorce</th>
                                    <th>quince</th>
                                    <th>dieciseis</th>
                                    <th>diecisiete</th>
                                    <th>dieciocho</th>
                                    <th>diecinueve</th>
                                    <th>veinte</th>
                                    <th>veintiuno</th>
                                    <th>veintidos</th>
                                    <th>veintitres</th>
                                    <th>veinticuatro</th>
                                    <th>veinticinco</th> -->

                                    <th style="text-align: center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- AQUÍ DEBES ENLAZAR TU BASE DE DATOS E IMPRIMIR LAS FILAS CON ESTA ESTRUCTURA DE EJEMPLO:
                    <tr data-id="1" data-name="Filtro de Aceite" data-price="25.50">
                        <td><strong>#1</strong></td>
                        <td><code>SKU-10401</code></td>
                        <td>Filtro de Aceite Sintético</td>
                        <td>Toyota</td>
                        <td>$25.50</td>
                        <td>15 unds</td>
                        <td><span class="badge badge-active">Activo</span></td>
                        <td style="text-align: center; white-space: nowrap;">
                            <button type="button" class="btn btn-edit" onclick="cambiarVista('edit', 1)">Editar</button>
                            <button type="button" class="btn btn-delete" onclick="cambiarVista('delete', 1)">Eliminar</button>
                        </td>
                    </tr>
                    -->
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination_mock">
                        <div id="js_pagination_info">Cargando registros...</div>
                    </div>
                </div>
            </div>

        </section>

    </div>

    <script>
        function cambiarVista(vista, id = null) {
            document.getElementById('vista_lista').style.display = 'none';
            document.getElementById('vista_create').style.display = 'none';
            document.getElementById('vista_edit').style.display = 'none';
            document.getElementById('vista_delete').style.display = 'none';

            if (vista === 'lista') {
                document.getElementById('vista_lista').style.display = 'block';
            } else if (vista === 'create') {
                document.getElementById('vista_create').style.display = 'block';
            } else if (vista === 'edit') {
                document.getElementById('vista_edit').style.display = 'block';
                if (id) document.getElementById('edit_prod_id').value = id;
                // Aquí puedes mapear los datos del elemento seleccionado a los inputs del form de edición
            } else if (vista === 'delete') {
                document.getElementById('vista_delete').style.display = 'block';
                if (id) document.getElementById('delete_prod_id').value = id;
            }
        }

        // Algoritmo de ordenamiento y filtrado instantáneo
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById('js_search_input');
            const sortSelect = document.getElementById('js_sort_select');
            const tableBody = document.querySelector('#js_inventory_table tbody');
            const paginationInfo = document.getElementById('js_pagination_info');

            function filterAndSortTable() {
                const originalRows = Array.from(tableBody.querySelectorAll('tr:not(.no-data)'));
                const searchTerm = searchInput.value.toLowerCase().trim();
                const sortValue = sortSelect.value;

                if (originalRows.length === 0) {
                    paginationInfo.textContent = "Mostrando 0 registros encontrados";
                    return;
                }

                // 1. Filtrado por texto
                let filteredRows = originalRows.filter(row => {
                    const text = row.textContent.toLowerCase();
                    return text.includes(searchTerm);
                });

                // 2. Ordenamiento en Caliente
                if (sortValue === 'alpha_az') {
                    filteredRows.sort((a, b) => a.dataset.name.localeCompare(b.dataset.name));
                } else if (sortValue === 'alpha_za') {
                    filteredRows.sort((a, b) => b.dataset.name.localeCompare(a.dataset.name));
                } else if (sortValue === 'price_asc') {
                    filteredRows.sort((a, b) => parseFloat(a.dataset.price) - parseFloat(b.dataset.price));
                } else if (sortValue === 'price_desc') {
                    filteredRows.sort((a, b) => parseFloat(b.dataset.price) - parseFloat(a.dataset.price));
                } else if (sortValue === 'default') {
                    filteredRows.sort((a, b) => parseInt(a.dataset.id) - parseInt(b.dataset.id));
                }

                // 3. Renderizado final
                // Quitamos mensajes anteriores de no-data si existen
                const existingNoData = tableBody.querySelector('.no-data');
                if (existingNoData) existingNoData.remove();

                if (filteredRows.length > 0) {
                    originalRows.forEach(row => row.style.display = 'none');
                    filteredRows.forEach(row => {
                        row.style.display = '';
                        tableBody.appendChild(row);
                    });
                    paginationInfo.textContent = `Mostrando ${filteredRows.length} registros encontrados.`;
                } else {
                    originalRows.forEach(row => row.style.display = 'none');
                    const trNoData = document.createElement('tr');
                    trNoData.classList.add('no-data');
                    trNoData.innerHTML = `<td colspan="8" style="text-align: center; padding: 24px; color: #6c757d;">Ningún repuesto o producto coincide con la búsqueda.</td>`;
                    tableBody.appendChild(trNoData);
                    paginationInfo.textContent = `Mostrando 0 registros encontrados.`;
                }
            }

            // Ejecutar funciones al teclear o cambiar selección
            searchInput.addEventListener('input', filterAndSortTable);
            sortSelect.addEventListener('change', filterAndSortTable);

            // Inicializar texto de conteo de filas
            const initialCount = tableBody.querySelectorAll('tr').length;
            paginationInfo.textContent = `Total: ${initialCount} registros cargados de la base de datos.`;
        });
    </script>

</body>

</html>