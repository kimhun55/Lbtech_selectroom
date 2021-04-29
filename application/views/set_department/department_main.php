<div class="container">
	<div class="page-header">
	  <h1>Department <small>by db admission</small></h1>
      <br>
      <small>1. สามารถเปลี่ยนชื่อ department ได้จากระบบ setup department<br>
      2. จำนวนสามารถกดปุ่มคำนวนได้จาก setup auto setup department</small>
	</div>
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>ON</th>
				<th>branchID</th>
				<th>Department</th>
				<th>open</th>
				
			</tr>
		</thead>
		<tbody>
		<?php foreach ($table as $key => $val) { ?>
			<tr>
				<td><?php echo $val['department_id'];?></td>
                <td><?php echo $val['department_branchId3'];?></td>
                <td><?php echo $val['department_name'];?></td>
                <td><a href="<?php echo site_url('set_department/branch_main/'.$val['department_branchId3'])?>"><button type="button" class="btn btn-info">Open Branch</button></a></td>
                
			</tr>
		<?php } ?>
			
		</tbody>
	</table>
</div>