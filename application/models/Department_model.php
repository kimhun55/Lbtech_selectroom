<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		//$this->load->model('recheck_model','recheck');
	}

    public function get_department(){
        $this->db->where('department_branchId3 !=',999);
        $query = $this->db->get('department');
        $row = $query->num_rows();
        if($row == 0 ){
            return false; 
        }

        foreach ($query->result_array() as $row)
        {           
            $data[] = $row;
        }

        return $data;
    }

    public function save_department(){
        $data_insert = array(
            'department_branchId3' => $this->input->post('department_branchId3'),
            'department_name' => $this->input->post('department_name'),
        );
        $this->db->insert('department',$data_insert);
        return $this->db->insert_id();
    }

    public function get_department_by_id($id){

        $query = $this->db->get('department');
        $row = $query->num_rows();
        if($row == 0 ){
            return false; 
        }

        return $query->row_array();
    }

    public function get_department_by_branchid3($branch_id_3){
        $this->db->where('department_branchId3',$branch_id_3);
        $query = $this->db->get('department');
        $row = $query->num_rows();
        if($row == 0 ){
            return false; 
        }

        return $query->row_array();
    }

    public function update_department(){
        $data_update = array(
            'department_branchId3' => $this->input->post('department_branchId3'),
            'department_name' => $this->input->post('department_name'),
        );
        $this->db->where('department_id',$this->input->post('department_id'));
        $this->db->set($data_update);
        $this->db->update('department');
        return $this->input->post('department_id');
    }

    public function get_branch_by_branchid3($branch_id_3){
        $this->db->where('branchId3',$branch_id_3);
        $this->db->order_by('branchId','ASC');
        $query = $this->db->get('branch');
        $row = $query->num_rows();
        if($row == 0 ){
            return false; 
        }

        foreach ($query->result_array() as $row)
        {           
            $row['count'] = $this->get_count_groupid_by_branch_id($row['branchId']);
            $data[] = $row;
        }

        return $data;
    }

    public function get_count_groupid_by_branch_id($branch_id){
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('tblgroup_id');
        return $query->num_rows();

    }


    public function get_branch_by_branchid($branch_id){
        $this->db->where('branchId',$branch_id);
        $query = $this->db->get('branch');
        $row = $query->num_rows();
        if($row == 0 ){
            return false; 
        }
        return $query->row_array();

    }


    public function get_group_by_branchid($branch_id){
        $this->db->where('branch_id',$branch_id);
        $this->db->order_by('group_no','ASC');
        $query = $this->db->get('tblgroup_id');
        $row = $query->num_rows();
        if($row == 0 ){
            return false; 
        }

        foreach ($query->result_array() as $row)
        {           
            $data[] = $row;
        }

        return $data;
    }

    public function get_group_by_group_id($group_id){
        $this->db->where('group_id',$group_id);
        $query = $this->db->get('tblgroup_id');
        $row = $query->num_rows();
        if($row == 0 ){
            return false; 
        }
        return $query->row_array();


    }

    public function group_update(){
        $data_update = array(
            'group_id' => $this->input->post('group_id'),
            'group_name' => $this->input->post('group_name'),
            'branch_id' => $this->input->post('branch_id'),
            'branch_name' => $this->input->post('branch_name'),
            'course_id' => $this->input->post('course_id'),
            'course' => $this->input->post('course'),
            'major_id' => $this->input->post('major_id'),
            'major_name' => $this->input->post('major_name'),
            'level_id' => $this->input->post('level_id'),
            'level_name' => $this->input->post('level_name'),
            'group_no' => $this->input->post('group_no'),
            'branch_nickname' => $this->input->post('branch_nickname'),
            'typeOfCourseId' => $this->input->post('typeOfCourseId'),
            'typeOfCourse' => $this->input->post('typeOfCourse'),
            'teacher_fname' => $this->input->post('teacher_fname'),
            'teacher_lname' => $this->input->post('teacher_lname'),
            'status' => $this->input->post('status'),
        );
        $this->db->where('group_id',$this->input->post('id'));
        $this->db->set($data_update);
        $this->db->update('tblgroup_id');
        return true;
    }

    public function group_add_save(){
        $data = array(
            'group_id' => $this->input->post('group_id'),
            'group_name' => $this->input->post('group_name'),
            'branch_id' => $this->input->post('branch_id'),
            'branch_name' => $this->input->post('branch_name'),
            'course_id' => $this->input->post('course_id'),
            'course' => $this->input->post('course'),
            'major_id' => $this->input->post('major_id'),
            'major_name' => $this->input->post('major_name'),
            'level_id' => $this->input->post('level_id'),
            'level_name' => $this->input->post('level_name'),
            'group_no' => $this->input->post('group_no'),
            'branch_nickname' => $this->input->post('branch_nickname'),
            'typeOfCourseId' => $this->input->post('typeOfCourseId'),
            'typeOfCourse' => $this->input->post('typeOfCourse'),
            'teacher_fname' => $this->input->post('teacher_fname'),
            'teacher_lname' => $this->input->post('teacher_lname'),
            'status' => $this->input->post('status'),
        );
        $this->db->insert('tblgroup_id',$data);
        return true;

    }

    public function branch_update(){
        $data_update = array(
            'branchId' => $this->input->post('branchId'),
            'branch' => $this->input->post('branch'),
            'typeOfCourse' => $this->input->post('typeOfCourse'),
            'level' => $this->input->post('level'),
            'level_id' => $this->input->post('level_id'),
            'course' => $this->input->post('course'),
            'branchId3' => $this->input->post('branchId3'),
            'groupNickName' => $this->input->post('groupNickName'),
            'status' => $this->input->post('status'),
        );
        $this->db->where('branchId',$this->input->post('id'));
        $this->db->set($data_update);
        $this->db->update('branch');
        return true;
    }

    public function branch_save(){
        $data = array(
            'branchId' => $this->input->post('branchId'),
            'branch' => $this->input->post('branch'),
            'typeOfCourse' => $this->input->post('typeOfCourse'),
            'level' => $this->input->post('level'),
            'level_id' => $this->input->post('level_id'),
            'course' => $this->input->post('course'),
            'branchId3' => $this->input->post('branchId3'),
            'groupNickName' => $this->input->post('groupNickName'),
            'status' => $this->input->post('status'),
        );
        $this->db->insert('branch',$data);
        return true;

    }


}
?>