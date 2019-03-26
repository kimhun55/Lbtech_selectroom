
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url("public/img/icon/1459414497_target.ico");?>">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Check code std</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </head>
  <body>
   <div class="container">
	<div class="page-header">
  		<h1>ระบบตรวจสอบรหัสนักศึกษา ใหม่ 2560 <small>by ศูนย์ข้อมูลวิทยาลัยเทคนิคลพบุรี</small></h1>
	</div>

   <form class="form-inline" style="text-align: center;" method="post" action="<?php echo site_url('internet/');?>">
 
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3">Password</label>
    <input type="test" name="q" class="form-control" id="" placeholder="รหัสบัตรประชาชน">
  </div>
  
  <button type="submit" class="btn btn-default">Sign in</button>
</form>
<br>
<?php if($data_table != NULL && $data_table !== false ){ ?>
<table class="table table-bordered table-hover"> 
<thead> 
	<tr> 
		
		<th>รหัสนักศึกษา</th> 
		<th>คำนำหน้า</th> 
		<th>ชื่อ</th> 
		<th>นามสกุล</th>
		<tbody> 
		<?php 
		foreach ($data_table as $key => $value) {
			//stdCardID,prefix_id_th,stu_lname_th,stu_fname_th,room_std_code
		?>
			<tr>
				<td><?php echo $value['room_std_code'];?></td>
				<td><?php echo $value['prefix_id_th'];?></td>
				<td><?php echo $value['stu_fname_th'];?></td>
				<td><?php echo $value['stu_lname_th'];?></td>


			</tr>
			
		<?php } ?>
		</tbody> 
</table>
	
 <?php } else{ ?>
 <br>
 <br>
 <br>
 <center><h2><div class="alert alert-danger" role="alert">ไม่พบข้อมูล</div></h2> </center>
 <?php } ?>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
