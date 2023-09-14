<?php
$conexion = mysqli_connect("localhost", "root", "", "hospital_llamadas") or exit ("no se puede conectar");

// Verificar si se ha proporcionado un ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "ID de registro no válido.";
    exit();
}

// Realizar una consulta para obtener los datos del registro con el ID proporcionado
$sql = "SELECT * FROM llamadass WHERE id = $id";
$result = $conexion->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    echo "El registro no existe.";
    exit();
}

// Función para cargar dinámicamente las opciones del select
function cargarOpciones($conexion) {
    $sql = "SELECT id, nombre_paciente FROM llamadass";
    $result = $conexion->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['id'] . '">' . $row['nombre_paciente'] . '</option>';
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener datos del formulario
    $nombre_paciente = $_POST['nombre_paciente'];
    $motivo = $_POST['motivo'];
    $urgencia = $_POST['urgencia'];

    // Actualizar los datos en la base de datos
    $sql_update = "UPDATE llamadass SET nombre_paciente = '$nombre_paciente', motivo = '$motivo', urgencia = '$urgencia' WHERE id = $id";

    if ($conexion->query($sql_update) === TRUE) {
        header("location:visualizar_datos.php");
        // Actualizar la variable $row con los datos actualizados
        $row['nombre_paciente'] = $nombre_paciente;
        $row['motivo'] = $motivo;
        $row['urgencia'] = $urgencia;
    } else {
        echo "Error al guardar los cambios: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos de Llamadas</title>
    <link rel="stylesheet" href="visualizar.css">
</head>
<body>
    <h1>Editar Datos de Llamadas</h1>
    
    <form action="" method="POST">
        <label for="nombre_paciente">Nombre del Paciente:</label>
        <input type="text" name="nombre_paciente" value="<?php echo $row['nombre_paciente']; ?>"><br>
        
        <label for="motivo">Motivo:</label>
        <input type="text" name="motivo" value="<?php echo $row['motivo']; ?>"><br>
        
        <label for="urgencia">Urgencia:</label>
        <input type="text" name="urgencia" value="<?php echo $row['urgencia']; ?>"><br>

        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>

<?php
// Cerrar la conexión
$conexion->close();
?>
