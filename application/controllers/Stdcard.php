<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stdcard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('export_stdcard_model','stdcard');
	}
	public function index()
	{
		$this->stdcard->Export_tblcandidate_to_tblstd_idcard();
		$this->sql();
		exit('end');
	}



	public function sql(){

		//set
		$table = 'tblstd_idcard';

		$this->db->order_by('student_id', 'ASC');
		$query = $this->db->get("tblstd_idcard");

	
		foreach ($query->result_array() as $row)
			{
				unset($data_key);
				unset($data_value);
				unset($text);
				foreach ($row as $key => $value) {
					$data_key[] = '`'.$key.'`';
					$data_value[] = '"'.$value.'"';
					
				}

				$text = "INSERT INTO `$table` ";
				$text.= "(".implode(',', $data_key).") VALUES ";
				$text.= "(".implode(',', $data_value).");";

				$data_insert[] = $text;

			}

		$content = implode("\n", $data_insert);



		//$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
        $backup_name = "tblstd_idcard_".date("Y_m_d_h_i_s")."sql";
        header('Content-Type: application/octet-stream');   
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"".$backup_name."\"");  
        echo $content; exit;
	}

}

/* End of file Stdcard.php */
/* Location: ./application/controllers/Stdcard.php */