<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Llamadas</title>
    <link rel="stylesheet" type="text/css" href="llamadaas.css">
</head>
<body>
    <header>
        <div class="header-content">
            <h1>Registros de Llamadas</h1>
        </div>
    </header>

    <div class="filter-form">
        <div class="button-container">
            <a href="pagina_secretaria.php" class="button-comun">Ir a página de Secretaria</a>
            <a href="registro.php" class="button-comun">Nuevo Registro</a>
        </div>
        <form action="reportes.php" method="POST"

            <label for="area">Área:</label>
            <select name="area" id="area">
                <option value="">Todas</option>
                <option value="Anestesiología">Anestesiología</option>
                <option value="cardiología">Cardiología</option>
                <option value="cuidados Intensivos">Cuidados Intensivos</option>
                <option value="hematología">Hematología</option>
                <option value="neumología">Neumología</option>
                <option value="pediatría">Pediatría</option>
                <option value="rehabilitación">Rehabilitación</option>
                <option value="urgencia">Urgencia</option>
            </select>

            <label for="tipo_llamada">Tipo de Llamada:</label>
            <select name="tipo_llamada" id="tipo_llamada">
                <option value="">Todos</option>
                <option value="consulta">Consulta</option>
                <option value="emergencia">Emergencia</option>
            </select>

            <label for="fecha_inicio">Fecha y Hora Inicio:</label>
            <input type="datetime-local" name="fecha_inicio" id="fecha_inicio">
    
            <input type="submit" value="Filtrar" class="button">
        </form>
    </div>

    <div class="table-container">
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre del Paciente</th>
                    <th>Fecha y Hora de Inicio</th>
                    <th>Fecha y Hora de Fin</th>
                    <th>Duración (minutos)</th>
                    <th>Motivo</th>
                    <th>Tipo de Llamada</th>
                    <th>Área</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

            $sql = "SELECT * FROM registro_llamadas";
            $result = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nombre_paciente'] . "</td>";
                    echo "<td>" . $row['fecha_hora_inicio'] . "</td>";
                    echo "<td>" . $row['fecha_hora_fin'] . "</td>";
                    echo "<td>" . $row['duracion'] . "</td>";
                    echo "<td>" . $row['motivo'] . "</td>";
                    echo "<td>" . $row['tipo_llamada'] . "</td>";
                    echo "<td>" . $row['area'] . "</td>";
                    echo '<td class="action-buttons">';
                    echo '<a href="editar_llamada.php?id=' . $row['id'] . '" style="display: inline-block; padding: 8px 13px; background-color: #007bff; color: #fff; text-decoration: none; border: none; border-radius: 5px; margin-right: 5px;">Editar</a>';
                    echo '<form method="POST" action="eliminar_llamadas.php" style="display: inline-block;">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<button type="submit" class="button" style="background-color: #ff0000; color: #fff; border: none; border-radius: 5px; padding: 8px 13px;">Eliminar</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo "<tr><td colspan='8'>No se encontraron registros.</td></tr>";
            }
         
            mysqli_close($conexion);
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>


