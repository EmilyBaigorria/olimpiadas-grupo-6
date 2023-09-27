<?php
require_once('pdf/tcpdf.php');

$area = isset($_POST['area']) ? $_POST['area'] : '';
$fecha_hora_inicio = isset($_POST['fecha_hora_inicio']) ? $_POST['fecha_hora_inicio'] : '';
$fecha_hora_fin = isset($_POST['fecha_hora_fin']) ? $_POST['fecha_hora_fin'] : '';

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Reporte de Llamadas');
$pdf->SetSubject('Reporte de Llamadas');
$pdf->SetKeywords('Reporte, Llamadas, PDF');

$pdf->AddPage();

$conexion = mysqli_connect("localhost", "root","","olimpiadas") or exit ("no se puede conectar");

$sql = "SELECT * FROM registro_llamadas WHERE 1";

if (!empty($area)) {
    $sql .= " AND area = '$area'";
}
if (!empty($fecha_inicio)) {
    $sql .= " AND fecha_hora_inicio >= '$fecha_hora_inicio'";
}
if (!empty($fecha_fin)) {
    $sql .= " AND fecha_hora_inicio <= '$fecha_hora_fin'";
}

$resultado = mysqli_query($conexion, $sql);

$html = '<table border="1">
            <thead>
                <tr>
                    <th>Nombre del Paciente</th>
                    <th>Fecha y Hora de Inicio</th>
                    <th>Fecha y Hora de Fin</th>
                    <th>Duración (minutos)</th>
                    <th>Motivo</th>
                    <th>Área</th>
                </tr>
            </thead>
            <tbody>';

while ($fila = mysqli_fetch_assoc($resultado)) {
    $html .= '<tr>';
    $html .= '<td>' . $fila['nombre_paciente'] . '</td>';
    $html .= '<td>' . $fila['fecha_hora_inicio'] . '</td>';
    $html .= '<td>' . $fila['fecha_hora_fin'] . '</td>';
    $html .= '<td>' . $fila['duracion'] . '</td>';
    $html .= '<td>' . $fila['motivo'] . '</td>';
    $html .= '<td>' . $fila['area'] . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody></table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('reporte_llamadas.pdf', 'D');
?>