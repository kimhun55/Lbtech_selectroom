<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Money_quaota_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->set_db_money_quaota();
	}

	public $money_quaota;

	public function set_db_money_quaota(){
		$this->money_quaota = $this->load->database('money_quaota', TRUE);
	}

	public function check_money_quaota(){
		$this->money_quaota->where('stdofbank_no !=',0);
		$query = $this->money_quaota->get('student');

		if($query->num_rows() == 0){
				return false;
		}

		foreach ($query->result_array() as $row){
			$data[$row['student_id']] = 1;
		}
		return $data;
	}


}

/* End of file Money_quaota_model.php */
/* Location: ./application/models/Money_quaota_model.php */