<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Setup_data_model extends CI_Model {

		public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->set_db_admission();
	}

	public $admission;

	public function set_db_admission(){
		$this->admission = $this->load->database('admission', TRUE);
	}


	public	function get_user($id=NULL){
		if(!is_null($id)){
			$this->db->where('u_id',$id);
		}
		$query = $this->db->get('users');
		if($query->num_rows() == 0){
			return false;
		}
		foreach ($query->result_array() as $row) {
			$data[] = $row;
		}
		return $data;
		
	}

	public	function get_user_where_id($id){
		$this->db->where('u_id',$id);
		$query = $this->db->get('users');
		if($query->num_rows() == 0){
			return false;
		}
		$row = $query->row_array();
		if (isset($row)){
			return $row;
		}
	}

	public	function insert_user($array_data){
		$insert  = $this->db->insert('users', $array_data);
		if($insert){
			return true;
		}else{
			return false;
		}

	}

	public	function update_user($data,$id){
		$this->db->set($data);
		$this->db->where('u_id',$id);
		$update = $this->db->update('users');
		if($update){
			return true;
		}else{
			return false;
		}

	}

	public function	delete_user($id){
		$this->db->where('u_id', $id);
		$query = $this->db->delete('users');
		if($query){
			return true;
		}else{
			return false;
		}


	}

	public function get_department_name($array_columns=NULL){
		$query = $this->db->get('department');
		if($query->num_rows() == 0){
			return false;
		}
		foreach ($query->result_array() as $row) {
			$data[] = $row;
		}
		return $data;

	}

	public function update_department_name($array_key_name){
		if(!is_array($array_key_name))
			return false;

		foreach ($array_key_name as $key => $value) {
				$this->db->set('department_name', $value);
				$this->db->where('department_branchId3', $key);
				$update = $this->db->update('department');
				if(!$update)
					return false;
		}

		return TRUE;
	}


	public function update_tbl_department(){
	 	$query = $this->admission->query('SELECT `branchId3`,COUNT(`branchId3`) AS count FROM `tblbranch` GROUP BY `branchId3`');
	 		$data[] =  "row =".$query->num_rows();

	 	foreach ($query->result_array() as $row) {
	 		$insert  = $this->db->query("INSERT INTO department (department_branchId3,department_branchId_count) VALUES ('".$row['branchId3']."','".$row['count']."') ON DUPLICATE KEY UPDATE department_branchId_count='".$row['count']."',department_datetime = NOW()");

	 		if($insert){
	 			$data[] = $row['branchId3']."|| YES";
	 		}else{
	 			$data[] =  $row['branchId3']."|| ERROR";
	 		}
	 		
	 	}
	 	return $data;
		
	}
	

	public function update_tbl_branch(){
		$query = $this->admission->query("SELECT branchId,branch,major,typeOfCourse,level,course,branchId3,groupNickName FROM tblbranch ");

		foreach ($query->result_array() as $row) {
			$insert = $this->db->query("INSERT INTO branch (branchId,branch,major,typeOfCourse,level,course,branchId3,groupNickName,auto_datetime) VALUES ('".implode("','", $row)."',NOW()) ON DUPLICATE KEY UPDATE auto_datetime = NOW()");
			if($insert){
	 			$data[] = $row['branchId']."|| YES";
	 		}else{
	 			$data[] =  $row['branchId']."|| ERROR";
	 		}

		}

		return $data;

	}
/*---------------------setup_cleaning_group_status------------------*/
	public function delete_data_branch_status(){
		$query = $this->db->truncate('branch_status');
		return $query;
	}
	public function copy_branch_to_branch_status(){
		$query = $this->db->select('branchId')
						->get('branch');
		foreach ($query->result_array() as $data){
			//$data['branchId']
			$data_insert = array(
					'branch_id' =>$data['branchId'],
					'branch_status' => 1,
					'u_id'	=> 0,
					'branch_datetime' => date("Y-m-d H:i:s")
				);
			$this->db->replace('branch_status', $data_insert);

			$data_return[] = $data['branchId'];
		}
		return $data_return;

	}

}

/* End of file setup_model.php */
/* Location: ./application/models/setup_model.php */
?>