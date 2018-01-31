<section class="content-header">
      <h1>Update Profile</h1><?=$content?>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Update Profile</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">
          
    <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
						
						
						
			  
				<div class="boxed  sticky  push-down-45">
				
					<div class="row">
						<div class="col-xs-10  col-xs-offset-1"><br>
							
							<form name="frm" action="" method="post" enctype="multipart/form-data">
								<img id="blah" src="<?php echo base_url()?>images/users/<?=$user->username.'.jpg'?>" alt="" width="153"><br><br>
								<input type="file" name="file" id="file" onchange="readURL1(this,'blah');" /><br>
								<table class="table">
									<tr><th>First Name</th><td><input type="text" name="fname" class="form-control" value="<?=$user->fname?>"></td></tr>
									<tr><th>Last Name</th><td><input type="text" name="lname" class="form-control" value="<?=$user->lname?>"></td></tr>
									<tr><th>Phone Number</th><td><input type="text" name="phone" class="form-control" value="<?=$user->phone?>"></td></tr>
									<tr><th>Email</th><td><input type="email" readonly name="email" class="form-control" value="<?=$user->username?>"></td></tr>
									<tr><th>Country</th><td>
										<select name="country" onchange="return fetch_state(this.value);" class="form-control">
										<option value="">Country</option>
										<?php
										foreach($country as $country){?><option value="<?=$country->id?>"<?=$user->country===$country->id?"selected":""?>><?=$country->country_name?></option>
										<?php }?>
										</select>
									</td></tr>
									<tr><th>State</th><td>
										<select name="state" id="state" onchange="return fetch_lga(this.value);" class="form-control">
											<option value="">State</option>
										<?php
										foreach($state as $state){?><option value="<?=$state->code?>"<?=$user->state===$state->code?"selected":""?>><?=$state->state?></option>
										<?php }?>
										</select>
									</td></tr>
									<tr><th>LGA</th><td><select name="lga" id="lga" class="form-control dropdown-toggle required">
									<option value="">LGA</option>
										<?php
										foreach($lga as $lga){?><option value="<?=$lga->code?>" <?=$user->lga===$lga->code?"selected":""?>><?=$lga->lga?></option>
										<?php }?>
									</select></td></tr>
									<tr><th>Sex</th><td><select name="sex" id="sex" class="form-control dropdown-toggle required">
									<option value="Male" <?=$user->sex==="Male"?"selected":""?>>Male</option>
									<option value="Female" <?=$user->sex==="Female"?"selected":""?>>Female</option>
									</select></td></tr>
									<tr><th>Town</th><td><input type="text" name="town" class="form-control" value="<?=$user->town?>"></td></tr>
									<tr><th>About Me</th><td><textarea name="description" class="form-control"><?=$user->description?></textarea></td></tr>
									<tr><th></th><td><input type="submit" name="send" value="save" class="bg-primary"></td></tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			  
			  
						<div class="col-sm-2"></div>
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
 
