<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel= "stylesheet" type="text/css" href="fichaa.css"/> 
</head>
<body>
    
<header class="cabecera">
  <h1 class="titulo">Planilla Paciente</h1>
</header> 
<form action="guardarpaciente2.php" method="POST">
    <label for="medico_asignado">Médico Asignado:</label>
    <input type="text" name="medico_asignado" id="medico_asignado">

    <label for="observacion">observacion:</label>
    <textarea id="observacion" name="observacion"></textarea>

    <label for="medicamentos">Medicamentos:</label>
    <textarea id="medicamentos" name="medicamentos"></textarea>

    <label for="dni">dni:</label>
    <textarea id="dni" name="dni"></textarea>
    
    <label for="obra_social">¿Tiene obra social?</label>
        <select name="obra_social" id="obra_social">
            <option value="si">si</option>
            <option value="no">no</option>
        </select>
    
        <input type="submit" value="Guardar">    
</body>
</html>