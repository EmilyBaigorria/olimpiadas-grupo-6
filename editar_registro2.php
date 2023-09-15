<!DOCTYPE html>
<html>
<head>
  <title>Editar Registro</title>
  <link rel= "stylesheet" type="text/css" href="editar.css"/> 
</head>
<body>
  <h2>Editar Registro</h2>
  
  <?php
  $conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

  // Verificar si se proporciona un ID válido a través de la URL
  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consultar el registro específico con el ID proporcionado
    $sql = "SELECT * FROM datos_medicos WHERE id = $id";
    $result = $conexion->query($sql);
    
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      
      // Mostrar el formulario de edición prellenando los campos con los datos actuales
      echo '<form action="procesar_edicion2.php?id=' . $id . '" method="POST">';
      echo '<label for="medico_asignado">medico_asignado:</label>';
      echo '<input type="text" name="medico_asignado" value="' . $row['medico_asignado'] . '"><br>';
      echo '<label for="observacion">observacion:</label>';
      echo '<input type="text" name="observacion" value="' . $row['observacion'] . '"><br>';
      echo '<label for="medicamentos">medicamentos</label>';
      echo '<input type="text" name="medicamentos" value="' . $row['medicamentos'] . '"><br>';
      echo '<label for="dni">dni</label>';
      echo '<input type="text" name="dni" value="' . $row['dni'] . '"><br>';
      echo '<label for="obra_social">obra_social:</label>';
      echo '<input type="text" name="obra_social" value="' . $row['obra_social'] . '"><br>';
      echo '<input type="submit" value="Guardar Cambios">';
      echo '</form>';
    } else {
      echo 'Registro no encontrado.';
    }
  } else {
    echo 'ID de registro no válido.';
  }

  $conexion->close();
  ?>
</body>
</html>