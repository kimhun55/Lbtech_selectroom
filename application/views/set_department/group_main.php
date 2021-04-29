<div class="container-fluid">
	<div class="page-header">
	  <h1>สาขา <?php echo $branch['branch']." ".$branch['course']."";?>  <small>by db admission</small></h1>
        <br>
        
      <p class="text-center"><a target="_blank" href="<?php echo site_url('set_department/group_add_form/'.$branchid);?>"><button type="button" class="btn btn-success">เพิ่ม</button></a></p>
      <br>
	</div>
    <?php if($table !== false){ ?>
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>ON</th>
				<th>group_id</th>
				<th>group_name</th>
				<th>branch_id</th>
                <th>branch_name</th>
                <th>course_id</th>
                <th>course</th>
                <th>major_id</th>
                <th>major_name</th>
                <th>level_id</th>
                <th>level_name</th>
                <th>group_no</th>
                <th>branch_nickname</th>
                <th>typeOfCourseId</th>
                <th>typeOfCourse</th>
                <th>teacher_fname</th>
                <th>teacher_lname</th>
                <th>status</th>
                <th>edit</th>
                <th>delete</th>

			</tr>
		</thead>
		<tbody>
		<?php 
        $i = 1;
        foreach ($table as $key => $val) { ?>
			<tr>
                <td><?php echo $i++;?></td>
				<td><?php echo $val['group_id'];?></td>
                <td><?php echo $val['group_name'];?></td>
                <td><?php echo $val['branch_id'];?></td>
                <td><?php echo $val['branch_name'];?></td>
                <td><?php echo $val['course_id'];?></td>
                <td><?php echo $val['course'];?></td>
                <td><?php echo $val['major_id'];?></td>
                <td><?php echo $val['major_name'];?></td>
                <td><?php echo $val['level_id'];?></td>

                <td><?php echo $val['level_name'];?></td>
                <td><?php echo $val['group_no'];?></td>
                <td><?php echo $val['branch_nickname'];?></td>
                <td><?php echo $val['typeOfCourseId'];?></td>

                <td><?php echo $val['typeOfCourse'];?></td>
                <td><?php echo $val['teacher_fname'];?></td>
                <td><?php echo $val['teacher_lname'];?></td>
                <td>
                    <?php if(@$val['status'] == 1){
                        echo '<p class="bg-success text-center">เปิด</p>';
                    }else{
                        echo '<p class="bg-warning text-center">ปิด</p>';
                    }
                    ?>
                </td>
                <td><a href="<?php echo site_url('set_department/group_edit_form/'.$val['group_id'].'/'.$val['branch_id'])?>"><button type="button" class="btn btn-info">Edit</button></a></td>
                <td><a href="<?php echo site_url('set_department/group_delete/'.$val['group_id'].'/'.$val['branch_id'])?>" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-danger">Delete</button></a></td>

			</tr>
		<?php } ?>
			
		</tbody>
	</table>
    <?php }?>
</div>