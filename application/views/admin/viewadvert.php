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
									<div class="col-sm-1"></div>
									<div class="col-sm-2"><h4><b>Image</b></h4></div>
									<div class="col-sm-1"><h4><b>Advert Title</b></h4></div>
									<div class="col-sm-5"><h4><b>Content</b></h4></div>
									<div class="col-sm-2"><h4><b>Status</b></h4></div>
									<div class="col-sm-1"><h4><b>Action</b></h4></div>
									</div><br>
									<?php $no = 0; foreach($advert as $advert){ $no+=1;?>
									<div class="boxed  sticky  push-down-45">
									<div class="row">
									<div class="col-sm-1"><b><?=$no?>.</b> <span style="float:right">
									<input name="post_id[]" value="<?= $advert->id?>" id="<?= $advert->id?>" type="checkbox" /></div>
									<div class="col-sm-2">
									<img class="wp-post-image" src="<?php echo base_url()?>images/blog/advert/<?=$advert->image?>" alt="" width="148">
									</div>
									<div class="col-sm-1"><label for="<?= $advert->id?>"><?= $advert->title?></label></div>
									<div class="col-sm-5"><label for="<?= $advert->id?>"><?= $advert->description?></label></div>
									<div class="col-sm-2"><?= $advert->status==1?'Published':'Not Published'?></div>
									<div class="col-sm-1"><a href="<?php echo base_url().'admin/viewadvert/delete___'.$advert->id ?>" onclick="return confirm('You are about to delete this advert. Click ok to  continue')">
									<img src="<?=base_url().'images/delete.png'?>" title="delete this advert" height="16"/></a> <br/>
									<a href="<?=base_url().'admin/viewadvert/changestatus___'.$advert->id; ?>" title="<?= $advert->status==1?'Deactivate':'Publish'?> this advert" onclick="return confirm('You are about to <?= $advert->status==1?'Deactivate':'Publish'?> an advert. Click ok to  continue')">
									<?= $advert->status==1?'<img src="'. base_url().'images/minus.gif" height="16" title="Disable"/>':'<img src="'. base_url().'images/plus.gif" height="16" title="Enable"/>'?>
									</a> <br><a href="editadvert/<?php  echo $advert->id ?>"><img src="<?=base_url().'images/edit.png'?>" title="edit this advert" height="16"/></a></div>
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
  