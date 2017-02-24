<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
                parent::__construct();
                $this->menu->auto_check_login();
                $this->load->helper('home_helper');

    }
	
	public	function index($page=NULL)
	 {
	 	//set titile
	 	$this->header->get_title("home system");
	 	$this->menu->get_menu_navbar("home");

	 	$data_user = $this->menu->output($page);


	 	$data['content_data']['menu_vocational'] = $data_user['menu_vocational'];
	 	$data['content_data']['menu_high_vocational'] = $data_user['menu_high_vocational'];

	 	//set data to theme
	 	$data['header_data'] = $this->header->output();
	 	$data['menu_data'] = $this->menu->output();
	 	//$data['content_data'] = NULL;
	 	if($page == NULL){
	 			$data['content_view'] = "home_view";
	 	}else if($page == "horizontal"){
	 		$data['content_view'] = "home_horizontal_view";
	 	}else{
	 		$data['content_view'] = "home_view";
	 	}
	 	$data['footer_data'] = NULL;
		//var_dump($data['menu_data']);
	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);

	     
	 }

	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */