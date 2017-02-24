<style type="text/css">
	.panel-title,.menu_list {
    
    text-align: center;
}
.form-control  {
	width: 30%;
}

</style>
<div class="container">
	<div class="row">
		<center><h3><?php echo "สาขา :".$data['branch']."[".$data['course']."]<br>สาขางาน :".$data['major'];?></h3>

		<?php if(isset($success_msg)) echo '<div class="alert alert-success" role="alert">'.$success_msg.'</div>';
			if(isset($warning_msg)) echo '<div class="alert alert-warning" role="alert">'.$warning_msg.'</div>'; 
			?>
		</center>
	</div>
	<div class="row">
 		<div class="col-md-9 col-md-push-3">
 			<div class="panel panel-primary"> 
 			<div class="panel-heading"> 
 			<h3 class="panel-title">Import File</h3></div> 
 				<div class="panel-body">
 				<?php if(!isset($data_table))  :?>
<form method="post" action="<?php echo $form_action;?>" enctype="multipart/form-data" accept-charset="utf-8">
<div class="form-group">
    <label >Group</label>
   <?php echo form_select_group($data_group_count_array);?>
  </div>
	
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile" name="fileinput">
    <!--<p class="help-block">Example block-level help text here.</p>-->
  </div>

  <hr>
  <!-- lnw -->
	
	
		
	<div class="form-group">
		<label>Std id</label>
		
		<input type="number" class="form-control" min ='0' value="0"   name="position_stdid">
	</div>
	<div class="form-group">
		<label>Fname</label>
		
		<input type="number"class="form-control" min ='0' value="0" name="position_fname">
		
	</div>
	
	<div class="form-group">
		<label>Lname</label>
		
		<input type="number" class="form-control" min ='0' value="0" name="position_lname">
		
	</div>
	<div class="form-group">
		<label>Select group</label>
		
		 <input type="number" class="form-control" min ='0' value="0" name="position_group">
		 
	</div>
		
	

	<!-- End lnw -->
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<?php else: ?>
 <form class="form-inline" method="post" action="<?php echo $form_action;?>">
 <input type="hidden" name="form_callback" value="<?php echo $form_callback; ?>"/>
 <div class="table-responsive">
<table class="table table-bordered table-hover">
 					<thead>
 						<tr>
 								<th>#</th>
 								<th>id</th>
 								<th>คำนำหน้า</th>
 								<th>ชื่อ</th>
 								<th>นามสกุล</th>
 								<th style="text-align: center;">กลุ่ม</th>
 						</tr>
 					</thead>

 					<tbody>
 					<?php $i = 1;
 							foreach ($data_table as $key => $value) {
 					?>	
 						<tr <?php echo (isset($value['check']))?'class="danger"':'';?> >
 								<td><?php echo $i++;?></td>
 								<td><?php echo (isset($value['stdApplyNo']))?$value['stdApplyNo']:'';?></td>
 								<td><?php echo (isset($value['prefix_id_th']))?$value['prefix_id_th']:'';?></td>
 								<td><?php echo (isset($value['stu_fname_th']))?$value['stu_fname_th']:'';?></td>
 								<td><?php echo (isset($value['stu_lname_th']))?$value['stu_lname_th']:'';?></td>
 		
 								<td style="text-align: center;">
 								<?php if(isset($value['stdApplyNo'])){?>
 	 
	  <div class="form-group">
	  
	    <?php 
	    
	    	if($std_group == 99 && $value['group'] != 0){
	    		$group = $value['group'];
	    	}else{
	    		$group = $std_group;
	    	}
	    	
	    if(!isset($value['check'])){
	    echo form_select_group_importfile($data_group_count_array,$group,$value['stdCardID'].'A'.$value['stdApplyNo']);
	    } ?>
	  </div>
	  <?php } ?>
 									
 								</td>
 						</tr>
 					<?php } ?>
 					</tbody>
 				</table> 
		</div>
 		
 		<button type="submit" class="btn btn-success">confirm</button>
	</form>

<?php endif ?>


 		 
 				</div> 
 			</div>
 			
 		</div>
  		<div class="col-md-3 col-md-pull-9">
		<?php $this->load->view('group/group_menu_view', $menu); ?>
  		</div>
	</div>
</div>