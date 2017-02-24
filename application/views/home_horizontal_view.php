<style type="text/css">
	a{
		color: #000000;
	}
	a:hover {
    color: #0000ff;
}

.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
  background-color: #bcbcbc;
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
	<div class="page-header">
 		 <h1>Vocational ปวช.</h1>
	</div>
	<table class="table table-bordered table-hover">

		<thead> 
			<tr> 
			<th>Branch </th> 
			<th>Mojor</th> 
			<th>Lavel</th> 
			<th>Coures</th>
			<th>Std FULL</th> 
			<th>No Room</th> 
			<th>Status</th>  
			<th>Dir</th> 
			</tr> 
		</thead>
	<tbody>
	<?php 
	if($menu_vocational != NULL && $menu_vocational != false){ 
		foreach($menu_vocational as $key =>$value){
			?>
				<tr>

			
					<td><?php echo $value['branch']?></td> 
					<td>  <?php echo $value['major']?></td>
					
					<td> <?php echo $value['level'];?></td>
					
					<td> <?php echo $value['course'];?></td>
					<td> <?php echo $value['std_full'];?></td>
					<td> <?php echo $value['std_no_room'];?></td>
					<td> <?php echo label_status($value['status']);?></td>


					
					<td><a href="<?php echo site_url('/group/zonebranch/'.$value['branchId']);?>" class="btn btn-primary btn-xs"> 
					<span class="glyphicon glyphicon-search" aria-hidden="true"></a> </td> 
				</tr>
	<?php } }?>
		


	</tbody>
	</table>
	</div>	
	<hr>
	<div class="row"> 
	<div class="page-header">
 		 <h1>High Vocational ปวส.</h1>
	</div>
	<table class="table table-bordered table-hover">

		<thead> 
			<tr> 
			<th>Branch </th> 
			<th>Mojor</th> 
			<th>Lavel</th> 
			<th>Coures</th> 
			<th>Std FULL</th> 
			<th>No Room</th> 
			<th>Status</th> 
			<th>Dir</th> 
			</tr> 
		</thead>
	<tbody>
	<?php 	if($menu_high_vocational != NULL && $menu_high_vocational != false){ 
		foreach($menu_high_vocational as $key =>$value){
			?>
			<tr>

			
					<td><?php echo $value['branch']?></td> 
					<td>  <?php echo $value['major']?></td>
					
					<td> <?php echo $value['level'];?></td>
					
					<td> <?php echo $value['course'];?></td>
					<td> <?php echo $value['std_full'];?></td>
					<td> <?php echo $value['std_no_room'];?></td>
					<td> <?php echo label_status($value['status']);?></td>


					
					<td><a href="<?php echo site_url('/group/zonebranch/'.$value['branchId']);?>" class="btn btn-primary btn-xs"> 
					<span class="glyphicon glyphicon-search" aria-hidden="true"></a> </td> 
				</tr>
	<?php } }?>
	</tbody>
	</table>
	</div>

	



</div>