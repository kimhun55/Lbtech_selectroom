<div class="container">
	<div class="page-header">
	<center><h1>Copyright Management <br><h3>-----<?php echo $data['0']['u_name'];?>-----</h3></h1></center>
	</div>
<center>
	<?php if(isset($success_msg)) echo '<div class="alert alert-success" role="alert">'.$success_msg.'</div>';
			if(isset($warning_msg)) echo '<div class="alert alert-warning" role="alert">'.$warning_msg.'</div>'; 
			?>
	<form class="form-inline" method="post" action="<?php echo site_url('setup/copyright/'.$data['0']['u_id'].'/'.MD5("add".date('ymdh')));?>">
	  <div class="form-group">
	    <label for="exampleInputName2">Copyright</label>
	   	<?php echo form_select($select);?>
	  </div>

	  <button type="submit" class="btn btn-default">Send</button>
	  </form> 
	  <br>	  
</center>
	<table class="table table-bordered table-hover" style="width: 50%; margin-right: auto;
    margin-left: auto; ">
		<thead>
			<tr>
				<th>#</th>
				<th>branchId3</th>
				<th>Copyright</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; 
		
			foreach ($data as $key => $value) { 
			if($value['copyright']!= NULL){ 
					foreach($value['copyright'] as$k =>$v){?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $k; ?></td>
				<td><?php echo $v; ?></td>
				<td><a href="<?php echo site_url('setup/copyright/'.$value['u_id'].'/'.MD5("delete".date('ymdh').$data['0']['u_id'].$k).'/'.$k);?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
			</tr>
			<?php } }}?>
		</tbody>
		</table>


</div>