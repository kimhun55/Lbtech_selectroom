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
?>