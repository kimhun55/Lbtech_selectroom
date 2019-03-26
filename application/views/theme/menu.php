
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
		    <div class="navbar-header">
		     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		      <a class="navbar-brand" href="#">System Room</a>
		    </div>
		    <div id="navbar" class="navbar-collapse collapse">
		    <ul class="nav navbar-nav ">
		      <li class="<?php //echo $this->menu->active_menu($menu_navbar,'home'); ?>"><?php echo anchor('home','Home');?></li>
		      <?php if(count($menu_vocational) > 0 && $menu_vocational !== false){?>
		      <li class="dropdown <?php echo $this->menu->active_menu($menu_navbar,'ปวช.'); ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ปวช<span class="caret"></span></a>
		        <ul class="dropdown-menu scrollable-menu">
		        <?php foreach ($menu_vocational as $key => $value) {?>
		        		<li><a href="<?php echo site_url('group/zonebranch/'.$value['branchId']); ?>"><?php echo "สาขา : ".$value['branch']." || เอก : ".$value['major']." || ".$value['course'];?></a></li>
		        <?php } ?>
		        </ul>
		      </li>

		      <?php } ?>


<!---------------- ปวส new menu bass 10/2/261 -------->
			<style type="text/css">
				.dropdown-menu {
					min-width: 200px;
				}
				.dropdown-menu.columns-2 {
					min-width: 1100px;
				}
				.dropdown-menu.columns-3 {
					min-width: 600px;
				}
				.dropdown-menu li a {
					padding: 5px 15px;
					font-weight: 300;
				}
				.multi-column-dropdown {
					list-style: none;
				  margin: 0px;
				  padding: 0px;
				}
				.multi-column-dropdown li a {
					display: block;
					clear: both;
					line-height: 1.428571429;
					color: #333;
					white-space: normal;
				}
				.multi-column-dropdown li a:hover {
					text-decoration: none;
					color: #262626;
					background-color: #999;
				}
				 
				@media (max-width: 767px) {
					.dropdown-menu.multi-column {
						min-width: 240px !important;
						overflow-x: hidden;
					}
				}
			</style>
				
<?php 
//check count  menu  > 10
 $count = count($menu_high_vocational); 
if($count > 10){
?>
		      <li class="dropdown">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown">ปวส <b class="caret"></b></a>
	            <ul class="dropdown-menu multi-column columns-2">
		            <div class="row">
			            

			            <?php 
			           
			            $multi = ($count/2)+1;


			            $i = 1;
			            foreach ($menu_high_vocational as $key => $value) {?>
		        		
		        		<?php 
		        		if($i == 1 || $i == ($multi+1)){
		        		?>
		        		<div class="col-sm-6">
				            <ul class="multi-column-dropdown">
				        <?php } ?>

					            <li><a href="<?php echo site_url('group/zonebranch/'.$value['branchId']); ?>"><?php echo "สาขา : ".$value['branch']." || เอก : ".$value['major']." || ".$value['course'];?></a></li>

				        <?php if($i == $multi || $i == $count ){ ?>
				            </ul>
				         </div>
				        <?php } ?>
			           
			           
			           <?php 
			           $i++;
			       			} ?>

		            </div>
	            </ul>
	        </li>
<?php 
// end check count > 10
}else{
?>
<!---------------- end  new menu bass 10/2/261 -------->

			<!-- ปวส -->
			 <?php if(count($menu_high_vocational) > 0 && $menu_high_vocational !== false){?>
		      <li class="dropdown <?php //echo $this->menu->active_menu($menu_navbar,'ปวส.'); ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ปวส<span class="caret"></span></a>
		        <ul class="dropdown-menu scrollable-menu">
		        <?php foreach ($menu_high_vocational as $key => $value) {?>
		        		<li><a href="<?php echo site_url('group/zonebranch/'.$value['branchId']); ?>"><?php echo "สาขา : ".$value['branch']." || เอก : ".$value['major']." || ".$value['course'];?></a></li>
		        <?php } ?>
		        </ul>
		      </li>
		      <?php } ?>
<?php 
//end check count <10 
}
?>

		      <?php
		      if(in_array("999", $copyright_user)){  ?>
		      <li class="dropdown <?php echo $this->menu->active_menu($menu_navbar,'setup'); ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Setup<span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="#"><?php echo anchor('setup/set_user','User Management'); ?></a></li>
		          <li><a href="#"><?php echo anchor('setup/set_copyright','Copyright system');?></li>
		          <li><a href="#"><?php echo anchor('setup/set_department_name','Department Name'); ?></a></li>
		          <li><a href="#"><?php echo anchor('setup/set_group_room','Set group room'); ?></a></li>
		          <li role="separator" class="divider"></li>
		          <li><a href="#"><?php echo anchor('setup/setup_department','Auto Setup Department');?></a></li>
		          <li><a href="#"><?php echo anchor('setup/setup_branch','Auto Setup branch');?></a></li>
		          <li><a href="#"><?php echo anchor('setup/setup_cleaning_group_status','Auto Setup Cleaning Group Status');?></a></li>
		        </ul>
		      </li>
		      <?php } ?>
		       <li class="dropdown <?php echo $this->menu->active_menu($menu_navbar,'recheck'); ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Recheck<span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><?php echo anchor('recheck/department','Department');?></li>
		          <li><?php echo anchor('recheck/stdcheck','stdcheck');?></li>
		          <li><?php echo anchor('recheck/department_count_std','Department Cout by');?></li>
		          <li><?php echo anchor('recheck/data_std_group_error','Check data std group error');?></li>
		          <li><?php echo anchor('recheck/checktblcandidategroup','Check tblcandidate = group');?></li>
		        </ul>
		      </li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="#"><span class="glyphicon glyphicon-user"></span>  <?php echo $name;?></a></li>
		      <li><a href="<?php echo site_url('login/logout');?>"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		    </ul>
		    </div>
		  </div>
		</nav>
		<!--<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>-->
		<div class="content_page">