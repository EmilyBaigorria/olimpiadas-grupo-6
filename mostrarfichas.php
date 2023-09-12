<!DOCTYPE html>
<html>
<head>
  <title>Tabla de Registros</title>
  <link rel= "stylesheet" type="text/css" href="mostrar.css"/> 

</head>
<body>
  <h2>Tabla de Registros</h2>
  
<?php
  $conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");


  $sql = "SELECT * FROM ficha_paciente";
  $result = $conexion->query($sql);

  if ($result->num_rows > 0) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo  '<th>nombre</th>';
    echo' <th>apellido</th>';
    echo'<th>sexo</th>';
    echo '<th>telefono</th>';
    echo '<th>localidad</th>';
    echo ' <th>direccion</th>';
    echo ' <th>fecha_nacimiento</th>';
    echo ' <th>medico_asignado</th>';
    echo' <th>enfermedades</th>';
    echo '<th>medicamentos</th>';
    echo'   <th>obra_social</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
      echo '<tr>';
     
      echo '<td>' . $row['nombre'] . '</td>';
      echo '<td>' . $row['apellido'] . '</td>';
      echo '<td>' . $row['sexo'] . '</td>';
      echo '<td>' . $row['telefono'] . '</td>';
      echo '<td>' . $row['localidad'] . '</td>';
      echo '<td>' . $row['direccion'] . '</td>';
      echo '<td>' . $row['fecha_nacimiento'] . '</td>';
      echo '<td>' . $row['medico_asignado'] . '</td>';
      echo '<td>' . $row['enfermedades'] . '</td>';
      echo '<td>' . $row['medicamento'] . '</td>';
      echo '<td>' . $row['obra_social'] . '</td>';
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
