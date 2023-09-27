<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Datos Médicos</title>
    <link rel="stylesheet" type="text/css" href="css/consulta.css">

</head>
<body>
<div class="datos-medicos">
    <h1>Datos Médicos</h1>
    <?php
   $conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

 
    
    $dni = $_POST["dni"];
    
    $consulta = "SELECT * FROM datos_medicos WHERE dni = '$dni'";
    $resultado = mysqli_query($conexion, $consulta);
    
    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        echo "Medico asignado: " . $fila["medico_asignado"] . "<br>";
        echo "Observacion: " . $fila["observacion"] . "<br>";
        echo "Medicamentos: " . $fila["medicamentos"] . "<br>";
        echo "Obra social: " . $fila["obra_social"] . "<br>";
    } else {
        echo "No se encontraron datos de el paciente.";
    }
    
    mysqli_close($conexion);
    ?>

    <a href="pagpaciente.php" class="volver-button">Volver atras</a>

    </div>
</body>
</html>