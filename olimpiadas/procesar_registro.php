<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];

    $consulta_existencia = "SELECT * FROM pacientes WHERE DNI = :dni";
    $stmt_existencia = $conexion->prepare($consulta_existencia);
    $stmt_existencia->bindParam(':dni', $dni, PDO::PARAM_STR);
    $stmt_existencia->execute();

    if ($stmt_existencia->rowCount() > 0) {
        echo "El paciente con este DNI ya está registrado.";
    } else {
        $consulta_insertar = "INSERT INTO pacientes (DNI, Nombre) VALUES (:dni, :nombre)";
        $stmt_insertar = $conexion->prepare($consulta_insertar);
        $stmt_insertar->bindParam(':dni', $dni, PDO::PARAM_STR);
        $stmt_insertar->bindParam(':nombre', $nombre, PDO::PARAM_STR);

        if ($stmt_insertar->execute()) {
            echo "Registro exitoso. Ahora puedes iniciar sesión.";
        } else {
            echo "Error al registrar al paciente: " . $stmt_insertar->errorInfo()[2];
        }
    }
} else {
    echo "Acceso no autorizado.";
}
?>
