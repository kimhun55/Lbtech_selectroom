<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xlsx extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('tblcandidate_model','candidate');
		$this->load->model('branch_status_model','status');
	}

	public function index()
	{
		
	}

	public function std_room($branchid,$group){

			$group_full = $this->status->get_tblgroup_id_data_by_group($branchid,$group);
			//var_dump($group_full);
		$data['data_group'][] = $group_full;
		$data['file_name'] = $group_full['branch_id'].'_'.$group_full['branch_name'].'_'.$group_full['level_name'].'_'.$group.'.xls';
		$data['data_std'] = $this->candidate->get_std_list($branchid,$group);

		$this->load->view('xlsx/room_view', $data, FALSE);
	}

	public function nocode_std_room($branchid,$group){
		$this->load->model('branch_model');
		$group_full = $this->status->get_tblgroup_id_data_by_group($branchid,$group);
			//var_dump($group_full);
		$data['data_group'][] = $group_full;
		$data['file_name'] = 'nocode_'.$group_full['branch_id'].'_'.$group_full['branch_name'].'_'.$group_full['level_name'].'_'.$group.'.xls';
		//$data['data_std'] = $this->candidate->get_std_list($branchid,$group);


		$stdCardID = $this->branch_model->get_group_count_by_room($branchid,$group,1);
		//var_dump($stdCardID);
		$data_table= $this->recheck->merge_quaota_exams($branchid,$stdCardID,1);
		
		$std_data = $this->branch_model->add_std_group_room($branchid,$data_table);
		$data['data_std'] = $std_data['data'];

		$this->load->view('xlsx/nocode_room_view', $data, FALSE);

	}

	

}

/* End of file Xlsx.php */
/* Location: ./application/controllers/Xlsx.php */