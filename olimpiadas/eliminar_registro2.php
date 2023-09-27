<?php
$conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];

    $sql_delete = "DELETE FROM datos_medicos WHERE id = $id";

    if ($conexion->query($sql_delete) === TRUE) {
        header("location: mostrarfichas2.php");
        exit();
    } else {
        echo "Error al eliminar el registro: " . $conexion->error;
    }
}

$conexion->close();
?>