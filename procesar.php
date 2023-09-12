<?php<?php
$servername = "localhost"; // Cambia esto por la dirección de tu servidor de base de datos si es diferente
$username = "root"; // Reemplaza con tu nombre de usuario de la base de datos
$password = ""; // Reemplaza con tu contraseña de la base de datos
$database = "olimpiadas"; // Nombre de tu base de datos

try {
    // Establece la conexión usando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    
    // Habilita el manejo de excepciones para PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recupera los datos del formulario
    $hora_llegada = $_POST['hora_llegada'];
    $fecha_respuesta = $_POST['fecha_respuesta'];

    // Calcula el tiempo de espera
    $hora_llegada = new DateTime($hora_llegada);
    $fecha_respuesta = new DateTime($fecha_respuesta);
    $tiempo_espera = $hora_llegada->diff($fecha_respuesta)->format("%i"); // Calcula la diferencia en minutos

    // Inserta los datos en la tabla "Llamadas"
    $query = "INSERT INTO Llamadas (fecha_respuesta, fecha_llegada, tiempo_espera) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$fecha_respuesta->format('Y-m-d H:i:s'), $hora_llegada->format('Y-m-d H:i:s'), $tiempo_espera]);

    // Redirecciona a la página de inicio o muestra un mensaje de éxito
    header("Location: IngresoDatos.php"); // Cambia "IngresoDatos.php" al nombre de tu página de inicio

} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
