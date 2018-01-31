<section class="content-header">
      <h1>Create new user</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User Management</a></li>
        <li><a href="#">Create User</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">
          
              
              

    <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
		<div class="col-sm-1"></div>
        <div class="col-sm-10">
        <div class="<?=$class?>"><?=$content?></div>
		
		
							<form action="" method="post" name="frm">
							Role:
								<select name="role" required="required" class="form-control">
									<option value selected>-Select Role-</option>
									<option value="admin" <?=($role!="" && $role == 'admin')? "selected":"" ?> >Admin</option>
									<option value="user" <?=($role!="" && $role == 'user')? "selected":"" ?> >User</option>
								</select><br>
								Email:
								<input type="email" name="username" class="form-control" placeholder="Email" required="required" /><br>
								Password:
								<input type="password" name="password" class="form-control" placeholder="Password" required="required" /><br>
								First Name:
								<input type="text" name="fname" class="form-control" placeholder="First Name" required="required" /><br>
								Last Name:
								<input type="text" name="lname" class="form-control" placeholder="Last Name" required="required" /><br>
								<input type="submit" name="send"class="btn bg-primary" id="button" value="Submit" /><br><br>
							</form>
		
        </div><div class="col-sm-1"></div>            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    
    
    
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
  