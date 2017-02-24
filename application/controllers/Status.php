<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('branch_status_model','branch_status');
	}

	public function userset(){
		$branchId = $this->input->post('branchId');
		$status = $this->input->post('status');

		if($branchId == NULL || $status == NULL){
			redirect('group/zonebranch/'.$branchId,'refresh');
		}

		$result = $this->branch_status->update_status($branchId,$status);
		if($result){
			redirect('group/zonebranch/'.$branchId,'refresh');
		}else{
			//redirect('group/zonebranch/'.$branchId,'refresh');
		}

	}



	

}

/* End of file Status.php */
/* Location: ./application/controllers/Status.php */
?>