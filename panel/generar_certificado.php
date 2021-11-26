<?php
session_start();
if (!isset($_SESSION['id_usuario_curso'])) {
    exit();
}
include_once("../php/m/SQLConexion.php");
$sql = new SQLConexion();
$row_certificado = $sql->obtenerDatos("CALL sp_select_certificado('".$_SESSION['id_usuario_curso']."','".$_GET['id']."')");
if (!$row_certificado){ exit(); }
$nombre = $row_certificado[0]['@nombre'];
$nombre_curso = $row_certificado[0]['nombre_curso'];
$meses = array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio.', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');

require('../fpdf/fpdf.php');
$pdf = new FPDF('L','mm',array(300,215));

$pdf->AddPage();

$pdf->SetY(0);
$pdf->SetX(0);
$pdf->Image('../recursos_pdf/reco.jpg',0,0,300);


$pdf->SetXY(170,94);
$pdf->SetFont('Arial','B',30);
$pdf->Cell(0, 0, utf8_decode($nombre), 0, 0, 'L');


$pdf->Ln(20);
$pdf->SetXY(160,134);
$pdf->SetFont('Arial','B',22);
$pdf->MultiCell(150,5,utf8_decode($nombre_curso));

$pdf->Ln(20);
$pdf->SetXY(212,177.5);
$pdf->SetFont('Arial','B',14);
$pdf->MultiCell(150,5,utf8_decode($row_certificado[0]['day'].' de '.$meses[$row_certificado[0]['month']].' del '.$row_certificado[0]['year']));

$pdf->Output();
?>