<?php

$conn->set_charset("utf8");

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
        GROUP BY a.id_auto";

$result = $conn->query($sql);

if (!$result) {
    die("<div style='background:#fff5f5; color:#c53030; border:1px solid #feb2b2; padding:25px; margin:20px; font-family:sans-serif; border-radius:8px;'>
            <h2>❌ Error en la Consulta SQL</h2>
            <p>MySQL dice: <strong>" . $conn->error . "</strong></p>
            <p>Por favor, revisa que los nombres de las columnas en tu tabla <code>autos</code> coincidan exactamente con el código.</p>
         </div>");
}

$mysql_rows_count = $result->num_rows;
$autos = [];

if ($mysql_rows_count > 0) {
    while ($fila = $result->fetch_assoc()) {


        $autos[] = [
            "id" => $fila['id'],
            "modelo_id" => $fila['id_modelo'],
            "marca" => $fila['marca'],
            "marca_logo" => null, // No definido en el SELECT original
            "modelo" => $fila['modelo'],
            "first_registration" => $fila['first_registration'],
            "rango" => $fila['rango'],
            "engine_type" => $fila['engine_type'],
            "transmission" => $fila['transmission'],
            "fuel" => $fila['fuel'],
            "capacity" => $fila['capacidad'],
            "color" => $fila['color'],
            "chassis_no" => $fila['chassis_no'],
            "manufacture_date" => $fila['manufacture_date'],
            "type_code" => $fila['type_code'],
            "displacement" => $fila['displacement'],
            "turbo" => $fila['turbo'],
            "drive" => $fila['drive'],
            "steering_wheel" => $fila['steering_wheel'],
            "mileage" => $fila['mileage'],
            "horometro" => $fila['horometro'],
            "peso" => $fila['peso'],
            "vehicle_type" => $fila['vehicle_type'],
            "precio" => $fila['precio'],
            "estado" => $fila['estado'],
            "driver_airbag" => $fila['driver_airbag'],
            "passenger_airbag" => $fila['passenger_airbag'],
            "destacado" => $fila['destacado'],
            "stock" => $fila['stock'],
            "img" => $fila['portada'],
        ];
    }
}

$json_autos = json_encode($autos);

$conn->close();
?>