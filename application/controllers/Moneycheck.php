<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moneycheck extends CI_Controller {

	public function __construct()
	 {
	 	parent::__construct();
	 	//Do your magic here
	 	$this->load->model('money_quaota_model','money_quaota');
	 	$this->load->model('recheck_model','recheck');
	 } 

	public function index()
	{
		
	}

	public function student_no_money_quaota(){
		$money = $this->money_quaota->check_money_quaota();

		$stdent_quaota = $this->recheck->query_std_quaota();

		foreach ($stdent_quaota['data'] as $key => $value) {
			
			if(!isset($money[$value['stdApplyNo']])){
				$data_std[] = $value;

			}//end if
		}//end foreach
		echo "<pre>";
		var_dump($data_std);
		echo "</pre>";

	}

}

/* End of file Momeycheck.php */
/* Location: ./application/controllers/Momeycheck.php */