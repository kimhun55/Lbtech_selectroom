<style type="text/css">
	a{
		color: #000000;
	}
	a:hover {
    color: #0000ff;
}
</style>
<div class="container">
	<br>
	<!--<div class="jumbotron"><h1>Home!</h1> <p>Testing User </p> </div> -->
	<!-- ปวช -->
	<div style="float: right;" >
		<a href="<?php echo site_url('/home');?>"><span class="glyphicon glyphicon-th-large"  style="font-size: 24px;"></span></a>
			<a href="<?php echo site_url('/home/index/horizontal');?>"><span class="glyphicon glyphicon-align-justify"  style="font-size: 24px;"></span></a>
	</div>
	<br>
	<br>
	<div class="row"> 
	<?php 
	if($menu_vocational != NULL && $menu_vocational != false){ 
		foreach($menu_vocational as $key =>$value){
			?>
			<div class="col-sm-6 col-md-4"> 
			<div class="thumbnail list-group-item-success"> 
				<div class="caption"> 
					<h3><?php echo $value['branch']?></h3> 
					<p>สาขางาน : <?php echo $value['major']?>
					<br>
					Lavel : <?php echo $value['level'];?>
					<br>
					Coures : <?php echo $value['course'];?>
				
					<h3><?php echo label_status($value['status']);?></h3>
					</p> 
					<p><a href="<?php echo site_url('/group/zonebranch/'.$value['branchId']);?>" class="btn btn-primary" role="button">OK</a> </p> 
				</div> 
			</div> 
		</div>
	<?php } }?>
		

	</div>
		
	<hr>
	<div class="row"> 
	<?php 	if($menu_high_vocational != NULL && $menu_high_vocational != false){ 
		foreach($menu_high_vocational as $key =>$value){
			?>
			<div class="col-sm-6 col-md-4"> 
			<div class="thumbnail list-group-item-warning"> 
				<div class="caption"> 
					<h3><?php echo $value['branch']?></h3> 
					<p>สาขางาน : <?php echo $value['major']?>
					<br>
					Lavel : <?php echo $value['level'];?>
					<br>
					Coures : <?php echo $value['course'];?>
					
					<h3><?php echo label_status($value['status']);?></h3>
					</p> 
					<p><a href="<?php echo site_url('/group/zonebranch/'.$value['branchId']);?>" class="btn btn-primary" role="button">OK</a> </p> 
				</div> 
			</div> 
		</div>
	<?php } }?>
		
	</div>

	



</div>