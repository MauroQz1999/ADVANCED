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