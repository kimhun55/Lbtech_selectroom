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
		exit('end');
	}

}

/* End of file Stdcard.php */
/* Location: ./application/controllers/Stdcard.php */