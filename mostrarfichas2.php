<!DOCTYPE html>
<html>
<head>
  <title>Tabla de Registros</title>
  <link rel= "stylesheet" type="text/css" href="mostrar.css"/> 

</head>
<body>
  <h2>Tabla de Registros</h2>
  <a href="datosmed.php" class="boton-externo">AGREGAR REGISTRO</a>

<?php
  $conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");


  $sql = "SELECT * FROM datos_medicos";
  $result = $conexion->query($sql);

  if ($result->num_rows > 0) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo  '<th>medico_asignado</th>';
    echo' <th>observacion</th>';
    echo'<th>medicamentos</th>';
    echo'<th>dni</th>';
    echo '<th>obra_social</th>';
  
    
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
      echo '<td><a href="editar_registro2.php?id=' . $row['id'] . '">Editar</a></td>';
      echo '<td>';
      echo '<form method="POST" action="eliminar_registro2.php">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<button type="submit" class="button">Eliminar</button>';
      echo '</form>';
      echo '</td>';
    
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
  } else {
    echo 'No se encontraron registros.';
  }

  $conexion->close();
  ?>

</body>
</html>
