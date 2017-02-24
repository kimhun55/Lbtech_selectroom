<?php 
	// paramiter data => arry by query 
	 function dataTotable($data)
	{
		//check data
		if(!is_array($data) && count($data) < 0){
				return false;
		}

		foreach(current($data) as $key => $val){
				$colum[] = $key;
		}
		$hand = "<thead> <tr>";
		$hand.= "<th>#</th>";
		foreach($colum as $key => $val){
				$hand.= "<th>$val</th>";
		}
		$hand.= "</tr></thead>";
			
		
		$body = "<tbody>";
		$i = 1;
		foreach($data as $key => $val){
				$body.="<tr>";
				$body.="<td>$i</td>";
				$i++;
				foreach($val as $k => $v){
					$body.="<td>$v</td>";
					
				}
				$body.="</tr>";
			}
			
			
			$return = '<table class="table table-bordered table-hover" >'.$hand.$body."</table>";
			return $return;

	}

	function form_select($data){
		if($data == NULL || $data == '' || $data === false){
			return NULL;
		}
		$text = '<select class="form-control" name="select">';
		$text.='<option>Select</option>';
		foreach ($data as $key => $value) {

				$text.='<option value="'.$value['department_branchId3'].'">'.$value['department_name'].'</option>';
		}
		$text.='</select>';
		return $text;
	}

	function	var_dump_error($data,$stop =1){
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
		if($stop ==1 )
		exit();

	}
?>