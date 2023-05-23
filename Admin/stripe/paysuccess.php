<?php
session_start();
require('../FPDF/fpdf.php');
// include "db.php";
// $customerData = $_SESSION['cusdata'];


if(isset($_POST['btn_pay'])){
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Write('5','Invoice','1','0','C');
$pdf->Ln();
$pdf->SetFont('Arial','I',16);
// $pdf->Write('10',$customerData,'C');

$pdf->Output();

}
?>