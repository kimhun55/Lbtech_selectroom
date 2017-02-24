<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auto_user_departmant_model extends CI_Model {


	public function main_auto_user(){
		$data = $this->get_user_pass_dep();

		if($data === false)
			return false;

		foreach ($data as $key => $value) {
			$id = $this->insert_user_pass($value['department_name_en'],$value['department_branchId3'],$value['department_name_en']);

			if($id === false)
				return false;

			$k = $this->insert_users_copyright($id,$value['department_branchId3']);

			if($k === false)
				return false;

			$list[] = $value['department_name_en'];
		}
		return $list;

	}

	public function get_user_pass_dep(){
		$this->db->where('department_name_en !=','');
		$query = $this->db->get('department');
		if($query->num_rows() == 0)
			return false;

		foreach ($query->result_array() as $row)
		{
        		$data[] = $row;
		}
		return $data;

	}		

	public function insert_user_pass($user,$pass,$name){
						$data = array(
				        'u_username' => $user,
				        'u_password'  => $pass,
				        'u_name'  => $name,
				        'u_datetime' => date("Y-m-d H:i:s")
				);

			$query = $this->db->replace('users', $data);
			if($query === false){
				return false;
			}else{
				return $this->db->insert_id();
			}

	}

	public function insert_users_copyright($id,$depid){
		$data = array('u_id' => $id,
				'branchId3' => $depid,
				'copyright_datetime'=> date("Y-m-d H:i:s")
			);
		$query = $this->db->replace('users_copyright', $data);
		if($query === false){
				return false;
			}else{
				return true;
			}
	}

	

}

/* End of file Auto_user_departmant_model.php */
/* Location: ./application/models/Auto_user_departmant_model.php */