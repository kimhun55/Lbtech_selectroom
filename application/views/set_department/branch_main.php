<div class="container-fluid">
	<div class="page-header">
	  <h1>Departmant <?php echo $departmant['department_name']." [".$departmant['department_branchId3']."]";?>  <small>by db admission</small></h1>

      
      <br>
      <p class="text-center"><a target="_blank" href="<?php echo site_url('set_department/branch_add_form/'.$branchId3);?>"><button type="button" class="btn btn-success">เพิ่ม</button></a></p>

	</div>
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>ON</th>
				<th>branchId</th>
				<th>branch</th>
				<th>typeOfCourse</th>
                <th>level</th>
                <th>level_id</th>
                <th>course</th>
                <th>branchId3</th>
                <th>groupNickName</th>
                <th>count group</th>
                <th>status</th>
                <th>edit</th>
                <th>group</th>

			</tr>
		</thead>
		<tbody>
		<?php 
        $i = 1;
        foreach ($table as $key => $val) { ?>
			<tr>
                <td><?php echo $i++;?></td>
				<td><?php echo $val['branchId'];?></td>
                <td><?php echo $val['branch'];?></td>
                <td><?php echo $val['typeOfCourse'];?></td>
                <td><?php echo $val['level'];?></td>
                <td><?php echo $val['level_id'];?></td>
                <td><?php echo $val['course'];?></td>
                <td><?php echo $val['branchId3'];?></td>
                <td><?php echo $val['groupNickName'];?></td>
                <td><?php echo $val['count'];?></td>
                <td>
                    <?php if($val['status'] == 1){
                        echo '<p class="bg-success text-center">เปิด</p>';
                    }else{
                        echo '<p class="bg-warning text-center">ปิด</p>';
                    }
                    ?>
                </td>
                <td><a href="<?php echo site_url('set_department/branch_edit_form/'.$val['branchId']."/".$branchId3)?>"><button type="button" class="btn btn-info">Edit</button></a></td>
                <td><a href="<?php echo site_url('set_department/group_main/'.$val['branchId'])?>"><button type="button" class="btn btn-primary">Open</button></a></td>

			</tr>
		<?php } ?>
			
		</tbody>
	</table>
</div>