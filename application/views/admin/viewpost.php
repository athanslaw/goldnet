<section class="content-header">
      <h1>View Books</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manage Books</a></li>
        <li><a href="#">View Books</a></li>
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
									<div class="col-sm-4"><h4><b>Cover Page</b></h4></div>
									<div class="col-sm-4"><h4><b>Book Title</b></h4></div>
									<div class="col-sm-2"><h4><b>Status</b></h4></div>
									<div class="col-sm-1"><h4><b>Action</b></h4></div>
									</div><br>
									<?php $no = 0; foreach($posts as $post){ $no+=1;?>
									<div class="boxed  sticky  push-down-45">
									<div class="row">
									<div class="col-sm-1"><b><?=$no?>.</b> <span style="float:right">
									<input name="post_id[]" value="<?= $post->id?>" id="<?= $post->id?>" type="checkbox" /></div>
									<div class="col-sm-4"><?php  if($post->pix != '0') { ?>
									<img class="wp-post-image" src="<?php echo base_url()?>images/blog/books/coverpage/<?=$post->pix?>" alt="" width="148"><?php }?>
									</div>
									<div class="col-sm-4"><label for="<?= $post->id?>">
									<a href="<?php echo base_url()?>images/blog/books/documents/<?=$post->document_name?>"><?= $post->title?></a></label></div>
									<div class="col-sm-2"><?= $post->status==1?'Published':'Not Published'?></div>
									<div class="col-sm-1"><a href="<?php echo base_url().'admin/viewpost/delete___'.$post->id; ?>" onclick="return confirm('You are about to delete a post. Click ok to  continue')">
									<img src="<?=base_url().'images/delete.png'?>" title="delete this post" height="16"/></a> <br/>
									<a href="<?=base_url().'admin/viewpost/changestatus___'.$post->id; ?>" onclick="return confirm('You are about to <?= $post->status==1?'Deactivate':'Publish'?> a post. Click ok to  continue')"><?= $post->status==1?'<img src="'. base_url().'images/minus.gif" height="16" title="Deactivate"/>':'<img src="'. base_url().'images/plus.gif" height="16" title="Publish"/>'?></a> 
									<br><a href="<?=base_url().'editpost/'.$post->slug ?>"><img src="<?=base_url().'images/edit.png'?>" title="edit this post" height="16"/></a></div>
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
  