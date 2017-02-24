<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_status_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();

		$this->set_db_admission();
	
	}
	public $admission;

	public function set_db_admission(){
		$this->admission = $this->load->database('admission', TRUE);
	}

	public function update_status($branchId,$status){
		$data = array(
        'branch_id' => $branchId,
        'branch_status'  => $status,
        'u_id'  => $this->menu->id,
        'branch_datetime' => date('Y-m-d H:i:s')
				);

		if($status == 5){
				$result = $this->status_main_5($branchId);
				if($result['result'] === true){
				$check = $this->update_status_where_in($status,$result['branchid']);
				if($check){
					return true;
				}else{
					var_dump($result);
					exit("Admin call");
					//return false;

				}

				}else{
					var_dump($result);
					exit("Admin call");
				}

		}

		$query = $this->db->replace('branch_status', $data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function update_status_where_in($status,$branchid_array){
		$this->db->where_in('branch_id',$branchid_array);

				$data = array(
      				'branch_status'  => $status,
        			'u_id'  => $this->menu->id,
        			'branch_datetime' => date('Y-m-d H:i:s')
				);

				$this->db->set($data);
				$query= $this->db->update('branch_status');
				if($query){
					return true;
				}else{
					return false;
				}
	}


	


//=========== status 5 ==================//
	public function status_main_5($branchId){
		$branchId_group = $this->get_branchId_group($branchId);
		//var_dump($branchId_group);
		//echo '||';
		
		$check = $this->check_status_group(4,$branchId_group);
		if($check['result'] === false){
			$check['check'] = 1;
			return $check;
			
		}
		

		$data_group = $this->get_std_group($branchId_group);
		if($data_group === false){
			$data['result'] = false;
			$data['msg'] = "error no data group std";
			return $data;
		}
		
		$group_array = $this->get_group_array($branchId);
		//echo $branchId."----";
		//var_dump($group_array);
		//var_dump($branchId_group);
		//exit();
		$copy = $this->copy_admisstion_to_room($data_group,$branchId_group,$group_array);
		if($copy === false){
			$data['result'] = false;
			$data['msg'] = "error no data copy admission to room system";
			return $data;
		}
		

		$auto = $this->auto_code_std($group_array);
		if($auto === false){
			$data['result'] = false;
			$data['msg'] = "error auto code std";
			return $data;

		}
		
		$data['result'] = true;
		$data['msg'] = "ok";
		$data['branchid'] = $branchId_group;

		return $data;


	}
	//auto code std
	public function auto_code_std($group_array){
		$w = substr(end($group_array),0,6);
		$query = $this->db->query("SELECT stdCardID, stu_fname_th, stu_lname_th, room_group_id, room_std_group FROM tblcandidate
WHERE room_group_id LIKE  '%".$w."%' ORDER BY room_std_group, stu_fname_th, stu_lname_th");
		if($query->num_rows() == 0){
			return false;
		}
		
		$i = 1;
		foreach ($query->result_array() as $key => $row) {
			if(strlen($row['room_group_id']) == 8){
				$head_code = substr($row['room_group_id'],0,6);
			}
			
			$code = '';
			$count_position = 4-strlen($i);
			if($count_position > 0){
					for($start = 0;$start<$count_position;$start++){
						$code.='0';
					} 
			}//end if

			$code = $head_code.$code.$i;
			//echo $code."<br>";

			$where['stdCardID'] = $row['stdCardID'];
			$set['room_std_code'] = $code;
			$set['student_id'] = $code;
			$set['group_id'] = $row['room_group_id'];

			$check = $this->update_code_std($where,$set);
			if($check === false){
				return false;
			}

			
			 $i++;
			 unset($code);
		}

		return true;

	}

	public function update_code_std($where,$set){

		$this->db->set($set);
		$this->db->where($where);
		$query = $this->db->update('tblcandidate');
			/*echo $this->db->last_query();
			var_dump($query);
			echo "<br>";*/
		if($query){
			return true;
		}else{
			return false;
		}
		
	}


	public function copy_admisstion_to_room($data_group,$branchId_array,$group_array){
		$check = $this->delete_cleaning_candidate($branchId_array);
		if($check === false){
			exit("error delete_cleaning_candidate");
		}

		foreach ($data_group as $key=>$row) {
			$where['stdCardID'] = $row['stdCardID'];
			if( $row['stdApplyNo'] == '0' ){
				 $row['stdApplyNo'] = '';
			}
			$where['stdApplyNo'] = $row['stdApplyNo'];
			$exams = $this->get_std_admission_table_exams($where,$row,$group_array);
			if($exams === false){
				$quota = $this->get_std_admission_table_quota($where,$row,$group_array);
				if($quota === false){
					echo "error no data";
					echo "<pre>";
					var_dump($row);
					echo "</pre>";
					return false;
					exit();
				}
			}


		}//end foreach
		return true;
	}

	public function get_std_admission_table_exams($where,$data_full,$group_array){
		$this->admission->where($where);
		$query = $this->admission->get('tblcandidate');
		if($query->num_rows() == 0)
			return false;

		foreach ($query->result_array() as $row) {
			$row['room_table'] = 'exams';
			$row['room_branchid'] = $data_full['branchId'];
			$row['room_std_group'] = $data_full['std_group'];
			$row['room_group_id'] = $group_array[$data_full['std_group']];
			$insert = $this->insert_tblcandidate($row);
			if($insert === false){
				return false;
			}
		}

		return true;
	}


	public function get_std_admission_table_quota($where,$data_full,$group_array){
		$this->admission->where($where);
		$query = $this->admission->get('tblcandidate_q');
		if($query->num_rows() == 0)
			return false;

		foreach ($query->result_array() as $row) {
			$row['room_table'] = 'quota';
			$row['room_branchid'] = $data_full['branchId'];
			$row['room_std_group'] = $data_full['std_group'];
			$row['room_group_id'] = $group_array[$data_full['std_group']];
			$insert = $this->insert_tblcandidate($row);
			if($insert === false){
				return false;
			}
		}

		return true;

	}

	public function insert_tblcandidate($data_insert){
		$query =$this->db->insert('tblcandidate', $data_insert);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function delete_cleaning_candidate($branchId_array){
		$this->db->where_in('room_branchid', $branchId_array);
		$query = $this->db->delete('tblcandidate');
		//echo " || ".$this->db->last_query();
		if($query){
			return true;
		}else{
			return false;
		}
	}

	//get std  group 
	public function get_std_group($branchId_array){
		$this->db->where_in('branchId',$branchId_array);
		$query = $this->db->get('std_group');
			if($query->num_rows() == 0)
			return false;

		foreach ($query->result_array() as $row) {
			$data[] = $row;
		}
		return $data;

	}

	//check status group all = 5 yes/no
	public function check_status_group($status,$branchId_array){
		$this->db->where_in('branch_id',$branchId_array);
		$query = $this->db->get('branch_status');
		if($query->num_rows() == 0){
			$data['result'] = false;
			return $data;
		}

		$data['result'] = true;

		foreach ($query->result_array() as $row) {
			if($row['branch_status'] == $status){
				//$data['data'][] = $row;
			}else{
				$data['result'] = false;
				$data['msg'][]= $row['branch_id']." || ".$row['branch_status'];
			}
		}
		return $data;
	}
	public function get_branchId3($branchId){
		$this->db->where('branchId',$branchId);
		$query = $this->db->get('branch');
		if($query->num_rows() == 0)
			return false;

		$row = $query->row_array();
		return $row['branchId3'];

	}
	public function get_data_branch($branchId){
		$this->db->where('branchId',$branchId);
		$query = $this->db->get('branch');
		if($query->num_rows() == 0)
			return false;

		$row = $query->row_array();
		return $row;

	}
	
	public function get_group_array($branchId){
		$data_branch = $this->get_data_branch($branchId);
		if($data_branch === false)
			return false;

		$group_id = $data_branch['level_id'].$data_branch['branchId3'];

		$this->db->like('group_id', $group_id); 
		$query = $this->db->get('tblgroup_id');

		if($query->num_rows() == 0)
			return false;

		foreach ($query->result_array() as $row) {
			$data[$row['group_no']] = $row['group_id'];
		}
		return $data;

	}
	public function get_branchId_group($branchId){
		$data_branch = $this->get_data_branch($branchId);
		if($data_branch === false)
			return false;

		$group_id = $data_branch['level_id'].$data_branch['branchId3'];
		//var_dump($group_id);

		$this->db->like('group_id', $group_id); 
		$query = $this->db->get('tblgroup_id');
		//echo $this->db->last_query();

		if($query->num_rows() == 0)
			return false;

		foreach ($query->result_array() as $row) {
			$data[] = $row['branch_id'];
		}
		return $data;


		/*$branchId3 = $this->get_branchId3($branchId);
		if($branchId3 === false)
			return false;

		$this->db->where('branchId3',$branchId3);
		$query =$this->db->get('branch');
		if($query->num_rows() == 0)
			return false;

		foreach ($query->result_array() as $row) {
			$data[] = $row['branchId'];
		}
		return $data;*/

	}
	//end check status group all = 5 yes/no
	

	public function get_tblgroup_id_data_by_group($branchId,$group_no){
		$this->db->where('branch_id',$branchId);
		$this->db->where('group_no',$group_no);
		$query = $this->db->get('tblgroup_id');
		if($query->num_rows() == 0){
			return false;
		}
		
		$row = $query->row_array();
 
		return $row;

	}


	
	
//=========== end status 5 ==================//
}

/* End of file branch_status_model.php */
/* Location: ./application/models/branch_status_model.php */
?>