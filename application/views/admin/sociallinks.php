<section class="content-header">
	<h1>View Adverts</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Advert</a></li>
        <li><a href="#">View Adverts</a></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="row">
		<div class="col-sm-12">
        
		<!-- Profile Image -->
		<div class="box box-primary">
			<div class="box-body box-profile">
				<div class="col-sm-12">
		
					<div class="<?=$class?>"><?=$content?></div>
					<form action = "" method="post" name="frm">
								
						<div class="row bg-gray-active">
							<div class="col-sm-4"><h4><b>name</b></h4></div>
							<div class="col-sm-4"><h4><b>link</b></h4></div>
							<div class="col-sm-2"><h4><b>Status</b></h4></div>
							<div class="col-sm-2"><h4><b>Action</b></h4></div>
						</div><br>
						<?php $no = 0; foreach($social as $social){ $no+=1;?>
						<div class="boxed  sticky  push-down-45">
							<div class="row">
								<div class="col-sm-4"><?= $social->name?></div>
								<div class="col-sm-4"><?= $social->link?></div>
								<div class="col-sm-2"><?= $social->status?'Published':'Not Published'?></div>
								<div class="col-sm-2">
									<a href="<?=base_url().'admin/sociallinks/changestatus/'.$social->id; ?>" onclick="return confirm('You are about to <?= $social->status?'Deactivate':'Publish'?> this social media. Click ok to  continue')"><?= $social->status?'Deactivate':'Publish'?></a> <a href="editsocial/<?php  echo $social->id ?>">edit</a></div>
							</div>
						</div><hr />
						<?php  } ?><div class="row">
						<div class="col-sm-4"><input type='submit' value='delete' name='delete' /> <a href="#"><input type='submit' value='deactivate' name='deactivate' /></div></div>
					</form>
				</div>
			</div>
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
  