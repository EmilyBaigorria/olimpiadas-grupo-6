<?php
$servername = "localhost"; // Cambia esto por la dirección de tu servidor de base de datos si es diferente
$username = "root"; // Reemplaza con tu nombre de usuario de la base de datos
$password = ""; // Reemplaza con tu contraseña de la base de datos
$database = "olimpiadas"; // Nombre de tu base de datos

try {
    // Establece la conexión usando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    
    // Habilita el manejo de excepciones para PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si llegas aquí, la conexión se ha establecido con éxito.
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
