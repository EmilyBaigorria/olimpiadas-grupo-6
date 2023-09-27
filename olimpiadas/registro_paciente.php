<?php
include 'conexion.php';

session_start();
$_SESSION['registro_exitoso'] = false;

if (isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $correo = $_POST['correo'];
    $genero = $_POST['genero'];
    $domicilio = $_POST['domicilio'];
    $area = $_POST['area'];



    try {
        $sql_verificar = "SELECT COUNT(*) as count FROM pacientes WHERE dni = :dni";
        $stmt_verificar = $conexion->prepare($sql_verificar);
        $stmt_verificar->bindParam(':dni', $dni);
        $stmt_verificar->execute();
        $result = $stmt_verificar->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            echo "El DNI ya está en uso. Por favor, elija otro.";
        } else {
            $sql_insertar = "INSERT INTO pacientes (nombre, dni, telefono, fecha_nacimiento, correo, genero, domicilio, area) VALUES (:nombre, :dni, :telefono, :fecha_nacimiento, :correo, :genero, :domicilio, :area)";
            $stmt_insertar = $conexion->prepare($sql_insertar);
            $stmt_insertar->bindParam(':nombre', $nombre);
            $stmt_insertar->bindParam(':dni', $dni);
            $stmt_insertar->bindParam(':telefono', $telefono);
            $stmt_insertar->bindParam(':fecha_nacimiento', $fecha_nacimiento);
            $stmt_insertar->bindParam(':correo', $correo);
            $stmt_insertar->bindParam(':genero', $genero);
            $stmt_insertar->bindParam(':domicilio', $domicilio);
            $stmt_insertar->bindParam(':area', $area);

            
            $stmt_insertar->execute();

            $_SESSION['registro_exitoso'] = true;
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conexion = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Nuevo Paciente</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
    <div class="container">
        <div class="custom-registro-paciente">
            <h1>Registro de Nuevo Paciente</h1>

            <?php
            if ($_SESSION['registro_exitoso']) {
                echo "<p>Paciente registrado con éxito.</p>";
                $_SESSION['registro_exitoso'] = false;
            }
            ?>

            <form method="post" action="registro_paciente.php">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
    
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" required>
    
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required>
    
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
    
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required>
    
                <label for="genero">Género:</label>
                <select id="genero" name="genero" required>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                </select>
    
                <label for="domicilio">Domicilio:</label>
                <textarea id="domicilio" name="domicilio" required></textarea>

                <label for="area">Área:</label>
                <input type="text" id="area" name="area" required>
    
                <button type="submit" name="registrar">Registrar</button>
                <a href="pagina_secretaria.php">Volver Atrás</a>
            </form>

        </div>
    </div>
</body>
</html>
