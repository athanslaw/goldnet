<section class="content-header">
      <h1>View Comments</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Post</a></li>
        <li><a href="#">View Comments</a></li>
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
									<div class="col-sm-12"><?=$post->message?></div>
									</div><br><div class="row bg-gray-active">
									<div class="col-sm-1"></div>
									<div class="col-sm-2"><h4><b>Full Name</b></h4></div>
									<div class="col-sm-2"><h4><b>Email/Website</b></h4></div>
									<div class="col-sm-5"><h4><b>Comment</b></h4></div>
									<div class="col-sm-1"><h4><b>Status</b></h4></div>
									<div class="col-sm-1"><h4><b>Action</b></h4></div>
									</div><br>
									<?php $no = 0; foreach($comment as $comment){ $no +=1;?>
									<div class="boxed  sticky  push-down-45">
									<div class="row">
									<div class="col-sm-1"><b><?=$no?>.</b> <span style="float:right">
									<input name="comment_id[]" value="<?= $comment->id?>" id="<?= $comment->id?>" type="checkbox" /></div>
									<div class="col-sm-2"><?= $comment->name?></div>
									<div class="col-sm-2"><label for="<?= $comment->id?>"><?= $comment->email.' /'.$comment->website?></label></div>
									<div class="col-sm-5"><label for="<?= $comment->id?>"><?= $comment->description?></label></div>
									<div class="col-sm-1"><?= $comment->status==1?'Published':'Not Published'?></div>
									<div class="col-sm-1"><a href="<?php echo base_url().'admin/article/'.$post->id.'/'.$comment->id.'/delete/'; ?>" onclick="return confirm('You are about to delete a Comment. Click ok to  continue')">delete</a> 
									<a href="<?=base_url().'admin/article/'.$post->id.'/'.$comment->id.'/changestatus/'; ?>" onclick="return confirm('You are about to <?= $comment->status==1?'Deactivate':'Publish'?> a comment. Click ok to  continue')"><?= $comment->status==1?'Deactivate':'Publish'?></a> </div>
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
                <!-- /.comment -->
                </div>
                <!-- /.comment -->

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
  