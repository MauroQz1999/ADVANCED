<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "auts";

$conn = new mysqli($servername, $username, $password, $dbname);

?>