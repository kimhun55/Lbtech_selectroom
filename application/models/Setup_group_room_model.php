 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup_group_room_model extends CI_Model {

	public function get_department_where_id($id){
		$query = $this->db->where('department_id',$id)
						->limit(1)
						->get("department");
		$row = $query->row_array();
		if (isset($row)){
			return $row;
		}
	}

	//get vocational ปวช

	public function get_branch_vocational_where_branchId3($branchId3){
		$query = $this->db->where('branchId3',$branchId3)
							->where('level','ปวช.')
							->get('branch');
		foreach ($query->result_array() as $row) {
			$data[] = $row;
		}
		return $data;
	}

	public function get_room_vocation($array_data_branch){
		if(count($array_data_branch)== 0){
			return false;
		}

		foreach ($array_data_branch as $key => $value) {
			$branchId[] = $value['branchId'];
		}

		if(count($branchId) == 0){
			return false;
		}

		$query = $this->db->where_in('branch_id',$branchId)
							->order_by('group_no','asc')
							->get('tblgroup_id');

		foreach ($query->result_array() as $row) {
			$data[] = $row;
		}
		return $data;
	}


	//get vocational ปวส

	public function get_branch_high_vocational_where_branchId3($branchId3){
		$query = $this->db->where('branchId3',$branchId3)
							->where('level','ปวส.')
							->get('branch');
		foreach ($query->result_array() as $row) {
			$data[] = $row;
		}
		return $data;
	}
	

	public function get_room_high_vocation($array_data_branch){
		if(count($array_data_branch)== 0){
			return false;
		}

		foreach ($array_data_branch as $key => $value) {
			$branchId[] = $value['branchId'];
		}

		if(count($branchId) == 0){
			return false;
		}

		$query = $this->db->where_in('branch_id',$branchId)
							->order_by('group_no','asc')
							->get('tblgroup_id');

		foreach ($query->result_array() as $row) {
			$data[] = $row;
		}
		return $data;
	}

}

/* End of file Set_group_room_model.php */
/* Location: ./application/models/Set_group_room_model.php */