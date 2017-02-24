<div class="container">
	<div class="page-header">
	  <h1>User Copyright </h1>
	</div>
<table class="table table-bordered table-hover" style="width: 80%; margin-right: auto;
    margin-left: auto; ">
		<thead>
			<tr>
				<th width="25%">#</th>
				<th width="25%">Name</th>
				<th width="25%">Tel</th>
				<th width="25%">Copyright</th>
				<th width="25%">Option</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; 
			
			foreach ($data as $key => $value) {  ?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $value['u_name']; ?></td>
				<td><?php echo $value['u_tel']; ?></td>
				<td><?php
				if($value['copyright'] != false) 
				echo implode("<br>", $value['copyright']);?></td>
				<td><a href="<?php echo site_url('setup/copyright/'.$value['u_id']);?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
			</tr>
			<?php } ?>
		</tbody>
		</table>


</div>