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


require('../fpdf/fpdf.php');
$pdf = new FPDF('L','mm',array(297,168));

$pdf->AddPage();

$pdf->SetY(0);
$pdf->SetX(0);
$pdf->Image('../recursos_pdf/reco.jpg',0,0,300);


$pdf->SetXY(90,94);
$pdf->SetFont('Arial','B',24);
$pdf->Cell(0, 0, utf8_decode($nombre), 0, 0, 'L');


$pdf->Ln(20);
$pdf->SetXY(60,104);
$pdf->SetFont('Arial','B',14);
$pdf->MultiCell(150,5,utf8_decode("Por su valiosa participación en el curso: ".$nombre_curso));

$pdf->Output();
?>