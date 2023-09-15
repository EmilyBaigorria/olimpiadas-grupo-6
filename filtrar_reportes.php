<!DOCTYPE html>
<html>
<head>
    <title>Filtrar Reportes</title>
</head>
<body>
    <h1>Filtrar Reportes</h1>

    <form method="post" action="validacion_filtrado.php">
        <label for="area">Área:</label>
        <input type="text" name="area" id="area">

        <label for="origen">Origen del llamado:</label>
        <input type="text" name="origen" id="origen">

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha">

        <label for="hora">Hora:</label>
        <input type="time" name="hora" id="hora">

        <input type="submit" value="Filtrar">
    </form>
</body>
</html>

<?php
include(validacion_filtrado)
?>
