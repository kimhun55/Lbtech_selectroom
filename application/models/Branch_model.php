<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('recheck_model','recheck');
	}
	/*------- check set group ------- */
	public function check_set_group($branchId){
		$this->db->where('branchId',$branchId);
		$this->db->where('branch_gruop_count','0');
		$query = $this->db->get('branch');
		//echo $this->db->last_query();
		if($query->num_rows() == '1'){
			return true;
		}else{
			return false;
		}
		
	}

	/*--------------menu controllers---------*/
	public function menu_std_full($branchId){
		$data_result = $this->recheck->merge_quaota_exams($branchId);
		$data['number'] = "full";
		$data['name'] ='รายชื่อนักเรียนทั้งหมด';
		$data['link'] = site_url('group/zonebranch/'.$branchId);;
		$data['count'] = $data_result['sum'];
		return $data;
	}


	public function get_stdCardid_by_branchid($branchId){
		$this->db->select('stdCardID');
		$this->db->where('branchId',$branchId);
		$this->db->where('std_group !=','99');
		$query = $this->db->get('std_group');

		if($query->num_rows() == 0){
			return false;
		}

		foreach ($query->result_array() as $row) {
			$data[] = $row['stdCardID'];
		}
		return $data;

	}

	public function menu_std_no_room($branchId)
	{
		$stdCardID = $this->get_stdCardid_by_branchid($branchId);
		$data_result = $this->recheck->merge_quaota_exams($branchId,$stdCardID);
		$data['number'] = "noroom";
		$data['name'] ='นักเรียนที่ยังไม่มีกลุ่ม';
		$data['link'] = site_url('group/nogroup/'.$branchId);
		$data['count'] = $data_result['sum'];
		return $data;
	}

	public function	get_group_std($branchId){
		$group = $this->get_group_count($branchId);
		if($group == false){
			return false;
		}

		$this->db->where('branch_id',$branchId);
		$this->db->order_by('group_no', 'ASC');
		$query = $this->db->get('tblgroup_id');

		foreach ($query->result_array() as $row){

			if($this->get_group_count_by_room($branchId,$row['group_no']) == 0){
			$link_m ="#";
			}else{
			$link_m = site_url('group/room/'.$branchId.'/'.$row['group_no']);
			}



			$data[] = array('number'=>$row['group_no'],
							'name' => 'กลุ่ม '.$row['group_no'].' ['.$row['group_name'].']',
						 	'link'=> $link_m,
						 	'count'=>$this->get_group_count_by_room($branchId,$row['group_no']) );
				

		}


		/*
		for($i=1;$i<= $group;$i++){

		if($this->get_group_count_by_room($branchId,$i) == 0){
			$link_m ="#";
		}else{
			$link_m = site_url('group/room/'.$branchId.'/'.$i);
		}

		$data[] = array('number'=>$i,'name' => 'กลุ่ม '.$i,
						 'link'=> $link_m,
						 'count'=>$this->get_group_count_by_room($branchId,$i) );
		}	
		*/	
		
		return $data;
	}

	public function link_import($branchId){
		$data['number'] = 'Import';
		$data['name'] ='Import File';
		$data['link'] = site_url('group/impostroom/'.$branchId);
		$data['count'] = false;
		return $data;
	}


	public function	output_menu($branchId,$status=NULL){
		//name ,link ,cout

		$data[] = $this->menu_std_full($branchId);
		if($status == 1){
			return $data;
		}
		$data[] = $this->menu_std_quaota($branchId);
		$data[] = $this->menu_std_exams($branchId);
		$data[] = $this->menu_std_no_room($branchId);
		$group = $this->get_group_std($branchId);
		if($group !== false){
		foreach ($group as $key => $value) {
			$data[] = $value;
			}
		}
		$data[] = $this->link_import($branchId);
		return $data;

	}

	/*--------------End menu controllers---------*/



	public	function get_std_full($branchId,$search=NULL){
		$data = $this->recheck->merge_quaota_exams($branchId,NULL,NULL,$search);
		if($data['data'] != false && $data['data'] != ''){

		
		foreach ($data['data'] as $key => $value) {
			$value['std_group_room'] = $this->get_group_std_where_id($branchId,$value['stdCardID'],$value['stdApplyNo']);
			$data_return[]=$value;
		}
		$data['data'] = $data_return;
	}
		

		return $data;
	}

	public	function get_std_quaota($branchId,$search=NULL){
		//$data = $this->recheck->merge_quaota_exams($branchId,NULL,NULL,$search);
		$data = $this->recheck->query_std_quaota($branchId,NULL,NULL,$search);
		if($data['data'] != false && $data['data'] != ''){

		
		foreach ($data['data'] as $key => $value) {
			$value['std_group_room'] = $this->get_group_std_where_id($branchId,$value['stdCardID'],$value['stdApplyNo']);
			$data_return[]=$value;
		}
		$data['data'] = $data_return;
	}
		

		return $data;
	}

		public	function get_std_exams($branchId,$search=NULL){
		//$data = $this->recheck->merge_quaota_exams($branchId,NULL,NULL,$search);
		$data = $this->recheck->query_std_exams($branchId,NULL,NULL,$search);
		if($data['data'] != false && $data['data'] != ''){

		
		foreach ($data['data'] as $key => $value) {
			$value['std_group_room'] = $this->get_group_std_where_id($branchId,$value['stdCardID'],$value['stdApplyNo']);
			$data_return[]=$value;
		}
		$data['data'] = $data_return;
	}
		

		return $data;
	}

	public function add_std_group_room($branchId,$data){
		foreach ($data['data'] as $key => $value) {
			$value['std_group_room'] = $this->get_group_std_where_id($branchId,$value['stdCardID'],$value['stdApplyNo']);
			$data_return[]=$value;
		}
		$data['data'] = $data_return;

		return $data;
	}

	public function get_branch_data_dy_id($branchId){
		$this->db->where('branchId',$branchId);
		$query = $this->db->get('branch');

		if($query->num_rows() != 1){
			return false;
		}

		$row = $query->row_array();
		return $row;
	}


	//------- setup ------
	public function update_group_count($branchId,$group_count){
		if($group_count == 0 || $group_count == NULL || $group_count== ''){
			return false;
		}
		$this->db->set('branch_gruop_count',$group_count);
		$this->db->set('branch_datetime',date("Y-m-d H:i:s"));
		$this->db->where('branchId',$branchId);
		$update = $this->db->update('branch');
		if($update){
			return true;
		}else{
			return false;
		}
	}

	public function	get_group_count($branchId){

		$this->db->where('branch_id',$branchId);
		$this->db->order_by('group_no', 'ASC');
		$query = $this->db->get('tblgroup_id');

		if($query->num_rows() == 0){
			return false;
		}

		foreach ($query->result_array() as $row){
			$data[] = $row;
		}
		/*
		$this->db->select('branch_gruop_count');
		$this->db->where('branchId',$branchId);
		$query = $this->db->get('branch');

		if($query->num_rows() == 0 ){
			return false;
		}

		$row = $query->row_array();

		return $row['branch_gruop_count'];
		*/
		return $data;


	}

	public function	get_group_count_by_room($branchId,$std_group,$data_return=NULL){
		$this->db->select('*');
		$this->db->where('branchId',$branchId);
		$this->db->where('std_group',$std_group);
		$query = $this->db->get('std_group');

		//echo $this->db->last_query();
		
		if($data_return == 1){
			if($query->num_rows() == 0){
				return false;
			}
			
			foreach ($query->result_array() as $row) {
				$data[] = $row['stdCardID'];
			}

			return $data;
		}

			return $query->num_rows();
	

	}

	public function replace_std_group($data){
		$replace = $this->db->replace('std_group',$data);
		if($replace){
			$this->log_change_std_group($data);
			return true;
		}else{
			return false;
		}

	}

	//log change group 
	public function log_change_std_group($data){

		@$this->db->insert('std_group_log', $data);

	}

	public function	delete_std_group($data,$user_id = 1){
		$delete = $this->db->delete('std_group', $data);
		if($delete){
			$data['std_group'] = 99;
			$data['std_datetime'] = date("Y-m-d H:i:s");
			$data['u_id'] = $user_id;

			$this->log_change_std_group($data);
			return true;
		}else{
			return false;
		}
	}
	
	public function	get_group_std_where_id($branchId,$stdCardID,$stdApplyNo){
		$this->db->select('std_group');
		$this->db->where('stdCardID',$stdCardID);
		$this->db->where('stdApplyNo',$stdApplyNo);
		$query = $this->db->get('std_group');
		if($query->num_rows() == 0){
			return false;
		}

		$row = $query->row_array();

		return $row['std_group'];

	}


	public function get_tblgroup_id_by_group_no($branchId,$group_no){
		$query =$this->db->where('branch_id',$branchId)
					 	->where('group_no',$group_no)
				 		->get('tblgroup_id');
		if($query->num_rows() == 0){
			return false;
		} 

		foreach ($query->result_array() as $row) {
			$data = $row;
		}

		return $data;

	}

	//student data menu show Qota
	public function menu_std_quaota($branchId)
	{
		
		$data_result = $this->recheck->query_std_quaota($branchId);
		$data['number'] = "quaota";
		$data['name'] ='นักเรียน โคต้า';
		$data['link'] = site_url('group/quaota/'.$branchId);
		$data['count'] = $data_result['count'];
		return $data;
	}


	public function menu_std_exams($branchId)
	{
		
		$data_result = $this->recheck->query_std_exams($branchId);
		$data['number'] = "exams";
		$data['name'] ='นักเรียน สอบตรง';
		$data['link'] = site_url('group/exams/'.$branchId);
		$data['count'] = $data_result['count'];
		return $data;
	}
	

}

/* End of file branch_model.php */
/* Location: ./application/models/branch_model.php */
