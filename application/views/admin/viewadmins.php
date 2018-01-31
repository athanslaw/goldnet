<section class="content-header">
      <h1>View Users</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Users</a></li>
        <li><a href="#">View Users</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">
          <?=$content?>
              
              

    <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
				<div class="col-sm-12">
				<form action="" method="post" name="frm">
					<table class="table table-hover">
						<tr>
							<th>SNO</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Username</th><th>Role</th><th>Action</th>
						</tr>
						<?php $no = 0;foreach($users as $user){ $no+=1;?>
						<tr>
							<td><?= $no?></td>
							<td><input name="username[]" value="<?= $user->username?>" id="<?=$user->username?>" type="checkbox" />&nbsp;<label for="<?= $user->username?>"><?= $user->username?></label></td>
							<td><label for="<?= $user->username?>"><?= $user->lname?></label></td>
							<td><label for="<?= $user->username?>"><?= $user->username?></label></td>
							<td><label for="<?= $user->username?>"><?= $user->ustatus?'Active':'Disabled'?></label></td>
							<td><label for="<?= $user->username?>"><?= $user->role?></label></td>
							<td><a href="<?php echo base_url().'admin/admins/delete___'.$user->username ?>" onclick="return confirm('You are about to delete this administrator. Click ok to continue')">
									<img src="<?=base_url().'images/delete.png'?>" title="delete this admin" height="16"/></a> <br/>
									<a href="<?=base_url().'admin/admins/changestatus___'.$user->username; ?>" title="<?= $user->ustatus==1?'Deactivate':'Activate'?> this admin" onclick="return confirm('You are about to <?= $user->ustatus==1?'Deactivate':'Activate'?> this admin. Click ok to  continue')">
									<?= $user->ustatus==1?'<img src="'. base_url().'images/minus.gif" height="16" title="Disable"/>':'<img src="'. base_url().'images/plus.gif" height="16" title="Enable"/>'?>
									</a></td>
						</tr>
						<?php  } ?>
						<tr><td colspan="2">
						<input type='submit' value='delete' name='delete' /> <input type='submit' value='changestatus' name='changestatus' /></td>
						</tr>
					</table>
				</form>
				</div>
			</div>
			</div>
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