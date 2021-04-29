<div class="container">
	<div class="page-header">
	  <h1>แก้ไข</h1>
      <br>
	</div>
    <!--form -->
    <form action="<?php echo site_url('set_department/group_edit_save');?>" method="POST">
    <input type="hidden" class="form-control" name="id" value="<?php echo $data['group_id'];?>">
    <input type="hidden" class="form-control" name="branchid" value="<?php echo $branchid;?>">
    <div class="form-group">
        <label>group_id</label>
        <input type="text" class="form-control" name="group_id" value="<?php echo $data['group_id'];?>">
        <span class="help-block">[year xx][ปวช 2,ปวส 3][branchid xxx][ปกติ 01,ม6/ต่างสาย 08,ทวิภาคี 09][group xx]</span>
    </div>

    <div class="form-group">
        <label>group_name</label>
        <input type="text" class="form-control" name="group_name" value="<?php echo $data['group_name'];?>">
    </div>

    <div class="form-group">
        <label>branch_id</label>
        <input type="text" class="form-control" name="branch_id" value="<?php echo $data['branch_id'];?>">
    </div>

    <div class="form-group">
        <label>branch_name</label>
        <input type="text" class="form-control" name="branch_name" value="<?php echo $data['branch_name'];?>">
    </div>

    <div class="form-group">
        <label>course_id</label>
        <input type="text" class="form-control" name="course_id" value="<?php echo $data['course_id'];?>">
    </div>
   
    <div class="form-group">
        <label>course</label>
        <input type="text" class="form-control" name="course" value="<?php echo $data['course'];?>">
    </div>

    <div class="form-group">
        <label>major_id</label>
        <input type="text" class="form-control" name="major_id" value="<?php echo $data['major_id'];?>">
    </div>

    <div class="form-group">
        <label>major_name</label>
        <input type="text" class="form-control" name="major_name" value="<?php echo $data['major_name'];?>">
    </div>


    <div class="form-group">
        <label>level_id</label>
        <input type="text" class="form-control" name="level_id" value="<?php echo $data['level_id'];?>">
    </div>

    <div class="form-group">
        <label>level_name</label>
        <input type="text" class="form-control" name="level_name" value="<?php echo $data['level_name'];?>">
    </div>

    <div class="form-group">
        <label>group_no</label>
        <input type="text" class="form-control" name="group_no" value="<?php echo $data['group_no'];?>">
    </div>

    <div class="form-group">
        <label>branch_nickname</label>
        <input type="text" class="form-control" name="branch_nickname" value="<?php echo $data['branch_nickname'];?>">
    </div>

    <div class="form-group">
        <label>typeOfCourseId</label>
        <input type="text" class="form-control" name="typeOfCourseId" value="<?php echo $data['typeOfCourseId'];?>">
    </div>

    <div class="form-group">
        <label>typeOfCourse</label>
        <input type="text" class="form-control" name="typeOfCourse" value="<?php echo $data['typeOfCourse'];?>">
    </div>

    <div class="form-group">
        <label>teacher_fname</label>
        <input type="text" class="form-control" name="teacher_fname" value="<?php echo $data['teacher_fname'];?>">
    </div>
    <div class="form-group">
        <label>teacher_lname</label>
        <input type="text" class="form-control" name="teacher_lname" value="<?php echo $data['teacher_lname'];?>">
    </div>

    <div class="form-group">
        <label>status</label>
        <select name="status" class="form-control">
        <option value="1" <?php if($data['status'] == 1) echo 'selected';?> >เปิด</option>
        <option value="2" <?php if($data['status'] == 2) echo 'selected';?> >ปิด</option>
      </select>
    </div>
   
    <button type="submit" class="btn btn-success">update</button>
    </form>
    <br>


    <!--End form -->

</div>