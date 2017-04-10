<?php
	function form_select_group($data,$select=NULL){
		if($select == false){
			$select =NULL;
		}
		$text = '<select class="form-control" name="std_group">';
		$text.='<option value="99">Select/ว่าง</option>';
		foreach ($data as $key => $value) {
				if($value['group_no'] == $select){
						$text.='<option value="'.$value['group_no'].'" selected="selected">'.$value['group_no'].' ['.$value['group_name'].']'.'</option>';
				}else{
				$text.='<option value="'.$value['group_no'].'">'.$value['group_no'].' ['.$value['group_name'].']'.'</option>';
			}
		}
		//$text.='<option value="99">ว่าง</option>';
		$text.='</select>';
		return $text;
	}
	function form_select_group_array($data,$select=NULL,$stdCardID,$stdApplyNo){
		if($select == false){
			$select =NULL;
		}
		$text = '<select class="form-control" name="std_group['.$stdCardID.']['.$stdApplyNo.']">';
		$text.='<option value="99">Select/ว่าง</option>';
		foreach ($data as $key => $value) {
				if($value['group_no'] == $select){
						$text.='<option value="'.$value['group_no'].'" selected="selected">'.$value['group_no'].' ['.$value['group_name'].']'.'</option>';
				}else{
				$text.='<option value="'.$value['group_no'].'">'.$value['group_no'].' ['.$value['group_name'].']'.'</option>';
			}
		}
		//$text.='<option value="99">ว่าง</option>';
		$text.='</select>';
		return $text;
	}  

	function form_select_group_importfile($data,$select=NULL,$key_post){
		if($select == false){
			$select =NULL;
		}
		$text = '<select class="form-control" name="std_group['.$key_post.']">';
		$text.='<option value="99">Select</option>';
		foreach ($data as $key => $value) {
				if($value['group_no'] == $select){
						$text.='<option value="'.$value['group_no'].'" selected="selected">'.$value['group_no'].' ['.$value['group_name'].']'.'</option>';
				}else{
				$text.='<option value="'.$value['group_no'].'">'.$value['group_no'].' ['.$value['group_name'].']'.'</option>';
			}
		}
		$text.='<option value="99">ว่าง</option>';
		$text.='</select>';
		return $text;
	} 

	function convert_data_array_to_key_value($data){
		if(!is_array($data)){
			return false;
		}
		foreach ($data as $key => $value) {
			$data[$value] = $value;
		}

		return $data;
	}

	function convert_data_group_count_to_array($number){
		if($number <=  0){
			return false;
		}
		for($i=1;$i<=$number;$i++){
			$data[$i] = $i;
		}

		return $data;
	}

	function show_label_status($id){
		if($id == 1){
			echo '<span class="label label-default" aria-hidden="true" data-toggle="modal" data-target="#myModal">ไม่ทำงาน (Not Work)</span>';
		}else
		if($id == 2){
			echo '<span class="label label-primary" aria-hidden="true" data-toggle="modal" data-target="#myModal">ทำงานพร้อมจัดกลุ่ม (Work)</span>';
		}else
		if($id == 3){
			echo '<span class="label label-warning" aria-hidden="true" data-toggle="modal" data-target="#myModal">Problem</span>';
		}else
		if($id == 4){
			echo '<span class="label label-info" aria-hidden="true" data-toggle="modal" data-target="#myModal">ยืนยันการจัดกลุ่ม (Finish)</span>';
		}else
		if($id == 5){
			echo '<span class="label label-success" aria-hidden="true" data-toggle="modal" data-target="#myModal">ออกรหัสนักเรียนแล้ว (code)</span>';
		}else{
			echo '<span class="label label-danger" aria-hidden="true" data-toggle="modal" data-target="#myModal">error</span>';
		}


	}
	function std_type($type){
		if($type == 'quaota'){
			echo '<span class="label label-success">โคต้า</span>';
		}else if($type == 'exams'){
			echo '<span class="label label-primary">สอบตรง</span>';
		}
	}

	function add_selected($value,$id){
		if($value == $id){
			echo ' selected="selected" ';
		}
	}

	function show_stat_into($data=NUll){
		if($data == 0 || !isset($data)){
			echo '<span class="label label-success">มอบตัว</span>';
		}else{
			echo '<span class="label label-danger">ไม่มอบตัว</span>';
		}
		return NULL;
	}

	function show_check_money($data=NUll){
		if($data == 1){
			echo '<span class="label label-success">ลงทะเบียน</span>';
		}else{
			echo '<span class="label label-danger">ยังไม่ลงทะเบียน</span>';
		}
		return NULL;
	}

	function show_stat_surrender_exams_teacher($data=NUll){
		if($data == 1){
			echo '<span class="label label-success">T.มอบตัว</span>';
		}else{
			echo '<span class="label label-danger">T.ไม่มอบตัว</span>';
		}
		return NULL;
	}

	function btn_surrender_exams_teacher($data){
		$name ='name = "std['.$data['stdCardID'].']['.$data['stdApplyNo'].']"';
		if($data['surrender'] == 1){
			$v1c = "active" ;
			$v1v =	"chacked";
			$v0c = "" ;
			$v0v =	"";
		}else{
			$v1c = "" ;
			$v1v =	"";
			$v0c = "active" ;
			$v0v =	"chacked";

		}
		echo '	<div class="btn-group" data-toggle="buttons">
			
			<label class="btn btn-success '.$v1c.'">
				<input type="radio" '.$name.' id="" value=1  '.$v1v.'>
				<span class="glyphicon glyphicon-ok"></span>
			</label>

			
			<label class="btn btn-danger '.$v0c.'" >
				<input type="radio" '.$name.' id="" value=0 '.$v0v.'>
				<span class="glyphicon glyphicon-ok"></span>
			</label>
		
		</div>';

		// 
		// $id = 'id = "'.$data['stdCardID'].'"';
		// $name ='name = "std['.$data['stdCardID'].']['.$data['stdApplyNo'].']"'; 
		// if(@$data['surrender'] == 1){
		// 	$check = 'checked="checked"';
		// }
		// echo '	<div class="btn-group" data-toggle="buttons"
		//  onclick="inputcheck('.$data['stdCardID'].');">		
		// 		<label class="btn btn-primary">
		// 			<input '.$id.' '.$name.'  type="radio" value="1" '.@$check.' >
		// 			<span class="glyphicon glyphicon-ok"></span>
		// 		</label>
		// 	</div>';

		// if(@$data['surrender'] == 0 || @$data['surrender'] ==NULL){
		// 	$check = 'checked="checked"';
		// }
		// 	echo '	<div class="btn-group" data-toggle="buttons"
		//  onclick="inputcheck('.$data['stdCardID'].');">		
		// 		<label class="btn btn-primary">
		// 			<input '.$id.' '.$name.'  type="radio" value="0" '.@$check1.' >
		// 			<span class="glyphicon glyphicon-ok"></span>
		// 		</label>
		// 	</div>';



	// 	if($data['surrender'] == 1){
	// echo anchor('group/exams_surrender_teacher/'.
	// 	$data['stdAdmisResult'].'/'.
	// 	$data['stdCardID'].'/'.
	// 	$data['stdApplyNo'].'/0', 'ยกเลิกมอบตัว', array('title' => 'The best news!','class'=>'btn btn-warning'));

	// 	}else{
			
	// 		echo anchor('group/exams_surrender_teacher/'.
	// 	$data['stdAdmisResult'].'/'.
	// 	$data['stdCardID'].'/'.
	// 	$data['stdApplyNo'].'/1', 'รับมอบตัว', array('title' => 'The best news!','class'=>'btn btn-success'));


	// 	}
		return true;

	}


	
?>