<?php

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
    die("Error en la consulta: " . $conn->error);
}

?>