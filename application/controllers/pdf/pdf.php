<?php
require('code128.php');
$b=array('40','140','240');
$e=array('65','165','265');
$pdf=new PDF_Code128();
$pdf->AddPage();
$pdf->SetFont('Arial','',15);
$n=0;

	$code = 'ABCDEFG1234567890AbCdEf';
	$pdf->Code128(50,40,$code,110,20);
	$pdf->SetXY(72,65);
	$pdf->Write(5,$code);
	
	
	

//A,C,B sets
/*$code='ABCDEFG1234567890AbCdEf';
$pdf->Code128(50,170,$code,125,20);
$pdf->SetXY(50,195);
$pdf->Write(5,'ABC sets combined: "'.$code.'"');
$pdf->AddPage();
//A,C,B sets
$code='ABCDEFG1234567890AbCdEf';
$pdf->Code128(50,20,$code,125,20);
$pdf->SetXY(50,45);
$pdf->Write(5,'ABC sets combined: "'.$code.'"');*/



$pdf->Output();
?>
