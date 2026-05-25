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
    </style>

</head>

<body>

    <?php include '../topbar.php'; ?>

    <div class="panel_contenedor">

        <?php include '../admin/siderbar.php'; ?>

        <section class="panel_datos">
            a
        </section>

    </div>
</body>

</html>