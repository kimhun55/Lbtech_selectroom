<ul class="list-group">
  <li class="list-group-item menu_list active">
    Menu
    <?php if(@$status != ''){ ?>
    <span class="badge">
    <span class="glyphicon glyphicon-cog" aria-hidden="true" data-toggle="modal" data-target="#myModal"></span>
    </span>
     <?php } ?>
  </li>
  
  <?php //var_dump($menu_data); 
  foreach($menu_data as $key => $value){ ?>

  <li class=" 
  <?php 
  	 if(isset($room)){
  		if(isset($value['number'])&&$value['number'] == $room){
  			echo 'list-group-item list-group-item-success';
 		 }else{
 		 	echo 'list-group-item';
 		 }

 		}else{
  			echo 'list-group-item';
 		 }


  if ($value['count'] == 0 && $value['name'] != 'Import File') {
  		echo ' disabled';
  } 


  ?> ">

  		<a href="<?php echo $value['link'];?>">

      <?php echo $value['name'];?></a>
      <?php
      if($value['count'] != NULL && $value['count'] != false){
      ?><span class="badge"><?php echo $value['count']; }?></span>
      
      </li>
  <?php } ?> 
</ul>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Setup</h4>
      </div>
      <div class="modal-body">

      
       <form class="form-inline" style="text-align: center;" method="post" action="<?php echo site_url('status/userset')?>">
            <div class="form-group">
                 <label for="">Status</label>
                 <input name="branchId" value="<?php echo $branch;?>" type="hidden">
                   <select name="status" class="form-control">
                   <?php if($status == 1){ ?>
                          <option <?php add_selected(1,$status);?> value="1">ไม่ทำงาน (Not Work)</option>
                  <?php } ?>

                  <?php $s2 = array(1,3,2,4);
                    if(in_array($status,$s2)){ 
                  ?> 
                          <option <?php add_selected(2,$status);?> value="2">ทำงานพร้อมจัดกลุ่ม (Work)</option>
                  <?php } ?> 

                  <?php $s2 = array(2,3,4);
                    if(in_array($status,$s2)){ 
                  ?> 
                          <option <?php add_selected(4,$status);?> value="4">ยืนยันการจัดกลุ่ม (Finish)</option>
                  <?php } ?>

                  <?php $s2 = array(2,4,3);
                    if(in_array($status,$s2)){ 
                  ?> 
                         <!-- <option <?php add_selected(3,$status);?> value="3">Problem</option>-->
                  <?php } ?>

                   <?php $s2 = array(4,5);
                    if(in_array($status,$s2) && in_array("999", $user_copyright)){ 
                  ?> 
                          <option <?php add_selected(5,$status);?> value="5">ออกรหัสนักเรียนแล้ว (code)</option>
                  <?php } ?>
                    </select>
            </div>
           <button type="submit" class="btn btn-default">OK</button>
         </form>


      </div>
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      -->
    </div>
  </div>
</div>
