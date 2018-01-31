<style>
.active{
 background-color: #ffffff !important; color: #000000 !important;
}
</style>

 <li class="treeview <?= $activepage == "profile"?"active":""?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span> Profile</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>myprofile"><i class="fa fa-circle-o"></i> View Profile</a></li>
		  </ul>
        </li>
		<li class="<?= $activepage == "active_terminal"?"active":""?>"><a href="<?php echo base_url()?>admin/viewalert"><i class="fa fa-book"></i> <span> Notification<span class="badge"><?=getalert()?></span></span></a></li>
		<?php if($_SESSION['role']=='admin'){?>
		  <li class="treeview <?= $activepage == "setup"?"active":""?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Configuration</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>admin/founder"><i class="fa fa-circle-o"></i> Founder Entry</a></li>
		  </ul>
		</li>
		
        <li class="treeview <?= $activepage == "deals"?"active":""?>">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>Manage Deals</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>admin/adddeals"><i class="fa fa-circle-o"></i> Add Deals</a></li>
			<li><a href="<?php echo base_url()?>admin/viewdeals_active"><i class="fa fa-circle-o"></i> Active Deals</a></li>
			<li><a href="<?php echo base_url()?>admin/viewdeals"><i class="fa fa-circle-o"></i> View All Deals</a></li>
		  </ul>
        </li>
        <li class="treeview <?= $activepage == "posts"?"active":""?>">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>Manage Library</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>admin/viewcategory"><i class="fa fa-circle-o"></i> Manage Categories</a></li>
			<li><a href="<?php echo base_url()?>post"><i class="fa fa-circle-o"></i> Upload Article</a></li>
			<li><a href="<?php echo base_url()?>admin/myposts"><i class="fa fa-circle-o"></i> My Articles</a></li>
			<li><a href="<?php echo base_url()?>viewpost"><i class="fa fa-circle-o"></i> View All Articles</a></li>
			<!--<li><a href="<?php echo base_url()?>setfeaturedpost"><i class="fa fa-circle-o"></i> Featured Articles</a></li>-->
		  </ul>
        </li><!--
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>Manage Socials</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>admin/sociallinks"><i class="fa fa-circle-o"></i> Configure Social Link</a></li>
			<li><a href="<?php echo base_url()?>admin/viewsocial"><i class="fa fa-circle-o"></i> View Social Links</a></li>
		  </ul>
        </li>-->
        <li class="treeview <?= $activepage == "advert"?"active":""?>">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>Manage Advert</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>admin/advert"><i class="fa fa-circle-o"></i> Upload Adverts</a></li>
			<li><a href="<?php echo base_url()?>admin/viewadvert"><i class="fa fa-circle-o"></i> View Adverts</a></li>
		  </ul>
        </li>
        
		<li class="treeview <?= $activepage == "enquiries"?"active":""?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Manage Inquiries</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>viewenquiries"><i class="fa fa-circle-o"></i> View Inquiries</a></li>
		  </ul>
        </li>
        <li class="treeview <?= $activepage == "users"?"active":""?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span> Manage Users</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>users"><i class="fa fa-circle-o"></i> View Users</a></li>
		  </ul>
        </li>
        <li class="treeview <?= $activepage == "admins"?"active":""?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span> Manage Admins</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>admin/createuser"><i class="fa fa-circle-o"></i> Register Admin</a></li>
			<li><a href="<?php echo base_url()?>admin/admins"><i class="fa fa-circle-o"></i> View Admins</a></li>
		  </ul>
        </li>
        <li class="treeview <?= $activepage == "pages"?"active":""?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span> Manage Pages</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>admin/createpage"><i class="fa fa-circle-o"></i> Create Page</a></li>
			<li><a href="<?php echo base_url()?>admin/viewpages"><i class="fa fa-circle-o"></i> View Pages</a></li>
		  </ul>
        </li>
		<?php }
		else{?>
		
        <li class="treeview <?= $activepage == "posts"?"active":""?>">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>Manage Library</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo base_url()?>post"><i class="fa fa-circle-o"></i> Post Article</a></li>
			<li><a href="<?php echo base_url()?>admin/myposts"><i class="fa fa-circle-o"></i> My Articles</a></li>
		  </ul>
        </li>
		<?php }?>
		<li <?= $activepage == "changepass"?"active":""?>><a href="<?php echo base_url()?>admin/changepass"><i class="fa fa-book"></i> <span> Change Password</span></a></li>
        <li><a href="<?php echo base_url()?>logout"><i class="fa fa-book"></i> <span>Logout</span></a></li>
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->








  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">