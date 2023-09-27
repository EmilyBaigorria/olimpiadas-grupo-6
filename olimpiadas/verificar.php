<?php
$contrasena_admin = "admin3632023";

if (isset($_POST['password'])) {
    $contrasena_ingresada = $_POST['password'];

    if ($contrasena_ingresada === $contrasena_admin) {
        header("Location: pag_administrador.php");
        exit;
    } else {
        echo "Contraseña incorrecta. Inténtelo de nuevo.";
    }
}
?>
