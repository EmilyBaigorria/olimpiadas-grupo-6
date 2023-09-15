<?php
$conn = mysqli_connect("localhost", "root","","hospital") or exit ("no se puede conectar");

// Obtener los valores del formulario
$area = $_POST['area'];
$origen = $_POST['origen'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

// Construir la consulta SQL basada en los filtros
$sql = "INSERT INTO reportes (area, origen, fecha, hora) VALUES ('$area', '$origen', '$fecha', '$hora')";


if (!empty($area)) {
    $sql .= " AND area LIKE '%$area%'";
}

if (!empty($origen)) {
    $sql .= " AND origen LIKE '%$origen%'";
}

if (!empty($fecha)) {
    $sql .= " AND fecha = '$fecha'";
}

if (!empty($hora)) {
    $sql .= " AND hora = '$hora'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los resultados
    while ($row = $result->fetch_assoc()) {
        echo "Área: " . $row['area'] . "<br>";
        echo "Origen del llamado: " . $row['origen'] . "<br>";
        echo "Fecha: " . $row['fecha'] . "<br>";
        echo "Hora: " . $row['hora'] . "<br>";
        echo "<hr>";
    }
} else {
    echo "No se encontraron resultados.";
}

$conn->close();
?>
