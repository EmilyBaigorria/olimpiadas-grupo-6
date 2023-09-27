<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Administrador</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="formulario-container">
        <h1>Página de Administrador</h1>

        <?php
        if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'exito') {
            echo '<p class="mensaje-exito">El código se ha cambiado con éxito.</p>';
        }
        ?>

        <form method="post" action="cambiar_codigo.php">
            <label for="nuevo_codigo">Nuevo Código de Secretaria:</label>
            <input type="password" id="nuevo_codigo" name="nuevo_codigo" required>
            <div class="botones">
                <button type="submit" class="cambiar-codigo">Cambiar Código</button>
                <button type="button" class="volver-atras" onclick="window.location.href='index.php'">Volver Atrás</button>
            </div>
        </form>
    </div>
</body>
</html>
