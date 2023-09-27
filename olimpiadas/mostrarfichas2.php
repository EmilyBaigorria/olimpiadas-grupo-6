<!DOCTYPE html>
<html>
<head>
  <title>Tabla de Registros</title>
  <link rel="stylesheet" type="text/css" href="mostraar.css"/> 
</head>
<body>
  <h2>Tabla de Registros</h2>
  <a href="datosmed.php" class="boton-externo">AGREGAR REGISTRO</a>
  <a href="pagina_secretaria.php" class="boton-externo">Ir a página de Secretaria</a>
  <script src="capitalizar.js"></script>



<?php
  $conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

  $sql = "SELECT * FROM datos_medicos";
  $result = $conexion->query($sql);

  if ($result->num_rows > 0) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Medico asignado</th>';
    echo '<th>Observacion</th>';
    echo '<th>Medicamentos</th>';
    echo '<th>DNI</th>';
    echo '<th>Obra social</th>';
    echo '<th>Formato de tabla</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . $row['medico_asignado'] . '</td>';
      echo '<td>' . $row['observacion'] . '</td>';
      echo '<td>' . $row['medicamentos'] . '</td>';
      echo '<td>' . $row['dni'] . '</td>';
      echo '<td>' . $row['obra_social'] . '</td>';
      echo '<td><a href="editar_registro2.php?id=' . $row['id'] . '" class="boton-editar">Editar</a>';
      echo '<form method="POST" action="eliminar_registro2.php" style="display: inline-block;">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<button type="submit" class="boton-eliminar">Eliminar</button>';
      echo '</form></td>';
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
  } else {
    echo '<div class="mensaje-no-registros">No se encontraron registros.</div>';
  }

  $conexion->close();
?>

</body>
</html>
