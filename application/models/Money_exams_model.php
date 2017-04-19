<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Money_exams_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->set_db_money_exams();
	}

	public $money_exams;

	public function set_db_money_exams(){
		$this->money_exams = $this->load->database('money_exams', TRUE);
	}

	public function check_money_exams(){
		$this->money_exams->where('stdofbank_no !=',0);
		$query = $this->money_exams->get('student');

		if($query->num_rows() == 0){
				return false;
		}

		foreach ($query->result_array() as $row){
			$data[$row['student_id']] = 1;
		}
		return $data;
	}
	

}

/* End of file Money_exams_model.php */
/* Location: ./application/models/Money_exams_model.php */