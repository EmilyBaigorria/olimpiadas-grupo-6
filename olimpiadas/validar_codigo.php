<?php
include('conexion.php');

$contrasena_correcta = $_POST['codigo'];
$conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

  $sql = "SELECT * FROM codigo_secretaria where codigo_secretaria = '$contrasena_correcta'";
  $result = $conexion->query($sql);
  
  if (mysqli_num_rows($result) > 0) {
    if (isset($_POST['codigo']) && $_POST['codigo'] == $contrasena_correcta) {
    header('Location: pagina_secretaria.php');
    exit;
  }


}
else
header("Location: secretaria.php?mensaje=error");

$conn->close();
?>
