<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auto_header_model extends CI_Model {

	public $title;

	public function get_title($name){
		if($name == ""){
			$this->title = "system room";
		}else{
			$this->title = $name;
		}
	}	

	public function output(){
		$data['title'] = $this->title;
		return $data;
	}
}

/* End of file Auto_header_model.php */
/* Location: ./application/models/Auto_header_model.php */