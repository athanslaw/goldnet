<section class="content-header">
      <h1>My Profile</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">My Profile</a></li>
      </ol>
</section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">
          
              
              

    <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <a href="<?=base_url().'admin/updateprofile'?>">
					<img class="profile-user-img img-responsive img-circle" border="1" 
						src="<?php echo base_url()?>images/users/<?=$user->username.'.jpg'?>" alt="My Pix" width="66" height="70"></a>
              <h3 class="profile-username text-center"><?= $user->fname.' '.$user->lname?></h3>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    
    <form name="frm" action="" method="post">
		<table class="table table-responsive bg-gray-active" align="center" style="width:70%; border-radius:30px">
			<tr><th>First Name</th><td><?=$user->fname?></td></tr>
			<tr><th>Last Name</th><td><?=$user->lname?></td></tr>
			<tr><th>Phone Number</th><td><?=$user->phone?></td></tr>
			<tr><th>Email</th><td><?=$user->username?></td></tr>
			<tr><th>Country</th><td><?=getCountry($user->country)?></td></tr>
			<tr><th>State</th><td><?=getState($user->state)?></td></tr>
			<tr><th>LGA</th><td><?=getLga($user->lga)?></td></tr>
			<tr><th>Sex</th><td><?=$user->sex?></td></tr>
			<tr><th>Town</th><td><?=$user->town?></td></tr>
			<tr><th>About me</th><td><?=$user->town?></td></tr>
			<tr><th></th><td><a href="<?=base_url().'admin/updateprofile'?>" class="bg-blue">Update Profile</a></td></tr>
		</table>
	</form>
    
    
    
    
                </div>
    
    
                </div>
                <!-- /.post -->
                </div>
                <!-- /.post -->

              </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  