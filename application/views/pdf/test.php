<?php 
$this->pdf->AddFont('angsana','B');
$this->pdf->AddFont('angsana','I');
$this->pdf->AddFont('angsana','');
$this->pdf->AddPage();
//$this->pdf->SetFont('angsana','B',16);
//$this->pdf->Cell(30,100,'Hello World!');

$this->pdf->Output();
?>