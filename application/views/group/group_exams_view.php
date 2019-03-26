<style type="text/css">
	.panel-title,.menu_list {
    
    text-align: center;
}
.btn span.glyphicon {    			
	opacity: 0;				
}
.btn.active span.glyphicon {				
	opacity: 1;				
}
</style>

<div class="container">
	<div class="row" >
		<center><h3>
		<?php echo "สาขา :".$data['branch']."[".$data['course']."]<br>สาขางาน :".$data['major'];?>
		<br>
		<!-- status -->	
		สถานะการทำงาน :: <?php show_label_status($status); ?>
		</h3>

		<?php if(isset($success_msg)) echo '<div class="alert alert-success" role="alert">'.$success_msg.'</div>';
			if(isset($warning_msg)) echo '<div class="alert alert-warning" role="alert">'.$warning_msg.'</div>'; 
			?>
		</center>
	</div>
	<div class="row">
 		<div class="col-md-9 col-md-push-3">
 			<div class="panel panel-success"> 
 			<div class="panel-heading"> 
 			<div style="float: right;">
 			
 			</div>
 			<h3 class="panel-title">รายชื่อนักศึกษา สอบตรง ทั้งหมด [<?php echo $data_table['count']; ?>]</h3>
 			</div> 
 				<div class="panel-body">

	<form class="form-inline" style="text-align: center;" method="post" action="<?php echo $search_form_action;?>">
	  <div class="form-group">
	    <label for="">Searching</label>
	    <input type="text" class="form-control" name="search" placeholder="ค้นหา">
	  </div>
	  <button type="submit" class="btn btn-default">OK</button>
	  <a href="<?php echo site_url('group/exams/'.$branch.'/k/total');?>"><button type="button" class="btn btn-info ">By Total</button></a>
	</form>
	<br>
	<div class="jumbotron">
  	<h3>หมายเหตุ สถานะ ครู รับมอบตัว</h3>
  	<p>	<label class="btn btn-success active">
				
				<span class="glyphicon glyphicon-ok"></span>
			</label> นักเรียนมามอบตัวแล้ว </p>
	<p>	<label class="btn btn-danger active">
				
				<span class="glyphicon glyphicon-ok"></span>
			</label> นักเรียนไม่มามอบตัวแล้ว </p>
 
  
	</div>
		<br>
		<div class="table-responsive">
	<?php if($status == 2) { ?>
 	 	 <form class="" method="post" action="<?php echo $form_action;?>">
 	 	 
 	 	 <button type="submit" class="btn btn-primary" style="float: right; margin-bottom: 5px;">Send</button>
 	 	
 	 <?php } ?>
 	 <!-- <div style="width:100%;overflow:auto; max-height:500px; margin-bottom: 5px;"> -->
 				<table class="table table-bordered table-hover">
 					<thead>
 						<tr>
 								<th>#</th>
 								<?php if($orderby != NULL) echo "<th>".$orderby."</th>";?>
 								<th>id</th>
 								<th>คำนำหน้า</th>
 								<th>ชื่อ</th>
 								<th>นามสกุล</th>
 								<th style="text-align: center;">กลุ่ม</th>
 								<th>ครู รับมอบตัว</th>
 						</tr>
 					</thead>

 					<tbody>
 					<?php 
 							if($data_table['data'] != false && $data_table['data'] != ''){
 							$i = 1;
 							foreach ($data_table['data'] as $key => $value) {
 					?>	
 						<tr<?php if($value['std_group_room'] == 99 || $value['std_group_room'] == '') echo ' class="danger" ';?>
 						>
 								<td><?php echo $i++;?></td>
 								<?php if($orderby != NULL) echo "<td>".$value['total']."</td>";?>
 								<td><?php echo $value['stdApplyNo'];?>
 									<br>
 									<?php echo show_stat_surrender_exams_teacher($value['surrender']); ?> <?php @show_check_money($value['money']);?>
 								</td>
 								<td><?php echo $value['prefix_id_th'];?></td>
 								<td><?php echo $value['stu_fname_th'];?></td>
 								<td><?php echo $value['stu_lname_th'];?></td>
 								<td style="text-align: center;">
 	<?php if($status == 2) { ?>
 	  <div class="form-inline">
	  <div class="form-group">
	  <!--	<input type="hidden" name="stdCardID" value="<?php echo $value['stdCardID']; ?>" />
	  	<input type="hidden" name="stdApplyNo" value="<?php echo $value['stdApplyNo']; ?>"/>-->
	  	
	    <?php
	    if($data_group_count_array != false && $data_group_count_array != ''){ 
	    //echo form_select_group($data_group_count_array,$value['std_group_room']);
	    echo form_select_group_array($data_group_count_array,$value['std_group_room'],$value['stdCardID'],$value['stdApplyNo']);
	    ?>
	  <?php }?>
	   </div>
	  </div>
	   <?php } ?>
		</td>
 						
 						<td align="center"><?php btn_surrender_exams_teacher($value);?></td>
 						</tr>
 					<?php } }?>
 					</tbody>
 				</table>
 		<!-- </div> --><!--off div scrollbar-->
 		<?php if($status == 2) { ?>
 			 <button type="submit" class="btn btn-primary" style="float: right;">Send</button>
 			<input type="hidden" name="form_callback" value="<?php echo $form_callback; ?>"/>
 			</form>
 		<?php } ?>
		</div>

 		 
 				</div> 
 			</div>
 			
 		</div>
  		<div class="col-md-3 col-md-pull-9">
		<?php $this->load->view('group/group_menu_view', $menu); ?>
  		</div>
	</div>
</div>
