<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="registro.css">


    <title>Registro de Llamadas</title>
</head>
<body>
    <form action="procesar_llamada.php" method="POST">
        <label for="nombre_paciente">Nombre del Paciente:</label>
        <input type="text" name="nombre_paciente" required><br>

        <label for="fecha_hora_inicio">Fecha y Hora de Inicio:</label>
        <input type="datetime-local" name="fecha_hora_inicio" required><br>

        <label for="fecha_hora_fin">Fecha y Hora de Fin:</label>
        <input type="datetime-local" name="fecha_hora_fin" required><br>


        <label for="motivo">Motivo de la Llamada:</label>
        <input type="text" name="motivo" required><br>

        <label for="tipo_llamada">Tipo de Llamada:</label>
        <select name="tipo_llamada" required>
            <option value="consulta">Consulta</option>
            <option value="emergencia">Emergencia</option>
        </select><br>

        <label for="area">Área:</label>
        <select name="area" required>
            <option value="Anestesiología">Anestesiología</option>
            <option value="cardiología">cardiología</option>
            <option value="cuidados Intensivos">Cuidados Intensivos</option>
            <option value="hematología">hematología</option>
            <option value="neumología">neumología</option>
            <option value="pediatría">pediatría</option>
            <option value="rehabilitación">rehabilitación</option>
            <option value="urgencia">urgencia</option>
        </select><br>

        <input type="submit" value="Registrar Llamada">
    </form>
</body>
</html>
