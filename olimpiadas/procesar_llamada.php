<?php
$conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

$nombre_paciente = mysqli_real_escape_string($conexion, $_POST['nombre_paciente']);
$fecha_hora_inicio = mysqli_real_escape_string($conexion, $_POST['fecha_hora_inicio']);
$fecha_hora_fin = mysqli_real_escape_string($conexion, $_POST['fecha_hora_fin']);
$motivo = mysqli_real_escape_string($conexion, $_POST['motivo']);
$tipo_llamada = mysqli_real_escape_string($conexion, $_POST['tipo_llamada']);
$area = mysqli_real_escape_string($conexion, $_POST['area']);

$inicio = new DateTime($fecha_hora_inicio);
$fin = new DateTime($fecha_hora_fin);
$duracion = $inicio->diff($fin);
$duracion = $duracion->h * 60 + $duracion->i; 


$sql = "INSERT INTO registro_llamadas (nombre_paciente, fecha_hora_inicio, fecha_hora_fin, duracion, motivo, tipo_llamada, area) 
        VALUES ('$nombre_paciente', '$fecha_hora_inicio', '$fecha_hora_fin', '$duracion', '$motivo', '$tipo_llamada', '$area')";

if (mysqli_query($conexion, $sql)) {
    header("Location: mostrarllamadas.php");
} else {
    echo "Error al registrar la llamada: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
