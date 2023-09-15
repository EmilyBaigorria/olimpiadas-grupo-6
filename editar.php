<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos de Llamadas</title>
    <link rel="stylesheet" href="visualizar.css">
</head>
<body>
    <h1>Editar Datos de Llamadas</h1>
  <?php
  $conexion = mysqli_connect("localhost", "root","","hospital_llamadas") or exit ("no se puede conectar");

  // Verificar si se proporciona un ID válido a través de la URL
  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consultar el registro específico con el ID proporcionado
    $sql = "SELECT * FROM llamadass WHERE id = $id";
    $result = $conexion->query($sql);
    
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      
      // Mostrar el formulario de edición prellenando los campos con los datos actuales
      echo '<form action="proceso_editar.php?id=' . $id . '" method="POST">';
      echo '<label for="nombre">Nombre:</label>';
      echo '<input type="text" name="nombre_paciente" value="' . $row['nombre'] . '"><br>';
      echo '<label for="motivo">Motivo:</label>';
      echo '<input type="text" name="motivo" value="' . $row['motivo'] . '"><br>';
      echo '<label for="urgencia"> urgencia:</label>';
      echo '<input type="enum" name="urgencia" value="' . $row['urgencia'] . '"><br>';
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