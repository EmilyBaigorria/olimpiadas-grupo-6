<?php
$conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $sexo = $_POST['sexo'];
    $telefono = $_POST['telefono'];
    $localidad = $_POST['localidad'];
    $direccion = $_POST['direccion'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $area = $_POST['area'];


    $sql_update = "UPDATE ficha_paciente SET nombre='$nombre', apellido='$apellido', sexo='$sexo', telefono='$telefono', localidad='$localidad', direccion='$direccion', fecha_nacimiento='$fecha_nacimiento', area='$area' WHERE id = $id";

    if ($conexion->query($sql_update) === TRUE) {
        header("location: mostrarfichas.php");
        exit();
    } else {
        echo "Error al guardar los cambios: " . $conexion->error;
    }
}

$conexion->close();