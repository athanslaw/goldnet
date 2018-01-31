<section class="content-header">
      <h1>Upload Document</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Library</a></li>
        <li><a href="#">Upload Documents</a></li>
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
						<div class="col-sm-8"><div class="<?=$class?>"><?= $content?></div>
							<form action="" method="post" name="frm" enctype="multipart/form-data">
								<img id="blah" src="" alt="" style="width:336px; padding-bottom:15px"><br><br>
								<span>Cover Page</span>
								<input type="file" name="file" id="file"  onchange="readURL(this);" placeholder="Upload Cover Page" required="required" /><br>
								
								<span>Upload Document (PDF most preferred)</span><input type="file" name="document" id="document" placeholder="Upload Document (PDF more preferable)" /><br>
								<select name="category" required="required">
									<option value selected>-Select Category-</option>
									<?php
									foreach($categories as $categories){
									?>
									<option value="<?=$categories->id ?>" <?=($category!="" && $category == $categories->id )? "selected":"" ?> ><?=$categories->name ?>
									</option>
									<?php }?>
								</select><br><br>
								<input type="text" name="title" class="form-control" placeholder="Message Title" required="required" /><br>
								<input type="text" name="author_name" class="form-control" placeholder="Author name" /><br>
								<input type="text" name="author_site" class="form-control" placeholder="Author site" /><br>
								<input type="email" name="author_email" class="form-control" placeholder="Author email" /><br>
								<input type="radio" name="paid_status" id="paid_status" value="0" /><label for="paid_status">Free</label> &nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="paid_status" id="paid_status1" value="1" /><label for="paid_status1">Paid</label><br>
								<input type="number" name="amount" class="form-control" placeholder="Amount" /><br>
								<br>
								<!-- /.box-header -->
								<div class="box-body">
								  <div class="form-group">
										<textarea id="compose-textarea" class="form-control" name="message" placeholder="Post Content" style="height: 200px" required="required">
										</textarea>
								  </div>
								</div>
								<!-- /.box-body -->
            					<input type="submit" name="submit" id="button" class="btn bg-primary" value="Submit" /><br><br>
							</form>
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
  
		
		