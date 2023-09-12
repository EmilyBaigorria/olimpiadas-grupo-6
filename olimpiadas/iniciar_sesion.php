<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="procesar_login.php" method="POST">
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" required><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>
        
        <input type="submit" value="Iniciar Sesión">
    </form>

    <p>¿No tienes una cuenta? <a href="registro_paciente.php">Regístrate aquí</a></p>
</body>
</html>
