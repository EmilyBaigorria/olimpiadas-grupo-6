<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel= "stylesheet" type="text/css" href="ficha.css"/> 
</head>
<body>


<header class="cabecera">
  <h1 class="titulo">Planilla Paciente</h1>
</header> 
    <form action="guardarpaciente.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required>

    <label for="sexo">Sexo:</label>
     <select name="sexo" id="sexo">
      <option value="Femenino">Femenino</option>
      <option value="Masculino">Maculinno</option>
      <option value="Prefiero no decirlo">Prefiero no decirlo</option>
     </select>
    
    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="telefono" required>
    
    <label for="localidad">Localidad:</label>
    <input type="text" name="localidad" id="localidad">

    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" required>

    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

    <label for="medico_asignado">Médico Asignado:</label>
    <input type="text" name="medico_asignado" id="medico_asignado">

    <label for="enfermedades">Enfermedades:</label>
    <textarea id="enfermedades" name="enfermedades"></textarea>

    <label for="medicamentos">Medicamentos:</label>
    <textarea id="medicamentos" name="medicamentos"></textarea>
    <label for="obra_social">¿Tiene obra social?</label>
        <select name="obra_social" id="obra_social">
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>
    <input type="submit" value="Guardar">
</form>
</body>
</html>