<div class="container">
	<div class="page-header">
	  <h1>เพิ่ม</h1>
      <br>
	</div>
    <!--form -->
    <form action="<?php echo site_url('set_department/branch_add_save');?>" method="POST">
   
    <input type="hidden" class="form-control" name="branchId3" value="<?php echo $branchId3;?>">
    <div class="form-group">
        <label>branchId</label>
        <input type="text" class="form-control" name="branchId" value="<?php echo @$data['branchId'];?>">
    </div>

    <div class="form-group">
        <label>branch</label>
        <input type="text" class="form-control" name="branch" value="<?php echo @$data['branch'];?>">
    </div>

    <div class="form-group">
        <label>typeOfCourse</label>
        <input type="text" class="form-control" name="typeOfCourse" value="<?php echo @$data['typeOfCourse'];?>">
    </div>

    <div class="form-group">
        <label>level</label>
        <input type="text" class="form-control" name="level" value="<?php echo @$data['level'];?>">
    </div>

    <div class="form-group">
        <label>level_id</label>
        <input type="text" class="form-control" name="level_id" value="<?php echo @$data['level_id'];?>">
    </div>
   
    <div class="form-group">
        <label>course</label>
        <input type="text" class="form-control" name="course" value="<?php echo @$data['course'];?>">
    </div>

    <div class="form-group">
        <label>branchId3</label>
        <input type="text" class="form-control" name="branchId3" value="<?php echo @$branchId3;?>">
    </div>

    <div class="form-group">
        <label>groupNickName</label>
        <input type="text" class="form-control" name="groupNickName" value="<?php echo @$data['groupNickName'];?>">
    </div>

    <div class="form-group">
        <label>status</label>
        <select name="status" class="form-control">
        <option value="1" <?php if(@$data['status'] == 1) echo 'selected';?> >เปิด</option>
        <option value="2" <?php if(@$data['status'] == 2) echo 'selected';?> >ปิด</option>
      </select>
    </div>
   
    <button type="submit" class="btn btn-success">create</button>
    </form>
    <br>


    <!--End form -->

</div>