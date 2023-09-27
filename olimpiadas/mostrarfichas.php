<!DOCTYPE html>
<html>
<head>
  <title>Tabla de Registros</title>
  <link rel="stylesheet" type="text/css" href="mostraar.css"/> 
</head>
<body>
  <h2>Tabla de Registros</h2>
  <a href="ficha.php" class="boton-externo">AGREGAR REGISTRO</a>
  <a href="pagina_secretaria.php" class="boton-externo">Ir a página de Secretaria</a>



<?php
$conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

  $sql = "SELECT * FROM ficha_paciente";
  $result = $conexion->query($sql);

  if ($result->num_rows > 0) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo  '<th>Nombre</th>';
    echo' <th>Apellido</th>';
    echo'<th>Sexo</th>';
    echo '<th>Telefono</th>';
    echo '<th>Localidad</th>';
    echo ' <th>Direccion</th>';
    echo ' <th>Fecha de nacimiento</th>';
    echo ' <th>Area</th>';
    echo ' <th>Formato de tabla</th>';
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
      echo '<td>' . $row['area'] . '</td>';

      echo '<td>';
      echo '<a href="editar_registro.php?id=' . $row['id'] . '" style="display: inline-block; padding: 8px 13px; background-color: #007bff; color: #fff; text-decoration: none; border: none; border-radius: 5px; margin-right: 5px;">Editar</a>';
      echo '<form method="POST" action="eliminar_registro.php" style="display: inline-block;">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<button type="submit" class="button" style="background-color: #ff0000; color: #fff; border: none; border-radius: 5px; padding: 8px 13px;">Eliminar</button>';
      echo '</form>';
      echo '</td>';

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
