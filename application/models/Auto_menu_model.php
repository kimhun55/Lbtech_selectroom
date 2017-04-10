<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auto_menu_model extends CI_Model {

	//data user
	public $name;
	public $id;
	public $username;
	public $menu_navbar;


	public $menu_vocational;
	public $menu_high_vocational;

	public $copyright_user;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('branch_model','branch');
		$this->get_user();
		$this->user_copyright();
		

	}

	public function get_id(){
		return $this->id;
	}

	/*------------ status check menu -------------*/
	public function get_branch_status($branchId){
		$this->db->where('branch_id',$branchId);
		$this->db->select('branch_status');
		$query = $this->db->get('branch_status');
		if($query->num_rows() == 0)
			return false;

		$row = $query->row_array();

		return $row['branch_status'];

	}
	public  function	get_menu_vocational($page=NULL){
		if($this->copyright_user === false){
			return $this->menu_vocational = false;
		}

		$query = $this->db->query("SELECT * FROM branch WHERE level = 'ปวช.' AND branchId3 IN('".implode("','",$this->copyright_user)."') ORDER BY branchId");
		foreach($query->result_array() as $row) {
			if($page == 'horizontal'){
			$std_full = $this->branch->menu_std_full($row['branchId']);
			$row['std_full'] = $std_full['count'];
			$std_no_room = $this->branch->menu_std_no_room($row['branchId']);
			$row['std_no_room'] = $std_no_room['count'];
			}
			$row['status'] = $this->get_branch_status($row['branchId']);

			$data[] = $row;

		}

		if($query->num_rows() == 0){
			return false;
		}
		$this->menu_vocational  = $data;
		return true;

	}

	public function	 get_high_vocational($page=NULL){
		if($this->copyright_user === false){
			return $this->menu_high_vocational = false;
		}

		$query = $this->db->query("SELECT * FROM branch WHERE level = 'ปวส.' AND branchId3 IN('".implode("','",$this->copyright_user)."') ORDER BY branchId");
		foreach ($query->result_array() as $row) {
			if($page == 'horizontal'){
			$std_full = $this->branch->menu_std_full($row['branchId']);
			$row['std_full'] = $std_full['count'];
			$std_no_room = $this->branch->menu_std_no_room($row['branchId']);
			$row['std_no_room'] = $std_no_room['count'];
			}
			$row['status'] = $this->get_branch_status($row['branchId']);
			$data[] = $row;
		}

		@$this->menu_high_vocational  = $data;
		return true;

	}


	public	function user_copyright(){
		if($this->id ==""){
			return $this->copyright_user = false;
		}
		
		$query = $this->db->query("SELECT branchId3 FROM users_copyright WHERE u_id ='".$this->id."'");
		if($query->num_rows() == '0'){
			return $this->copyright_user = false;
		}
		foreach ($query->result_array() as $row) {
			$data[] = $row['branchId3'];
		}
		//echo $this->db->last_query();
		//var_dump($data);
		//exit();
		return $this->copyright_user = $data;
		
	}
	

	/*------------ status check menu -------------*/




	public function get_user(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $this->username = $session_data['username'];
		    $this->name = $session_data['name'];
		    $this->id = $session_data['id'];
		}
		return true;
	}

	public function get_menu_navbar($name){
		if($name == ""){
			$this->menu_navbar = 'home';
		}else{
			$this->menu_navbar = $name;
		}
	}

	public function auto_check_login(){
		if($this->id == ""){
			redirect('login', 'refresh');
		}
	}

	public function output($page=NULL){
		$this->get_menu_vocational($page);
		$this->get_high_vocational($page);
		$data['name'] = $this->name;
		$data['id'] = $this->id;
		$data['username'] = $this->username;
		$data['menu_navbar'] = $this->menu_navbar;
		$data['menu_vocational'] = $this->menu_vocational;
		$data['menu_high_vocational'] = $this->menu_high_vocational;
		$data['copyright_user'] = $this->copyright_user;
		return $data;
	}

	//auto theme menu active 
	public function active_menu($menu_navbar,$menu){
		if(strtolower($menu_navbar) == strtolower($menu)){
			return "active";
		}else{
			return "";
		}
	}

}

/* End of file Auto_menu_model.php */
/* Location: ./application/models/Auto_menu_model.php */