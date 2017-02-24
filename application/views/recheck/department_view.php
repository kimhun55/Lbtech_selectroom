<div class="container">
	<div class="page-header">
	  <h1>รายชื่อแผนกและสาขางานทั้งหมดในระบบ <small>by db admission</small></h1>
	</div>
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>ON</th>
				<th>branchID</th>
				<th>branch</th>
				<th>major</th>
				<th>typeOfCourse</th>
				<th>level</th>
				<th>course</th>
				<th>branchId3</th>
				
			</tr>
		</thead>
		<tbody>
		<?php foreach ($data_table as $key => $value) { ?>
			<tr>
				<td><?php echo $key+1;?></td>
				<td><?php echo $value->branchID;?></td>
				<td><?php echo $value->branch;?></td>
				<td><?php echo $value->major;?></td>
				<td><?php echo $value->typeOfCourse;?></td>
				<td><?php echo $value->level;?></td>
				<td><?php echo $value->course;?></td>
				<td><?php echo $value->branchId3;?></td>
			</tr>
		<?php } ?>
			
		</tbody>
	</table>
</div>