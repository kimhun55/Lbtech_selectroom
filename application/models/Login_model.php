<?php 
class Login_model extends CI_Model {
	 public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
	public function check_user_login(){
		$query = $this->db->get_where('user', array('u_username' => $this->input->post('username'),'u_password'=> $this->input->post("password")));
		$row = $query->num_rows();
		if($row == 1){
				$data_query = $query->row_array();

				if (isset($data_query))
				{
				         $data['u_id'] = $data_query['u_id'];
				         $data['u_name'] = $data_query['u_name'];
				         $data['u_tel'] = $data_query['u_tel'];
				         return $data;
				}

		}
		return false;
	} 
	public function login($username, $password)
	 {
		   $this -> db -> select('u_id,u_username,u_name, u_tel');
		   $this -> db -> from('users');
		   $this -> db -> where('u_username', $username);
		   $this -> db -> where('u_password', $password);
		   $this -> db -> limit(1);
		 
		   $query = $this -> db -> get();
		 
		   if($query -> num_rows() == 1)
		   {
		     return $query->result();
		   }
		   else
		   {
		     return false;
		   }
		 }   

	}
