<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Recheck_model extends CI_Model {

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

	public function get_department_all(){
		$this->admission->select("branchID,branch,major,typeOfCourse,level,course,branchId3");
		$this->admission->from('tblbranch');
		$this->admission->order_by('branchId3');
		
		$query = $this->admission->get();
		

	   if($query -> num_rows() >0)
	   {
	     return $query->result();
	   }
	   else
	   {

	     return false;
	   }
	}
	/* -------------------------- std check q+m */

	/*ข้อมูลเด็กสอบ*/
	public function query_std_exams($branchId=NULL,$stdCardID=NULL,$where_stdCardID=NULL,$search=NULL,$where_array=NULL){

		

		if(is_array($stdCardID) && $stdCardID != false){
			if($where_stdCardID == NULL){
				$this->admission->where_not_in('stdCardID', $stdCardID);
			}else{
				$this->admission->where_in('stdCardID', $stdCardID);
			}
			
		}else if($stdCardID != false){
			$this->admission->where('stdCardID',$stdCardID);
		}

		if($branchId != NULL){
			$this->admission->where('stdAdmisResult',$branchId);
		}
		$this->admission->select("stdCardID,stdApplyNo,prefix_id_th,stu_fname_th,stu_lname_th,stdAdmisResult")
						->from('tblcandidate')
						//->where('stat_into','0')
						->where('round>','0')
						->order_by('stdApplyNo','ASC');

		//echo $search."||";
		if($search != NULL){
			//echo "OK";
			$this->admission->group_start();
			$this->admission->or_like('stdCardID',$search);
			$this->admission->or_like('stdApplyNo',$search);
			$this->admission->or_like('stu_fname_th',$search);
			$this->admission->or_like('stu_lname_th',$search);
			$this->admission->group_end();
		}

		if(is_array($where_array) && $where_array != false){
			foreach ($where_array as $key => $value) {
				$this->admission->where($key,$value);
			}
		}


		$query = $this->admission->get();

		//echo $this->admission->last_query();
		//exit();
		if($query->num_rows() == 0){
			$data['data'] = false;
			$data['key'] =false;
			$data['count'] = false;
			return $data;
		}

		
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row){

				$row = array_merge($row,$this->get_department_by_id($row['stdAdmisResult']));
				$row['in'] = 'exams';
				$data['data'][] = $row;
				$data['key'][] =$row['stdCardID'];
			}
				$data['count'] = $query->num_rows();
			//return $data;
				return false;
		}else{
			 return false;
		}

	}
	public function query_std_quaota($branchId=NULL,$stdCardID=NULL,$where_stdCardID=NULL,$search=NULL,$where_array=NULL){

		

		if(is_array($stdCardID) && $stdCardID != false){

			if($where_stdCardID == NULL){
				$this->admission->where_not_in('stdCardID', $stdCardID);
			}else{
				$this->admission->where_in('stdCardID', $stdCardID);
			}
		}else if($stdCardID != false){
			$this->admission->where('stdCardID',$stdCardID);
		}

		if($branchId != NULL){
			$this->admission->where('std_admis_result',$branchId);
		}
		$this->admission->select("stdCardID,stdApplyNo,prefix_id_th,stu_fname_th,stu_lname_th,std_admis_result AS stdAdmisResult")
						->from('tblcandidate_q')
						->where('stat_into','0')
						//**add new 2/17/2017
						->where('stdAdmisResult !=','')
						->where('comment','')
						->order_by('stdApplyNo','ASC');

		if($search != null){
			//echo "MMMMMMM";

			$this->admission->group_start();
			$this->admission->or_like('stdCardID',$search);
			$this->admission->or_like('stdApplyNo',$search);
			$this->admission->or_like('stu_fname_th',$search);
			$this->admission->or_like('stu_lname_th',$search);
			$this->admission->group_end();
		}

		if(is_array($where_array) && $where_array != false){
			foreach ($where_array as $key => $value) {
				$this->admission->where($key,$value);
			}
		}

		$query = $this->admission->get();
		//echo " || ".$this->admission->last_query();
		if($query->num_rows() == 0){
			$data['data'] = false;
			$data['key'] =false;
			$data['count'] = false;
			return $data;
		}

							
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$row = array_merge($row,$this->get_department_by_id($row['stdAdmisResult']));
				$row['in'] = 'quaota';
				$data['data'][] = $row;
				$data['key'][] =$row['stdCardID'];
			}
				$data['count'] = $query->num_rows();
			return $data;
		}else{
			 return false;
		}

	}
	//get by branchID => branch
	public	function get_department_by_id($id_department){
		$this->admission->select("branch,major,level")
						->from('tblbranch')
						->where('branchID',$id_department);
		$query = $this->admission->get();

		$row = $query->row();
		if(isset($row)){
				$data['branch'] = $row->branch;
				$data['major'] = $row->major;
				$data['level'] = $row->level;
				return $data;

		}
				$data['branch'] = "ไม่พบ";
				$data['major'] = "ไม่พบ";
				$data['level'] = "ไม่พบ";
				return $data;
		
	}

	public function merge_quaota_exams($branchId=NULL,$stdCardID=NULL,$where_stdCardID=NULL,$search=NULL){
		//echo "(".$search.")";
		$data['exams'] = $this->query_std_exams($branchId,$stdCardID,$where_stdCardID,$search);
		//$data['exams'] = NULL;
		$data['quaota'] = $this->query_std_quaota($branchId,$stdCardID,$where_stdCardID,$search);
		//$data['quaota'] = NULL;

		
		if($data['exams']['data'] == false && $data['quaota']['data'] != false){
			$data_main = $data['quaota']['data'];
			
		}else if($data['exams']['data'] != false && $data['quaota']['data'] == false){
			$data_main= $data['exams']['data'];
		
		}else if($data['exams']['data'] == false && $data['quaota']['data'] == false){
			$data_main= false;
		
		}else{
		$data_main = array_merge($data['exams']['data'],$data['quaota']['data']);
		
		}
		$data_return['data'] = $data_main;
		$data_return['exams'] = $data['exams']['count'];
		$data_return['quaota'] = $data['quaota']['count'];
		$data_return['sum'] = $data['exams']['count']+$data['quaota']['count'];
		return $data_return;

	}

	public function std_full(){
		$data = $this->merge_quaota_exams();
		return $data;
	}

	//Dep count by std
	public function get_dep_count_by_std(){
		$query_exams = $this->admission->query("SELECT stdAdmisResult,COUNT(stdAdmisResult) AS count FROM `tblcandidate` WHERE round > '0' AND stdAdmisResult !='' GROUP BY stdAdmisResult");
		foreach ($query_exams->result_array() as $row)
		{		
				$row['count'] = intval($row['count']);
		        $row = array_merge($row,$this->get_department_by_id($row['stdAdmisResult']));
		        $data[$row['stdAdmisResult']] = $row;

		}
		
		$query_quaota = $this->admission->query("SELECT std_admis_result AS stdAdmisResult,COUNT(std_admis_result) AS count FROM `tblcandidate_q` WHERE stat_into = 0 AND comment='' AND std_admis_result != ''  GROUP BY std_admis_result");
		foreach ($query_quaota->result_array() as $row) {

			if(isset($data[$row['stdAdmisResult']]['count'])){
				$data[$row['stdAdmisResult']]['count']= intval($row['count']) + intval($data[$row['stdAdmisResult']]['count']);
			}else{
				$row = array_merge($row,$this->get_department_by_id($row['stdAdmisResult']));
		        $data[$row['stdAdmisResult']] = $row;
			}
		}//end foreach quaota;
		
		return $data;
	}
}

/* End of file Recheck_model.php */
/* Location: ./application/models/Recheck_model.php */