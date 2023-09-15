<?php
$conexion = mysqli_connect("localhost", "root", "", "olimpiadas") or exit("no se puede conectar");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];

    // Realiza una consulta SQL para eliminar el registro
    $sql_delete = "DELETE FROM datos_medicos WHERE id = $id";

    if ($conexion->query($sql_delete) === TRUE) {
        header("location: mostrarfichas2.php"); // Redirige a la página de visualización de registros
        exit();
    } else {
        echo "Error al eliminar el registro: " . $conexion->error;
    }
}

$conexion->close();
?>