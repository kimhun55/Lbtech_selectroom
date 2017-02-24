<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocom extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auto_user_departmant_model','auto');
	}

	public function index()
	{
		exit('error');
	}


	public function Auto(){
			$data = $this->auto->main_auto_user();
			echo "<pre>";
			var_dump($data);
			echo "</pre>";
	}

}

/* End of file Autocom.php */
/* Location: ./application/controllers/Autocom.php */
