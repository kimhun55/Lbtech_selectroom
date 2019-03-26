<div class="container" style="min-height: 700px">
	
<br>

<form class="form-inline" method="post" action="<?php echo site_url("setup/set_group_room");?>">
  <div class="form-group">
    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
    <div class="input-group">
      <select name="department_id" class="form-control">
		 <?php 
		 	foreach ($data['data_department'] as $key => $value) {
		 ?>
		 		<option value="<?php echo $value['department_id'];?>"><?php echo $value['department_name'];?></option>
		 <?php 
		 	}
		 ?>
		</select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary"> Ok</button>
</form>
<br>
<div class="page-header">
  <h1><?php echo $data['data_where_department']['department_name'];?></h1>
</div>


<p><h3> ปวช </h3></p>
<div class="panel panel-default">
  <div class="panel-body">
    <?php 
    foreach ($data['data_vocationl'] as $key => $value) {
    	echo $value['branch']." | ".$value['major']." | ".$value['course']."<br>";
    }
    ?>
  </div>
</div>
<table class="table table-bordered table-hover"> 
	<thead> 
		<tr> 
			<th>ID</th> 
			<tH>GROUP NAME
			<th>GROUP NUMBER</th> 
			<th>Brand</th> 
			<th>Major</th> 
			<th>course</th> 
			<th>option</th> 
		</tr> 
	</thead> 
	<tbody> 
		<?php foreach ($data['data_room_vocation'] as $key => $value) { ?>
			<tr>
				<td><?php echo $value['group_id'];?></td>
				<td><?php echo $value['group_name'];?></td>
				<td><?php echo $value['group_no'];?></td>
				<td><?php echo $value['branch_name'];?></td>
				<td><?php echo $value['major_name'];?></td>
				<td><?php echo $value['course'];?></td>
				<td><span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> || <span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span> </td>
			</tr>
		<?php } ?>
	</tbody> 
</table>

<br>
<hr>


<p><h3> ปวส </h3></p>
<div class="panel panel-default">
  <div class="panel-body">
     <?php 
    foreach ($data['data_high_vocationl'] as $key => $value) {
    	echo $value['branch']." | ".$value['major']." | ".$value['course']."<br>";
    }
    ?>
  </div>
</div>
<table class="table table-bordered table-hover"> 
	<thead> 
		<tr> 
			<th>ID</th> 
			<tH>GROUP NAME
			<th>GROUP NUMBER</th> 
			<th>Brand</th> 
			<th>Major</th> 
			<th>course</th> 
			<th>option</th> 
		</tr> 
	</thead> 
	<tbody> 
		<?php foreach ($data['data_room_high_vocation'] as $key => $value) { ?>
			<tr>
				<td><?php echo $value['group_id'];?></td>
				<td><?php echo $value['group_name'];?></td>
				<td><?php echo $value['group_no'];?></td>
				<td><?php echo $value['branch_name'];?></td>
				<td><?php echo $value['major_name'];?></td>
				<td><?php echo $value['course'];?></td>
				<td>sdfsdf</td>
			</tr>
		<?php } ?>
	</tbody> 
</table>



</div>