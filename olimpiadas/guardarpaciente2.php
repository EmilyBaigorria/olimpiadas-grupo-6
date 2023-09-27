<?php
$conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

$medico_asignado = mysqli_real_escape_string($conexion, $_POST['medico_asignado']);
$observacion = mysqli_real_escape_string($conexion, $_POST['observacion']);
$medicamentos = mysqli_real_escape_string($conexion, $_POST['medicamentos']);
$dni = mysqli_real_escape_string($conexion, $_POST['dni']);
$obra_social = mysqli_real_escape_string($conexion, $_POST['obra_social']);

$sql = "INSERT INTO datos_medicos (medico_asignado, observacion, medicamentos ,dni, obra_social)
        VALUES ('$medico_asignado' , '$observacion' , '$medicamentos', '$dni'  , '$obra_social')";

if ($conexion->query($sql) === TRUE) {
    header("location:mostrarfichas2.php");
} else {
    echo "Error al agregar paciente: " . $conexion->error;
}

$conexion->close();
?>