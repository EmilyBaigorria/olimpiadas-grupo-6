<!DOCTYPE html>
<html>
<head>
    <title>Editar Llamada</title>
    <link rel="stylesheet" type="text/css" href="css/estilosllamadas.css">
</head>
<body>
    <h1>Editar Llamada</h1>

    <?php
        $conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM registro_llamadas WHERE id = $id";
        $result = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            echo '<form action="procesar_edicion_llamada.php?id=' . $id . '" method="POST">';
            echo '<label for="nombre_paciente">Nombre del Paciente:</label>';
            echo '<input type="text" name="nombre_paciente" value="' . $row['nombre_paciente'] . '" required><br>';
            echo '<label for="fecha_hora_inicio">Fecha y Hora de Inicio:</label>';
            echo '<input type="datetime-local" name="fecha_hora_inicio" value="' . $row['fecha_hora_inicio'] . '" required><br>';
            echo '<label for="fecha_hora_fin">Fecha y Hora de Fin:</label>';
            echo '<input type="datetime-local" name="fecha_hora_fin" value="' . $row['fecha_hora_fin'] . '" required><br>';
            echo '<label for="motivo">Motivo de la Llamada:</label>';
            echo '<input type="text" name="motivo" value="' . $row['motivo'] . '" required><br>';
            echo '<label for="tipo_llamada">Tipo de Llamada:</label>';
            echo '<select name="tipo_llamada" required>';
            echo '<option value="consulta" ' . ($row['tipo_llamada'] === 'consulta' ? 'selected' : '') . '>Consulta</option>';
            echo '<option value="emergencia" ' . ($row['tipo_llamada'] === 'emergencia' ? 'selected' : '') . '>Emergencia</option>';
            echo '</select><br>';
            echo '<label for="area">Área:</label>';
            echo '<select name="area" required>';
            echo '<option value="Anestesiología" ' . ($row['area'] === 'Anestesiología' ? 'selected' : '') . '>Anestesiología</option>';
            echo '<option value="Cardiología" ' . ($row['area'] === 'Cardiología' ? 'selected' : '') . '>Cardiología</option>';
            echo '<option value="Cuidados Intensivos" ' . ($row['area'] === 'Cuidados Intensivos' ? 'selected' : '') . '>Cuidados Intensivos</option>';
            echo '<option value="Hematología" ' . ($row['area'] === 'Hematología' ? 'selected' : '') . '>Hematología</option>';
            echo '<option value="Neumología" ' . ($row['area'] === 'Neumología' ? 'selected' : '') . '>Neumología</option>';
            echo '<option value="Pediatría" ' . ($row['area'] === 'Pediatría' ? 'selected' : '') . '>Pediatría</option>';
            echo '<option value="Rehabilitación" ' . ($row['area'] === 'Rehabilitación' ? 'selected' : '') . '>Rehabilitación</option>';
            echo '<option value="Urgencia" ' . ($row['area'] === 'Urgencia' ? 'selected' : '') . '>Urgencia</option>';
            echo '</select><br>';
            echo '<input type="submit" value="Guardar Cambios">';
            echo '</form>';
        } else {
            echo 'Registro no encontrado.';
        }
    } else {
        echo 'ID de registro no válido.';
    }

    mysqli_close($conexion);
    ?>
</body>
</html>
