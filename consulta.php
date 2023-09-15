<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Datos Médicos</title>
</head>
<body>
    <link rel="stylesheet" href="consulta.css">
    <h1>Ingrese su DNI para consultar sus datos médicos</h1>
    <form action="consultapac.php" method="POST">
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" required>
        <input type="submit" value="Consultar">
    </form>
</body>
</html>