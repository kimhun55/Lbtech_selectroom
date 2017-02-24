<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internet extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('export_internet_model','internet');
	}

	public function index(){

		$q = $this->input->post('q');
		//echo $q;
		if($q == '' || $q == NULL){
		$data['data_table'] = false;
		}else{
			$data_table = $this->internet->searching_tblcandidate_by_card_id($q);
			$data['data_table'] = $data_table;

		}
		$this->load->view('internet/check_code_view',$data);
	}

	public function username()
	{
		echo "username radcheck";
		$this->internet->export_radcheck();
		exit("end");
	}

	public function group(){
		echo "group radusergroup";
		$this->internet->export_radusergroup();
		exit();
	}


}

/* End of file Internet.php */
/* Location: ./application/controllers/Internet.php */