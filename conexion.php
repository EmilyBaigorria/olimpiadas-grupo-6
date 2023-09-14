<?php
$conexion = mysqli_connect("localhost", "root","","hospital_llamadas") or exit ("no se puede conectar");

if ($conexion->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conexion->connect_error);
}
?>
