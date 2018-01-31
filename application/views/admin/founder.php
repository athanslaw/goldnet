<section class="content-header">
      <h1>Founder Information</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admin</a></li>
        <li><a href="#">Founder</a></li>
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
			<form action="" method="post" name="frm" enctype="multipart/form-data">
				<img src="<?php echo base_url()?>images/founder/founder.jpg" alt="" id="blah" width="153"><br><br>
				<input type="file" name="file" id="file" onchange="readURL(this);" /><br>
				<input type="text" name="name" class="form-control" required="required" value="<?=$founder->name?>" title="Name of CEO / Founder" /><br>
				<input type="text" name="phone" class="form-control" required="required" value="<?=$founder->phone?>" title="Official Phone Number" /><br>
				<input type="text" name="address" class="form-control" required="required" value="<?=$founder->address?>" title="Address of Company" /><br>
				<textarea class="form-control" name="biography" id="compose-textarea" style="height: 200px" required="required" placeholder="About the Founder">
					<?=$founder->biography?>
				</textarea><br>
				<input type="text" class="form-control" name="organization" required="required" value="<?=$founder->organization?>" title="Name of Organization"/><br>
				<input type="text" class="form-control" name="short_name" required="required" value="<?=$founder->short_name?>" title="Abbreviation of Organization Name" />
				<input type="submit" name="submit" id="button" class="btn bg-primary" value="Submit" /><br><br>
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
  