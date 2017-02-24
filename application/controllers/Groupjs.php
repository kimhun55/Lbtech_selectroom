<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groupjs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		$this->load->model('branch_model');
		$this->load->helper('table_helper');
		$this->load->helper('form_group_helper');
	}

	public function zonebranch($branch=NULL,$result=NULL)
	{
		if($branch == NULL){
			redirect('home', 'refresh');
			exit();	
		}
		$data['data'] = $this->branch_model->get_std_full($branch);
		$this->load->view('groupjs/group_main_view',$data);
	}

}

/* End of file Groupjs.php */
/* Location: ./application/controllers/Groupjs.php */