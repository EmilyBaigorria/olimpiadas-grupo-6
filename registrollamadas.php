<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Llamadas</title>
    <link rel="stylesheet" href="registro.css">
</head>
<body>
    <h1>Registro de Llamadas</h1>
    <form id="llamadaForm" action="procesar_registro.php" method="POST">
        <label for="nombre">Nombre del Paciente:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="motivo">Motivo de la Llamada:</label>
        <textarea id="motivo" name="motivo" rows="4" required></textarea><br>

        <label for="urgencia">Urgencia:</label>
        <select id="urgencia" name="urgencia">

            <option value="Normal">Normal</option>
            <option value="Emergencia">Emergencia</option>
        </select><br>

        <button type="submit">Registrar Llamada</button>
        
    </form>
</body>
</html>

<?php
$conexion = mysqli_connect("localhost", "root","","hospital_llamadas") or exit ("no se puede conectar");

// Verificar la conexión
if ($conexion->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conexion->connect_error);
}

// Ejemplo de inserción de datos
$nombre_paciente = $_POST['nombre'];
$motivo = $_POST['motivo'];
$urgencia = $_POST['urgencia'];

$sql = "INSERT INTO llamadass (nombre_paciente, motivo, urgencia) VALUES ('$nombre_paciente', '$motivo', '$urgencia')";

if ($conexion->query($sql) === TRUE) {
    echo "Llamada registrada con éxito.";
} else {
    echo "Error al registrar la llamada: " . $conexion->error();
}

// Cerrar la conexión
$conexion->close();
?>

