<?php
// Turn off all error reporting
error_reporting(0);
function string_lower($data){
	$result = strtoupper(substr($data,0,1)).strtolower(substr($data,1,strlen($data)-1));
	return $result;	
}

function cut_hyphen($data){
	return str_replace("-","",$data);
}

//day[2]/month[2]/year[2] birthday_th
function format_birthday($data){
	$data = explode("/",$data);
	$day = (strlen($data[0])==1)?"0".$data[0]:$data[0];
	$month =(strlen($data[1])==1)?"0".$data[1]:$data[1];;
	$year =	substr($data[2],-2);
	return $day."/".$month."/".$year;
}
//birthday thai birthday_th
function format_birthday_thai($data){
	$thai_month_arr=array(  
    "0"=>"",  
    "1"=>"มกราคม",  
    "2"=>"กุมภาพันธ์",  
    "3"=>"มีนาคม",  
    "4"=>"เมษายน",  
    "5"=>"พฤษภาคม",  
    "6"=>"มิถุนายน",   
    "7"=>"กรกฎาคม",  
    "8"=>"สิงหาคม",  
    "9"=>"กันยายน",  
    "10"=>"ตุลาคม",  
    "11"=>"พฤศจิกายน",  
    "12"=>"ธันวาคม"                    
);
	$data = explode("/",$data);
	$day = $data[0];
	$month = $thai_month_arr[(int)$data[1]];
	$year =	$data[2];
	return $day." ".$month." ".$year;
}
//award => std_expert_id


//$data['fa'] = conver(xxx,xxx,award_name);
function convert($field_name,$value,$select=NULL){
	$ci=& get_instance();
    $ci->load->database();
	$admission = $ci->load->database('admission', TRUE);
	$convert_field = array('std_expert_id' => array(
															"case"	=> 1,
															"field_name" => "std_expert_id",
															"table_name" => "tblstudent_total",
															"table_where" => "award",
															"field_name_where" => "award_id",
															"field_name_select" => "award_name"
														),
							'school_name' => array(
															"case"	=> 1,
															"field_name" => "std_expert_id",
															"table_name" => "tblstudent_total",
															"table_where" => "school_old",
															"field_name_where" => "school_id",
															"field_name_select" => "school_name"
														),
							// === prefix === //							
								'prefix_id_th' => array(
															"case"	=> 1,
															"field_name" => "prefix_id_th",
															"table_name" => "tblstudent_total",
															"table_where" => "prefix",
															//"field_name_where" => "prefix_id_th",
															"field_name_where" => "prefix_name_th",
															"field_name_select" => "prefix_name_th,prefix_name_en"
														),
								
								'fri_prefix_id' => array(
															"case"	=> 1,
															"field_name" => "fri_prefix_id",
															"table_name" => "tblstudent_total",
															"table_where" => "prefix",
															//"field_name_where" => "prefix_id_th",
															"field_name_where" => "prefix_name_th",
															"field_name_select" => "prefix_name_th,prefix_name_en"
														),
								'fat_prefix_id_th' => array(
															"case"	=> 0,
															"value_return" => "นาย"
															/*"field_name" => "fat_prefix_id_th",
															"table_name" => "tblstudent_total",
															"table_where" => "prefix",
															"field_name_where" => "prefix_id_th",
															"field_name_select" => "prefix_name_th,prefix_name_en"*/
														),
								'mot_prefix_id_th' => array(
															"case"	=> 1,
															//"value_return" => "นาง"
															"field_name" => "mot_prefix_id_th",
															"table_name" => "tblstudent_total",
															"table_where" => "prefix",
															//"field_name_where" => "prefix_id_th",
															"field_name_where" => "prefix_name_th",
															"field_name_select" => "prefix_name_th,prefix_name_en"
														),
								'mot_prefix_id_en' => array(
															"case"	=> 1,
															"field_name" => "mot_prefix_id_en",
															"table_name" => "tblstudent_total",
															"table_where" => "prefix",
															//"field_name_where" => "prefix_id_th",
															"field_name_where" => "prefix_name_th",
															"field_name_select" => "prefix_name_en"
														),
								'par_prefix' => array(
															"case"	=> 1,
															"field_name" => "par_prefix",
															"table_name" => "tblstudent_total",
															"table_where" => "prefix",
															//"field_name_where" => "prefix_id_th",
															"field_name_where" => "prefix_name_th",
															"field_name_select" => "prefix_name_th,prefix_name_en"
														),
								// === tblgroup_id === //
								'group_id' => array(
															"case"	=> 1,
															"field_name" => "group_id",
															"table_name" => "tblstudent_total",
															"table_where" => "tblgroup_id",
															"field_name_where" => "group_id",
															"field_name_select" => "course,level_name,branch_name,major_name"
														),
								'nation_id' => array(
															"case"	=> 0,
															"value_return" => "ไทย"
														),
								'religion_id' => array(
															"case"	=> 0,
															"value_return" => "พุทธ"
														),
								'gender_id' => array(
															"case"	=> 1,
															"field_name" => "gender_id",
															"table_name" => "tblstudent_total",
															"table_where" => "gender",
															"field_name_where" => "gender_id",
															"field_name_select" => "gender_name"
														),
								'gender_id' => array(
															"case"	=> 1,
															"field_name" => "gender_id",
															"table_name" => "tblstudent_total",
															"table_where" => "gender",
															"field_name_where" => "gender_id",
															"field_name_select" => "gender_name"
														),
								// === tumbol_new == //
								'bor_tumbol' => array(
															"case"	=> 1,
															"field_name" => "bor_tumbol",
															"table_name" => "tblstudent_total",
															"table_where" => "tumbol_new",
															"field_name_where" => "tumbol_id",
															"field_name_select" => "tumbol_name,post,amphure_id"
														),
								'fri_tumbol' => array(
															"case"	=> 1,
															"field_name" => "fri_tumbol",
															"table_name" => "tblstudent_total",
															"table_where" => "tumbol_new",
															"field_name_where" => "tumbol_id",
															"field_name_select" => "tumbol_name,post,amphure_id,post"
														),
								'home_tumbol' => array(
															"case"	=> 1,
															"field_name" => "fri_tumbol",
															"table_name" => "tblstudent_total",
															"table_where" => "tumbol_new",
															"field_name_where" => "tumbol_id",
															"field_name_select" => "tumbol_name,post,amphure_id,post"
														),
								'par_tumbol' => array(
															"case"	=> 1,
															"field_name" => "par_tumbol",
															"table_name" => "tblstudent_total",
															"table_where" => "tumbol_new",
															"field_name_where" => "tumbol_id",
															"field_name_select" => "tumbol_name,post,amphure_id"
														),
								// === amphure_new === //						
								'bor_amphure' => array(
															"case"	=> 1,
															"field_name" => "bor_amphure",
															"table_name" => "tblstudent_total",
															"table_where" => "amphure_new",
															"field_name_where" => "amphure_id",
															"field_name_select" => "amphure_name,amphure_name,province_id"
														),
								'fri_amphure' => array(
															"case"	=> 1,
															"field_name" => "fri_amphure",
															"table_name" => "tblstudent_total",
															"table_where" => "amphure_new",
															"field_name_where" => "amphure_id",
															"field_name_select" => "amphure_name,amphure_name,province_id"
														),
								'home_amphure' => array(
															"case"	=> 1,
															"field_name" => "home_amphure",
															"table_name" => "tblstudent_total",
															"table_where" => "amphure_new",
															"field_name_where" => "amphure_id",
															"field_name_select" => "amphure_name,amphure_name,province_id"
														),
								'par_amphure' => array(
															"case"	=> 1,
															"field_name" => "par_amphure",
															"table_name" => "tblstudent_total",
															"table_where" => "amphure_new",
															"field_name_where" => "amphure_id",
															"field_name_select" => "amphure_name,amphure_name,province_id"
														),
								'school_amphure' => array(
															"case"	=> 1,
															"field_name" => "school_amphure",
															"table_name" => "tblstudent_total",
															"table_where" => "amphure_new",
															"field_name_where" => "amphure_id",
															"field_name_select" => "amphure_name,amphure_name,province_id"
														),
								// === province_new ===//
								'bor_province' => array(
															"case"	=> 1,
															"field_name" => "bor_province",
															"table_name" => "tblstudent_total",
															"table_where" => "province_new",
															"field_name_where" => "province_id",
															"field_name_select" => "province_id,province_name,province_en,region"
														),
								'fri_province' => array(
															"case"	=> 1,
															"field_name" => "bor_province",
															"table_name" => "tblstudent_total",
															"table_where" => "province_new",
															"field_name_where" => "province_id",
															"field_name_select" => "province_id,province_name,province_en,region"
														),
								'home_province' => array(
															"case"	=> 1,
															"field_name" => "home_province",
															"table_name" => "tblstudent_total",
															"table_where" => "province_new",
															"field_name_where" => "province_id",
															"field_name_select" => "province_id,province_name,province_en,region"
														),
								'par_province' => array(
															"case"	=> 1,
															"field_name" => "par_province",
															"table_name" => "tblstudent_total",
															"table_where" => "province_new",
															"field_name_where" => "province_id",
															"field_name_select" => "province_id,province_name,province_en,region"
														),
								'school_province' => array(
															"case"	=> 1,
															"field_name" => "school_province",
															"table_name" => "tblstudent_total",
															"table_where" => "province_new",
															"field_name_where" => "province_id",
															"field_name_select" => "province_id,province_name,province_en,region"
														),						
								'cars_id' => array(
															"case"	=> 1,
															"field_name" => "cars_id",
															"table_name" => "tblstudent_total",
															"table_where" => "cars_type",
															"field_name_where" => "cars_id",
															"field_name_select" => "cars_name"
														),
								// === cripple === //
								'cripple_id' => array(
															"case"	=> 1,
															"field_name" => "cripple_id",
															"table_name" => "tblstudent_total",
															"table_where" => "cripple",
															"field_name_where" => "cripple_id",
															"field_name_select" => "cripple_name"
														),
								'fat_cripple' => array(
															"case"	=> 1,
															"field_name" => "fat_cripple",
															"table_name" => "tblstudent_total",
															"table_where" => "cripple",
															"field_name_where" => "cripple_id",
															"field_name_select" => "cripple_name"
														),
								'mot_cripple' => array(
															"case"	=> 1,
															"field_name" => "mot_cripple",
															"table_name" => "tblstudent_total",
															"table_where" => "cripple",
															"field_name_where" => "cripple_id",
															"field_name_select" => "cripple_name"
														),
											
								'sch_type_id' => array(
															"case"	=> 1,
															"field_name" => "sch_type_id",
															"table_name" => "tblstudent_total",
															"table_where" => "school_type",
															"field_name_where" => "sch_type_id",
															"field_name_select" => "sch_type_name"
														),
								'sele_by_id' => array(
															"case"	=> 1,
															"field_name" => "sele_by_id",
															"table_name" => "tblstudent_total",
															"table_where" => "select_by",
															"field_name_where" => "sele_by_id",
															"field_name_select" => "sele_by_name"
														),
								'std_type_id' => array(
															"case"	=> 1,
															"field_name" => "std_type_id",
															"table_name" => "tblstudent_total",
															"table_where" => "std_type",
															"field_name_where" => "std_type_id",
															"field_name_select" => "std_type_name"
														),
								'edu_level_id' => array(
															"case"	=> 1,
															"field_name" => "edu_level_id",
															"table_name" => "tblstudent_total",
															"table_where" => "edu_level",
															"field_name_where" => "edu_level_id",
															"field_name_select" => "edu_level_name"
														),
								// === occup === //
								'fat_occupa' => array(
															"case"	=> 1,
															"field_name" => "fat_occupa",
															"table_name" => "tblstudent_total",
															"table_where" => "occup",
															"field_name_where" => "occup_id",
															"field_name_select" => "occup_name"
														),
								'mot_occupa' => array(
															"case"	=> 1,
															"field_name" => "mot_occupa",
															"table_name" => "tblstudent_total",
															"table_where" => "occup",
															"field_name_where" => "occup_id",
															"field_name_select" => "occup_name"
														),
								'par_occupa' => array(
															"case"	=> 1,
															"field_name" => "par_occupa",
															"table_name" => "tblstudent_total",
															"table_where" => "occup",
															"field_name_where" => "occup_id",
															"field_name_select" => "occup_name"
														),
								// === stmarry == //
								'fat_mar_status' => array(
															"case"	=> 1,
															"field_name" => "fat_mar_stauts",
															"table_name" => "tblstudent_total",
															"table_where" => "stmarry",
															"field_name_where" => "stmarry_id",
															"field_name_select" => "stmarry_name"
														),						
								'mot_mar_status' => array(
															"case"	=> 1,
															"field_name" => "mot_mar_status",
															"table_name" => "tblstudent_total",
															"table_where" => "stmarry",
															"field_name_where" => "stmarry_id",
															"field_name_select" => "stmarry_name"
														),
								'par_relation' => array(
															"case"	=> 1,
															"field_name" => "par_relation",
															"table_name" => "tblstudent_total",
															"table_where" => "parent_relation",
															"field_name_where" => "par_relation",
															"field_name_select" => "par_status"
														),
								);
	
	if(is_null($convert_field[$field_name]['case'])){
		return $data['error'] = "ERROR not function field";
	}
	
	
	if($convert_field[$field_name]['case'] == 0){
		return $convert_field[$field_name]['value_return'];
	}else if($convert_field[$field_name]['case'] == 1){
		
		$sql = "SELECT ".$convert_field[$field_name]['field_name_select']." FROM ".$convert_field[$field_name]['table_where']." WHERE ".$convert_field[$field_name]['field_name_where']." = '".$value."'";
		//echo "==>".$sql;
		$query = $admission->query($sql);
		//var_dump($query);
		
		$result = $query->row_array();
		//var_dump($result);

		//echo "||||".$query->num_rows();
		if($query->num_rows() == 0){
			
			return "ERROR Not data rows = 0 [".$value."]".mysql_error(); 
		}
		
		if(is_null($select)){
			//echo "5555";
			return $result;
			
		}else{
			//echo "666";
			return $result[$select];
		}
		
		
	}else{
		return $data['error'] = "ERROR not field case function";
	}							
								
}


?>