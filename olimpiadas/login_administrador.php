<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Página de Administrador</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="formulario-container">
        <h1>Ingrese la contraseña de administrador:</h1>

        <?php
        if (isset($_POST['password'])) {
            $contrasena_admin = "admin3632023";
            $contrasena_ingresada = $_POST['password'];

            if ($contrasena_ingresada === $contrasena_admin) {
                header("Location: pag_administrador.php");
                exit;
            } else {
                echo "<p style='color: red;'>Contraseña incorrecta. Inténtelo de nuevo.</p>";
            }
        }
        ?>

        <form action="login_administrador.php" method="POST">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password">
            <div class="botones">
                <button type="submit">Ingresar</button>
            </div>
        </form>
    </div>
</body>
</html>





