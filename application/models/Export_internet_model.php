<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_internet_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function searching_tblcandidate_by_card_id($cardid){
		$this->db->where('stdCardID',$cardid);
		$this->db->select('stdCardID,prefix_id_th,stu_lname_th,stu_fname_th,room_std_code');
		$query = $this->db->get('tblcandidate');

		if($query->num_rows() == 0){
			return false;
		}

		foreach ($query->result_array() as  $value) {
			$data[] = $value;
		}

		return $data;
	}
	public function export_radusergroup(){
		$check = $this->delete_radusergroup_all();
		if($check === false){
			exit('error delete radusergroup');
		}


		$data_std = $this->get_tblcandidate_all();

		foreach ($data_std as  $value) {

			$insert_data = $this->set_format_radusergroup($value);

			echo "<pre>";
			var_dump($insert_data);
			echo "</pre>";
			//exit();
			$insert = $this->db->insert('radusergroup', $insert_data);
			if(!$insert){
				exit('error insert data radusergroup');
			}
			
		}

	}
	public function set_format_radusergroup($data){
		if(!is_array($data))
			return false;

		$i = substr($data['room_branchid'],0,1);
		if($i == 2){
			$group = 'std1_'.substr((date('Y')+543),2,2);
		}else if($i == 3){
			$group = 'std2_'.substr((date('Y')+543),2,2);
		}else if($i == 4){
			$group = 'std3_'.substr((date('Y')+543),2,2);
		}else{
			//Test
			$group = 'Test';
		}
		$data_insert = array(
			'username' => $data['room_std_code'],
			'groupname' =>$group,
			'priority' =>1
			);

		return $data_insert;

	}

	public function delete_radusergroup_all(){
		$query = $this->db->query('TRUNCATE TABLE radusergroup');
		if($query){
				return true;
		}else{
				return false;
		}


	}


	public function export_radcheck(){
		$check = $this->delete_radcheck_all();
		if($check === false){
			exit("error delete radcheck");
		}

		$data_std = $this->get_tblcandidate_all();

		foreach ($data_std as  $value) {

			$insert_data = $this->set_format_radcheck($value);

			echo "<pre>";
			var_dump($insert_data);
			echo "</pre>";
			//exit();
			$insert = $this->db->insert('radcheck', $insert_data);
			if(!$insert){
				exit('error insert data radcheck');
			}
			
		}


	}
	public function set_format_radcheck($data){
		if(!is_array($data))
			return false;

		$data_insert = array(
				'username' => $data['room_std_code'],
				'attribute' => 'Password',
				'op' => '==',
				'value'=> $data['birthday_th']

			);
		return $data_insert;
	}
	public function delete_radcheck_all(){
		$query = $this->db->query('TRUNCATE TABLE radcheck');
		if($query){
				return true;
		}else{
				return false;
		}


	}

	public function get_tblcandidate_all(){
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

/* End of file Export_internet_model.php */
/* Location: ./application/models/Export_internet_model.php */