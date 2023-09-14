<?php
include("conexion.php");

if ($conexion->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conexion->connect_error);
}

// Obtener datos de la base de datos
$sql = "SELECT * FROM llamadass";
$result = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Datos de Llamadas</title>
    <link rel="stylesheet" href="visualizar.css">
</head>
<body>
    <h1>Visualizar Datos de Llamadas</h1>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre del Paciente</th>
            <th>Motivo</th>
            <th>Urgencia</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nombre_paciente'] . "</td>";
            echo "<td>" . $row['motivo'] . "</td>";
            echo "<td>" . $row['urgencia'] . "</td>";
            echo "<td><a href='editar.php?id=" . $row['id'] . "'>Editar</a></td>"; // Agregar el enlace de editar
            echo "</tr>";
        }

        ?>
        
    </table>
</body>
</html>
