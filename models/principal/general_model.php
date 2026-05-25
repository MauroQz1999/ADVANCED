<?php

$sql_logo = "SELECT
                * 
                FROM marca";

$logo = $conn->query($sql_logo);

if (!$logo) {
    die("Error en la consulta: " . $conn->error);
}

?>

<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?php

$sql_recomendados = "SELECT 
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
                    WHERE stock = 1
                    AND destacado = 1
                    GROUP BY a.id_auto";

$recomendado = $conn->query($sql_recomendados);

if (!$recomendado) {
    die("Error en la consulta: " . $conn->error);
}

?>

<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?php

$sql_destacado = "SELECT 
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
                    INNER JOIN registro_vistas v ON a.id_modelo = v.id_modelo
                    WHERE stock = 1
                    GROUP BY a.id_auto
                    LIMIT 5";

$destacado = $conn->query($sql_destacado);

if (!$destacado) {
    die("Error en la consulta: " . $conn->error);
}

?>

<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?php

$sql_marcas = "SELECT 
                    m.nombre_marca AS marca,
                    COUNT(v.id_vista) AS total_vistas
                FROM marca m
                JOIN registro_vistas v ON m.id_marca = v.id_marca
                GROUP BY m.id_marca
                ORDER BY total_vistas DESC
                LIMIT 5";

$marcas = $conn->query($sql_marcas);

if (!$marcas) {
    die("Error en la consulta: " . $conn->error);
}

?>

<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?php

$sql_modelos = "SELECT 
                    m.nombre_marca AS marca,
                    mo.nombre_modelo AS modelo,
                    COUNT(v.id_vista) AS total_vistas
                FROM registro_vistas v
                JOIN marca m ON v.id_marca = m.id_marca
                JOIN modelo mo ON v.id_modelo = mo.id_modelo
                GROUP BY mo.id_modelo, m.nombre_marca, mo.nombre_modelo
                ORDER BY total_vistas DESC
                LIMIT 5";

$modelos = $conn->query($sql_modelos);

if (!$modelos) {
    die("Error en la consulta: " . $conn->error);
}

?>

<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?php

$sql_vendidos = "SELECT 
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
                    INNER JOIN registro_vistas v ON a.id_modelo = v.id_modelo
                    WHERE stock = 1
                    GROUP BY a.id_auto
                    LIMIT 6";

$vendidos = $conn->query($sql_vendidos);

if (!$vendidos) {
    die("Error en la consulta: " . $conn->error);
}

?>

<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?php

$sql_registro_marca = "SELECT
                         * 
                         FROM marca";

$registro_marca = $conn->query($sql_registro_marca);

if (!$registro_marca) {
    die("Error en la consulta: " . $conn->error);
}

?>

<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
