<?php
$conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

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

    $sql = "UPDATE registro_llamadas SET nombre_paciente='$nombre_paciente', fecha_hora_inicio='$fecha_hora_inicio', fecha_hora_fin='$fecha_hora_fin', duracion='$duracion', motivo='$motivo', tipo_llamada='$tipo_llamada', area='$area' WHERE id = $id";

    if (mysqli_query($conexion, $sql)) {
        header("Location: mostrarllamadas.php");
        exit();
    } else {
        echo "Error al guardar los cambios: " . mysqli_error($conexion);
    }
} else {
    echo 'ID de registro no válido.';
}

mysqli_close($conexion);
?>
