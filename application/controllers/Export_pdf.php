<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_pdf extends CI_Controller {

	 function __construct()
	{
		parent::__construct();

		$this->load->library('pdf'); 
		$this->load->model('tblcandidate_model','candidate');
		$this->load->model('branch_status_model','status');
	}


	public function index($branchid,$group)
	{
		
		/*$this->pdf->AddPage();
    $this->pdf->SetFont('Arial','B',16);
    $this->pdf->Cell(40,10,'Hello World!');
    $this->pdf->Output();*/

    	$group_full = $this->status->get_tblgroup_id_data_by_group($branchid,$group);

		$data['data_group'][] = $group_full;
		$data['file_name'] = $group_full['branch_id'].'_'.$group_full['branch_name'].'_'.$group_full['level_name'].'_'.$group.'.pdf';
		$data['data_std'] = $this->candidate->get_std_list($branchid,$group);
		
		$this->load->view('pdf/std_list_view.php',$data);
	}

	public function	test(){
		echo "ok";
		$this->load->view('pdf/test');
	}


	public function nocode_pdf_fo_room($branchid,$group){

		$this->load->model('branch_model');

		$group_full = $this->status->get_tblgroup_id_data_by_group($branchid,$group);

		$data['data_group'][] = $group_full;
		$data['file_name'] = 'nocode_'.$group_full['branch_id'].'_'.$group_full['branch_name'].'_'.$group_full['level_name'].'_'.$group.'.pdf';
		//$data['data_std'] = $this->candidate->get_std_list($branchid,$group);


		$stdCardID = $this->branch_model->get_group_count_by_room($branchid,$group,1);
		//var_dump($stdCardID);
		$data_table= $this->recheck->merge_quaota_exams($branchid,$stdCardID,1);
		
		$std_data = $this->branch_model->add_std_group_room($branchid,$data_table);
		$data['data_std'] = $std_data['data'];
		/*echo "<pre>";
		var_dump($data);
		echo "</pre>";*/
		$this->load->view('pdf/nocode_std_list_view.php',$data);
	}



}

/* End of file Export_pdf.php */
/* Location: ./application/controllers/Export_pdf.php */