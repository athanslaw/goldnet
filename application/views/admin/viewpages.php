<section class="content-header">
      <h1>View Pages</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Pages</a></li>
        <li><a href="#">View Pages</a></li>
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
					<div class="col-sm-1"></div>
					<div class="col-sm-2"><h4><b>Page Title</b></h4></div>
					<div class="col-sm-1"><h4><b>Page Link</b></h4></div>
					<div class="col-sm-5"><h4><b>Content</b></h4></div>
					<div class="col-sm-2"><h4><b>Status</b></h4></div>
					<div class="col-sm-1"><h4><b>Action</b></h4></div>
				</div><br>
				<?php foreach($pages as $page){ ?>
					<div class="boxed  sticky  push-down-45">
						<div class="row">
							<div class="col-sm-1"><input name="page_id[]" value="<?= $page->slug?>" id="<?= $page->slug?>" type="checkbox" /></div>
							<div class="col-sm-2"><?= $page->page_title?></div>
							<div class="col-sm-1"><label for="<?= $page->slug?>"><?= $page->slug?></label></div>
							<div class="col-sm-5"><label for="<?= $page->slug?>"><?= $page->content?></label></div>
							<div class="col-sm-2"><?= $page->status==1?'Published':'Not Published'?></div>
							<div class="col-sm-1"><a href="<?php echo site_url('admin/viewpages/delete___'.$page->slug); ?>" onclick="return confirm('You are about to delete a page. Click ok to  continue')">delete</a><br>
							<a href="<?=site_url('admin/viewpages/changestatus___'.$page->slug); ?>" onclick="return confirm('You are about to <?= $page->status==1?'Deactivate':'Publish'?> a page. Click ok to  continue')"><?= $page->status==1?'Deactivate':'Publish'?></a>
							<br><a href="<?php echo site_url('admin/editpage/'.$page->slug); ?>"><img src="<?=base_url().'images/edit.png'?>" title="edit this deal" height="16"/></a></div>
						</div></div><hr />
						<?php  } ?><div class="row">
						<div class="col-sm-4"><input type='submit' value='delete' name='delete' /> <a href="#"><input type='submit' value='deactivate' name='deactivate' /></div></div>
									</form>
        </div>            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    
    
    
                </div>
                <!-- /.page -->
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
  