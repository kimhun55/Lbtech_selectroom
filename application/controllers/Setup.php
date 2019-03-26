<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('setup_data_model','setup_data');
		$this->load->model('setup_group_room_model','group_room');
		$this->load->model('copyright_model','copyright');
		$this->load->helper('table');
	}

	public	function copyright($id,$status=NULL,$method=null){

		$add = MD5("add".date('ymdh'));
		if($status == $add){
			$check = $this->copyright->add_copyrigth_user($this->input->post('select'),$id);
			if($check){
					$data['content_data']['success_msg'] = "Add copyright ok"; 
				}else{
					$data['content_data']['warning_msg'] = "Error data connect admin (add)"; 
				}

		}

		$delete =  MD5("delete".date('ymdh').$id.$method);
		if($status == $delete){
			$check = $this->copyright->remove_copyrigth_user($id,$method);
			if($check){
					$data['content_data']['success_msg'] = "delete copyright ok"; 
				}else{
					$data['content_data']['warning_msg'] = "Error data connect admin (delete)"; 
				}

		}


		//set titile
	 	$this->header->get_title("Copyright User");
	 	$this->menu->get_menu_navbar("setup");

	 	$this->menu->user_copyright();


	 	//var_dump($this->menu->copyright_user);
	 	//exit();
	 	$data['content_data']['select'] = $this->copyright->get_copyright();
	 	
	 	//set data to theme
	 	$data['header_data'] = $this->header->output(); 
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data']['data'] = $this->copyright->add_copyright_in_data($this->setup_data->get_user($id));
	 	$data['content_view'] = "setup/user_copyright_management_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);

	}

	public	function set_copyright(){
		//set titile
	 	$this->header->get_title("Setup Copyright User");
	 	$this->menu->get_menu_navbar("setup");

	 	
	 	//set data to theme
	 	$data['header_data'] = $this->header->output(); 
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data']['data'] = $this->copyright->add_copyright_in_data($this->setup_data->get_user());
	 	$data['content_view'] = "setup/user_copyright_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);
	 	

	}

	public function set_user($status=NULL,$method=NULL){

		$insert = MD5("insert".date('ymdh'));
		if($status == $insert){
			//var_dump($this->input->post('user'));
			$check = $this->setup_data->insert_user($this->input->post('user'));
			if($check){
					$data['content_data']['success_msg'] = "insert data ok"; 
				}else{
					$data['content_data']['warning_msg'] = "Error data connect admin (insert)"; 
				}
		}


		$delete = MD5("delete".date('ymdh').$method);
		if($status==$delete){
			$check = $this->setup_data->delete_user($method);
			if($check){
					$data['content_data']['success_msg'] = "delete data ok"; 
				}else{
					$data['content_data']['warning_msg'] = "Error data connect admin (delete)"; 
				}
		}

		$update = MD5("update".date('ymdh').$method);
		if($status == $update){
			$check = $this->setup_data->update_user($this->input->post('user'),$method);
			if($check){
					$data['content_data']['success_msg'] = "update data ok"; 
				}else{
					$data['content_data']['warning_msg'] = "Error data connect admin (update)"; 
				}

		}

		$updateform = MD5("updateform".date('ymdh').$method);
		if($status==$updateform){
			echo 'update';
			$data_from = $this->setup_data->get_user_where_id($method);
			if($data_from !== false){
			$data['content_data']['data_user'] = $data_from;
			$data['content_data']['update'] = site_url('setup/set_user/'.MD5("update".date('ymdh').$method).'/'.$method);  
			}
		}


		//set titile
	 	$this->header->get_title("Setup Usermanagement");
	 	$this->menu->get_menu_navbar("setup");


	 	//set data to theme
	 	$data['header_data'] = $this->header->output(); 
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data']['data'] = $this->setup_data->get_user();
	 	$data['content_view'] = "setup/user_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);

	}

	public function set_department_name($status=NULL){

		$key = MD5("insert".date('ymdh'));
		if($status ==  $key){
			echo "update";
			$check = $this->setup_data->update_department_name($this->input->post('department_branchId3'));
				if($check){
					$data['content_data']['success_msg'] = "update data ok"; 
				}else{
					$data['content_data']['warning_msg'] = "Error data connect admin "; 
				}

		}

		//set titile
	 	$this->header->get_title("Setup department Name");
	 	$this->menu->get_menu_navbar("recheck");


	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data']['data'] = $this->setup_data->get_department_name();
	 	$data['content_view'] = "setup/department_name_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);

	}



	public function setup_department()
	{

		$content_data = $this->setup_data->update_tbl_department();
		$content_data = implode("<br>", $content_data);
		//set titile
	 	$this->header->get_title("Setup department");
	 	$this->menu->get_menu_navbar("recheck");


	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data']['data'] = $content_data;
	 	$data['content_view'] = "setup_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);
	}


	public function setup_branch()
	{

		$content_data = $this->setup_data->update_tbl_branch();
		$content_data = implode("<br>", $content_data);
		//set titile
	 	$this->header->get_title("Setup branch");
	 	$this->menu->get_menu_navbar("recheck");


	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data']['data'] = $content_data;
	 	$data['content_view'] = "setup_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);
	}

	public function setup_cleaning_group_status(){

		$this->setup_data->delete_data_branch_status();
		$content_data = $this->setup_data->copy_branch_to_branch_status();
		$content_data = implode("<br>", $content_data);

		$this->header->get_title("Setup cleaning group status");
	 	$this->menu->get_menu_navbar("setup");

		//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data']['data'] = $content_data;
	 	$data['content_view'] = "setup_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	$this->load->view('theme/index', $data, FALSE);

	}

	//functon set_group_room 10/2/2561---> bass
	public function set_group_room(){

		$content_data['data_department'] = $this->setup_data->get_department_name();
		if($this->input->post('department_id') != NULL){
		$content_data['data_where_department'] = $this->group_room->get_department_where_id($this->input->post('department_id'));
		$content_data['data_vocationl'] = $this->group_room->get_branch_vocational_where_branchId3($content_data['data_where_department']['department_branchId3']);
		$content_data['data_high_vocationl'] = $this->group_room->get_branch_high_vocational_where_branchId3($content_data['data_where_department']['department_branchId3']);


		$content_data['data_room_vocation'] = $this->group_room->get_room_vocation($content_data['data_vocationl']);

		$content_data['data_room_high_vocation'] = $this->group_room->get_room_high_vocation($content_data['data_high_vocationl']);
		//var_dump($content_data['data_where_department']);


		}



		//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	$data['content_data']['data'] = $content_data;
	 	$data['content_view'] = "setup/setup_group_room_view";

	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	$this->load->view('theme/index', $data, FALSE);
	}


}

/* End of file Setup.php */
/* Location: ./application/controllers/Setup.php */