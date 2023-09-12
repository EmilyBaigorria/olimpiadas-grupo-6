<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];

    $consulta = "SELECT * FROM pacientes WHERE DNI = :dni AND Nombre = :nombre";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $_SESSION["id_paciente"] = $fila["ID_Paciente"];
        $_SESSION["nombre_paciente"] = $fila["Nombre"];
    
        header("Location:paciente.php");
        exit();
    } else {

        header("Location: login_paciente.php?error=1");
        exit();
    }
    
} else {
    echo "Acceso no autorizado.";
}
?>
