<?php
require('code128.php');
$conn = mysqli_connect("localhost","root","","bd_cab");
$req='SELECT * FROM code';
$res=mysqli_query($conn,$req);
$b=array('40','140','240');
$e=array('65','165','265');
$pdf=new PDF_Code128();
$pdf->AddPage();
$pdf->SetFont('Arial','',15);
$n=0;
while($v=mysqli_fetch_assoc($res)){
	$code='12345678901234567890';
	$pdf->Code128(50,$b[$n],$v['reference'],110,20);
	$pdf->SetXY(72,$e[$n]);
	$pdf->Write(5,$v['reference']);
	$n++;
	if($n==3 && !empty($v)){
		$pdf->AddPage();
		$n=0;
	}
	
}
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
