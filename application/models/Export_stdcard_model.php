<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_stdcard_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function Export_tblcandidate_to_tblstd_idcard(){
		$check = $this->tblstd_idcard_delete_all();
		if($check === false){
			exit("error delete tblstd_idcard");
		}

		$std_data = $this->get_tblcandidate_all();

		foreach ($std_data as $key => $value) {
			unset($insert_data);
			unset($insert);
			$insert_data = $this->set_format_insert_tblstd_idcard($value);
			// echo "<pre>";
			// var_dump($insert_data);
			// echo "</pre>";
			$insert = $this->db->insert('tblstd_idcard', $insert_data);
			if(!$insert){
				exit('error insert data tblstd_idcard');
			}
			
		}
		return true;


	}

	public function set_format_insert_tblstd_idcard($data){
		if(!is_array($data))
			return false;

			$data_branch = $this->get_branch_where_branchId($data['room_branchid']);

			$major_id = substr((date('Y')+543),2,2).$data_branch['level_id'].$data_branch['branchId3'];
		$insert = array(
			'student_id' => $data['room_std_code'], 
  			'people_id' => $data['stdCardID'], 
  			'perfix_id' => $data['prefix_id_th'], 
  			'stu_fname' => $data['stu_fname_th'], 
  			'stu_lname' => $data['stu_lname_th'], 
  			'birthday' => $data['birthday_th'], 
  			'start_year' => (date('Y')+543), 
  			'schedu_id' => $data['room_branchid'], 
  			'group_id' => $data['room_group_id'], 
  			'years' => (date('Y')+543), 
  			'major_id' => $major_id, 
		 	'major_name' => $data_branch['major'], 
		  	'minor_name' => $data_branch['branch'], 
		  	/*'card_no' => $data[''],
		  	'card_no_year' =>$data[''],
		  	'date_print' => $data[''], 
		  	'date_expire' => $data['']*/ 

			);

		return $insert;
	}

	public function get_branch_where_branchId($branchId){
		$this->db->where('branchId',$branchId);
		$query = $this->db->get('branch');

		if($query->num_rows()!= 1)
			exit('error branch id '.$branchId);

		return $query->row_array();


	}

	public function get_tblcandidate_all(){
		$query = $this->db->get('tblcandidate');

		if($query->num_rows() == 0 )
			return false;

		foreach ($query->result_array() as  $row) {
			$data[] = $row;
		}

		return $data;
	}

	public function tblstd_idcard_delete_all(){
		$query = $this->db->query('TRUNCATE TABLE tblstd_idcard');
		if($query){
				return true;
		}else{
				return false;
		}


	}
	

}

/* End of file Export_stdcard_model.php */
/* Location: ./application/models/Export_stdcard_model.php */