<?php
require('fpdf.php');
include "db.php";
// include "db.php";
if(isset($_POST['btn'])){
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Write('5','Invoice','1','0','C');
$pdf->Ln();
$pdf->SetFont('Arial','I',16);
$pdf->Write('10','Thank you for your payment','C');

$pdf->Output();

}
?>