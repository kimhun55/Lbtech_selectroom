<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recheck extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->menu->auto_check_login();
		$this->load->model('recheck_model','recheck');
	}

	public function index()
	{
		$this->index_page();
	}

	public function department(){
		//set titile
	 	$this->header->get_title("home system");
	 	$this->menu->get_menu_navbar("recheck");


	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data']['data_table'] = $this->recheck->get_department_all();
	 	$data['content_view'] = "recheck/department_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);
	}

	public function stdcheck(){

		$content_data = $this->recheck->std_full();
		$this->load->helper('table');
		$content_data['table']  = dataTotable($content_data['data']);
		/*
		echo "<pre>";
		echo "count exams =".$data['exams']['count']."<br>";
		echo "count quaota =".$data['quaota']['count']."<br>";
		$data_map[0] = $data['exams']['key'];
		$data_map[1] = $data['quaota']['key'];
		$data_map = array_map( 'unserialize', array_unique( array_map( 'serialize', $data_map ) ) );
		echo "count map = ".count($data_map)."<br>";
		var_dump($data_map);
		echo "</pre>";
		*/


		
		//set titile
	 	$this->header->get_title("system check ข้อมูลนักศึกษา");
	 	$this->menu->get_menu_navbar("recheck");


	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data'] = $content_data;
	 	$data['content_view'] = "recheck/stdcheck_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);
	 	

	}

	public function department_count_std(){

		$content_data['data'] = $this->recheck->get_dep_count_by_std();
		$this->load->helper('table');
			//var_dump_error($content_data['data'],1);

		$content_data['table']  = dataTotable($content_data['data']);


		//set titile
	 	$this->header->get_title("system check จำนวนนักเรียน แต่ละแผนก");
	 	$this->menu->get_menu_navbar("recheck");


	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data'] = $content_data;
	 	$data['content_view'] = "recheck/stdcheck_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);
	 		
	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);

	}

	public function data_std_group_error(){
		$data = $this->recheck->data_std_group_error();

		$data['content_data']['data'] = $data;
		//set titile
	 	$this->header->get_title("system check group std");
	 	$this->menu->get_menu_navbar("recheck");


	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	//$data['content_data'] = $content_data;
	 	$data['content_view'] = "recheck/check_group_std_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);
	 		
	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);

		// foreach ($data as $key =>$value) {
		// 	echo $value['stdCardID']." : ".$value['stdApplyNo']." => ";
		// 	$this->db->where('stdCardID',$value['stdCardID']);
		// 	$this->db->where('stdApplyNo',$value['stdApplyNo']);
		// 	$delete = $this->db->delete('std_group');
		// 	if($delete){
		// 		echo "OK delete";
		// 	}else{
		// 		echo "NO delete";
		// 	}
		// 	echo "<br>";
		// }



	}
	public function delete_std_group($stdCardID,$stdApplyNo){
			$this->db->where('stdCardID',$stdCardID);
			$this->db->where('stdApplyNo',$stdApplyNo);
			$delete = $this->db->delete('std_group');
			if($delete){
				redirect('recheck/data_std_group_error','refresh');
			}else{
				exit('error connect admin ');
			}

	}


	

}

/* End of file Recheck.php */
/* Location: ./application/controllers/Recheck.php */