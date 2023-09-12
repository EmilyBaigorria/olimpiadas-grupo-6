<?php

// Conectarse a la base de datos

$conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");


// Recibir y limpiar los datos enviados por el formulario
$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
$telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
$localidad = mysqli_real_escape_string($conexion, $_POST['localidad']);
$direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
$fecha_nacimiento = mysqli_real_escape_string($conexion, $_POST['fecha_nacimiento']);
$medico_asignado = mysqli_real_escape_string($conexion, $_POST['medico_asignado']);
$enfermedades = mysqli_real_escape_string($conexion, $_POST['enfermedades']);
$medicamentos = mysqli_real_escape_string($conexion, $_POST['medicamentos']);


// Crear la sentencia SQL para insertar los datos en la base de datos
$sql = "INSERT INTO ficha_paciente (nombre, apellido, telefono,localidad, direccion, fecha_nacimiento,medico_asignado, enfermedades, medicamentos)
        VALUES ('$nombre', '$apellido', '$telefono','$localidad', '$direccion', '$fecha_nacimiento','$medico_asignado', '$enfermedades', '$medicamentos')";

if ($conexion->query($sql) === TRUE) {
    header("location:mostrarfichas.php");
} else {
    echo "Error al agregar paciente: " . $conexion->error;
}

$conexion->close();
?>