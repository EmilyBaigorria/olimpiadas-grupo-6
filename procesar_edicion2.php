<?php
$conexion = mysqli_connect("localhost", "root", "", "olimpiadas") or exit("no se puede conectar");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Obtener los datos del formulario
    $medico_asignado = $_POST['medico_asignado'];
    $observacion = $_POST['observacion'];
    $medicamentos = $_POST['medicamentos'];
    $dni = $_POST['dni'];
    $obra_social = $_POST['obra_social'];
    
    // Actualizar los datos en la base de datos
    $sql_update = "UPDATE datos_medicos SET medico_asignado='$medico_asignado', observacion='$observacion', medicamentos='$medicamentos',dni='$dni', obra_social='$obra_social' WHERE id = $id";

    if ($conexion->query($sql_update) === TRUE) {
        header("location: mostrarfichas2.php"); // Redirige a la página de visualización de registros
        exit();
    } else {
        echo "Error al guardar los cambios: " . $conexion->error;
    }
}

$conexion->close();