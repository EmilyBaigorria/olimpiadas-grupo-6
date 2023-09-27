<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página para Secretarias</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="formulario-container">
        <h1>Bienvenido/a</h1>
        <?php
        if ($_GET['mensaje'] === 'error') {
            echo '<p class="mensaje-exito">Código incorrecto. Vuelve a intentar.</p>';
        }
        ?>
        <form method="post" action="validar_codigo.php">
            <label for="nuevo_codigo">Ingrese el código de administración:</label>
            <input type="password" id="codigo" name="codigo" required>
            <div class="botones">
                <button type="submit" class="ingresar">Ingresar</button>
                <button type="button" class="ingresar volver-atras" onclick="window.location.href='index.php'">Volver Atrás</button>
            </div>
        </form>
    </div>
</body>
</html>
