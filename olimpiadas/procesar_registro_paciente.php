<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];

    $consulta_existencia = "SELECT * FROM pacientes WHERE DNI = :dni";
    $stmt = $conexion->prepare($consulta_existencia);
    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "El paciente con este DNI ya está registrado.";
    } else {
        $consulta_insertar = "INSERT INTO pacientes (DNI, Nombre) VALUES (:dni, :nombre)";
        $stmt = $conexion->prepare($consulta_insertar);
        $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);

        if ($stmt->execute()) {
            header("Location: login_paciente.php");
            exit(); 
        } else {
            echo "Error al registrar al paciente: " . implode(", ", $stmt->errorInfo());
        }
    }
} else {
    echo "Acceso no autorizado.";
}

mysqli_close($conexion);
?>
