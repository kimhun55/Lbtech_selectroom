<div class="container">
	<div class="page-header">
	  <h1>User Management </h1>
	</div>

	
	<?php if(isset($success_msg)) echo '<div class="alert alert-success" role="alert">'.$success_msg.'</div>';
			if(isset($warning_msg)) echo '<div class="alert alert-warning" role="alert">'.$warning_msg.'</div>'; 
			?>

	<form class="form-horizontal" method="post" action="<?php echo (isset($update))?$update:site_url('setup/set_user/'.MD5("insert".date('ymdh')));?>">
  <div class="form-group">
    <label class="col-sm-2 control-label">Username</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="user[u_username]" value="<?php echo (isset($data_user))?$data_user['u_username']:'';?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Password</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="user[u_password]" value="<?php echo (isset($data_user))?$data_user['u_password']:'';?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Name</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="user[u_name]" value="<?php echo (isset($data_user))?$data_user['u_name']:'';?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Tel</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="user[u_tel]" value="<?php echo (isset($data_user))?$data_user['u_tel']:'';?>">
    </div>
  </div>
  
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>

<hr>

<table class="table table-bordered table-hover" style="width: 80%; margin-right: auto;
    margin-left: auto; ">
		<thead>
			<tr>
				<th width="25%">#</th>
				<th width="25%">Username</th>
				<th width="25%">Password</th>
				<th width="25%">Name</th>
				<th width="25%">Tel</th>
				<th width="25%">Option</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; 
			 foreach ($data as $key => $value) {  ?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $value['u_username']; ?></td>
				<td><?php echo $value['u_password']; ?></td>
				<td><?php echo $value['u_name']; ?></td>
				<td><?php echo $value['u_tel']; ?></td>
				<td>
				<a href="<?php echo site_url('setup/set_user/'.MD5("updateform".date('ymdh').$value['u_id']).'/'.$value['u_id']);?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>  
				 <a href="<?php echo site_url('setup/set_user/'.MD5("delete".date('ymdh').$value['u_id']).'/'.$value['u_id']);?>"> <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a> </td>
			</tr>
			<?php } ?>
		</tbody>
		</table>


</div>