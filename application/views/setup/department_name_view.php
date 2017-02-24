<style type="text/css">
	
.form-control{
	    width: initial;
}
</style>
<div class="container">
	<div class="page-header">
  		<h1>รหัสแผนก ตั้งค่าชื่อแผนก <small>by db room</small></h1>
	</div>
	
	<?php if(isset($success_msg)) echo '<div class="alert alert-success" role="alert">'.$success_msg.'</div>';
			if(isset($warning_msg)) echo '<div class="alert alert-warning" role="alert">'.$warning_msg.'</div>'; 
			?>
	
	<form action="<?php echo site_url('setup/set_department_name/'.MD5("insert".date('ymdh')));?>" method="POST" role="form">
	
		<table class="table table-bordered table-hover" style="width: 50%; margin-right: auto;
    margin-left: auto; ">
		<thead>
			<tr>
				<th width="25%">#</th>
				<th width="25%">Code</th>
				<th width="25%">Count</th>
				<th width="25%">Name</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $key => $value) {  ?>
			<tr>
				<td><?php echo $value['department_id']; ?></td>
				<td><?php echo $value['department_branchId3']; ?></td>
				<td><?php echo $value['department_branchId_count']; ?></td>
				<td><input type="text" class="form-control" name="department_branchId3[<?php echo $value['department_branchId3'];?>]" value="<?php echo $value['department_name']; ?>"></td>
			</tr>
			<?php } ?>
		</tbody>
		</table>
	<center><button type="submit"  class="btn btn-success">UPDATE</button></center>
	
	</form>



</div>