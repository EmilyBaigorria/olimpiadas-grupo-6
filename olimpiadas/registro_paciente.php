<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Paciente</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>Registro - Paciente</h1>

            <div class="form-content">
                <form action="procesar_registro_paciente.php" method="POST">
                    <label for="dni">DNI:</label>
                    <input type="text" id="dni" name="dni" required>
                    <br>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" onkeyup="capitalizar(this)" required>
                    <br>
                    <input type="submit" value="Registrar">
                </form>
            </div>

            <?php
            if (isset($_GET["error"]) && $_GET["error"] == 1) {
                echo '<p style="color: red;">Debes registrarte para ingresar.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>
