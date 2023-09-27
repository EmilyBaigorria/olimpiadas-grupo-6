<?php
if (isset($_POST['registrar'])) {
    include 'conexion.php';
    
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];

    try {
        $sql = "INSERT INTO pacientes (nombre, dni) VALUES (:nombre, :dni)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':dni', $dni);

        $stmt->execute();

        header("Location: registro_paciente.php?mensaje=exitoso");
        exit();
    } catch(PDOException $e) {
        header("Location: registro_paciente.php?mensaje=error");
        exit();
    }
    
    $conexion = null;
}
?>
