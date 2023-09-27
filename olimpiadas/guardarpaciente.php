<?php
$conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");


$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
$telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
$localidad = mysqli_real_escape_string($conexion, $_POST['localidad']);
$direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
$fecha_nacimiento = mysqli_real_escape_string($conexion, $_POST['fecha_nacimiento']);
$area = mysqli_real_escape_string($conexion, $_POST['area']);



$sql = "INSERT INTO ficha_paciente (nombre, apellido, telefono,localidad, direccion, fecha_nacimiento, area)
        VALUES ('$nombre', '$apellido', '$telefono','$localidad', '$direccion', '$fecha_nacimiento' ,'$area')";

if ($conexion->query($sql) === TRUE) {
    header("location:mostrarfichas.php");
} else {
    echo "Error al agregar paciente: " . $conexion->error;
}

$conexion->close();
?>