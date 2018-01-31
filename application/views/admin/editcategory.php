<section class="content-header">
      <h1>Edit Category</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Category</a></li>
        <li><a href="#">Edit Category</a></li>
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
							<form action="" method="post" name="frm" enctype="multipart/form-data">
							Title:
								<input type="text" name="name" class="form-control" required="required" value="<?=$category->name?>" /><br>
								<input type="hidden" name="id" class="form-control" required="required" value="<?=$category->id?>" />
								Description:
								<input type="text" name="description" class="form-control" required="required" value="<?=$category->description?>" /><br><br>
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
  