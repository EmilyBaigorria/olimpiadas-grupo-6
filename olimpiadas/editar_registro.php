<!DOCTYPE html>
<html>
<head>
  <title>Editar Registro</title>
  <link rel="stylesheet" type="text/css" href="editar.css"/>
  <link href="ruta/a/select2.min.css" rel="stylesheet" />
</head>
<body>
  <h2>Editar Registro</h2>
  
  <?php
    $conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM ficha_paciente WHERE id = $id";
    $result = $conexion->query($sql);
    
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      
      echo '<form action="procesar_edicion.php?id=' . $id . '" method="POST">';
      echo '<label for="nombre">Nombre:</label>';
      echo '<input type="text" name="nombre" value="' . $row['nombre'] . '"><br>';
      echo '<label for="apellido">Apellido:</label>';
      echo '<input type="text" name="apellido" value="' . $row['apellido'] . '"><br>';
      echo '<label for="sexo">Sexo:</label>';
      echo '<input type="text" name="sexo" value="' . $row['sexo'] . '"><br>';
      echo '<label for="telefono">Teléfono:</label>';
      echo '<input type="text" name="telefono" value="' . $row['telefono'] . '"><br>';
      echo '<label for="localidad">Localidad:</label>';
      echo '<input type="text" name="localidad" value="' . $row['localidad'] . '"><br>';
      echo '<label for="direccion">Dirección:</label>';
      echo '<input type="text" name="direccion" value="' . $row['direccion'] . '"><br>';
      echo '<label for="fecha_nacimiento">Fecha de Nacimiento:</label>';
      echo '<input type="text" name="fecha_nacimiento" value="' . $row['fecha_nacimiento'] . '"><br>';
      echo '<label for="area">Área:</label>';
      echo '<select name="area" class="custom-select">';
      $areas = ['URGENCIA', 'Anestesiología', 'Cardiología', 'Cuidados intensivos', 'Digestivo', 'Hematología', 'Medicina interna', 'Nefrología', 'Neumología', 'Oncología', 'Pediatría/Neonatología', 'Rehabilitación'];
      foreach ($areas as $area_option) {
        $selected = ($row['area'] == $area_option) ? 'selected' : '';
        echo '<option value="' . $area_option . '" ' . $selected . '>' . $area_option . '</option>';
      }
      echo '</select><br>';
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

  <!-- Agrega la referencia del archivo JavaScript de Select2 -->
  <script src="ruta/a/select2.min.js"></script>
  <!-- Inicializa Select2 en los elementos con la clase "custom-select" -->
  <script>
    $(document).ready(function() {
      $(".custom-select").select2();
    });
  </script>
</body>
</html>
