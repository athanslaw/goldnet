<section class="content-header">
      <h1>Edit</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Page</a></li>
        <li><a href="#">Edit Page</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">
          
              
              

    <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
						<div class="col-sm-12"><div class="<?=$class?>"><?= $content?></div>
							<form action="" method="post" name="frm">
								<input type="text" name="title" class="form-control" title="Page Title" value="<?=$page->page_title?>" required="required" /><br>
								<!-- /.box-header -->
								<div class="box-body">
								  <div class="form-group">
								  <i><span style="color:red">You may edit the content using Microsoft word and paste it here</span></i>
										<textarea id="compose-textarea" class="form-control" name="content" title="Page Content" style="height: 200px" required="required">
										<?=$page->content?>
										</textarea>
								  </div>
								</div>
								<!-- /.box-body -->
            					<input type="submit" name="send" id="button" class="btn bg-primary" value="Submit" /><br><br>
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
  
		
		