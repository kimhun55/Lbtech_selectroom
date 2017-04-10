
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
		        <ul class="dropdown-menu">
		        <?php foreach ($menu_vocational as $key => $value) {?>
		        		<li><a href="<?php echo site_url('group/zonebranch/'.$value['branchId']); ?>"><?php echo "สาขา : ".$value['branch']." || เอก : ".$value['major']." || ".$value['course'];?></a></li>
		        <?php } ?>
		        </ul>
		      </li>

		      <?php } ?>

			<!-- ปวส -->
			 <?php if(count($menu_high_vocational) > 0 && $menu_high_vocational !== false){?>
		      <li class="dropdown <?php //echo $this->menu->active_menu($menu_navbar,'ปวส.'); ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ปวส<span class="caret"></span></a>
		        <ul class="dropdown-menu">
		        <?php foreach ($menu_high_vocational as $key => $value) {?>
		        		<li><a href="<?php echo site_url('group/zonebranch/'.$value['branchId']); ?>"><?php echo "สาขา : ".$value['branch']." || เอก : ".$value['major']." || ".$value['course'];?></a></li>
		        <?php } ?>
		        </ul>
		      </li>
		      <?php } ?>

		      <?php
		      if(in_array("999", $copyright_user)){  ?>
		      <li class="dropdown <?php echo $this->menu->active_menu($menu_navbar,'setup'); ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Setup<span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="#"><?php echo anchor('setup/set_user','User Management'); ?></a></li>
		          <li><a href="#"><?php echo anchor('setup/set_copyright','Copyright system');?></li>
		          <li><a href="#"><?php echo anchor('setup/set_department_name','Department Name'); ?></a></li>
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