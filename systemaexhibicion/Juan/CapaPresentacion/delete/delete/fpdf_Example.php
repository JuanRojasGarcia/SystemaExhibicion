<?php
require('../../NuevosRecursos/lib/fpdf/fpdf.php');


$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hola');
$pdf->Cell(40,10,$_REQUEST['data']);
// $pdf->Output("F", "C:\Users\juan.rojas\Desktop\Centros.pdf");
$pdf->Output('D');

?>