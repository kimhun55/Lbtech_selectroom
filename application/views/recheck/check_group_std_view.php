<div class="container">
<div class="page-header">
  <h1>สอบตรง <small></small></h1>
</div>

<table class="table table-bordered table-hover">
	<thead> 
		<tr> 
			<th>#</th> 
			<th>stdCardID</th> 
			<th>stdApplyNo</th> 
			<th>prefix_id_th</th> 
			<th>stu_fname_th</th> 
			<th>stu_lname_th</th> 
			<th>branchId</th> 
			<th>stdAdmisResult</th>
			<th>round</th>
			<th>delete</th> 
		</tr> 
	</thead>
	<tbody>
	<?php 
		$i = 1;
	if(count($data['exams']) > 0)
		foreach ($data['exams'] as $key => $value) {
		
	?>
		<tr> 
			<td>#</td> 
			<td><?php echo $value['stdCardID'];?></td> 
			<td><?php echo $value['stdApplyNo'];?>/td> 
			<td><?php echo $value['data']['prefix_id_td'];?></td> 
			<td><?php echo $value['data']['stu_fname_td'];?></td> 
			<td><?php echo $value['data']['stu_lname_td'];?></td> 
			<td><?php echo $value['branchId'];?></td> 
			<td><?php echo $value['data']['stdAdmisResult'];?></td>
			<td><?php echo $value['data']['round'];?></td> 
			<td><?php
			echo anchor('recheck/delete_std_group/'.$value['stdCardID']."/".$value['stdApplyNo']
		, 'ลบ', array('title' => 'ลบ นะครับ','class'=>'btn btn-danger')); 
			?></td>
		</tr> 
	<?php } ?>
	</tbody>

	</table>


<div class="page-header">
  <h1>โคต้า <small></small></h1>
</div>
<table class="table table-bordered table-hover">
	<thead> 
		<tr> 
			<th>#</th> 
			<th>stdCardID</th> 
			<th>stdApplyN</th> 
			<th>prefix_id_th</th> 
			<th>stu_fname_th</th> 
			<th>stu_lname_th</th> 
			<th>branchId</th> 
			<th>stdAdmisResult</th>
			<th>stat_into ลงทะเบียน</th> 
			<th>delete</th> 
		</tr> 
	</thead>
	<tbody>
	<?php 
	$i = 1;
	if(count($data['quaota']) > 0)
		foreach ($data['quaota'] as $key => $value) {
		
	?>
		<tr> 
			<td><?php echo $i++;?></td> 
			<td><?php echo $value['stdCardID'];?></td> 
			<td><?php echo $value['stdApplyNo'];?></td> 
			<td><?php echo $value['data']['prefix_id_th'];?></td> 
			<td><?php echo $value['data']['stu_fname_th'];?></td> 
			<td><?php echo $value['data']['stu_lname_th'];?></td> 
			<td><?php echo $value['branchId'];?></td> 
			<td><?php echo $value['data']['stdAdmisResult'];?></td>
			<td><?php echo $value['data']['stat_into'];?></td>
			<td><?php
			echo anchor('recheck/delete_std_group/'.$value['stdCardID']."/".$value['stdApplyNo']
		, 'ลบ', array('title' => 'ลบ นะครับ','class'=>'btn btn-danger')); 
			?></td> 
		</tr> 
	<?php } ?>
	</tbody>
	</table>



<div class="page-header">
  <h1>ไม่พบข้อมูล <small></small></h1>
</div>




	<table class="table table-bordered table-hover">
	<thead> 
		<tr> 
			<th>#</th> 
			<th>stdCardID</th> 
			<th>stdApplyNo</th> 
			<th>branchId</th> 
			<th>delete</th>
		</tr> 
	</thead>
	<tbody>
		<?php $i=1;
		 if(count($data['no']) > 0)
		foreach ($data['no'] as $key => $value) {
		
	?>
		<tr> 
			<td><?php echo $i++;?></td> 
			<td><?php echo $value['stdCardID'];?></td> 
			<td><?php echo $value['stdApplyNo'];?></td> 
			<td><?php echo $value['branchId'];?></td>
				<td><?php
			echo anchor('recheck/delete_std_group/'.$value['stdCardID']."/".$value['stdApplyNo']
		, 'ลบ', array('title' => 'ลบ นะครับ','class'=>'btn btn-danger')); 
			?></td> 
		</tr> 
	<?php } ?>
	</tbody>

	</table>