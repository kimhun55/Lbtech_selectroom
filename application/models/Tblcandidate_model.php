<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tblcandidate_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_std_list($branchid,$group){
		$this->db->select('stdCardID,prefix_id_th,stu_fname_th,stu_lname_th,room_std_code');
		$this->db->where('room_std_group',$group);
		$this->db->where('room_branchid',$branchid);
		$this->db->order_by('room_std_code', 'ASC');
		$query = $this->db->get('tblcandidate');

		if($query->num_rows() == 0){
			return false;
		}

		foreach ($query->result_array() as $row) {
			$data[] = $row;
		}

		return $data;
	}

	

}

/* End of file Tblcandidate_model.php */
/* Location: ./application/models/Tblcandidate_model.php */