<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingreso de Datos</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f8f8;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 400px; /* Ancho del recuadro */
            padding: 20px;
            border: 2px solid #555;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        h1 {
            font-family: 'Open Sans', sans-serif;
            color: #333;
            margin-top: 0;
            text-align: center;
        }
        .form-container {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        #tiempo_espera {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ingreso de Datos</h1>
        <div class="form-container"> <!-- Contenedor del formulario -->
            <form action="procesar.php" method="post">
                <label for="hora_llegada">Hora de Llegada:</label>
                <input type="datetime-local" id="hora_llegada" name="hora_llegada" required>
                <label for="fecha_respuesta">Fecha de Respuesta:</label>
                <input type="datetime-local" id="fecha_respuesta" name="fecha_respuesta" required>
                <p id="tiempo_espera">Tiempo de Espera:</p>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>
    
    <script>
        function calcularTiempoEspera() {
            const fechaHoraLlegada = document.getElementById('hora_llegada').value;
            const fechaHoraRespuesta = document.getElementById('fecha_respuesta').value;

            if (fechaHoraLlegada && fechaHoraRespuesta) {
                const horaLlegada = new Date(fechaHoraLlegada);
                const horaRespuesta = new Date(fechaHoraRespuesta);

                const tiempoEspera = (horaRespuesta - horaLlegada) / (1000 * 60);

                document.getElementById('tiempo_espera').textContent = `Tiempo de Espera: ${tiempoEspera.toFixed(2)} minutos`;
            } else {
                document.getElementById('tiempo_espera').textContent = 'Tiempo de Espera:';
            }
        }

        document.getElementById('hora_llegada').addEventListener('change', calcularTiempoEspera);
        document.getElementById('fecha_respuesta').addEventListener('change', calcularTiempoEspera);

        calcularTiempoEspera();
    </script>
</body>
</html>
