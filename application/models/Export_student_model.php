<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Export_student_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper('function_cut_hyphen_helper');
	}

	public function student_export(){
		$check = $this->student_delete_all();
		if($check === false){
			$data['result'] = false;
			$data['msg'] = "error delete data table student";
			return $data;
		}

		$data = $this->student_get_data();
		if($data === false){
			$data['result'] = false;
			$data['msg'] = "error not data table tblcandidate";
			return $data;
		}
			$people_id = NULL;
			$co = 1;
			echo "count = ".count($data)."\n";
			//exit();
		foreach ($data as $key => $rs_std) {
			echo "start \n";
					
					$people_id = $rs_std['stdCardID'];
					
					//$stu_pass = $rs_std['stu_pass'];
					$code = $rs_std['student_id'];
					//main$prefix_id_th = convert("prefix_id_th",$rs_std['prefix_id_th'],"prefix_name_th");
					$prefix_id_th = $rs_std['prefix_id_th'];
					$stu_fname_th = $rs_std['stu_fname_th'];
					$stu_lname_th = $rs_std['stu_lname_th'];
					//$prefix_id_en = $rs_std['prefix_id_en'];
					//$stu_fname_en = $rs_std['stu_fname_en'];
					//$stu_lname_en = $rs_std['stu_lname_en'];
					$stu_nickname = $rs_std['stu_nickname'];
					//$student_id = $rs_std['student_id'];
					//main$stu_tel = $rs_std['stu_tel'];
					$stu_tel = $rs_std['stdTel'];
					//main$stu_mail = $rs_std['stu_mail'];
					$stu_mail = $rs_std['stdEmail'];
					$group_id = $rs_std['group_id'];
					$major_name = $rs_std['major_name'];
					$std_apply_no = $rs_std['std_apply_no'];
					$std_admis_result = $rs_std['std_admis_result'];
					//$round = $rs_std['round					
					$birthday_th = $rs_std['birthday_th'];
					$age = $rs_std['age'];
					//$nation_id = $rs_std['nation_id'];
					//$religion_id = $rs_std['religion_id'];
					$std_blgr = $rs_std['std_blgr'];
					$gender_id = convert("gender_id",$rs_std['gender_id'],"gender_name");
					$weight = $rs_std['weight'];
					$tall = $rs_std['tall'];
					$bor_tumbol = convert("bor_tumbol",$rs_std['bor_tumbol'],"tumbol_name");
					$bor_amphure = convert("bor_amphure",$rs_std['bor_amphure'],"amphure_name");
					$bor_province = convert("bor_province",$rs_std['bor_province'],"province_name");;
					$bor_province_en = $rs_std['bor_province_en'];
					$bor_post = $rs_std['bor_post'];
					$qty_child = $rs_std['qty_child'];
					$qty_cousin = $rs_std['qty_cousin'];
					$qty_brother = $rs_std['qty_brother'];
					$qty_study_broth = $rs_std['qty_study_broth'];
					$congen = $rs_std['congen'];
					$blame = $rs_std['blame'];
					$std_expert_id = convert("std_expert_id",$rs_std['std_expert_id'],"award_name");
					$cars_id = convert("cars_id",$rs_std['cars_id'],"cars_name");
					$motor_reg = $rs_std['motor_reg'];
					//$fri_prefix_id = convert("fri_prefix_id",$rs_std['fri_prefix_id'],"prefix_name_th");
					$fri_prefix_id = $rs_std['fri_prefix_id'];
					$fri_fname = $rs_std['fri_fname'];
					$fri_lname = $rs_std['fri_lname'];
					$fri_tel = $rs_std['fri_tel'];
					$fri_homeid = $rs_std['fri_homeid'];
					$fri_moo = $rs_std['fri_moo'];
					$fri_soi = $rs_std['fri_soi'];
					$fri_street = $rs_std['fri_street'];

					$add_fri_tumbol = convert("fri_tumbol",$rs_std['fri_tumbol']);
					$fri_tumbol = $add_fri_tumbol['tumbol_name'];
					$add_fri_amphure = convert("fri_amphure",$add_fri_tumbol['amphure_id']);
					$fri_amphure = $add_fri_amphure['amphure_name'];
					$fri_province = convert("fri_province",$add_fri_amphure['province_id'],"province_name");


					$fri_post = $add_fri_tumbol['post'];
					$cripple_id = convert("cripple_id",$rs_std['cripple_id'],"cripple_name");
					$school_old_th = $rs_std['school_old_th'];
					//main $school_name = $rs_std['school_name'];
					//59 old $school_name = convert("school_name",$rs_std['school_old_th'],"school_name");
					//60 4/28*/2560
					if($rs_std['school_id'] != 0){
					 $school_name = convert("school_name",$rs_std['school_id'],"school_name");
					}else{
						if($rs_std['school_old_th1'] ==""){
							$school_name = '-';
						}else{
						$school_name = $rs_std['school_old_th1'];
						}	
					}
					//school_old_th
					$school_en = $rs_std['school_en'];
					$school_amphure = convert("school_amphure",$rs_std['school_amphure'],"amphure_name");
					$school_province = convert("school_province",$rs_std['school_province'],"province_name");
					//$school_old_th1 = $rs_std['school_old_th1'];
					$sch_type_id = convert("sch_type_id",$rs_std['sch_type_id'],"sch_type_name");
					$std_card_old = $rs_std['std_card_old'];
					$level_old = $rs_std['level_old'];
					$branch_old1 = $rs_std['branch_old1'];
					$edu_level_id = convert("edu_level_id",$rs_std['edu_level_id'],"edu_level_name");
					$tran_no = $rs_std['tran_no'];
					$tran = $rs_std['tran'];
					$unit = $rs_std['unit'];
					$gpa = $rs_std['stdGPA'];
					//$semester = $rs_std['semester'];
					//$years = $rs_std['years'];
					//$date_in = $rs_std['date_in'];
					$sele_by_id = convert("sele_by_id",$rs_std['sele_by_id'],"sele_by_name");
					$std_type_id = convert("std_type_id",$rs_std['std_type_id'],"std_type_name");
					$fat_prefix_id_th = convert("fat_prefix_id_th",$rs_std['fat_prefix_id_th'],"prefix_name_th");
					//$fat_prefix_id_th = $rs_std['fat_prefix_id_th'];
					$fat_fname_th = $rs_std['fat_fname_th'];
					$fat_lname_th = $rs_std['fat_lname_th'];
					$fat_prefix_id_en = $rs_std['fat_prefix_id_en'];
					$fat_fname_en = $rs_std['fat_fname_en'];
					$fat_lname_en = $rs_std['fat_lname_en'];
					$fat_occupa = convert("fat_occupa",$rs_std['fat_occupa'],"occup_name");
					$fat_mar_status = convert("fat_mar_status",$rs_std['fat_mar_status'],"stmarry_name");
					//$fat_job_place = $rs_std['fat_job_place'];
					//$fat_job_position = $rs_std['fat_job_position'];
					$fat_salary = $rs_std['fat_salary'];
					$fat_tel = $rs_std['fat_tel'];
					//main$mot_prefix_id_th = convert("mot_prefix_id_th",$rs_std['mot_prefix_id_th'],"prefix_name_th");
					$mot_prefix_id_th = $rs_std['mot_prefix_id_th'];
					$mot_fname_th = $rs_std['mot_fname_th'];
					$mot_lname_th = $rs_std['mot_lname_th'];
					$mot_prefix_id_en = $rs_std['mot_prefix_id_en'];
					$mot_fname_en = $rs_std['mot_fname_en'];
					$mot_lname_en = $rs_std['mot_lname_en'];
					$mot_occupa = convert("mot_occupa",$rs_std['mot_occupa'],"occup_name");
					$mot_salary = $rs_std['mot_salary'];
					//$mot_job_place = $rs_std['mot_job_place'];
					//$mot_job_position = $rs_std['mot_job_position'];
					$mot_tel = $rs_std['mot_tel'];
					$mot_mar_status = convert("mot_mar_status",$rs_std['mot_mar_status'],"stmarry_name");
					$fat_cripple = convert("fat_cripple",$rs_std['fat_cripple'],"cripple_name");
					$mot_cripple = convert("mot_cripple",$rs_std['mot_cripple'],"cripple_name");
					$home_id = $rs_std['home_id'];
					$home_moo = $rs_std['home_moo'];
					$home_name = $rs_std['home_name'];
					$home_soi = $rs_std['home_soi'];
					$home_street = $rs_std['home_street'];

					$add_tumbol = convert("home_tumbol",$rs_std['home_tumbol']);
					$home_tumbol = $add_tumbol['tumbol_name'];
					$add_amphure = convert("home_amphure",$add_tumbol['amphure_id']);
					$home_amphure = $add_amphure['amphure_name'];
					$home_province = convert("home_province",$add_amphure['province_id'],"province_name");

					/*main
					$home_tumbol = convert("home_tumbol",$rs_std['home_tumbol'],"tumbol_name");
					$home_amphure = convert("home_amphure",$rs_std['home_amphure'],"amphure_name");
					$home_province = convert("home_province",$rs_std['home_province'],"province_name");*/
					

					/*bass$home_tumbol = convert("home_tumbol",$rs_std['stdDistrict'],"tumbol_name");
					$home_amphure = convert("home_amphure",$rs_std['stdAmphur'],"amphure_name");
					$home_province = convert("home_province",$rs_std['stdProvince'],"province_name");*/

					//main$home_post = $rs_std['home_post'];
					$home_post = $add_tumbol['post'];

					$home_code = cut_hyphen($rs_std['home_code']);
					$home_tel = $rs_std['home_tel'];
					//main$par_prefix = convert("par_prefix",$rs_std['par_prefix'],"prefix_name_th");
					$par_prefix =$rs_std['par_prefix'];
					$par_fname = $rs_std['par_fname'];
					$par_lname = $rs_std['par_lname'];
					$par_occupa = convert("par_occupa",$rs_std['par_occupa'],"occup_name");
					$par_salary = $rs_std['par_salary'];
					$par_house_id = $rs_std['par_house_id'];
					$par_moo = $rs_std['par_moo'];
					$par_housename = $rs_std['par_housename'];
					$par_soi = $rs_std['par_soi'];
					$par_street = $rs_std['par_street'];
					$par_tumbol = convert("par_tumbol",$rs_std['par_tumbol'],"tumbol_name");
					$par_amphure = convert("par_amphure",$rs_std['par_amphure'],"amphure_name");
					$par_province = convert("par_province",$rs_std['par_province'],"province_name");
					$par_post = $rs_std['par_post'];
					$par_tel = $rs_std['par_tel'];
					$par_relation = convert("par_relation",$rs_std['par_relation'],"par_status");
					//$date_post = $rs_std['date_post'];
					//$stat_into = $rs_std['stat_into'];
					//$stat_idcard = $rs_std['stat_idcard'];
					
					//ชื่อนักเรียน พ่อ แม่ แบบเต็ม
					$name = $prefix_id_th.$stu_fname_th."  ".$stu_lname_th;
					$dady = $fat_prefix_id_th.$fat_fname_th."  ".$fat_lname_th;
					$mamy =$mot_prefix_id_th.$mot_fname_th."  ".$mot_lname_th;
					$fri = $fri_prefix_id_th.$fri_fname."  ".$fri_lname;
				
					//ที่อยู่เพื่อน
					$add3 = $fri_homeid;
					if($fri_moo!='') $add3 = $add3." ม.".$fri_moo;
					if ($fri_soi!='') $add3=$add3." ซ.".$fri_soi;
					if ($fri_street!='') $add3=$add3." ถ.".$fri_street;
					if ($fri_tumbol!='') $add3=$add3." ต.".$fri_tumbol;
					if ($fri_amphur!='') $add3=$add3." อ.".$fri_amphur;
					if ($fri_province!='') $add3=$add3." จ.".$fri_province;
					if ($fri_post!='') $add3=$add3." ".$fri_post;
				
					//คำนวณจำนวนพี่น้อง
					$total_boy =$qty_cousin+$qty_brother+1;
					$total_edu = $qty_study_broth+1;
					
					//วัน/เดือน/ปีเกิด
					$birt = format_birthday($birthday_th);
					$birthday = format_birthday_thai($birthday_th);

					// กลุ่ม/ระบบ/หลักสุตรที่เรียน
					//echo $group_id;

					//main$std_edu = convert("group_id","$group_id","course_name");
					$std_edu = convert("group_id","$group_id","course");
					//var_dump($std_edu);
					$std_level = convert("group_id","$group_id","level_name");
					$depwork = convert("group_id","$group_id","major_name");
					//echo $group_id."*****";	exit();				
					//หลักสุตร
					if($std_level=="ปวช.1"){
						$cosemes="ปวช.64";
					}else{
						$cosemes="ปวส.64";
					}
					
					//echo " => ".$name."=>".$school_name."=>".$school_province."=>".$qty_cousin."=>".$qty_brother."=>".$qty_study_broth." => ".$total_boy."=>".$total_edu."<br>";

					
					$data_insert= array(
								'NAME '=> $name,
								'BOX'=> '',
								'IDNO'=> '',
								'BIRT'=> checkdata_null($birt),
								'NATI1'=> 'ไทย',
								'NATI2'=> 'ไทย',
								'RELI'=> 'พุทธ',
								'BLGR'=> checkdata_null($std_blgr),
								'WEIG'=> checkdata_null($weight),
								'HEIG'=> checkdata_null($tall),
								'HOST'=> '',
								'TELL1'=> checkdata_null($fat_tel),
								'SCOO'=> checkdata_null($school_name),
								'PROV1'=> checkdata_null($school_province),
								'CRAV'=> $cars_id,
								'DADY'=> $dady,
								'MAMY'=> $mamy,
								'DASALY'=>$fat_salary,
								'MASALY'=>$mot_salary,
								'ADDR2'=>$motor_reg,
								'TELL2'=>$par_tel,
								'FRIE'=>$fri,
								'ADD3'=>$add3,
								'TELL3'=>$fri_tel,
								'GRO'=> $rs_std['group_id'],
								'GRADE'=>$unit,
								'DAYIN'=> '13 พฤษภาคม 2564', //**** ตั้งค่า รายปี 
								'GRD2'=> $gpa,
								'ONDA'=> '',
								'SEMES'=>'1/2561', //**** ตั้งค่า รายปี 
								'STAT'=>'',
								'DAWORK'=>$fat_occupa,
								'MAWORK'=>$mot_occupa,
								'ADD1'=>checkdata_null($home_id),
								'ADD2'=>checkdata_null($home_id),
								'TUMB1'=>checkdata_null($home_tumbol),
								'TUMB2'=>checkdata_null($home_tumbol),
								'AUMP1'=>checkdata_null($home_amphure),
								'AUMP2'=>checkdata_null($home_amphure),
								'PROVI1'=>checkdata_null($home_province),
								'PROVI2'=>checkdata_null($home_province),
								'ENDSTAT'=>'',
								'SALARY'=>'',
								'ENDDATE'=>'',
								'PERIOD'=>'',
								'ENDCHK'=>'',
								'ENDGRADE'=>'',
								'CREDI'=>'',
								'COUNT'=>'',
								'ADDGRAD'=>'',
								'ADDCRE'=>'',
								'ENDCLA'=>$rs_std['stdLevelOld'],
								'OLDCO'=>$std_card_old,
								'OLDDA'=>'',
								'ADDMARK'=>'',
								'TOLMARK'=>'',
								'OLDGRADE'=>'',
								'POST1'=>checkdata_null($home_post),
								'COSEMES'=>checkdata_null($cosemes),
								'OLDCRE'=>'',
								'PERCENTILE'=>'',
								'BIRTHDAY'=>checkdata_null($birthday),
								'PRE_NAME'=>checkdata_null($prefix_id_th),
								'FNAME'=>checkdata_null($stu_fname_th),
								'LNAME'=>checkdata_null($stu_lname_th),
								'ENDYEAR'=>'',
								'PIN_ID'=>checkdata_null($people_id),
								'SEX'=>checkdata_null($gender_id),
								'ABILITY'=>checkdata_null($cripple_id),
								'ACTIVITY'=>checkdata_null($std_expert_id),
								'FAMILY'=>checkdata_null($mot_mar_status),
								'TOTAL_BOY'=>checkdata_null($total_boy),
								'TOTAL_EDU'=>checkdata_null($total_edu),
								'NICKNAME'=>checkdata_null($stu_nickname),
								'GOTWORK'=>checkdata_null($par_occupa),
								'GOTSALY'=>checkdata_null($par_salary),
								'GOTRELA'=>checkdata_null($par_relation),
								'BROTHER'=>checkdata_null($qty_cousin),
								'SISTER'=>checkdata_null($qty_brother),
								'SON_NO'=>checkdata_null($qty_child),
								'AGE'=>checkdata_null($age),
								'VIL2'=>checkdata_null($par_housename),
								'SOI2'=>checkdata_null($par_soi),
								'ROAD2'=>checkdata_null($par_street),
								'CRACK'=>checkdata_null($blame),
								'SICK'=>checkdata_null($congen),
								'FSEMES'=>'1',
								'FYEAR'=>'2561',
								'AMPER'=>checkdata_null($school_amphure),
								'OLDID1'=>checkdata_null($tran_no),
								'OLDID2'=>checkdata_null($tran),
								'COPYADDR'=>'',
								'VIL1'=>checkdata_null($home_name),
								'SOI1'=>checkdata_null($home_soi),
								'ROAD1'=>checkdata_null($home_street),
								'TYPE_EDU'=>checkdata_null($sele_by_id),
								'BPROVITE'=>checkdata_null($home_province),
								'BAMPER'=>checkdata_null($home_amphure),
								'BTUMBOL'=>checkdata_null($home_tumbol),
								'STD_VER'=>'',
								'STD_ROOM'=>'',
								'POST2'=>checkdata_null($home_post),
								'STD_EDU'=>checkdata_null($std_edu),
								'STD_LEVEL'=>checkdata_null($std_level),
								'DASALARY'=>'',
								'MASALARY'=>'',
								'OLD_TYPSCH'=>checkdata_null($sch_type_id),
								'GRADUATE'=>checkdata_null($edu_level_id),
								'DEPWORK'=>checkdata_null($depwork),
								'GPA21'=>'0',
								'GPA22'=>'0',
								'GPA23'=>'0',
								'GPA24'=>'0',
								'GPA25'=>'0',
								'GPA26'=>'0',
								'GPA27'=>'0',
								'GPA28'=>'0',
								'GRADE_ID'=>'0',
								'DA_PRENAME'=>checkdata_null($fat_prefix_id_th),
								'DA_FNAME'=>checkdata_null($fat_fname_th),
								'DA_LNAME'=>checkdata_null($fat_lname_th),
								'DA_CRIPPLE'=>checkdata_null($fat_cripple),
								'DA_STATUS'=>checkdata_null($fat_mar_status),
								'MA_PRENAME'=>checkdata_null($mot_prefix_id_th),
								'MA_FNAME'=>checkdata_null($mot_fname_th),
								'MA_LNAME'=>checkdata_null($mot_lname_th),
								'MA_CRIPPLE'=>checkdata_null($mot_cripple),
								'MA_STATUS'=>checkdata_null($mot_mar_status),
								'GO_PRENAME'=>checkdata_null($par_prefix),
								'GO_FNAME'=>checkdata_null($par_fname),
								'GO_LNAME'=>checkdata_null($par_lname),
								'MOO1'=>checkdata_null($home_moo),
								'MOO2'=>checkdata_null($par_moo),
								'HOME_ID'=>checkdata_null($home_code),
								'EDU_ID'=>'1',
								'EDU_STATUS'=>'กำลังศึกษาอยู่',
								'STATUS_ID'=>'',
								'END_STATUS'=>'',
								'WORK_ID'=>'',
								'WORK_STAT'=>'',
								'FLAG'=>'',
								'TYPE_END'=>'',
								'STD_PHONE'=>$stu_tel,
								'CODE'=>$code,
								'room_std_code' => $rs_std['room_std_code'],
								'room_group_id' => $rs_std['room_group_id']
					);
					echo $co++." = ".$code." ".$group_id."\n";
					//$where="CODE='$code' ";
					/*echo "<pre>";
					var_dump($data_insert);
					echo "</pre>";*/
					//exit();
					$check = $this->db->insert('student', $data_insert);
					if(!$check){
						exit('error_data insert');
					}
					echo "OK \n";
					//exit();
					unset($data_insert);

					
			
		}//end foreach 
		return true;



	}
	public function student_get_data(){
		//$this->db->where('stdCardID','1169800241521');
		//$this->db->limit(0,20);
		$this->db->order_by('room_group_id ASC, room_std_code ASC');
		$query = $this->db->get('tblcandidate');
		echo $this->db->last_query();
		echo '<br>';
		echo "data sum = ".$query->num_rows()."<br>";
		//exit();

		if($query->num_rows() == 0)
			return false;

		foreach ($query->result_array() as $row)
		{
      		$data[] = $row;
		}
		return $data;

	}
	public function student_delete_all(){
		$query = $this->db->query('TRUNCATE TABLE student');
		if($query){
				return true;
		}else{
				return false;
		}


	}
	public function student_backup(){

		$path_file_backup = $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/backup_db/';
		$file = $path_file_backup.'student_'.date("Y-m-d-H-i-s").'.sql';
		$result = $this->db->query("SELECT * INTO OUTFILE '$file' FROM `student`");
		if($result){
			echo "yes";
		}else{
			echo "No";
		}

	}


	public function  check_folder(){
		$path_folder = "public/student_file_export";
		if(!file_exists($path_folder)){
			$check = mkdir($path_folder, 0777, true);
			if(!$check){
				//exit("error mkdir @path_folder");
				return false;
			}

		}

		return true;

	}

	public function Export_student_csv(){
		$this->check_folder();

		$this->db->order_by('CODE', 'ASC');
		$query = $this->db->get("student");

		$path_folder = "public/student_file_export/";

		$name = "Export_student_csv_".date("Y-m-d-H-i-s").".csv";

		$myfile = fopen($path_folder.$name, "w") or die("Unable to open file!");

		$tel = array("TELL1","BIRT","TELL2","TELL3","STD_PHONE","SEMES","ADD1","ADD2");

			foreach ($query->result_array() as $row)
			{
				unset($data);
				foreach ($row as $key => $value) {

					if(in_array($key,$tel)){
						$data[] = '="'.$value.'"';

					}else{
						$data[] = '"'.$value.'"';

					}

					
				}
				$txt = implode(',', $data);
				fwrite($myfile, $txt."\n");

			}

			fclose($myfile);


			//return $path_folder."Export_student_csv_".date("Y-m-d-H-i-s").".csv";
			return $path_folder.$name;
	}




	

	

}

/* End of file Export_student_model.php */
/* Location: ./application/models/Export_student_model.php */