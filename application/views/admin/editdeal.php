<section class="content-header">
      <h1>Edit Deal</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Deal</a></li>
        <li><a href="#">Edit Deal</a></li>
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
		
		<h3><?=$title?></h3>
							<form action="" method="post" name="frm">
							Organisation Title:
								<input type="text" name="org_name" class="form-control" required="required" value="<?=$deal->org_name?>" /><br>
								<input type="hidden" name="id" class="form-control" required="required" value="<?=$deal->id?>" />
								Site URL:
								<input type="text" name="url" class="form-control" required="required" value="<?=$deal->url?>" /><br><br>
								Image Url:
								<input type="text" name="image_url" class="form-control" required="required" value="<?=$deal->image_url?>" /><br><br>
								<!-- /.box-header -->
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
  