<section class="content-header">
      <h1>Compose Response</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Enquiry</a></li>
        <li><a href="#">Reply</a></li>
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
								<input type="text" name="subject" class="form-control" placeholder="Email Subject" required="required" /><br>
								<input type="hidden" name="id" class="form-control" value="<?=$id?>" /><br>
								<!-- /.box-header -->
								<div class="box-body">
								  <div class="form-group">
										<textarea id="compose-textarea" class="form-control" name="message" placeholder="Reply Mail" style="height: 200px" required="required">
										</textarea>
								  </div>
								</div>
								<!-- /.box-body -->
            					<input type="submit" name="send" id="button" value="Submit" /><br><br>
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
  