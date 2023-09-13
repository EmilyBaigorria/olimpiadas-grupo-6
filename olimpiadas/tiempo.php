<?php
require_once('conexion.php'); // Incluye el archivo de conexión a la base de datos

try {
    // Consulta SQL para obtener los tiempos de respuesta desde la base de datos
    $query = "SELECT tiempo_respuesta FROM Llamadas";
    $stmt = $conn->query($query);

    // Inicializa un arreglo para almacenar los tiempos de respuesta de la base de datos
    $tiempos_de_respuesta = [];

    // Recorre los resultados de la consulta y agrega los tiempos de respuesta al arreglo
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $tiempos_de_respuesta[] = $row['tiempo_respuesta'];
    }

    // Calcula la suma de todos los tiempos de respuesta
    $suma_tiempos = array_sum($tiempos_de_respuesta);

    // Calcula el número total de respuestas (en este caso, el número total de registros en la tabla "Llamadas")
    $numero_total_respuestas = count($tiempos_de_respuesta);

    // Calcula el tiempo promedio de respuesta
    if ($numero_total_respuestas > 0) {
        $tiempo_promedio = $suma_tiempos / $numero_total_respuestas;
    } else {
        $tiempo_promedio = 0; // Evita la división por cero si no hay respuestas.
    }

    // Muestra los resultados
    echo "Suma de todos los tiempos de respuesta: " . $suma_tiempos . " minutos<br>";
    echo "Número total de respuestas: " . $numero_total_respuestas . "<br>";
    echo "Tiempo promedio de respuesta: " . round($tiempo_promedio, 2) . " minutos";
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
