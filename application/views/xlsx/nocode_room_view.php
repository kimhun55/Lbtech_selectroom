<?php
$strExcelFileName=$file_name;

header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");

header("Content-Disposition: inline; filename=\"$strExcelFileName\"");

header("Pragma:no-cache"); 
?>
<table>
	<?php foreach ($data_group as $row) {
				foreach ($row as $key => $value) {		
	 ?>
		<tr>
				<td><?php echo $key;?></td>
				<td><?php echo $value;?></td>

		</tr>
	<?php
	} 
			}
	?>
</table>
<table>
	<thead>
		<tr>
		<!-- stdCardID,prefix_id_th,stu_fname_th,stu_lname_th,room_std_code');
		$this->db->where('room_std_group',$group)-->
				<th>NO</th>
				<!--<th>CardID</th>-->
				<th>stdApplyNo</th>
				<th>prefix_id_th</th>
				<th>stu_fname_th</th>
				<th>stu_lname_th</th>
				

		</tr>
	</thead>
	<tbody>
			<?php if($data_std !== false){
				$i =1;
				foreach ($data_std as $key => $value) {
			?><tr>
				<td><?php echo $i++;?></td>
				<!--<td><?php echo $value['stdCardID'];?></td>-->
				<td><?php echo $value['stdApplyNo'];?></td>
				<td><?php echo $value['prefix_id_th'];?></td>
				<td><?php echo $value['stu_fname_th'];?></td>
				<td><?php echo $value['stu_lname_th'];?></td>
				</tr>
		<?php }//foreach
		} 
		?>
	
	</tbody>
</table>