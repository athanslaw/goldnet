
    <!-- Main content -->
    <section class="content">
<br>
<div class="h1" style="text-align:center">My Profile</div>
      <div class="row table-responsive">
    <form name="frm" action="" method="post">
		<table class="table table-bordered bg-gray-active" align="center" style="width:40%; border-radius:30px">
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
			<tr><th colspan="2" style="text-align:center"><a href="<?=base_url().'account/updateprofile'?>" class="btn grn_btn">Update Profile</a></th></tr>
		</table>
	</form>
    
    
    
    
                </div>