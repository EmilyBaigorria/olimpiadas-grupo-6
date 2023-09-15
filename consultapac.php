<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Datos Médicos</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="consulta.css">
<div class="datos-medicos">
    <h1>Datos Médicos</h1>
    <?php
   $conexion = mysqli_connect("localhost", "root", "", "olimpiadas") or exit("no se puede conectar");

    
 
    
    // Obtener el DNI ingresado por el usuario
    $dni = $_POST["dni"];
    
    // Consultar la base de datos para obtener los datos médicos
    $consulta = "SELECT * FROM datos_medicos WHERE dni = '$dni'";
    $resultado = mysqli_query($conexion, $consulta);
    
    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        echo "medico_asignado: " . $fila["medico_asignado"] . "<br>";
        echo "observacion: " . $fila["observacion"] . "<br>";
        echo "medicamentos: " . $fila["medicamentos"] . "<br>";
        echo "obra_social: " . $fila["obra_social"] . "<br>";
        // Agrega más campos según tu base de datos
    } else {
        echo "No se encontraron datos para el DNI ingresado.";
    }
    
    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
    ?>
    </div>
</body>
</html>