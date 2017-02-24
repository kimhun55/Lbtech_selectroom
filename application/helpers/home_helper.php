<?php

function label_status($id){

	if($id == 1){
		return '<span class="label label-default">ไม่ทำงาน (Not Work)</span>';
	}
	if($id == 2){
		return '<span class="label label-primary">ทำงานพร้อมจัดกลุ่ม (Work)</span>';
	}
	if($id == 5){
		return '<span class="label label-success">ออกรหัสนักเรียนแล้ว (code)</span>';
	}
	
	if($id == 4){
		return '<span class="label label-info">ยืนยันการจัดกลุ่ม (Finish)</span>';
	}
	

	if($id == 3){
		return '<span class="label label-warning">Problem</span>';
	}else{
		return '<span class="label label-danger">error</span> ';
	}
	
}


?>