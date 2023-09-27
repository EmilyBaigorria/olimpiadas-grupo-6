<?php
$conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

$area = isset($_POST['area']) ? $_POST['area'] : '';
$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '';
$fecha_fin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : '';

$sqlArea = "SELECT area, COUNT(*) AS total_registros FROM registro_llamadas";
$sqlArea .= !empty($area) ? " WHERE area = '$area'" : '';
$sqlArea .= !empty($fecha_inicio) ? " AND fecha_hora_inicio >= '$fecha_inicio'" : '';
$sqlArea .= !empty($fecha_fin) ? " AND fecha_hora_inicio <= '$fecha_fin'" : '';
$sqlArea .= " GROUP BY area";

$resultArea = mysqli_query($conexion, $sqlArea);

$dataArea = array();
$labelsArea = array();
$valuesArea = array();

while ($rowArea = mysqli_fetch_assoc($resultArea)) {
    $labelsArea[] = $rowArea['area'];
    $valuesArea[] = $rowArea['total_registros'];
}

$dataArea['labels'] = $labelsArea;
$dataArea['values'] = $valuesArea;

$sqlFechaHora = "SELECT DATE_FORMAT(fecha_hora_inicio, '%Y-%m-%d %H:%i') AS fecha_hora, COUNT(*) AS total_registros";
$sqlFechaHora .= " FROM registro_llamadas";
$sqlFechaHora .= !empty($area) ? " WHERE area = '$area'" : '';
$sqlFechaHora .= !empty($fecha_inicio) ? " AND fecha_hora_inicio >= '$fecha_inicio'" : '';
$sqlFechaHora .= !empty($fecha_fin) ? " AND fecha_hora_inicio <= '$fecha_fin'" : '';
$sqlFechaHora .= " GROUP BY DATE_FORMAT(fecha_hora_inicio, '%Y-%m-%d %H:%i')";
$sqlFechaHora .= " ORDER BY fecha_hora_inicio";

$resultFechaHora = mysqli_query($conexion, $sqlFechaHora);

$dataFechaHora = array();
$labelsFechaHora = array();
$valuesFechaHora = array();

while ($rowFechaHora = mysqli_fetch_assoc($resultFechaHora)) {
    $labelsFechaHora[] = $rowFechaHora['fecha_hora'];
    $valuesFechaHora[] = $rowFechaHora['total_registros'];
}

$dataFechaHora['labels'] = $labelsFechaHora;
$dataFechaHora['values'] = $valuesFechaHora;

$data = array(
    'area' => $dataArea,
    'fechaHora' => $dataFechaHora
);

header('Content-Type: application/json');
echo json_encode($data);

mysqli_close($conexion);
?>
