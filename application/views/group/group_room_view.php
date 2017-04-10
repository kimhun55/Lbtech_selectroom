<style type="text/css">
	.panel-title,.menu_list {
    
    text-align: center;
}
</style>
<div class="container">
	<div class="row" >
		<center><h3><?php echo "สาขา :".$data['branch']."[".$data['course']."]<br>สาขางาน :".$data['major'];?>
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
 			<h3 class="panel-title"><?php echo $data_group['group_name'];?> [<?php echo $data_table['sum']; ?>] (<?php echo $data_group['teacher_fname']." ".$data_group['teacher_lname'];?>)
 			<div style="float: right;"> 
 			<!-- export  data -->
 			<?php if($status == 5){ ?>
 			<a href="<?php echo site_url('export_pdf/index/'.$data['branchId']."/".$data_room);?>" target="_blank"><img src="<?php echo base_url("public/img/pdf.png");?>" style="max-width: 25px;"></a>
 			<a href="<?php echo site_url("xlsx/std_room/".$data['branchId']."/".$data_room);?>" target="_blank"><img src="<?php echo base_url("public/img/xlsx.png");?>" style="max-width: 25px;"></a>
 			<?php }else{ ?>

 			<a href="<?php echo site_url('export_pdf/nocode_pdf_fo_room/'.$data['branchId']."/".$data_room);?>" target="_blank"><img src="<?php echo base_url("public/img/pdf.png");?>" style="max-width: 25px;"></a>
 			<a href="<?php echo site_url("xlsx/nocode_std_room/".$data['branchId']."/".$data_room);?>" target="_blank"><img src="<?php echo base_url("public/img/xlsx.png");?>" style="max-width: 25px;"></a>
 			
 			<?php } ?>
 			</div>
 			</h3>
 			 
    		
   
 			</div> 
 				<div class="panel-body">
	<form class="form-inline" style="text-align: center;" method="post" action="<?php echo $search_form_action;?>">
	  <div class="form-group">
	    <label for="">Searching</label>
	    <input type="text" class="form-control" name="search" placeholder="ค้นหา">
	  </div>
	  <button type="submit" class="btn btn-default">OK</button>
	</form>
		<br>
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
 							foreach ($data_table['data'] as $key => $value) {
 					?>	
 						<tr>
 								<td><?php echo $i++;?></td>
 								<td><?php echo $value['stdApplyNo'];?><br><?php std_type($value['in']);?> <?php if($value['in'] !='exams') @show_stat_into($value['stat_into']);?> <?php @show_check_money($value['money']);?></td>
 								<td><?php echo $value['prefix_id_th'];?></td>
 								<td><?php echo $value['stu_fname_th'];?></td>
 								<td><?php echo $value['stu_lname_th'];?></td>
 								<td style="text-align: center;">
 	<?php if($status == 2) { ?>
 	  <form class="form-inline" method="post" action="<?php echo $form_action;?>">
	  <div class="form-group">
	  	<input type="hidden" name="stdCardID" value="<?php echo $value['stdCardID']; ?>" />
	  	<input type="hidden" name="stdApplyNo" value="<?php echo $value['stdApplyNo']; ?>"/>
	  	<input type="hidden" name="form_callback" value="<?php echo $form_callback; ?>"/>
	    <?php echo form_select_group($data_group_count_array,$value['std_group_room']); ?>
	  </div>
	  <button type="submit" class="btn btn-default">Send</button>
	</form>
	<?php } ?>
 									
 								</td>
 						</tr>
 					<?php } ?>
 					</tbody>
 				</table> 
 		</div>


 		 
 				</div> 
 			</div>
 			
 		</div>
  		<div class="col-md-3 col-md-pull-9">
		<?php $this->load->view('group/group_menu_view', $menu); ?>
  		</div>
	</div>
</div>