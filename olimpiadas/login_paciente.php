<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Paciente</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container"> 
        <div class="form-container">
            <h1>Iniciar Sesión - Paciente</h1>

            <?php
            session_start();
            if (isset($_SESSION["success_message"])) {
                echo '<div id="success-message" class="success-message">' . $_SESSION["success_message"] . '</div>';
                unset($_SESSION["success_message"]); // Elimina el mensaje de éxito después de mostrarlo
            }
            ?>

            <div class="form-content">
                <form action="procesar_login.php" method="POST">
                    <label for="dni">DNI:</label>
                    <input type="text" id="dni" name="dni" required>
                    <br>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" onkeyup="capitalizar(this)" required>
                    <br>
                    <input type="submit" value="Iniciar Sesión">
                </form>
                <p>¿Eres nuevo? Regístrate <a href="registro_paciente.php">aquí</a>.</p>
                <a href="index.php">Ir al índice</a>
            </div>
        </div>
    </div>
</body>
</html>
