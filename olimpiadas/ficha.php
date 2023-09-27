<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/ficha.css"/> 
    <link rel="stylesheet" type="text/css" href="select-style.css"/> 
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
        <option value="Masculino">Masculino</option>
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

    <label for="area">Área:</label>
    <div class="select-container">
        <select name="area" id="area">
            <option value="URGENCIA">URGENCIA</option>
            <option value="Anestesiología">Anestesiología</option>
            <option value="Cardiología">Cardiología</option>
            <option value="Cuidados intensivos">Cuidados intensivos</option>
            <option value="Digestivo">Digestivo</option>
            <option value="Hematología">Hematología</option>
            <option value="Medicina interna">Medicina interna</option>
            <option value="Nefrología">Nefrología</option>
            <option value="Neumología">Neumología</option>
            <option value="Oncología">Oncología</option>
            <option value="Pediatría/Neonatología">Pediatría/Neonatología</option>
            <option value="Rehabilitación">Rehabilitación</option>
        </select>
        <span class="select-icon">&#9660;</span>
    </div>

    <input type="submit" value="Guardar">

    <a href="pagina_secretaria.php" class="boton-secretaria">Ir a Secretaria</a>
</form>
</body>
</html>
