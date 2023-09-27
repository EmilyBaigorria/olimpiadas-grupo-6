<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Datos Médicos</title>
    <link rel="stylesheet" href="css/consulta.css">
</head>
<body>
    <div class="login-container">
        <h1>Ingresa tu DNI para mostrar tus datos.</h1>
        <form action="consultapac.php" method="POST" class="login-form">
            <label for="dni">DNI:</label>
            <input type="text" name="dni" id="dni" required>
            <br> 
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>