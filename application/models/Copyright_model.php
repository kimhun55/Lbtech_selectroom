<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Copyright_model extends CI_Model {

	
	public function add_copyright_in_data($data){
	
		if(count($data) == 0)
			return false;
		
		foreach ($data as $key => $value) {
			$copyright = $this->get_copyright_where_name($value['u_id']);

			$value['copyright'] = $copyright;
			
			$data_return[] = $value;
		}
		
		
		return $data_return;
	}

	public function	get_copyright_where_name($id){
		
		$query = $this->db->query("SELECT department_name,department_branchId3 FROM department WHERE department_branchId3 IN (SELECT branchId3 FROM users_copyright WHERE u_id = '".$id."')");
		
		if($query->num_rows() == 0){
			return NULL;
					
		}
		foreach ($query->result_array() as $row) {
			
			$data[$row['department_branchId3']] = $row['department_name'];
		}	
			return $data;
	}


	public function	get_copyright($users_copyright=NULL){
		$this->db->select('department_branchId3,department_name');
		if($users_copyright != NULL && is_array($users_copyright)){
			$this->db->where_not_in('department_branchId3',$users_copyright);
		}
		$query = $this->db->get('department');
		if($query->num_rows() == 0 ){
			return false;
		}
		foreach ($query->result_array() as $row) {
			$data[] = $row;
		}
		return $data;
	}


	public function add_copyrigth_user($branchId3,$u_id){
		$array_insert = array('branchId3'=> $branchId3,
							'u_id' => $u_id,
							'copyright_datetime' => date("Y-m-d H:i:s")
			);
		$query = $this->db->replace('users_copyright', $array_insert);
		if($query){
			return true;
		}else{
			return false;
		}

	}
	public	function remove_copyrigth_user($u_id,$branchId3){

		$this->db->where('u_id', $u_id);
		$this->db->where('branchId3', $branchId3);
		$query = $this->db->delete('users_copyright');
		if($query){
			return true;
		}else{
			return false;
		}

	}

}

/* End of file copyright_model.php */
/* Location: ./application/models/copyright_model.php */