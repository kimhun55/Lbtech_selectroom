<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_group_model extends CI_Model {

	public function read_data_file($path_namefile){

		$lines = file($path_namefile);

		if($lines === false || count($lines)==0){
			return false;
		}

		$position_stdid = $this->input->post('position_stdid');
		$position_fname = $this->input->post('position_fname');
		$position_lname = $this->input->post('position_lname');
		$position_group = $this->input->post('position_group');

		if($position_group != 0){
			$position_group = $position_group - 1;
		}

		//Event 1 fname lname
		if($position_stdid == 0 && $position_fname != 0 && $position_lname != 0 && $position_lname != 99){
			$event = 1;
			$position_fname = $position_fname - 1;
			$position_lname = $position_lname - 1;

		}

		//Event 2 id fname lname
		if($position_stdid != 0 && $position_fname != 0 && $position_lname != 0 && $position_lname != 99){
			$event = 2;
			$position_fname = $position_fname - 1;
			$position_lname = $position_lname - 1;
			$position_stdid = $position_stdid - 1;
		}
		//Event 3 id 
		if($position_stdid != 0 && $position_fname == 0 && $position_lname == 0 && $position_lname != 99){
			$event = 3;
			$position_stdid = $position_stdid - 1;
		}

		if($position_lname == 99){
			$event = 4;
			$position_fname = $position_fname - 1;
		}



		foreach ($lines as $line_num => $line) {
				//echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
		
				$data_explode = explode(',',$line);
				unset($data_event);

				if($event == 1){
					if($data_explode[$position_fname] != '' && $data_explode[$position_lname] != ''){
					$data_event['qeury'] = array(
						'stu_fname_th'=>$this->check_data_line($data_explode[$position_fname]),
						'stu_lname_th'=>$this->check_data_line($data_explode[$position_lname]));
					$data_event['group'] = $this->check_data_line($data_explode[$position_group]);
					$data[] = $data_event;
					}
					continue;
				}

				if($event == 2){
					if($data_explode[$position_fname] != '' && $data_explode[$position_lname] != '' && $data_explode[$position_stdid] != ''){
					$data_event['qeury'] = array(
						'stdApplyNo'=> $this->check_data_line($data_explode[$position_stdid]),
						'stu_fname_th'=>$this->check_data_line($data_explode[$position_fname]),
						'stu_lname_th'=>$this->check_data_line($data_explode[$position_lname]));
					$data_event['group'] = $this->check_data_line($data_explode[$position_group]);
					$data[] = $data_event;
					}
					continue;
				}

				if($event == 3){
					if($data_explode[$position_stdid] != ''){
					$data_event['qeury'] = array(
						'stdApplyNo'=> $this->check_data_line($data_explode[$position_stdid]));
					$data_event['group'] = $this->check_data_line($data_explode[$position_group]);
					$data[] = $data_event;
					}
					continue;
				}
				if($event == 4){
					if($data_explode[$position_fname] != ''){
						$flname = explode('  ', $data_explode[$position_fname]);

						
						if(count($flname) != 2){
							$flname = explode('    ', $data_explode[$position_fname]);//4
						}
						if(count($flname) != 2){
							$flname = explode(' ', $data_explode[$position_fname]);//1
						}
						if(count($flname) != 2){
							$flname = explode('      ', $data_explode[$position_fname]);//1
						}

						if(count($flname) != 2){
							$vel = $flname;
							unset($flname);
							$flname[0] = $vel[0];
							$flname[1] = $vel[(count($vel)-1)];
						}
				
						if(count($flname)==2){

							$data_event['qeury'] = array(
									'stu_fname_th'=>$this->check_data_line($flname[0]),
									'stu_lname_th'=>$this->check_data_line($flname[1]));
							$data_event['group'] = $this->check_data_line($data_explode[$position_group]);
							$data[] = $data_event;
						}else{
							echo "error event 4";
							exit();
						}
					}

				}


				if(count($data_explode) == 2){
					if($data_explode[0] != '' && $data_explode[1] != ''){
					$data_event['qeury'] = array(
						'stu_fname_th'=>$this->check_data_line($data_explode[0]),'stu_lname_th'=>$this->check_data_line($data_explode[1]));
					$data_event['group'] = $this->check_data_line($data_explode[$position_group]);
					$data[] = $data_event;
					}//check value
				}//check count 2	
			}
			return $data;
	}

	public function check_data_line($data){
		$data = htmlspecialchars($data);
		$data = trim(preg_replace('/\s\s+/', ' ',$data));
		$array = array('นาย','นาง','นางสาว','﻿','สาว');
		$data = trim(str_replace($array,'', $data));
		return $data;
	}

	public function check_mat_data($branch,$data_file){

		$this->load->model('recheck_model','recheck');

		foreach ($data_file as $key => $value) {

			$check  = $this->recheck->query_std_quaota($branch,NULL,NULL,NULL,$value['qeury']);
			if($check['data'] !== false){
				$check['data'][0]['group'] = $value['group'];
				$data[] = $check['data'][0];
			}else{
				$check  = $this->recheck->query_std_exams($branch,NULL,NULL,NULL,$value['qeury']);
				if($check['data'] !== false){
				$check['data'][0]['group'] = $value['group'];
				$data[] = $check['data'][0];
				}else{
					$value['qeury']['check'] = false;
					$value['qeury']['group'] = $value['group'];
					$data[] = $value['qeury'];
				}
			}
		}

		return  $data;
	}
	

}

/* End of file import_group_model.php */
/* Location: ./application/models/import_group_model.php */