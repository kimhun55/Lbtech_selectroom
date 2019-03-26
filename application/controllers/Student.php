<?php set_time_limit (0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		$this->load->model('export_student_model','student');
	}

	public function index()
	{
		//	echo dirname(__FILE__);
		echo "start<br>";
		$check  = $this->student->student_export();	
		var_dump($check);
		/*echo "<pre>";
		var_dump($_SERVER);
		echo "</pre>";*/


	}


	public function file(){

		echo "file";
		

		$check = $this->student->Export_student_csv();
		var_dump($check);


		echo '<form method="get" action="'.base_url($check).'">
   <button type="submit">Download!</button>
</form>';


	}

}

/* End of file Student.php */
/* Location: ./application/controllers/Student.php */