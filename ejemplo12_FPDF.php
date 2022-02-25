<?php
// Enlace de descargas
/*
http://www.fpdf.org/
*/
require('fpdf183/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'BIENVENIDOS DESARROLLADORES DEL SIGLO XXI');
$pdf->Output();
?>