<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "olimpiadas";

try {
    $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET NAMES utf8");
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
