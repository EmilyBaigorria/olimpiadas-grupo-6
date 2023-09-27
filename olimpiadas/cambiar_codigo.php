<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevo_codigo = $_POST['nuevo_codigo'];

    $sql = "UPDATE codigo_secretaria SET codigo_secretaria = :hashed_password WHERE id = :id";

    try {
        $stmt = $conexion->prepare($sql);

        $id_registro = 1;

        $stmt->bindParam(':hashed_password', $nuevo_codigo);
        $stmt->bindParam(':id', $id_registro);

        if ($stmt->execute()) {
            header("Location: administrador.php?mensaje=exito");
            exit(); 
        } else {
            echo "Error al cambiar la contraseña: " . $stmt->errorInfo()[2];
        }

        $stmt->closeCursor();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conexion = null;
?>
