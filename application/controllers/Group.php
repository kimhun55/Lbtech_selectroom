 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		$this->load->model('branch_model');
		$this->load->helper('table_helper');
		$this->load->helper('form_group_helper');
		 $this->load->helper('file');
		 $this->load->model('import_group_model','import');
	}


	public function setup($branch,$status=NULL){
		
		if($status == 'groupcount'){
			
			$check = $this->branch_model->update_group_count($branch,$this->input->post('group_count'));
				
				if($check){
					
					redirect('/group/zonebranch/'.$branch.'/updategroupcount','refresh');
					exit();
				}else{
					$data['content_data']['warning_msg'] = "Error data connect admin (update group_count)"; 
				}
			
		}


		$data['content_data']['action_group_count'] = site_url('group/setup/'.$branch.'/groupcount');
		$data['content_data']['data'] = $this->branch_model->get_branch_data_dy_id($branch);
		//set titile
	 	$this->header->get_title("Setup Group Main");
	 	$this->menu->get_menu_navbar($data['content_data']['data']['level']);


	 	$data['content_data']['menu']['menu_data'] = $this->branch_model->output_menu($branch,1);
	 	$data['content_data']['menu']['branch'] = $branch;
	 	//set data to theme
	 	$data['header_data'] = $this->header->output(); 
	 	$data['menu_data'] = $this->menu->output();
	 	
	 	$data['content_view'] = "group/group_setup_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);
	}

	public function zonebranch($branch=NULL,$result=NULL)
	{
		if($branch == NULL){
			redirect('home', 'refresh');
			exit();	
		}

		if($result == 'updategroupcount'){
			$data['content_data']['success_msg'] = "Update groupcount ok"; 
		}

		if($result== 'selecttrue'){
			$data['content_data']['success_msg'] = "Std Select  ok"; 
		}

		if($result== 'selectfalse'){
			$data['content_data']['warning_msg'] = "Std Select  error (admin)"; 
		}
		
		/*if($this->branch_model->check_set_group($branch) == true){
			redirect('group/setup/'.$branch,'refresh');
			exit();
		}*/

		if($this->input->post('search') != NULL && $this->input->post('search') != ""){
			$search = trim($this->input->post('search'));
			//echo $search;
		}else{
			$search = NULL;
		}

		$data['content_data']['search_form_action'] = site_url('group/zonebranch/'.$branch);

		$data['content_data']['menu']['room'] = 'full';
		$data['content_data']['data_table'] = $this->branch_model->get_std_full($branch,$search);
		
		$data['content_data']['data_group_count_array'] =$this->branch_model->get_group_count($branch);

		$data['content_data']['form_action'] = site_url('group/stdselectroom/'.$branch);
		$data['content_data']['form_callback'] = 'group/zonebranch/'.$branch;
		//var_dump($data['content_data']['data_table']);
		$data['content_data']['data'] = $this->branch_model->get_branch_data_dy_id($branch);
		//set titile

		/*--- value stust --*/	
		$data['content_data']['status'] = $this->menu->get_branch_status($branch);
		$data['content_data']['menu']['status'] = $data['content_data']['status'] ;


	 	$this->header->get_title("Setup Group Main");
	 	$this->menu->get_menu_navbar($data['content_data']['data']['level']);

	 	$data['content_data']['menu']['menu_data'] = $this->branch_model->output_menu($branch);
	 	$data['content_data']['menu']['branch'] = $branch;
	 	$data['content_data']['menu']['user_copyright'] = $this->menu->user_copyright();
	 	//set data to theme
	 	$data['header_data'] = $this->header->output(); 
	 	$data['menu_data'] = $this->menu->output();
	 	
	 	$data['content_view'] = "group/group_main_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);

		
		
	}

	public function	nogroup($branch,$result=NULL){

		if($result == 'updategroupcount'){
			$data['content_data']['success_msg'] = "Update groupcount ok"; 
		}

		if($result== 'selecttrue'){
			$data['content_data']['success_msg'] = "Std Select  ok"; 
		}

		if($result== 'selectfalse'){
			$data['content_data']['warning_msg'] = "Std Select  error (admin)"; 
		}

		if($this->input->post('search') != NULL && $this->input->post('search') != ""){
			$search = trim($this->input->post('search'));
			//echo $search;
		}else{
			$search = NULL;
		}

		$stdCardID = $this->branch_model->get_stdCardid_by_branchid($branch);
		$data['content_data']['data_table'] = $this->recheck->merge_quaota_exams($branch,$stdCardID,NULL,$search);
		
		$data['content_data']['data_group_count_array'] =$this->branch_model->get_group_count($branch);

		$data['content_data']['search_form_action'] = site_url('group/nogroup/'.$branch);

		$data['content_data']['menu']['room'] = 'noroom';


		$data['content_data']['form_action'] = site_url('group/stdselectroom_array/'.$branch);
		$data['content_data']['form_callback'] = 'group/nogroup/'.$branch;
		//var_dump($data['content_data']['data_table']);
		$data['content_data']['data'] = $this->branch_model->get_branch_data_dy_id($branch);
		//set titile
	 	$this->header->get_title("Setup Group Main");
	 	$this->menu->get_menu_navbar($data['content_data']['data']['level']);


	 	$data['content_data']['status'] = $this->menu->get_branch_status($branch);
		$data['content_data']['menu']['status'] = $data['content_data']['status'] ;
		$data['content_data']['menu']['user_copyright'] = $this->menu->user_copyright();

	 	$data['content_data']['menu']['menu_data'] = $this->branch_model->output_menu($branch);
	 	$data['content_data']['menu']['branch'] = $branch;
	 	//set data to theme
	 	$data['header_data'] = $this->header->output(); 
	 	$data['menu_data'] = $this->menu->output();
	 	
	 	$data['content_view'] = "group/group_nogroup_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);


	}

	public function room($branch,$room,$result=NULL){
		if($result == 'updategroupcount'){
			$data['content_data']['success_msg'] = "Update groupcount ok"; 
		}

		if($result== 'selecttrue'){
			$data['content_data']['success_msg'] = "Std Select  ok"; 
		}

		if($result== 'selectfalse'){
			$data['content_data']['warning_msg'] = "Std Select  error (admin)"; 
		}


		if($this->input->post('search') != NULL && $this->input->post('search') != ""){
			$search = trim($this->input->post('search'));
			//echo $search;
		}else{
			$search = NULL;
		}
		$data['content_data']['search_form_action'] = site_url('group/room/'.$branch.'/'.$room);

		$stdCardID = $this->branch_model->get_group_count_by_room($branch,$room,1);
		//var_dump($stdCardID);
		$data_table= $this->recheck->merge_quaota_exams($branch,$stdCardID,1,$search);
		$data['content_data']['data_table'] = $this->branch_model->add_std_group_room($branch,$data_table);

		$data['content_data']['data_room'] = $room;
		/*echo "<pre>";
		var_dump($data['content_data']['data_table']);
		echo "</pre>";*/

		$data['content_data']['status'] = $this->menu->get_branch_status($branch);
		$data['content_data']['menu']['status'] = $data['content_data']['status'] ;

		$data['content_data']['data_group'] = $this->branch_model->get_tblgroup_id_by_group_no($branch,$room);

		
		$data['content_data']['data_group_count_array'] =$this->branch_model->get_group_count($branch);

		$data['content_data']['form_action'] = site_url('group/stdselectroom/'.$branch);
		$data['content_data']['form_callback'] = 'group/room/'.$branch."/".$room;
		//var_dump($data['content_data']['data_table']);
		$data['content_data']['data'] = $this->branch_model->get_branch_data_dy_id($branch);
		//set titile
	 	$this->header->get_title("Setup Group Main");
	 	$this->menu->get_menu_navbar($data['content_data']['data']['level']);

	 	$data['content_data']['menu']['menu_data'] = $this->branch_model->output_menu($branch);
	 	$data['content_data']['menu']['branch'] = $branch;
	 	$data['content_data']['menu']['room'] = $room;
	 	$data['content_data']['menu']['user_copyright'] = $this->menu->user_copyright();
	 	//set data to theme
	 	$data['header_data'] = $this->header->output(); 
	 	$data['menu_data'] = $this->menu->output();
	 	
	 	$data['content_view'] = "group/group_room_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	
	 	$this->load->view('theme/index', $data, FALSE);

	}


	public function do_impostroom($branch,$result=NULL){
				$config['upload_path']          = './upload/';
                $config['allowed_types']        = 'csv|txt';
                $config['max_size']             = 1000;
          

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('fileinput'))
                {
                	redirect('group/impostroom/'.$branch.'/false/'.urlencode($this->upload->display_errors()),'refresh');
                }
                else
                {
                        $upload_data = $this->upload->data();
 						//rename
 						$file_name = $upload_data['raw_name']."_".$branch."_".date("Y_m_d_H_i_s_")."_".$this->menu->id.$upload_data['file_ext'];
 						rename($config['upload_path'].$upload_data['file_name'],$config['upload_path'].$file_name);
 						$data_file = $this->import->read_data_file($config['upload_path'].$file_name);
 						echo "<pre>";
 						//var_dump($this->import->check_mat_data($branch,$data_file));
 						//var_dump($data_file);
 						echo "</pre>";
 						//exit();
 		$data['content_data']['std_group'] = $this->input->post('std_group');
 		$data['content_data']['data_table'] = $this->import->check_mat_data($branch,$data_file);


 		$data['content_data']['data_group_count_array'] =$this->branch_model->get_group_count($branch);

		$data['content_data']['form_action'] = site_url('group/stdselectroom_inportfile/'.$branch);
		$data['content_data']['form_callback'] = 'group/impostroom/'.$branch;
		$data['content_data']['data'] = $this->branch_model->get_branch_data_dy_id($branch);
	
	 	$this->header->get_title("Setup Group Main");
	 	$this->menu->get_menu_navbar($data['content_data']['data']['level']);

	 	$data['content_data']['menu']['menu_data'] = $this->branch_model->output_menu($branch);
	 	$data['content_data']['menu']['branch'] = $branch;
	 	$data['content_data']['menu']['room'] = 'Import';
	 	
	 	$data['header_data'] = $this->header->output(); 
	 	$data['menu_data'] = $this->menu->output();
	 	
	 	$data['content_view'] = "group/group_import_form_view";
	 	$data['footer_data'] = NULL;
	 	
	 	$this->load->view('theme/index', $data, FALSE);
 						


                       
                }

	}


	public function impostroom($branch,$result=NULL,$warning_msg=NULL){
		if($result == 'roomtrue'){
			$data['content_data']['success_msg'] = "ทำการเพิ่มข้อมูลเรียบร้อย "; 
		}
		if($result == 'roomfalsearray'){
			$data['content_data']['warning_msg'] = "ไม่สามารถเพิ่มข้อมูลได้ count "; 
		}
		if($result == 'roomfalse'){
			$data['content_data']['warning_msg'] = "ไม่สามารถเพิ่มข้อมูลได้ sql"; 
		}
		if($result == 'false'){
			$data['content_data']['warning_msg'] = $warning_msg; 
		}
		
		$data['content_data']['data_group_count_array'] =$this->branch_model->get_group_count($branch);

		$data['content_data']['form_action'] = site_url('group/do_impostroom/'.$branch);
		$data['content_data']['form_callback'] = 'group/impostroom/'.$branch;
		$data['content_data']['data'] = $this->branch_model->get_branch_data_dy_id($branch);
	
	 	$this->header->get_title("Setup Group Main");
	 	$this->menu->get_menu_navbar($data['content_data']['data']['level']);

	 	$data['content_data']['menu']['menu_data'] = $this->branch_model->output_menu($branch);
	 	$data['content_data']['menu']['branch'] = $branch;
	 	$data['content_data']['menu']['room'] = 'Import';

	 	$data['content_data']['status'] = $this->menu->get_branch_status($branch);
		$data['content_data']['menu']['status'] = $data['content_data']['status'] ;
		$data['content_data']['menu']['user_copyright'] = $this->menu->user_copyright();
	 	
	 	$data['header_data'] = $this->header->output(); 
	 	$data['menu_data'] = $this->menu->output();
	 	
	 	$data['content_view'] = "group/group_import_form_view";
	 	$data['footer_data'] = NULL;
	 	
	 	$this->load->view('theme/index', $data, FALSE);

	}

	public function stdselectroom($branchId){

	if( $this->input->post('std_group') == NULL){
			redirect($this->input->post('form_callback')."/selectfalse",'refresh');
			exit();
	}

		if($this->input->post('std_group') == 99){
			$data_detele = array(
			'stdCardID' => $this->input->post('stdCardID'),
			'stdApplyNo'=> $this->input->post('stdApplyNo'),
			'branchId'  => $branchId,
			);

			$check = $this->branch_model->delete_std_group($data_detele,$this->menu->get_id());
			if($check){
			
					redirect($this->input->post('form_callback')."/selecttrue",'refresh');
					exit();
				}else{
					exit('error');
					redirect($this->input->post('form_callback')."/selectfalse",'refresh');
					exit();
				}
		}


		$data = array(
			'stdCardID' => $this->input->post('stdCardID'),
			'stdApplyNo'=> $this->input->post('stdApplyNo'),
			'branchId'  => $branchId,
			'std_group' => $this->input->post('std_group'),
			'std_datetime' => date("Y-m-d H:i:s"),
			'u_id' => $this->menu->get_id()
			);

		$check = $this->branch_model->replace_std_group($data);
		if($check){
			
			redirect($this->input->post('form_callback')."/selecttrue",'refresh');
			exit();
		}else{
			
			redirect($this->input->post('form_callback')."/selectfalse",'refresh');
			exit();
		}

	}

	public function stdselectroom_array($branchId){

		

		if( $this->input->post('std_group') == NULL){
			redirect($this->input->post('form_callback')."/selectfalse",'refresh');
			exit();
		}

		$std_group =$this->input->post('std_group');

		foreach ($this->input->post('std') as $key => $value) {
			$id = explode(',',$value);
			$stdCardID = $id[0];
			$stdApplyNo = $id[1];

			$data = array(
			'stdCardID' => $stdCardID,
			'stdApplyNo'=> $stdApplyNo,
			'branchId'  => $branchId,
			'std_group' => $std_group,
			'std_datetime' => date("Y-m-d H:i:s"),
			'u_id' => $this->menu->get_id()
			);

		$check = $this->branch_model->replace_std_group($data);
		if(!$check){
			redirect($this->input->post('form_callback')."/selectfalse",'refresh');
			exit();
		}//end if

		
		}


			redirect($this->input->post('form_callback')."/selecttrue",'refresh');
			exit();

	}

	public function stdselectroom_inportfile($branchId){

		$data = $this->input->post('std_group');

		foreach ($data as $key => $value) {
			//echo "key : " .$key ." || value : ".$value."<br>";
			$id = explode('A',$key);
			if(count($id) != 2){
				redirect($this->input->post('form_callback')."/roomfalsearray/",'refresh');
			exit();
			}
			$stdCardID = $id[0];
			$stdApplyNo = $id[1];

			$data = array(
			'stdCardID' => $stdCardID,
			'stdApplyNo'=> $stdApplyNo,
			'branchId'  => $branchId,
			'std_group' => $value,
			'std_datetime' => date("Y-m-d H:i:s"),
			'u_id' => $this->menu->get_id()
			);

			$check = $this->branch_model->replace_std_group($data);
		if(!$check){
			redirect($this->input->post('form_callback')."/roomfalse/",'refresh');
			exit();
		}//end if
		}

		redirect($this->input->post('form_callback')."/roomtrue/",'refresh');
			exit();

	}


	public function quaota($branch=NULL,$result=NULL)
	{
		if($branch == NULL){
			redirect('home', 'refresh');
			exit();	
		}

		if($result == 'updategroupcount'){
			$data['content_data']['success_msg'] = "Update groupcount ok"; 
		}

		if($result== 'selecttrue'){
			$data['content_data']['success_msg'] = "Std Select  ok"; 
		}

		if($result== 'selectfalse'){
			$data['content_data']['warning_msg'] = "Std Select  error (admin)"; 
		}
		
		/*if($this->branch_model->check_set_group($branch) == true){
			redirect('group/setup/'.$branch,'refresh');
			exit();
		}*/

		if($this->input->post('search') != NULL && $this->input->post('search') != ""){
			$search = trim($this->input->post('search'));
			//echo $search;
		}else{
			$search = NULL;
		}

		$data['content_data']['search_form_action'] = site_url('group/quaota/'.$branch);

		$data['content_data']['menu']['room'] = 'quaota';
		//$data['content_data']['data_table'] = $this->branch_model->get_std_full($branch,$search);
		$data['content_data']['data_table'] = $this->branch_model->get_std_quaota($branch,$search);
		
		
		$data['content_data']['data_group_count_array'] =$this->branch_model->get_group_count($branch);

		$data['content_data']['form_action'] = site_url('group/selectgroup/'.$branch);
		$data['content_data']['form_callback'] = 'group/quaota/'.$branch;
		//var_dump($data['content_data']['data_table']);
		$data['content_data']['data'] = $this->branch_model->get_branch_data_dy_id($branch);
		//set titile

		/*--- value stust --*/	
		$data['content_data']['status'] = $this->menu->get_branch_status($branch);
		$data['content_data']['menu']['status'] = $data['content_data']['status'] ;


	 	$this->header->get_title("Setup Std quaota");
	 	$this->menu->get_menu_navbar($data['content_data']['data']['level']);

	 	$data['content_data']['menu']['menu_data'] = $this->branch_model->output_menu($branch);
	 	$data['content_data']['menu']['branch'] = $branch;
	 	$data['content_data']['menu']['user_copyright'] = $this->menu->user_copyright();
	 	//set data to theme
	 	$data['header_data'] = $this->header->output(); 
	 	$data['menu_data'] = $this->menu->output();
	 	
	 	$data['content_view'] = "group/group_quaota_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);

		
		
	}

	public function exams($branch=NULL,$result=NULL)
	{
		if($branch == NULL){
			redirect('home', 'refresh');
			exit();	
		}

		if($result == 'updategroupcount'){
			$data['content_data']['success_msg'] = "Update groupcount ok"; 
		}

		if($result== 'selecttrue'){
			$data['content_data']['success_msg'] = "Std Select  ok"; 
		}

		if($result== 'selectfalse'){
			$data['content_data']['warning_msg'] = "Std Select  error (admin)"; 
		}
		
		/*if($this->branch_model->check_set_group($branch) == true){
			redirect('group/setup/'.$branch,'refresh');
			exit();
		}*/

		if($this->input->post('search') != NULL && $this->input->post('search') != ""){
			$search = trim($this->input->post('search'));
			//echo $search;
		}else{
			$search = NULL;
		}

		$data['content_data']['search_form_action'] = site_url('group/exams/'.$branch);

		$data['content_data']['menu']['room'] = 'exams';
		//$data['content_data']['data_table'] = $this->branch_model->get_std_full($branch,$search);
		$data['content_data']['data_table'] = $this->branch_model->get_std_exams($branch,$search);
		
		
		$data['content_data']['data_group_count_array'] =$this->branch_model->get_group_count($branch);

		$data['content_data']['form_action'] = site_url('group/selectgroup/'.$branch);
		$data['content_data']['form_callback'] = 'group/exams/'.$branch;
		//var_dump($data['content_data']['data_table']);
		$data['content_data']['data'] = $this->branch_model->get_branch_data_dy_id($branch);
		//set titile

		/*--- value stust --*/	
		$data['content_data']['status'] = $this->menu->get_branch_status($branch);
		$data['content_data']['menu']['status'] = $data['content_data']['status'] ;


	 	$this->header->get_title("Setup Std quaota");
	 	$this->menu->get_menu_navbar($data['content_data']['data']['level']);

	 	$data['content_data']['menu']['menu_data'] = $this->branch_model->output_menu($branch);
	 	$data['content_data']['menu']['branch'] = $branch;
	 	$data['content_data']['menu']['user_copyright'] = $this->menu->user_copyright();
	 	//set data to theme
	 	$data['header_data'] = $this->header->output(); 
	 	$data['menu_data'] = $this->menu->output();
	 	
	 	$data['content_view'] = "group/group_exams_view";
	 	$data['footer_data'] = NULL;
	 	//var_dump($data);

	 	//load view
	 	$this->load->view('theme/index', $data, FALSE);

		
		
	}



	public function selectgroup($branchId){

	if( $this->input->post('std_group') == NULL){
			redirect($this->input->post('form_callback')."/selectfalse",'refresh');
			exit();
	}
	$data = $this->input->post('std_group');
	foreach ($data as $stdCardID => $data2) {
		foreach ($data2 as $stdApplyNo => $std_group) {
			# code...
		


		if($std_group == 99){
			$data_detele = array(
			'stdCardID' => $stdCardID,
			'stdApplyNo'=> $stdApplyNo,
			'branchId'  => $branchId,
			);

			$check = $this->branch_model->delete_std_group($data_detele,$this->menu->get_id());
			if(!$check){
				exit('error 99 connect admin');
			}
		}


		$data = array(
			'stdCardID' => $stdCardID,
			'stdApplyNo'=> $stdApplyNo,
			'branchId'  => $branchId,
			'std_group' => $std_group,
			'std_datetime' => date("Y-m-d H:i:s"),
			'u_id' => $this->menu->get_id()
			);

		$check = $this->branch_model->replace_std_group($data);
		if(!$check){
				exit('error chege group connect admin');
			}

		}//main for 2
	}//main for 1

		redirect($this->input->post('form_callback')."/selecttue",'refresh');
		exit();
	}



}

/* End of file Group */
/* Location: ./application/controllers/Group */
?>