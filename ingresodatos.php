<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingreso de Datos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5; /* Color de fondo suave */
        }
        h1 {
            text-align: center; /* Centra el encabezado */
            color: #333; /* Color del encabezado */
        }
        form {
            max-width: 400px;
            margin: 0 auto; /* Centra el formulario horizontalmente */
            padding: 20px;
            background-color: #fff; /* Color de fondo del formulario */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333; /* Color del texto de etiquetas */
        }
        input[type="datetime-local"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        #tiempo_espera {
            font-size: 18px;
            font-weight: bold;
            color: #333; /* Color del texto de tiempo de espera */
        }
        input[type="submit"] {
            background-color: #007BFF; /* Color de fondo del botón */
            color: #fff; /* Color del texto del botón */
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3; /* Cambia el color de fondo al pasar el cursor */
        }
    </style>
</head>
<body>
    <h1>Ingreso de Datos</h1>
    <form action="procesar.php" method="post">
        <label for="fecha_respuesta">Fecha de Respuesta:</label>
        <input type="datetime-local" id="fecha_respuesta" name="fecha_respuesta" required>
        
        <label for="hora_llegada">Hora de Llegada:</label>
        <input type="datetime-local" id="hora_llegada" name="hora_llegada" required>

        <p id="tiempo_espera">Tiempo de Espera: Calculando...</p>
        
        <input type="submit" value="Guardar">
    </form>

    <script>
        // Función para calcular el tiempo de espera
        function calcularTiempoEspera() {
            // Obtiene la hora de llegada y de atención ingresadas por el usuario
            const horaLlegada = new Date(document.getElementById('hora_llegada').value);
            const horaAtencion = new Date(document.getElementById('fecha_respuesta').value);

            // Calcula la diferencia en minutos entre la hora de llegada y de atención
            const tiempoEspera = (horaAtencion - horaLlegada) / (1000 * 60); // Convertir milisegundos a minutos

            // Muestra el tiempo de espera en un elemento HTML
            document.getElementById('tiempo_espera').textContent = `Tiempo de Espera: ${tiempoEspera.toFixed(2)} minutos`;
        }

        // Asocia la función al evento "change" de los campos de hora de llegada y de respuesta
        document.getElementById('hora_llegada').addEventListener('change', calcularTiempoEspera);
        document.getElementById('fecha_respuesta').addEventListener('change', calcularTiempoEspera);

        // Llama a la función una vez para mostrar el tiempo de espera inicial
        calcularTiempoEspera();
    </script>
</body>
</html>
