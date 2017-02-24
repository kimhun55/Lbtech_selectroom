<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->library('form_validation');
                $this->load->model('login_model');
               
        }

	public function index(){

	$data = $this->session->userdata('logged_in');
	if($data['id'] != NULL && $data != ''){
			 redirect('home', 'refresh');
	}else{
			$this->load->view('login_view');
			}
	}

	public function check_login(){
		//set 
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

                if ($this->form_validation->run() == FALSE)
                {
                      $this->load->view('login_view');
                }
                else
                {
                	 redirect('home', 'refresh');	
                }

	}

	public function check_database($password){
		//input usernmae
		$username = $this->input->post('username');
		//query  data check 
		$result  = $this->login_model->login($username,$password);
		if($result){
			$sess_array = array();
	     foreach($result as $row){
			       $sess_array = array(
			         'id' => $row->u_id,
			         'username' => $row->u_username,
			         'name' => $row->u_name
			       );
	      		 $this->session->set_userdata('logged_in', $sess_array);
	   		}
	   		return TRUE;
		}else{

			 $this->form_validation->set_message('check_database', 'ไมพบ username และ password ในระบบ');
     		return false;

		}
	}

	public function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('login', 'refresh');
	 }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
