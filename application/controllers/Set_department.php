<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Set_department extends CI_Controller {
	public function __construct(){
                parent::__construct();
                $this->menu->auto_check_login();
                //$this->load->helper('home_helper');
                $this->load->model('Department_model','department');
    }

    public function index(){
      
        $content_data['table'] = $this->department->get_department();
        //set titile
	 	$this->header->get_title("Department Table");
	 	$this->menu->get_menu_navbar("department");


	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data'] = $content_data;
	 	$data['content_view'] = "set_department/department_main";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);
    }


    public function branch_main($branch_id_3){
        $content_data['table'] = $this->department->get_branch_by_branchid3($branch_id_3);
        $content_data['departmant'] = $this->department->get_department_by_branchid3($branch_id_3);
        $content_data['branchId3'] = $branch_id_3;
        //set titile
	 	$this->header->get_title("branch Table");
	 	$this->menu->get_menu_navbar("department");


	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data'] = $content_data;
	 	$data['content_view'] = "set_department/branch_main";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);
    }

    public function branch_edit_form($branchId,$branchId3){
        $content_data['data'] = $this->department->get_branch_by_branchid($branchId);
        $content_data['branchId3'] = $branchId3;

        $this->header->get_title("branch Edit");
	 	$this->menu->get_menu_navbar("department");
	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data'] = $content_data;
	 	$data['content_view'] = "set_department/branch_edit_form";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);

    }
    public function branch_edit_save(){
        $this->department->branch_update();
        redirect('set_department/branch_main/'.$this->input->post('branchId3'));
    }

    public function branch_add_form($branchId3){
        $content_data['branchId3'] = $branchId3;

        $this->header->get_title("branch Edit");
	 	$this->menu->get_menu_navbar("department");
	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data'] = $content_data;
	 	$data['content_view'] = "set_department/branch_add_form";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);
    }

    public function branch_add_save(){
        $this->department->branch_save();
        redirect('set_department/branch_main/'.$this->input->post('branchId3'));
    }

    public function group_main($branchid){
        $content_data['table'] = $this->department->get_group_by_branchid($branchid);
        $content_data['branch'] = $this->department->get_branch_by_branchid($branchid);
        $content_data['branchid'] = $branchid;
        //set titile
	 	$this->header->get_title("group Table");
	 	$this->menu->get_menu_navbar("department");


	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data'] = $content_data;
	 	$data['content_view'] = "set_department/group_main";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);
    }

    public function group_edit_form($group_id,$branchid){
        $content_data['data'] = $this->department->get_group_by_group_id($group_id);
        $content_data['branchid'] = $branchid;
        //$content_data['branch'] = $this->department->get_branch_by_branchid($branchid);
        //set titile
	 	$this->header->get_title("group edit");
	 	$this->menu->get_menu_navbar("department");


	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data'] = $content_data;
	 	$data['content_view'] = "set_department/group_edit_form";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);

    }

    public function group_edit_save(){
        $this->department->group_update();
        redirect('set_department/group_main/'.$this->input->post('branchid'));
    }

    public function group_add_form($branchid){
        $content_data['branchid'] = $branchid;
        $content_data['data'] = $this->department->get_branch_by_branchid($branchid);


        $this->header->get_title("group add");
	 	$this->menu->get_menu_navbar("department");


	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data'] = $content_data;
	 	$data['content_view'] = "set_department/group_add_form";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);

    }

    public function group_add_save(){
        $this->department->group_add_save();
        redirect('set_department/group_main/'.$this->input->post('branchid'));
    }

    public function group_delete($group_id,$branch_id){
        $this->db->where('group_id',$group_id);
        $this->db->delete('tblgroup_id');
        redirect('set_department/group_main/'.$branch_id);
        exit();
    }
}