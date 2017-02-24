<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (is_file(dirname(__FILE__).'/Fpdf.php'))
{
    require_once(dirname(__FILE__).'/Fpdf.php');
}else{
	echo dirname(__FILE__); 
	echo "error";
}

class Pdf extends FPDF
{
	function __construct($orientation='P', $unit='mm', $size='A4')
	{
		parent::__construct($orientation,$unit,$size);
	}

	public $rm = NULL;
	function Footer()	{
		//นับจากขอบกระดาษด้านล่างขึ้นมา 10 มม.
		$this->SetY( -20 );
		//กำหนดใช้ตัวอักษร Arial ตัวเอียง ขนาด 5
		//$this->SetFont('Arial','I',6);
		$this->SetFont('angsana','',13);
		if($this->rm != NULL)
		$this->Cell(0,6,utf8_to_tis620($this->rm ),0,0,'L');
		//พิมพ์ หมายเลขหน้า ตรงมุมขวาล่าง
		$this->Cell(0,6,$this->PageNo() ,0,0,'R');
		//$this->Cell(0,6, 'page '.$this->PageNo().' of  '.$this->tp ,0,0,'R');
	}
}
?>