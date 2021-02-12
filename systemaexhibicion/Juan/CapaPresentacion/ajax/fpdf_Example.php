<?php
require('../../NuevosRecursos/lib/fpdf/fpdf.php');

$titulo = $_REQUEST['titulo'];
$data = $_REQUEST['data'];

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
// $pdf->Cell(40,10,$titulo);
$pdf->Cell(40,10,$data);
$pdf->Output("F", "C:\Users\juan.rojas\Desktop\Centros.pdf");
?>