<?php exit('off page'); ?>
<style type="text/css">
	.panel-title,.menu_list {
    
    text-align: center;
}
    .container{
    	/*min-height: 680px;*/
    }

	.form-inline{
		text-align: center;
	}
	.panel{
		min-height: 500px;
	}
	.footer {
    bottom: 0px;
}
</style>
<div class="container">
	<div class="row">
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
 		<div class="col-md-9 col-md-push-3"><!--start div-->

 		
	  		<div class="panel panel-info"> 
	  			<div class="panel-heading"> <h3 class="panel-title">Setup</h3> </div> 
	  				<div class="panel-body"> 
	  			<form class="form-inline" method="post" action="<?php echo $action_group_count;?>">
	 		 <div class="form-group">
	  		  <label>Setup count Group</label>
	   		 <input type="number" class="form-control" name="group_count">
	  		</div>
	 		 <button type="submit" class="btn btn-default">Sign in</button>
			</form>
	  		 
	  				</div> 
	  		</div>	

 		</div><!--end div-->
 			
 		
  		<div class="col-md-3 col-md-pull-9">
		<?php $this->load->view('group/group_menu_view', $menu); ?>
  		</div>
	</div>
</div>