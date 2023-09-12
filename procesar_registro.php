<?php
$servername = "localhost"; // Cambia a la dirección del servidor de tu base de datos
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "hospital_llamadas";

// Crear conexión
$conexion = mysqli_connect("localhost", "root","","hospital_llamadas") or exit ("no se puede conectar");

// Verificar la conexión
if ($conexion->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conexion->connect_error);
}

// Obtener datos del formulario
$nombre_paciente = $_POST['nombre'];
$motivo = $_POST['motivo'];
$urgencia = $_POST['urgencia'];

// Insertar datos en la base de datos
$sql = "INSERT INTO llamadass (nombre_paciente, motivo, urgencia) VALUES ('$nombre_paciente', '$motivo', '$urgencia')";

if ($conexion->query($sql) === TRUE) {
    header("Location: visualizar_datos.php"); 
    exit;
} else {
    echo "Error al registrar la llamada: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
