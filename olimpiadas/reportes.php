<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Llamadas</title>
    <link rel="stylesheet" type="text/css" href="llamadaas.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var verGraficoBtn = document.getElementById('verGraficoBtn');

            verGraficoBtn.addEventListener('click', function() {
                var areaSeleccionada = document.getElementById('area').value;
                var fechaInicioSeleccionada = document.getElementById('fecha_inicio').value;
                var fechaFinSeleccionada = document.getElementById('fecha_fin').value;

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'datos_grafico.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        actualizarGraficos(data);
                    }
                };
                xhr.send('area=' + areaSeleccionada + '&fecha_inicio=' + fechaInicioSeleccionada + '&fecha_fin=' + fechaFinSeleccionada);
            });

            function actualizarGraficos(data) {
                actualizarGraficoFechaHora(data.fechaHora);
                actualizarGraficoArea(data.area);
            }

            function actualizarGraficoArea(data) {
                var ctxArea = document.getElementById('areaChart').getContext('2d');

                var optionsArea = {
                    responsive: true,
                    maintainAspectRatio: false
                };

    var backgroundColor = 'rgba(54, 162, 235, 0.5)';
    var borderColor = 'rgba(54, 162, 235, 1)'; 

    var areaChart = new Chart(ctxArea, {
        type: 'bar', 
        data: {
            labels: data.labels, 
            datasets: [{
                label: 'Registros por Área',
                data: data.values, 
                backgroundColor: backgroundColor,
                borderColor: borderColor,
                borderWidth: 1
            }]
        },
        options: optionsArea
    });
}
            function actualizarGraficoFechaHora(data) {
                var ctxFechaHora = document.getElementById('fechaHoraChart').getContext('2d');

                var optionsFechaHora = {
                    responsive: true,
                    maintainAspectRatio: false
                };

                var fechaHoraChart = new Chart(ctxFechaHora, {
                    type: 'line', 
                    data: {
                        labels: data.labels, 
                        datasets: [{
                            label: 'Registros por Fecha y Hora',
                            data: data.values,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: optionsFechaHora
                });
            }
        });
    </script>
</head>
<body>
    <header>
        <div class="header-content">
            <h1>Registros de Llamadas</h1>
        </div>
    </header>    
    <div class="form-container">
        <div class="button-containerr">
            <a href="pagina_secretaria.php" class="button-comunn">Ir a página de Secretaria</a>
            <a href="registro.php" class="button-comunn">Nuevo Registro</a>
        </div>
        <form action="reportes.php" method="POST">
            <label for="area">Área:</label>
            <select id="area" name="area">
                <option value="">Todas</option>
                <option value="Anestesiología">Anestesiología</option>
                <option value="cardiología">cardiología</option>
                <option value="cuidados Intensivos">Cuidados Intensivos</option>
                <option value="hematología">hematología</option>
                <option value="neumología">neumología</option>
                <option value="pediatría">pediatría</option>
                <option value="rehabilitación">rehabilitación</option>
                <option value="urgencia">urgencia</option>
            </select>

            <label for="fecha_inicio">Fecha y Hora Inicio:</label>
            <input type="datetime-local" id="fecha_inicio" name="fecha_inicio">
            
            <label for="fecha_fin">Fecha y Hora Fin:</label>
            <input type="datetime-local" id="fecha_fin" name="fecha_fin">

            <input type="submit" value="Filtrar">
            <input type="button" value="Ver Gráfico" id="verGraficoBtn">
        </form>
        <form action="generar_pdf.php" method="POST" target="_blank">
            <label for="area">Área:</label>
            <select id="area" name="area">
                <option value="">Todas</option>
                <option value="Anestesiología">Anestesiología</option>
                <option value="cardiología">cardiología</option>
                <option value="cuidados Intensivos">Cuidados Intensivos</option>
                <option value="hematología">hematología</option>
                <option value="neumología">neumología</option>
                <option value="pediatría">pediatría</option>
                <option value="rehabilitación">rehabilitación</option>
                <option value="urgencia">urgencia</option>
            </select>

            <label for="fecha_hora_inicio">Fecha y Hora Inicio:</label>
            <input type="datetime-local" id="fecha_hora_inicio" name="fecha_hora_inicio">
            
            <label for="fecha_hora_fin">Fecha y Hora Fin:</label>
            <input type="datetime-local" id="fecha_hora_fin" name="fecha_hora_fin">

            <input type="submit" value="Generar PDF">
        </form>
    </div>
  
    <?php
        $conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

    $area = isset($_POST['area']) ? $_POST['area'] : '';
    $fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '';
    $fecha_fin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : '';

    $sql = "SELECT * FROM registro_llamadas WHERE 1";

    if (!empty($area)) {
        $sql .= " AND area = '$area'";
    }
    if (!empty($fecha_inicio)) {
        $sql .= " AND fecha_hora_inicio >= '$fecha_inicio'";
    }
    if (!empty($fecha_fin)) {
        $sql .= " AND fecha_hora_inicio <= '$fecha_fin'";
    }

    $result = mysqli_query($conexion, $sql);

    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Nombre del Paciente</th>';
    echo '<th>Fecha y Hora de Inicio</th>';
    echo '<th>Fecha y Hora de Fin</th>';
    echo '<th>Duración (minutos)</th>';
    echo '<th>Motivo</th>';
    echo '<th>Área</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['nombre_paciente'] . '</td>';
        echo '<td>' . $row['fecha_hora_inicio'] . '</td>';
        echo '<td>' . $row['fecha_hora_fin'] . '</td>';
        echo '<td>' . $row['duracion'] . '</td>';
        echo '<td>' . $row['motivo'] . '</td>';
        echo '<td>' . $row['area'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

    mysqli_close($conexion);
    ?>

    <div style="max-width: 400px; margin: 20px auto;">
        <canvas id="areaChart"></canvas>
    </div>

    <div style="max-width: 400px; margin: 20px auto;">
        <canvas id="fechaHoraChart"></canvas>
    </div>
</body>
</html>
