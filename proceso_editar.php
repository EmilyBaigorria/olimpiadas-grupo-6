<?php
$conexion = mysqli_connect("localhost", "root", "", "hospital_llamadas") or exit("no se puede conectar");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Obtener los datos del formulario
    //$id = $_GET['id'];
    $nombre_paciente = $_POST['nombre_paciente'];
    $motivo = $_POST['motivo'];
    $urgencia = $_POST['urgencia'];

    // Actualizar los datos en la base de datos
    $sql_update = "UPDATE llamadass SET nombre_paciente ='$nombre_paciente', motivo='$motivo', urgencia='$urgencia' WHERE id = $id";
    if ($conexion->query($sql_update) === TRUE) {
        header("location: visualizar_datos.php"); // Redirige a la página de visualización de registros
        exit();
    } else {
        echo "Error al guardar los cambios: " . $conexion->error;
    }
}

$conexion->close();